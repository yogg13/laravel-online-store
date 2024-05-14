<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $validator = $request->validate([
            'email' => 'required|email|exists:user',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $validator['email'])->first();

        if ($user) {
            if ($user && Hash::check($validator['password'], $user->password)) {
                Session::put('id_user', $user->id);
                Auth::login($user);
                return redirect('/home');
            } else {
                return redirect()->back()->with('error', 'Password is invalid.');
            }
        } else {
            return redirect()->back()->with('error', 'Email is invalid.');
        }

    }
}
