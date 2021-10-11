<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        $user = Auth::user();
        $isAuthorizedAccess = ($role == $user->type);
        if (!$isAuthorizedAccess) {
            if ($role=='0') {
                return redirect('/signup');
            }else{
                return redirect('/dashboard/login');
            }
        } else {
            return $next($request);
        }
    }
}
