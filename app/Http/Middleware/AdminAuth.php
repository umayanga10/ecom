<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
           
         }else{
             $request->session()->flash('error','Access denied');
             return redirect('admin');
         }
         
        return $next($request);
    }
}
