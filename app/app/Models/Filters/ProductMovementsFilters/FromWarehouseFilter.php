<?php

namespace App\Models\Filters\ProductMovementsFilters;

use Lacodix\LaravelModelFilter\Filters\NumericFilter;

class FromWarehouseFilter extends NumericFilter
{
    protected string $field = 'from_warehouse_id';
}
