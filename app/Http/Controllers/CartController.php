<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller{
    
    public function index(){
        //Buat nampilin total product yang ada di cart user
        $user_id = Auth::id();
        $count = DB::table('cartitems')
        ->where('user_id',$user_id)
        ->count();

        //Ngambil data cartitems dengan join table products
        $products = DB::table('cartitems')
        ->join('products','cartitems.product_id','=','products.id')
        ->where('user_id',$user_id)
        ->get();

        //Kalo gaada product, button checkout di ilangin
        //$empty buat ngasih tau ke blade nya
        if($count == 0){
            $empty = true;
        }else{
            $empty = false;
        }
        
        return view('cart',compact('products','count','empty'));
    }

    public function add_to_cart($id, Request $request){
        //Validasi request quantity nya
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
        
        $quantity = $request->input('quantity');
        $user_id = Auth::id();
        
        //Ambil product_id yang sama dengan product yang dipilih user
        //Buat ngecek udah ada atau blom di cart nya
        $product_id = DB::table('cartitems')->where('product_id',$id)->where('user_id',$user_id)->first();

        
        if($product_id == null){ //Kalau product nya blm ada, masukin ke cart
            DB::table('cartitems')->insert(
                ['user_id' => $user_id, 'product_id' => $id, 'quantity'=> $quantity]
            );
        }else{ //Kalau product nya udah ada di cart, ditambah ke quantity nya
            $total = DB::table('cartitems')->select('quantity')->where('product_id',$id)->first()->quantity;
            $total = $total + $quantity;
            
            DB::update('update cartitems set quantity = ? where product_id = ?', [$total ,$id]);
        }
        return redirect('/');
    }

    //Delete product dr cart
    public function delete($id){
        $user_id = Auth::id();
        
        DB::delete('delete from cartitems where cart_item_id = ? and user_id = ?',[$id,$user_id]);
        return back();
    }

    //Update quantity product di cart
    public function update($id, Request $request){
        $user_id = Auth::id();

        //Validasi quantitynya gaboleh kurang dr 1
        $request->validate([
            'quantity' => 'numeric|min:1',
        ]);
        
        $quantity = $request->input('quantity');

        DB::table('cartitems')
        ->where('user_id',$user_id)
        ->where('product_id',$id)
        ->update(['quantity'=>$quantity]);
        
        return back();
    }

    public function checkout(){
        $user_id = Auth::user()->id;

        //Masukin data transaction nya, dengan date hari ini
        //Id nya diambil dimasukin ke variable
        $transaction_id = DB::table('transactions')->insertGetId([
            'user_id' => $user_id,
            'transaction_date' => date('Y-m-d H:i:s')
        ]);

        //Ambil data product yang ada di cart
        $products = DB::table('cartitems')->where('user_id',$user_id)->get();

        //Foreach sebanyak product
        //Data product dimasukin ke array
        foreach($products as $i => $products){
            $arr[] = [
                'transaction_id' => $transaction_id,
                'product_id' => $products->product_id,
                'quantity' => $products->quantity
            ];
        }

        //Insert data array ke transactionDetails
        DB::table('transactiondetails')->insert($arr);

        //Hapus cart user
        DB::delete('delete from cartitems where user_id = ?',[$user_id]);

        return back();
    }
}