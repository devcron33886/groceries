<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryShowController extends Controller
{
    public function __invoke(Category $category)
    {
        $categories=Category::all();
        $query = $category->products()->with('variations');

        $products=$query->paginate(12);
        return view('categories.show',compact('category','products','categories'));

    }
}
