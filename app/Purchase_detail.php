<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_detail extends Model
{
    protected $fillable = ['id', 'order_number', 'item_id', 'price', 'quantity'];
}
