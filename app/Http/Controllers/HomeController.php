<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }

    public function aboutReynaldi()
    {
        return view('about.abang');
    }

    public function aboutNiefa()
    {
        return view('about.niefa');
    }

    public function aboutFaiq()
    {
        return view('about.faiq');
    }

    public function sendMessage(Request $request)
    {
        // dd($request);
        $validatedRequest = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $firebaseDb = app('firebase.database');

        $firebaseDb->getReference('messages/')->push([
            'name' => $validatedRequest['name'],
            'email' => $validatedRequest['email'],
            'subject' => $validatedRequest['subject'],
            'message' => $validatedRequest['message'],
            'created_at' => now()->format('Y-m-d H:i:s'),
        ]);

        $firebaseDb->getReference('notifications/')->push([
            'type' => 'email',
            'title' => $validatedRequest['email'],
            'created_at' => now()->format('Y-m-d H:i:s'),
            'isRead' => false,
        ]);

        return redirect()->route('contact')->with('success', 'Pesan berhasil dikirim.');
    }
}
