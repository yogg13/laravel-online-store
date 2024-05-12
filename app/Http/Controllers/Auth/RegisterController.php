<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_user' => 'required|string',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name_user' => $request->name_user,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/login');
    }
}
