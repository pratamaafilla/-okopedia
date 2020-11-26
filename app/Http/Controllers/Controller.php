<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function search($request){   
        $search = $request->input('search');
        $products = Product::where('name', 'like', "%$search%")->paginate(3);
        
        return view('home', compact('products'));
    }
}
