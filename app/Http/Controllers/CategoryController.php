<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        // raw sql
        // $categories = DB::select('SELECT * FROM categories');
        // Query Builder 
        // $categories = DB::table('categories')->get();
        // Eloquent ORM:
        $categories = Category::orderBy('id', 'desc')->get();
        // dd($categories);
        return view('categories.list', compact('categories'));
    }

    public function create()
    {
        // dd(112);
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        Category::create($validated);

        // return view('categories.list'); don't like this
        return redirect('/categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        // dd($category);
        return view('categories.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = Category::find($id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
        $category->update($validated);
        return redirect('/categories');
    }
    public function destroy($id)
    {
        // dd($id);
        $category = Category::find($id);
        $category->delete();
        return redirect('/categories');
    }

}
