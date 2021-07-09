<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;

class AdminController extends Controller
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
        return view('admins.admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $request->validated();
        
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

        return redirect()->route('admin.index')
                ->with('message', '商品を追加しました。');
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
    public function update($id, Request $request)
    {
        $item = Item::findorFail($id);
        if(isset($request->stock)){
            $rule = ['stock' => 'required|numeric|integer|min:0',];
            $item->update($request->validate($rule));
        } else {
            $rule = ['status' =>'required',];
            $item->update($request->validate($rule));
        }
        return redirect()->route('admin.index')
                ->with('message', '商品情報を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('admin.index')
                ->with('message', '商品を削除しました。');
    }
}
