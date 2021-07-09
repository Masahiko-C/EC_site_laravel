<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Item extends Model
{
    use sortable;

    protected $fillable = ['item_id', 'name', 'stock', 'price', 'image', 'status'];
    protected $primaryKey = 'item_id';
    public $sortable = ['price'];
    
    public function carts(){
        return $this->belongsTo(Cart::class, 'item_id');
    }

}
