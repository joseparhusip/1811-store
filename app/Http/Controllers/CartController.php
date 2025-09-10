<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Menampilkan halaman keranjang
    public function index()
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        return view('users.pages.cart', ['cartItems' => $cart, 'subtotal' => $subtotal]);
    }

    // Menambahkan item ke keranjang
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|string',
            'size' => 'required|string',
            'color' => 'required|string',
        ]);

        $cart = session()->get('cart', []);

        // Buat ID unik untuk setiap baris item berdasarkan id, size, dan color
        $rowId = md5($request->product_id . $request->size . $request->color);

        // Jika item sudah ada di keranjang, tambahkan quantity-nya
        if (isset($cart[$rowId])) {
            $cart[$rowId]['quantity']++;
        } else {
            // Jika item baru, tambahkan ke keranjang
            $cart[$rowId] = [
                "product_id" => $request->product_id,
                "name" => $request->name,
                "price" => $request->price,
                "image" => $request->image,
                "size" => $request->size,
                "color" => $request->color,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Menghapus item dari keranjang
    public function remove($rowId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$rowId])) {
            unset($cart[$rowId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
    
    // Mengupdate kuantitas item
    public function update(Request $request, $rowId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$rowId]) && $request->quantity > 0) {
            $cart[$rowId]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }
}