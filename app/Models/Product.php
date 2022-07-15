<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // use HasFactory;

    use SoftDeletes;

    protected $dates=[
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
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
