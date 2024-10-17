<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class OrderProductVariant
 * @package App\Models
 *
 * @property int id
 * @property int product_id
 * @property int order_id
 */
class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'orders_products';
}
