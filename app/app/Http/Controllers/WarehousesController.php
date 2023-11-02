<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;

class WarehousesController extends Controller
{
    public function index()
    {
        return Warehouse::all();
    }
}
