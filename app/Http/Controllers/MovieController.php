<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
     public function index()
    {  
        // raw sql
        // $categories = DB::select('SELECT * FROM categories');

        //Query builder
        // $categories = DB::table('categories')->get();

        //Eloquent ROM
        $movies = Movie::all();
        

        // dd($categories);
        return view('movies.list',compact('movies'));
    }
}
