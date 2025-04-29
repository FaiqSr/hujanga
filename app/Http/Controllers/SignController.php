<?php

namespace App\Http\Controllers;

use App\Helpers\FirebaseService;
use App\Models\User;

class SignController extends Controller
{



    protected $firebaseService;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }

    public function login()
    {
        return view('login');
    }

    public function signIn($accessToken, $refreshToken)
    {
        $verifyToken = $this->firebaseService->verifyIdToken($accessToken);
        if (!$verifyToken) {
            return redirect()->route('login')->withErrors(['message' => 'Invalid token']);
        }

        $user = User::where('uid', $verifyToken->claims()->get('user_id'))->first();
        $uid = $verifyToken->claims()->get('user_id');

        if (!$user) {
            User::create([
                'uid' => $uid,
                'email' => $verifyToken->claims()->get('email'),
                'first_name' => $verifyToken->claims()->get('name'),
                'photoUrl' => $verifyToken->claims()->get('picture'),
            ]);

            session([
                'firebase_access_token' => $accessToken,
                'firebase_refresh_token' => $refreshToken,
                'firebase_uid' => $uid,
            ]);

            return redirect()->route('dashboard');
        }

        session([
            'firebase_access_token' => $accessToken,
            'firebase_refresh_token' => $refreshToken,
            'firebase_uid' => $uid,
        ]);
        return redirect()->route('dashboard');
    }

    public function signUp() {}
    public function logout()
    {
        session()->forget('firebase_access_token');
        session()->forget('firebase_refresh_token');

        return redirect()->route('login');
    }
}
