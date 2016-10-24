<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
	   if (!Auth::check())
	   {
		   if ($request->ajax())
		   {
			   return response('Unauthorized.', 401);
		   }
		   else
		   {
			   return redirect()->guest('/ab-admin');
		   }        
	   }
	   else 
	   {
		   if (Auth::user()->role != 'main-admin')
		   {
			   if ($request->ajax())
			   {
				   return response('Unauthorized.', 401);
			   }
			   else
			   {
				   return redirect()->guest('/ab-admin');
			   }
		   }
	   }
	   return $next($request);
	}
}
