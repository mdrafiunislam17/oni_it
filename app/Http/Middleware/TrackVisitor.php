<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();

        $date = Carbon::today();

        $exists = DB::table('visitors')
            ->where('ip', $ip)
            ->whereDate('created_at', $date)
            ->exists();

        if (!$exists) {
            DB::table('visitors')->insert([
                'ip' => $ip,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $next($request);
    }
}
