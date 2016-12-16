<?php

namespace GitoAPI\Http\Middleware;

use Closure;
use GitoAPI\Exceptions\NotFoundException;

class ClintIDMiddleware
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
        if( $request->has('client_id') && $request->get('client_id') != '' && $request->has('client_secret') && $request->get('client_secret') != '')
        {
            return $next($request);
        }
        throw new NotFoundException('client_missing');
    }
}
