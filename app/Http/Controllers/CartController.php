<?php

namespace App\Http\Controllers;

use App\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller{
    
    public function index(){
        $user_id = Auth::id();

        $products = DB::table('cartitems')->join('products','cartitems.product_id','=','products.id')->where('user_id',$user_id)->get();
        $count = DB::table('cartitems')->where('user_id',$user_id)->count();
        return view('cart',compact('products','count'));
    }

    public function add_to_cart($id, Request $request){
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
        
        $quantity = $request->input('quantity');
        $user_id = Auth::id();
        
        $product_id = DB::table('cartitems')->where('product_id',$id)->where('user_id',$user_id)->first();
        if($product_id == null){
            DB::table('cartitems')->insert(
                ['user_id' => $user_id, 'product_id' => $id, 'quantity'=> $quantity]
            );
        }else{
            $total = DB::table('cartitems')->select('quantity')->where('product_id',$id)->first()->quantity;
            $total = $total + $quantity;
            
            DB::update('update cartitems set quantity = ? where product_id = ?', [$total ,$id]);
        }
        return back();
    }

    public function delete($id){
        $user_id = Auth::id();
        
        DB::delete('delete from cartitems where cart_item_id = ? and user_id = ?',[$id,$user_id]);
        return back();
    }

    public function update($id, Request $request){
        $user_id = Auth::id();
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
        
        $quantity = $request->input('quantity');

        DB::update('update cartitems set quantity = ? where product_id = ? and user_id = ?', [$quantity,$id,$user_id]);
        
        return back();
    }
}