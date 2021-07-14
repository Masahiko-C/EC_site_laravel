<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Purchase_detail;
use Illuminate\Support\Facades\Auth;

class PurchasesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $userId = Auth::id();
        $purchases = Purchase::with('purchase_details')->where('user_id', $userId)->get();
        return view('Items.purchase', compact('purchases'));
    }

    public function show($id) {
        $userId = Auth::id();
        $purchases = Purchase::with('purchase_details')
                            ->where('user_id', $userId)
                            ->where('order_number', $id)
                            ->first();
        $sum = 0;
        foreach($purchases->purchase_details as $detail){
            $sum +=($detail->price);
        }
        $details = Purchase_detail::where('order_number', $id)
                                ->join('items', 'items.item_id', '=', 'purchase_details.item_id')
                                ->get();

        return view('Items.purchase_detail', compact('purchases', 'details', 'sum'));
    }
}
