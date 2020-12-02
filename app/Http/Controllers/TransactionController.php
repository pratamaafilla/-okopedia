<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller{
    function index(){
        $user_id = Auth::id();
        $count = DB::table('cartitems')->where('user_id',$user_id)->count();

        return view('history',compact('count'));
    }
}