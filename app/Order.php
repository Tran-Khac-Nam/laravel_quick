<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_name',
        'price',
        'qty',
        'ship_address',
        'note',
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
    	 return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
