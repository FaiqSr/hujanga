<?php

use App\Helpers\FirebaseService;
use App\Models\User;

if (!function_exists('userAuth')) {
    function userAuth()
    {
        $firebaseService = new FirebaseService();
        if (!session()->get('firebase_access_token')) {
            return null;
        }

        return $firebaseService->verifyIdToken(session()->get('firebase_access_token'))->claims();
    }
}

if (!function_exists('getUser')) {
    function getUser()
    {
        $uid = session('firebase_uid');

        if (!$uid) {
            return null;
        }

        return \App\Models\User::where('uid', $uid)->first();
    }
}
