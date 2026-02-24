<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfPasswordExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->isMethod('GET') && ! $request->isMethod('HEAD')) {
            return $next($request);
        }

        if ($request->routeIs('user.password') || $request->routeIs('logout')) {
            return $next($request);
        }

        $user = Auth::user();
        if (! $user) {
            return $next($request);
        }

        if (! $this->isPasswordExpired($user)) {
            return $next($request);
        }

        return new RedirectResponse(route('user.password'));
    }

    private function isPasswordExpired($user): bool
    {
        $passwordSetDate = $user->pass_set_date ?? $user->set_pass_date ?? null;
        if (! $passwordSetDate) {
            return false;
        }

        $passwordLimitDays = max((int) config('auth.password_limit_days', 90), 0);
        try {
            $setDate = $passwordSetDate instanceof Carbon
                ? $passwordSetDate
                : Carbon::parse($passwordSetDate);
        } catch (\Throwable) {
            return false;
        }

        return now()->greaterThanOrEqualTo($setDate->copy()->addDays($passwordLimitDays));
    }
}
