<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  

    public function handle(Request $request, Closure $next, $roles)
    {
        if (!$request->user()) {
            abort(403, 'Giriş yapmanız gerekiyor.');
        }

        $roleList = explode('|', $roles);

        if (!in_array($request->user()->role, $roleList)) {
            abort(403, 'Bu alana erişiminiz yok.');
        }

        return $next($request);
    }
}
