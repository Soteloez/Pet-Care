<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Catálogo general
    public function index()
    {
        $categories = Category::orderBy('name')->get();

        $products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('catalogo', compact('categories', 'products'));
    }

    // Detalle de producto (opcional)
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);

        return view('products.show', compact('product'));
    }
}
