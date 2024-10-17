<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 *
 * @property int id
 * @property string title
 * @property double price
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price'];

    public function orders()
    {
        return $this->belongsToMany(Order::class, OrderProduct::class, 'product_id', 'order_id');
    }

    public function carts()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
