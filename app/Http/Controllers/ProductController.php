<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function search($request){   
        $search = $request->input('search');
        $products = Product::where('name', 'like', "%$search%")->paginate(3);
        
        return view('home', compact('products'));
    }

    public function index(Request $request)
    {
        if(count($request->all()) > 0){
            return $this->search($request);
        }else{
            $products = Product::paginate(3);
            return view('home', compact('products'));
        }
    }

    public function product($id, Request $request)
    {
        if(count($request->all()) > 0){
            return $this->search($request);
        }else{
            $products = Product::where('id',$id)->first();
            return view('product', compact('products'));
        }
        
    }
}