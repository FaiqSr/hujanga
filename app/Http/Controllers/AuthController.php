<?php

namespace App\Http\Controllers;

use App\Helpers\FirebaseService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Exception\Auth\EmailExists;

class AuthController extends Controller
{

    protected $firebaseService;
    protected $firebaseDb;

    public function __construct()
    {
        $this->firebaseService = new FirebaseService();
        $this->firebaseDb = app('firebase.database');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function signInWithGoogle($accessToken, $refreshToken)
    {
        $verifyToken = $this->firebaseService->verifyIdToken($accessToken);
        if (!$verifyToken) {
            return redirect()->route('login')->withErrors(['message' => 'Invalid token']);
        }

        $claims = $verifyToken->claims();
        $uid = $claims->get('user_id');
        $user = $this->firebaseDb->getReference('users/' . $uid)->getSnapshot()->getValue();


        if (!$user) {

            $this->firebaseDb->getReference('users/' . $uid)->set([
                'uid' => $uid,
                'first_name' => $claims->get('name'),
                'last_name' => "",
                'role' => 'user',
                'email' => $claims->get('email'),
                'photoUrl' => $claims->get('picture'),
            ]);

            session([
                'firebase_access_token' => $accessToken,
                'firebase_refresh_token' => $refreshToken,
                'firebase_uid' => $uid,
            ]);

            return redirect()->route('map');
        }

        session([
            'firebase_access_token' => $accessToken,
            'firebase_refresh_token' => $refreshToken,
            'firebase_uid' => $uid,
        ]);
        return redirect()->route('map');
    }

    public function signUp(Request $request)
    {
        // dd($request);
        $validatedRequest = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'string|nullable',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $user = $this->firebaseService->createAccountWithEmailAndPassword($validatedRequest['email'], $validatedRequest['password']);

            $this->firebaseDb->getReference('users/' . $user->uid)->set([
                'uid' => $user->uid,
                'first_name' => $validatedRequest['first_name'],
                'last_name' => $validatedRequest['last_name'] ?? "",
                'email' => $validatedRequest['email'],
                'photoUrl' => "",
            ]);

            return redirect()->route('login');
        } catch (EmailExists $e) {
            // Redirect ke halaman register dengan error
            return redirect('/register')->withErrors(['email' => 'Email sudah terdaftar.']);
        } catch (\Throwable $e) {
            // Tangani error lain (misal: koneksi, kesalahan umum, dll)
            return redirect('/register')->withErrors(['general' => 'Pendaftaran gagal: ' . $e->getMessage()]);
        }
    }

    public function loginWithEmailAndPassword($accessToken, $refreshToken)
    {
        $verifyToken = $this->firebaseService->verifyIdToken($accessToken);
        if (!$verifyToken) {
            return redirect()->route('login')->withErrors(['message' => 'Invalid token']);
        }


        $claims = $verifyToken->claims();
        $uid = $claims->get('user_id');
        $user = $this->firebaseDb->getReference('users/' . $uid)->getSnapshot()->getValue();


        if (!$user) {
            return redirect()->route('login')->withErrors(['message' => 'Email atau password salah']);
        }

        session([
            'firebase_access_token' => $accessToken,
            'firebase_refresh_token' => $refreshToken,
            'firebase_uid' => $uid,
        ]);

        return redirect()->route('map');
    }
    public function logout()
    {
        session()->forget('firebase_access_token');
        session()->forget('firebase_refresh_token');

        return redirect()->route('login');
    }
}
