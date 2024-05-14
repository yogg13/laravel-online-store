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
        $checkouts = Checkout::join('product', 'checkout.id_product', '=', 'product.id')
            ->join('cart', 'product.id', '=', 'cart.id_product')
            ->select('checkout.id', 'cart.id_user', 'product.id', 'product.name_product', 'product.price', 'product.image', 'cart.quantity')
            ->get();
        // dd($checkout);
        return view('checkout.index', compact('checkouts'));
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

    public function destroy($id)
    {
        Checkout::where('id_product', $id)->delete();
        return redirect('/checkout');
    }
}
