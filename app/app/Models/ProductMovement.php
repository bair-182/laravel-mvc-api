<?php

namespace App\Models;

use App\Models\Filters\ProductMovementsFilters\CreatedAtFilter;
use App\Models\Filters\ProductMovementsFilters\FromWarehouseFilter;
use App\Models\Filters\ProductMovementsFilters\ProductFilter;
use App\Models\Filters\ProductMovementsFilters\ToWarehouseFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lacodix\LaravelModelFilter\Traits\HasFilters;

class ProductMovement extends Model
{
    use HasFactory;
    use HasFilters;

    protected $table = 'product_movements';
    protected $fillable = [
        'product_id',
        'from_warehouse_id',
        'to_warehouse_id',
        'count',
        'type'
    ];

    protected array $filters = [
        CreatedAtFilter::class,
        ProductFilter::class,
        FromWarehouseFilter::class,
        ToWarehouseFilter::class,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function from_warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'from_warehouse_id');
    }

    public function to_warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'to_warehouse_id');
    }
}
