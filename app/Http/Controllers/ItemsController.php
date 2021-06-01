<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::latest('created_at')->get();
        return view('admin', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $request->validated([
            'name' => ['required|string|max:255'],
            'price' => ['required|numeric|integer|min:0'],
            'stock' => ['required|numeric|integer|min:0'],
            'image' => ['file|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048'],
            'status' => ['required'],
        ]);
        
        if($file = $request->image){
            $filename = time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/');
            $file->move($target_path,$filename);
        }else{
            $filename = "";
        }

        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->status = $request->status;
        $item->image = $filename;
        $item->save();

        return redirect()->route('items.index')
                ->with('message', '商品を追加しました。');
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

    public function __construct()
    {
        $this->middleware('auth')
        ->except(['index', 'show', ]);
    }
}
