<?php

namespace App\Models;

use App\Models\Filters\CreatedAfterFilter;
use App\Models\Filters\CustomerFilter;
use App\Models\Filters\StatusFilter;
use App\Models\Filters\WarehouseFilter;
use App\Providers\OrderEvents\OrderStatus;
use App\Providers\OrderEvents\OrderUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lacodix\LaravelModelFilter\Traits\HasFilters;

/**
 * @method static filter(string[] $array)
 * @method static filterByQueryString()
 * @method static create(array $array)
 * @method static find(int $id)
 */
class Order extends Model
{
    use HasFactory;
    use HasFilters;

    public $timestamps = false;


    protected array $filters = [
        CreatedAfterFilter::class,
        WarehouseFilter::class,
        StatusFilter::class,
        CustomerFilter::class,
    ];

    protected $table = 'orders';
    protected $fillable = [
        'customer',
        'warehouse_id',
        'status',
    ];

    protected $dispatchesEvents = [
        'updated' => OrderStatus::class,
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }


}
