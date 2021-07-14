<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where('status', '1')->paginate(8);
        $sort = get_get('sort');
        if($sort!=''){
            switch($sort){
                case 'new_arrival';
                $items = Item::where('status', '1')->paginate(8);
                break;
                case 'high_price';
                $items = Item::where('status', '1')->orderBy('price', 'desc')->paginate(8);
                break;
                case 'low_price';
                $items = Item::where('status', '1')->orderBy('price', 'asc')->paginate(8);
                break;
            }
        }

        $ranks = Item::where('status', 1)
        ->join('purchase_details', 'purchase_details.item_id', '=', 'items.item_id')
        ->groupBy('item_id', 'purchase_details.item_id', 'items.name', 'items.image')
        ->selectRaw('purchase_details.item_id, sum(quantity) as sum, items.name, items.image')
        ->orderBy('sum', 'desc')
        ->get();

        return view('Items.index', compact('items', 'sort', 'ranks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
