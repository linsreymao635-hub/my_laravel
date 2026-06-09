<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Get all products with their category
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products', compact('products'));
    }

    // Get all products under a specific category
    public function byCategory($id)
    {
        $category = Category::with('products')->find($id);
        return view('categories.index', compact('category'));
    }

    // Get single product with category name
    public function show($id)
    {
        $product = Product::find($id);
        echo $product->category->name; // or pass to view
    }

    // Loop all products in a category
    public function listByCategory($id)
    {
        $category = Category::find($id);
        foreach ($category->products as $product) {
            echo $product->name;
        }
    }
}