<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {   
        // Retrieve all products from the database
        $products = Product::with('category')->get();

        // Logic to retrieve products and pass them to the view
        return view('pages.products.index', [
            'products' => $products,
        ]);
    }

}
