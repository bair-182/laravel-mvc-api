<?php

namespace App\Models;

use App\Providers\OrderEvents\OrderStatus;
use App\Providers\OrderEvents\OrderItemCreated;
use App\Providers\OrderEvents\OrderItemUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @method static filter(string[] $array)
 * @method static filterByQueryString()
 */
class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'order_items';
    protected $fillable = ['product_id', 'count'];


    protected $dispatchesEvents = [
        'updated' => OrderItemUpdated::class,
        'created' => OrderItemCreated::class,
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

}
