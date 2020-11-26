<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($id)
    {
        $product = DB::table('products')->where('id',$id);
        return view('product', compact('product'));
    }
}