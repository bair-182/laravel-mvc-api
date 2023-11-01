<?php

namespace App\Models\Filters\ProductMovementsFilters;

use Lacodix\LaravelModelFilter\Filters\NumericFilter;

class ToWarehouseFilter extends NumericFilter
{
    protected string $field = 'to_warehouse_id';
}
