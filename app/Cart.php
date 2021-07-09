<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['cart_id', 'user_id', 'item_id', 'amount'];
    protected $primaryKey = 'cart_id';

    public function items(){
        return $this->hasMany(Item::class, 'item_id', 'item_id');
    }
}
