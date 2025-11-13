<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Listar todas las categorías (por si quieres una vista de categorías)
    public function index()
    {
        $categories = Category::orderBy('name')->get();

        return view('categories.index', compact('categories'));
    }

    // Mostrar productos de una categoría según su slug (ej: /categoria/alimentacion)
    public function show($slug)
    {
        // Buscar la categoría por slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Productos de esa categoría
        $products = Product::where('category_id', $category->id)->get();

        // Puedes reutilizar tu vista de catálogo o hacer otra
        return view('catalogo', compact('category', 'products'));
    }
}
