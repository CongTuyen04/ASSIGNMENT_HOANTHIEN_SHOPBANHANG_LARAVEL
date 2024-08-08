<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\Utilities\Constant;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     * @param \Illuminate\Http\Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        // chưa login: chuyến hướng login
        if (Auth::guest()) {
            return redirect()->guest('/admin/login');
        }

        // Đã login sai level: logout và login lại
        if (Auth::user()->level != Constant::user_level_host && Auth::user()->level != Constant::user_level_admin) {
            Auth::logout();
            return redirect()->guest('/admin/user');
        }

        return $next($request);
    }
}
