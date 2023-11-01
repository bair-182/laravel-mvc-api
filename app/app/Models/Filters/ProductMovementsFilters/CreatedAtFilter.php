<?php

namespace App\Models\Filters\ProductMovementsFilters;

use Lacodix\LaravelModelFilter\Enums\FilterMode;
use Lacodix\LaravelModelFilter\Filters\DateFilter;

class CreatedAtFilter extends DateFilter
{
    // находит все по двум датам: 2023-01-01 и 2023-01-10
    // пример запроса тут:
    //https://.../posts?test_date_filter[]=2023-01-01&test_date_filter[]=2023-01-10
    //https://.../posts?test_date_filter[0]=2023-01-01&test_date_filter[1]=2023-01-10

    public FilterMode $mode = FilterMode::BETWEEN;
    protected string $field = 'created_at';
}
