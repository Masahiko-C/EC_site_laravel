<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['item_id', 'name', 'stock', 'price', 'image', 'status'];
}
