<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;

class CartController extends Controller
{

    public function index()
    {
        $carts = Cart::join('product', 'cart.id_product', '=', 'product.id')
            ->select('cart.id_user', 'product.id', 'product.name_product', 'product.price', 'product.image', 'cart.quantity')
            ->get();
        return view('cart.index', compact('carts'));
    }

    public function store(Request $request)
    {
        //nanti membuat logic untuk pengecekan tambah product ke cart jika yg ingin ditambahkan sudah ada,
        //maka update quantitynya

        $this->validate($request, [
            'id_user' => 'required',
            'id_barang' => 'required',
            'quantity' => 'required',
        ]);

        Cart::create([
            'id_user' => Session::get('id_user'),
            'id_product' => $request->id_barang,
            'quantity' => $request->jumlah,
        ]);

        return redirect('/carts');
    }

    public function destroy($id)
    {
        Cart::where('id_product', $id)->delete();
        return redirect('/carts');
    }
}
