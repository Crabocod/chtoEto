<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('users')->first();
        return view('main', ['name' => $user->name, 'email' => $user->email]);
    }

    public function signUp(Request $r)
    {
        $validator = $r->validate([
            'userName' => 'required|string|unique:App\Models\User,name',
            'userEmail' => 'required|email:rfc|unique:App\Models\User,email',
            'password1' => 'required|string',
            'password2' => 'required|string'
        ]);

        if ($r->password1 === $r->password2) {
            User::create([
                'name' => $r->userName,
                'email' => $r->userEmail,
                'password' => Hash::make($r->password1),
            ]);
            return response()->json(['result' => 'success'], 200);
        }
        return response()->json(['result' => 'error', 'message' => 'Different passwords'], 400);
    }

    public function login(Request $r)
    {
        $validator = $r->validate([
            'userName' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt(['name' => $r->userName, 'password' => $r->password], true))
            return response()->json(['result' => 'success'], 200);

        return response()->json(['result' => 'error', 'message' => 'Incorrect credentials'], 400);
    }

    public function signOut(Request $r)
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
