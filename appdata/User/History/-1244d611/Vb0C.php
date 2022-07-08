<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JsonResponseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);  // after request completion get the controller response her
        
        if($response instanceof \Illuminate\Http\JsonResponse){

            $response->setData([
                'data'  => $response->getData(),
                'status'=> $response->status()
            ]);
        }
        
        return $response;
    }
}
