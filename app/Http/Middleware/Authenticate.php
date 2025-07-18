<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Jika request bukan AJAX dan user tidak terautentikasi,
        // arahkan ke halaman login yang sesuai.
        // Ini penting agar user/admin diarahkan ke login yang benar.
        if (! $request->expectsJson()) {
            if ($request->routeIs('admin.*')) { // Jika rute yang diakses adalah rute admin
                return route('admin.login'); // Arahkan ke login admin
            }
            return route('login'); // Arahkan ke login user biasa
        }
        return null;
    }
}