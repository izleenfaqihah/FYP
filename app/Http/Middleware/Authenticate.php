<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request, $guard = null)
    {
        /*if (! $request->expectsJson()) {
            return route('login');
        }*/
        switch ($guard) {
               case 'admin':
            
                if ($request->expectsJson()) {
                   return response()->json(['error' => 'Unauthenticated.'], 401);
                    }
                        return redirect()->route('admin.login');
                        break;
            
             default:
                if ($request->expectsJson()) {
                     return response()->json(['error' => 'Unauthenticated.'], 401);
                     }
                         return redirect()->guest(route('login'));
                            break;
                     }
    }
}
