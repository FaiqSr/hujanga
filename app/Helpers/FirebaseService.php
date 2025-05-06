<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Kreait\Firebase\Factory;

class FirebaseService
{
    public $auth;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount((storage_path("app/firebase/firebase_credentials.json")));
        $this->auth = $factory->createAuth();
    }
    public function verifyIdToken($idToken)
    {
        try {
            return $this->auth->verifyIdToken($idToken);
        } catch (\Kreait\Firebase\Exception\Auth\FailedToVerifyToken $e) {
            throw new \Exception('Invalid ID token', 401);
        }
    }

    public function refreshFirebaseAccessToken($refreshToken)
    {
        $apiKey = env('FIREBASE_API_KEY');

        $url = "https://securetoken.googleapis.com/v1/token?key={$apiKey}";


        $response = Http::asForm()->post($url, [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken,
        ]);


        if ($response->ok()) {
            return $response->json();
        } else {
            throw new \Exception('Failed to refresh token: ' . $response->body());
        }
    }

    public function createAccountWithEmailAndPassword($email, $password)
    {
        return $this->auth->createUserWithEmailAndPassword($email, $password);
    }
}
