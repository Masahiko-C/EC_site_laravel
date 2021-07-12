<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_detail extends Model
{
    protected $fillable = ['order_number', 'item_id', 'price', 'quantity'];
    protected $primaryKey = ['order_number', 'item_id'];

    public $incrementing = false;

    public function purchases(){
        return $this->belongsTo(Purchase::class, 'order_number');
    }
}
