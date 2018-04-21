<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthAdmin
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
        $this->AuthAdminCheck();
        return $next($request);
    }
    public function AuthAdminCheck(){
        $admin_id = Session::get('admin_id');
        //dd($admin_id);
        if ($admin_id) {
            //return;
            
        }
        else{
            return redirect()->route('admin_login')->send();
        }
    }
}
