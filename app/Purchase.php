<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['order_number', 'user_id'];
    protected $primaryKey = 'order_number';

    public function purchase_details() {
        return $this->hasmany(Purchase_detail::class, 'order_number', 'order_number');
    }
}
