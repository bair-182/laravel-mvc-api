<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with('stocks')->orderBy('id', 'asc')->paginate(20);
    }
}
