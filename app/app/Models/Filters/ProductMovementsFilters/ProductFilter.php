<?php

namespace App\Models\Filters\ProductMovementsFilters;

use Lacodix\LaravelModelFilter\Filters\NumericFilter;

class ProductFilter extends NumericFilter
{
    protected string $field = 'product_id';
}
