<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class IDFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $except = [
     'logout*'
    ];
    
    public function handle($request, Closure $next)
    {
      if($request->id == JWTAuth::parseToken()->authenticate()->prisms_id)
        return $next($request);
      else
        return response()->json(['error' => 'studentid_token_mismatch'], 401);
    }
}
