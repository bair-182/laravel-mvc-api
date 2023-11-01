<?php

namespace App\Models\Filters;

use App\Models\Enums\StatusState;
use Lacodix\LaravelModelFilter\Filters\EnumFilter;

class StatusFilter extends EnumFilter
{
    protected string $field = 'status';

    protected string $enum = StatusState::class;
}
