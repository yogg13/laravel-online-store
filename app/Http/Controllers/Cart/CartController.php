<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class CartController extends Controller
{

    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request)
    {
        Cart::create([
            'id_user' => Session::get('id_user'),
            'id_product' => $request->id_barang,
            'quantity' => $request->jumlah,
        ]);

        return redirect('/carts');
    }
}
