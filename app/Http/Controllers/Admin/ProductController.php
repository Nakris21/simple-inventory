<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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

    public function create()
    {   
        $categories = Category::all();
        // Logic to show the product creation form
        return view('pages.products.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {   
        // Validate the incoming request data
        $validated=$request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'required|string|max:100|unique:products,sku',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create a new product using the validated data
       Product::create([
        "name" =>$request->input('name'),
        "description" =>$request->input('description'),
        "price" =>$request->input('price'),
        "sku" =>$request->input('sku'),
        "stock" =>$request->input('stock'),
        "category_id" =>$request->input('category_id')
       ]
       );
       
    return redirect('/products')
        ->with('success', 'Product created successfully');
    }

    
     public function edit($id)
    {   
        $categories = Category::all();
        $product = Product::findOrFail($id);

        // Logic to show the product creation form
        return view('pages.products.edit', [
            'categories' => $categories,
            'product' => $product,
        ]);
    }
        public function update(Request $request, $id)
    {   
        // Validate the incoming request data
        $validated=$request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'required|string|max:100|unique:products,sku',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create a new product using the validated data
       Product::where('id', $id)->update([
        "name" =>$request->input('name'),
        "description" =>$request->input('description'),
        "price" =>$request->input('price'),
        "sku" =>$request->input('sku'),
        "stock" =>$request->input('stock'),
        "category_id" =>$request->input('category_id')
       ]
       );
       
    return redirect('/products')
        ->with('success', 'Product created successfully');
    }
    public function delete($id)
    {
        // Find the product by ID and delete it
        $product = Product::where ('id', $id);
        $product->delete();

        // Redirect back to the products index with a success message
        return redirect('/products')
            ->with('success', 'Product deleted successfully');
    }
}
