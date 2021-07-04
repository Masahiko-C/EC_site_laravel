<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function show(){
        $user_id = Auth::id();
        $carts = Cart::select()->where('user_id', $user_id)->join('items', 'items.item_id', '=', 'carts.item_id')->get();
        return view('Items.cart', compact('carts'));
    }

    public function store(Request $request){
        $user_id = $request->user()->id;
        $item_id = $request->item_id;
        $cart = Cart::where(['user_id' => $user_id, 'item_id' => $item_id])->first();

        if($cart == null){
        Cart::create(['user_id' => $user_id, 'item_id' => $item_id, 'amount' => 1]);
        } else {
            Cart::where(['user_id' => $user_id, 'item_id' => $item_id])->increment('amount', 1);
        }

        return redirect()->route('items.index')->with('message', '商品を追加しました。');

    }

    public function destroy(Cart $cart){
        $cart->delete();
        return redirect()->route('cart')
                ->with('message', '商品をカートから削除しました。');
    }
}
