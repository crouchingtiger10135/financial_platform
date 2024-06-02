<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Setting;

class PasswordPolicy
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('post') && $request->route()->named('password.update')) {
            $passwordPolicy = Setting::where('key', 'password_policy')->first()->value ?? 'Minimum 8 characters';
            $minLength = intval(preg_replace('/[^0-9]/', '', $passwordPolicy));

            $request->validate([
                'password' => 'required|string|min:' . $minLength . '|confirmed',
            ]);
        }

        return $next($request);
    }
}
