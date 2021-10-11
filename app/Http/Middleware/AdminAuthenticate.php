<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {

            Session::put('_errors', ['لا تمتلك صلاحية الوصول الى هذه الصفحة. قم بتسجيل الدخول اولا!']);
            Session::save();

            return route('admin-login');
        }
    }
}
