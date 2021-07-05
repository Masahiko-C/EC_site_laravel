<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'item_id', 'amount'];
    protected $primaryKey = 'cart_id';

    public function item(){
        return $this->hasMany('App\Item', 'item_id');
    }
}
