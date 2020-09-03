<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        /**
         * If user is not auth
         */
        if ($request->user() === null) {
            return redirect()->route('login');
        }

        /** Get array from routes **/
        $actions = $request->route()->getAction();

        /** Get array from middleware **/

        $middleware = $request->route()->getController()->getMiddleware();

        /**
         * Find if there is some roles for the route
         */
        $action_roles = isset($actions['roles']) ? $actions['roles'] : array();

        $middleware_roles = isset($middleware[0]['options'])? $middleware[0]['options'] : array();
        $roles = array_merge ($action_roles, $middleware_roles);
        /**
         * Check if user has any of roles or if roles dont set for this route
         */
        if ($request->user()->hasAnyRole($roles))
        {
            return $next($request);
        }else {
            return redirect('/');
        }
    }
}
