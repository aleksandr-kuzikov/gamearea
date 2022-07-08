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
            $status_code = $response->status();
            $data = $response->getData();

            if ($status_code == 200) {
                $data = ['data' => $data, 'status' => $status_code];
            } else {
                $data->status = $status_code;
            }
            
            $response->setData($data);
        }
        
        return $response;
    }
}
