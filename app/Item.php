<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Item extends Model
{
    use sortable;

    protected $fillable = ['name', 'stock', 'price', 'image', 'status'];
    protected $primaryKey = 'item_id';

    public $sortable = ['price'];
}
