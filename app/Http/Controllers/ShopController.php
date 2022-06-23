<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variation;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __invoke()
    {
        $products=Product::with('variations')->get();

        return view('shop.index',compact('products'));
    }
}
