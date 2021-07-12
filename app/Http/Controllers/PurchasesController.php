<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchasesController extends Controller
{
    public function index() {
        $userId = Auth::id();
        $purchases = Purchase::with('purchase_details')->where('user_id', $userId)->get();
        return view('Items.purchase', compact('purchases'));
    }
}
