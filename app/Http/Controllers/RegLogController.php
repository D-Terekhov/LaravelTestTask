<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegLogController extends Controller
{
    public function create() {
        return view('register');
    }

    public function register(Request $request) {
        $request ->validate([
            'name' => 'required|string|between:2,100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:10|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::attempt(['email' => $request->email, 'password' => $request->password], true);
        return redirect( '/');
    }

    public function update() {
        return view('login');
    }

    public function login(Request $request) {
        $request -> validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
        ]);

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password], false)) {
            return back()->withInput($request ->only('email'))->withErrors([
                'email' => 'Invalid data.',
            ]);
        }
        return redirect(route('home'));

    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home'));
    }
}
