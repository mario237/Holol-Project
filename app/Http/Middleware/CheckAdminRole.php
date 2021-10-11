<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = Auth::user();
        $isAuthorizedAccess = ($user->type != '0');
        if (!$isAuthorizedAccess) {
            Session::put('_errors', ['لا تمتلك صلاحية الوصول الى هذه الصفحة!']);
            Session::save();
            return redirect('/dashboard/login');
        } else {
            return $next($request);
        }
    }
}
