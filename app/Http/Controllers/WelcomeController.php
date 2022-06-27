<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $categories=Category::all();
        $products=Product::with('variations')->paginate(6);
        return view('welcome',compact('categories','products'));
    }
}
