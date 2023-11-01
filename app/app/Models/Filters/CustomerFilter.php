<?php

namespace App\Models\Filters;

use Lacodix\LaravelModelFilter\Filters\StringFilter;

class CustomerFilter extends StringFilter
{
    protected string $field = 'customer';
}
