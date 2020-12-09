<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuestCheck
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
        if(\Illuminate\Support\Facades\Auth::check()) {
            $userRoles = Auth::user()->roles->pluck('name');

            if(!$userRoles->contains('user')){
            return redirect('/admin-no-access');
            }
            else if(!$userRoles->contains('admin')){
                return redirect('/user-no-access');
            }
        }
        
        return $next($request);
    }
}
