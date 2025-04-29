<?php

namespace App\Http\Middleware;

use App\Helpers\FirebaseService;
use Closure;
use Illuminate\Http\Request;

class RefreshFirebaseToken
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    public function handle(Request $request, Closure $next)
    {
        $idToken = session('firebase_access_token');
        $refreshToken = session('firebase_refresh_token');
        $uid = session('firebase_uid');

        if (!$idToken || !$refreshToken) {
            return $next($request);
        }

        try {
            $this->firebase->verifyIdToken($idToken);
        } catch (\Exception $e) {
            try {
                $newToken = $this->firebase->RefreshFirebaseAccessToken($refreshToken);

                $verifiedIdToken = $this->firebase->verifyIdToken($newToken['id_token']);
                $uid = $verifiedIdToken->claims()->get('user_id');

                session([
                    'firebase_access_token' => $newToken['id_token'],
                    'firebase_refresh_token' => $newToken['refresh_token'],
                    'firebase_uid' => $uid,
                ]);
            } catch (\Exception $ex) {
                session()->forget(['firesbase_access_token', 'firebase_refresh_token', 'firebase_uid']);
                // return redirect()->route('login')->withErrors('Session expired, please login again.');
                return $next($request);
            }
        }

        return $next($request);
    }
}
