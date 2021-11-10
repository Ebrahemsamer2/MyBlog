<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    public function handle(Request $request, Closure $next)
    {
        // admin has permissions for everything
        if(auth()->user()->role->name === 'admin')
            return $next($request);

        // 1- get the route name
        $route_name = $request->route()->getName();
        // 2- get permissions for this authintecated person
        $routes_arr = auth()->user()->role->permissions->toArray();
        // 3- compare this route name with user permissions
        foreach($routes_arr as $route)
        {
            // 4- if this route name is one of these permissions
            if($route['name'] === $route_name)
                // 5- allow user to access
                return $next($request);
        }
        // 6- else about 403 Unauthoerized Access
        abort(403, 'Access Denied | Unauthorized');
        
    }
}
