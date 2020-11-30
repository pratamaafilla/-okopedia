<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // assign variable $userRoles buat nampung nama seluruh roles yang dimiliki oleh user yang sudah ter-autentifikasi (sudah login)
        // roles dapat diakses dengan menggunakan eloquent laravel
        $userRoles = Auth::user()->roles->pluck('name');

        //kalo misalnya user yang sudah login tidak punya role admin, redirect ke no-access page
        if(!$userRoles->contains('admin')){
            return redirect('/user-no-access');
        }

        //kalo user punya role admin, lanjutkan request
        return $next($request);
    }
}
