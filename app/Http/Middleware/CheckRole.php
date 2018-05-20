<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
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
    public function handle($request, Closure $next, $specifiedRole)
    {
        $user = Auth::user();
        foreach ($user->roles as $role){
            if(strtolower($role->name) == $specifiedRole){
                //handle success
                return $next($request);
            }

        }
        //Handle invalid
        return response()->json(['Failed'=> 'Unauthorized - Invalid Permissions'], 403);
    }
}
