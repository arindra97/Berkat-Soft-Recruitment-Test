<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    // declare table
    public $table = 'product';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable
    protected $fillable = [
        'name',
        'type',
        'photo',
        'qty',
        'price',
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    // one to many
    public function sales_order()
    {
        return $this->hasMany('App\Models\SalesOrder', 'product_id');
    }
}
