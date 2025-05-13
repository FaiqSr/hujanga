<?php

use App\Helpers\FirebaseService;

if (!function_exists('userAuth')) {
    function userAuth()
    {
        $firebaseService = new FirebaseService();
        $token = session()->get('firebase_access_token');
        if ($token == null) {
            return null;
        }

        return $firebaseService->verifyIdToken(session()->get('firebase_access_token'))->claims();
    }
}

if (!function_exists('getUser')) {
    function getUser()
    {
        $firebaseDb = app('firebase.database');

        $uid = session('firebase_uid');

        if (!$uid) {
            return null;
        }

        return $firebaseDb->getReference('users/' . $uid)->getSnapshot()->getValue();
    }
}

if (!function_exists('getClaims')) {
    function getClaims()
    {
        $firebaseService = new FirebaseService();
        $token = session()->get('firebase_access_token');
        if (!$token) {
            return null;
        }

        return $firebaseService->verifyIdToken($token)->claims();
    }
}
