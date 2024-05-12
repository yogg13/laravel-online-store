<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function exit()
    {
        Session::forget('id_user');
        return redirect('/login');
    }
}
