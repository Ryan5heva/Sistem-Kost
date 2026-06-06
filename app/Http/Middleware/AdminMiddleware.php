<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role !== 'admin') {
            // Kalau request API
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Akses ditolak! Hanya admin yang bisa mengakses ini.',
                ], 403);
            }
            // Kalau request web
            return redirect()->route('dashboard')->with('error', 'Akses ditolak! Hanya admin.');
        }

        return $next($request);
    }
}