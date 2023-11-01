<?php

namespace App\Models\Filters;

use Lacodix\LaravelModelFilter\Filters\NumericFilter;

class WarehouseFilter extends NumericFilter
{
    protected string $field = 'warehouse_id';
}
