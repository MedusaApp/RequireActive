<?php

namespace Personality\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;

class CheckIfActive
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
        $response = $next($request);
        if ($request->user() &&
            $request->user()->isNotA('member') &&
            ($request->user() instanceof MustVerifyEmail &&
                $request->user()->hasVerifiedEmail())) {
            return Redirect::route('pending');
        }

        return $response;
    }
}
