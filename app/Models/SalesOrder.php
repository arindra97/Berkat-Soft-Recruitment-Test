<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class SalesOrder extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $dates=[
        'date',
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'product_id',
        'users_id',
        'date',
        'total',
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    // one to many
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
