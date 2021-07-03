<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Item extends Model
{
    use sortable;

    protected $fillable = ['item_id', 'name', 'stock', 'price', 'image', 'status'];
    protected $primaryKey = 'item_id';
    
    public function cart(){
        return $this->belongsTo('App\Cart');
    }

    public $sortable = ['price'];
}
