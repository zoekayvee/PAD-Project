<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class Admin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	
	public function handle($request, Closure $next)
	{
		$user = \Auth::user();
		if ($user->id != 1)
		{
			return new RedirectResponse(url('/home'));
		}

		return $next($request);
	}

}
