<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }

    public function store(Request $request)
    {
        $data_json = json_decode($request['data_checkout']);

        foreach ($data_json as $data) {
            $price = (int) $data->price * (int) $data->quantity;
            Checkout::create([
                'id_user' => Session::get('id_user'),
                'id_product' => $data->id,
                'amount' => $price,
            ]);
        }

        return redirect('/checkout');
    }
}
