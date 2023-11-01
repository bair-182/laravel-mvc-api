<?php

namespace App\Http\Controllers;

use App\Models\ProductMovement;

class ProductMovementController extends Controller
{
    public function index()
    {
        return ProductMovement::with('product')
            ->with('from_warehouse')
            ->with('to_warehouse')
            ->filterByQueryString()
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }
}
