<?php

namespace App\Http\Controllers;

use App\Helpers\FirebaseService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function showMap()
    {
        return view('dashboard.dashboardMap');
    }

    public function showSetting()
    {
        return view('dashboard.setting');
    }

    public function showUser()
    {
        $app = app('firebase.database');

        $data = $app->getReference('users/')->getValue();


        return view('dashboard.users', ['data' => $data]);
    }

    public function showMessage()
    {
        $app = app('firebase.database');

        $data = $app->getReference('messages/')->getValue();
        return view('dashboard.message', compact('data'));
    }

    public function deleteMessage(Request $request)
    {

        $validatedData = $request->validate([
            'emailId' => 'required'
        ]);


        $app = app('firebase.database');

        $app->getReference('messages/' . $validatedData['emailId'])->remove();

        return redirect()->back();
    }

    public function updateUser(Request $request)
    {
        $validatedData = $request->validate([
            'userId' => 'required',
            'role' => 'required'
        ]);

        $app = app('firebase.database');

        $app->getReference('users/' . $validatedData['userId'])->update([
            'role' => $validatedData['role']
        ]);

        return redirect()->back()->with('success', 'User berhasil diupdate');
    }

    public function deleteUser(Request $request)
    {
        $validatedData = $request->validate([
            'userId' => 'required'
        ]);

        $firebaseAuth = new FirebaseService();
        $app = app('firebase.database');

        $app->getReference('users/' . $validatedData['userId'])->remove();

        $firebaseAuth->deleteUser($validatedData['userId']);

        return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}
