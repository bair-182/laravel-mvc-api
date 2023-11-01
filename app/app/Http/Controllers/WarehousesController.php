<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;

class WarehousesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Warehouse::all();
    }
}
