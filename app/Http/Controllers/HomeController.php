<?php

namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products = Product::paginate(3);
        return view('home', compact('products'));
    }
}