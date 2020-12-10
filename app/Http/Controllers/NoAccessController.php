<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NoAccessController extends Controller
{
    public function userNoAccess(){
        $user_id = Auth::id();
        $count = DB::table('cartitems')->where('user_id',$user_id)->count();
        return view('access_denied_user', compact('count'));
    }

    public function adminNoAccess(){
        return view('access_denied_admin');
    }
}