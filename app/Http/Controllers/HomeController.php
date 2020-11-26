<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request != null){
            $search = $request->input('search');
            $products = Product::where('name', 'like', "%$search%")->paginate(3);
        }else{
            $products = Product::all();
            $products = Product::paginate(3);
        }
        return view('home', compact('products'));
    }
}