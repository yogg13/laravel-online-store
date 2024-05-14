<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Session;
use App\Models\Confirmation;

class ConfirmationController extends Controller
{
    public function index()
    {
        $confirm_checkout = Checkout::select('id')->where('id_user', Session::get('id_user'))->get();
        // dd($confirm_checkout);
        return view('checkout.confirmation.index', compact('confirm_checkout'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_token' => 'required',
            'proof' => 'required',
        ]);

        Confirmation::create([
            'id_user' => Session::get('id_user'),
            'id_checkout' => $request->id_token,
            'proof' => $request->proof,
        ]);

        return redirect('/home');
    }

}
