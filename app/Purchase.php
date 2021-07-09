<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['order_number', 'user_id'];
    protected $primaryKey = 'order_number';
}
