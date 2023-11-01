<?php

namespace App\Http\Controllers;

use App\Models\Stock;

class StocksController extends Controller
{
    public function index()
    {
        return Stock::all();
    }

}
