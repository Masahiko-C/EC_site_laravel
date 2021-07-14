<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\Purchase;
use App\Purchase_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $userId = Auth::id();
        $carts = Cart::with('items')->where('user_id', $userId)->get();
        $total_price = sum_carts($carts);
        return view('Items.cart', compact('carts', 'total_price'));
    }

    public function store(Request $request){
        $user_id = $request->user()->id;
        $item_id = $request->item_id;
        $amount = ($request->quantity);
        $cart = Cart::where(['user_id' => $user_id, 'item_id' => $item_id])->first();

        if($cart == null){
        Cart::create(['user_id' => $user_id, 'item_id' => $item_id, 'amount' => $amount]);
        } else {
            Cart::where(['user_id' => $user_id, 'item_id' => $item_id])->increment('amount', $amount);
        }

        return redirect()->route('items.index')->with('message', '商品を追加しました。');
    }

    public function update(Request $request, Cart $cart){
        $rule = [
            'amount' => 'required|numeric|integer|min:1',
        ];
        $cart->update($request->validate($rule));

        return redirect()->route('cart')->with('message', 'カート内商品の個数を変更しました。');
    }

    public function destroy(Cart $cart){
        $cart->delete();
        return redirect()->route('cart')
                ->with('message', '商品をカートから削除しました。');
    }

    public function settle(Request $request){
        $user_id = $request->user()->id;
        $carts = Cart::where('user_id', $user_id)->join('items', 'items.item_id', '=', 'carts.item_id')->get();

        return DB::transaction(function() use ($user_id, $carts){
            $errorMsgs = [];

            foreach($carts as $cart){
                $itemStock = $cart->stock;
                $stock = $itemStock - $cart->amount;
                if($stock < 0){
                    $errorMsgs[] = $cart->name.'の購入に失敗しました。';
                } else {
                    Item::where('item_id', $cart->item_id)
                        ->update(['stock' => $stock]);
                }
            }

            $Purchase = Purchase::create(['user_id' => $user_id]);

            if($Purchase === false){
                $errorMsgs[] = '購入履歴の追加に失敗しました。';
                $lastInsertId = 0;
            } else {
                $lastInsertId = $Purchase->order_number;
            }

            foreach($carts as $cart){
                if(Purchase_detail::create([
                    'order_number' => $lastInsertId,
                    'item_id' => $cart->item_id,
                    'price' => $cart->price,
                    'quantity' => $cart->amount]) === false){
                    $errorMsgs[] = $cart->name.'の明細追加に失敗しました。';
                };
                $cart->delete();
            }

            if(count($errorMsgs) > 0){
                DB::rollback();
                $total_price = sum_carts($carts);
                return view('Items.cart', compact('carts', 'total_price', 'errorMsgs'));

            } else {
                $results = Purchase_detail::with('items')->where('order_number', $lastInsertId)->get();
                return view('Items.finish', compact('results'));
            }
        });

    }
}
