<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class NoAccessController extends Controller
{
    public function userNoAccess(){
        return view('access_denied_user');
    }

    public function adminNoAccess(){
        return view('access_denied_admin');
    }
}