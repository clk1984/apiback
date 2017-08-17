<?php

namespace App\Http\Middleware;

use Closure;

class cors
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
        $domains = ['localhost:4200'];
        if(isset($request->server()['HTTP_ORIGIN'])){
                $origin = $request->server()['HTTP_ORIGIN'];
                if(in_array($origin, $domains)){
                    header('Acces-Control-Allow-Origin: '.$origin);
                header('Acces-Control-Allow-Headers : Origin , Content-Type , Authorization');
                }
        }

        return $next($request);
    }
}
