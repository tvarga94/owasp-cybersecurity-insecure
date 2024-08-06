<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()['is_admin']) {
            return $next($request);
        }

        Log::warning('Unauthorized admin access attempt', ['user_id' => auth()->check() ? auth()->user()->id : 'guest', 'timestamp' => now()]);

        return redirect()->route('dashboard');
    }
}
