<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
{
    $auth = Auth::user();

    if (!$auth) {
        Session::flash('message', 'Unauthorized access');
        return redirect('/login')->with('message', 'Unauthorized');
    } elseif ($userType == 'admin' && $auth->type == 1) {
        return $next($request);
    } elseif ($userType == 'manager' && $auth->type == 2) {
        return $next($request);
    } elseif ($userType == 'user' && $auth->type == 0) {
        return $next($request);
    } else {
        Session::flash('message', 'Unauthorized access');
        return redirect()->back();
    }
}

}
