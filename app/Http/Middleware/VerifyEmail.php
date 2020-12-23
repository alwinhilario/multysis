<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // alwinhilario1594623780@gmail.com
        if (!auth()->user()->email_verified) {
            Auth::logout();
            return redirect(route('login.index'))->with([
                'myErrors' => ['Please verify your Email.']
            ]);
        }

        return $next($request);
    }
}
