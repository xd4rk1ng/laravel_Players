<?php

namespace App\Http\Middleware;


use App\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        $adminRole = Role::where('name', 'admin')->first();
        $user = Auth::user();
        if ($user) {
            if ($user->role_id !== $adminRole->id) {
                return redirect(route('players.index'))->with(['status' => 'Access denied']);
            }
        }

        return $next($request);
    }
}
