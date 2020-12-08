<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller{
    function index(){
        $user_id = Auth::id();
        $count = DB::table('cartitems')->where('user_id',$user_id)->count();

        //Tampilin semua data transaction user
        $transactions = DB::table('transactions')
        ->where('user_id',$user_id)
        ->get();

        return view('history',compact('count','transactions'));
    }

    function transaction_detail($id){
        $user_id = Auth::id();
        $count = DB::table('cartitems')->where('user_id',$user_id)->count();

        //Tampilin transaction detailnya
        //Join table transaction, products buat nampilin productnya
        $products = DB::table('transactiondetails')
        ->join('products','transactiondetails.product_id','=','products.id')
        ->join('transactions','transactiondetails.transaction_id','=','transactions.transaction_id')
        ->where('transactiondetails.transaction_id',$id)
        ->where('transactions.user_id',$user_id)
        ->get();

        return view('transaction_detail',compact('count','products'));
    }
}