<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($id)
    {
        $products = Product::where('id',$id)->first();
        return view('product', compact('products'));
    }
}