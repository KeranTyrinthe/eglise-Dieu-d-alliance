<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class SimpleAuth
{
    // Durée en secondes
    protected int $ttl = 120 * 60; // 120 minutes

    public function handle(Request $request, Closure $next)
    {
        $cookie = $request->cookie('simple_auth');

        if (!$cookie) {
            Log::debug('SimpleAuth: no cookie present');
            return redirect()->route('login');
        }

        $decoded = base64_decode($cookie, true);
        if (!$decoded) {
            Log::debug('SimpleAuth: cookie base64 decode failed');
            return redirect()->route('login');
        }

        $parts = explode('|', $decoded);
        if (count($parts) !== 3) {
            Log::debug('SimpleAuth: cookie parts count invalid');
            return redirect()->route('login');
        }

        [$userId, $ts, $hmac] = $parts;

        // vérification de l'expiration
        if (!is_numeric($ts) || (time() - (int)$ts) > $this->ttl) {
            Log::debug('SimpleAuth: cookie expired or ts invalid');
            return redirect()->route('login');
        }

        $appKey = config('app.key');
        if (is_string($appKey) && str_starts_with($appKey, 'base64:')) {
            $appKey = base64_decode(substr($appKey, 7));
        }

        $payload = $userId . '|' . $ts;
        $expected = hash_hmac('sha256', $payload, $appKey);

        if (!hash_equals($expected, $hmac)) {
            Log::debug('SimpleAuth: hmac mismatch for user ' . ($userId ?? 'unknown'));
            return redirect()->route('login');
        }

        // Optionnel: attacher l'utilisateur à la requête
        $user = User::find($userId);
        if (!$user) {
            Log::debug('SimpleAuth: user not found id=' . $userId);
            return redirect()->route('login');
        }

        // Stocker l'utilisateur simple dans l'instance request pour utilisation ultérieure
        $request->attributes->set('simple_user', $user);

        return $next($request);
    }
}
