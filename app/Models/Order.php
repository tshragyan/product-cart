<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 *
 * @property int id
 * @property double price
 * @property double qunatity
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'quantity'];

    public function products()
    {
        return $this->belongsToMany(Product::class, OrderProduct::class, 'order_id', 'product_id');
    }
}
