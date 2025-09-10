<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // [PERBAIKAN] Data produk disamakan dengan halaman home, total 6 produk
    private $products = [
        [
            'product_id' => 1,
            'name' => 'T-Shirt From 1811',
            'price' => 180000,
            'image' => 'assets/img/products/T-Shirt From 1811-3.png',
            'image_detail' => 'assets/img/products/T-Shirt From 1811-detail.png',
            'description' => 'T-shirt 1811 yang memiliki bahan baju yang lembut dan nyaman untuk dipakai kemana saja'
        ],
        [
            'product_id' => 2,
            'name' => 'T-Shirt Most of My Friends Are Cats',
            'price' => 130000,
            'image' => 'assets/img/products/T-Shirt Most of My Friends.png',
            'image_detail' => 'assets/img/products/T-Shirt Most of My Friends.png',
            'description' => 'Kaos lucu untuk para pecinta kucing dengan bahan katun premium.'
        ],
        [
            'product_id' => 3,
            'name' => 'T-Shirt Tell Your Cat I Said Pspsps',
            'price' => 200000,
            'image' => 'assets/img/products/T-Shirt Tell Your Cat.png',
            'image_detail' => 'assets/img/products/T-Shirt Tell Your Cat.png',
            'description' => 'Sampaikan salammu pada kucing temanmu dengan kaos ini.'
        ],
        [
            'product_id' => 4,
            'name' => 'T-Shirt Coffee Saves Lives',
            'price' => 180000,
            'image' => 'assets/img/products/T-Shirt Coffee Saves Lives.png',
            'image_detail' => 'assets/img/products/T-Shirt Coffee Saves Lives.png',
            'description' => 'Untuk para pejuang kafein, kaos ini wajib kamu miliki.'
        ],
        [ // [PENAMBAHAN] Produk ke-5
            'product_id' => 5,
            'name' => 'T-Shirt Goplay Outside',
            'price' => 150000,
            'image' => 'assets/img/products/T-Shirt Goplay Outside.png',
            'image_detail' => 'assets/img/products/T-Shirt Goplay Outside.png',
            'description' => 'Sebuah ajakan untuk lebih sering bermain di luar ruangan.'
        ],
        [ // [PENAMBAHAN] Produk ke-6
            'product_id' => 6,
            'name' => 'T-Shirt good code',
            'price' => 200000,
            'image' => 'assets/img/products/T-Shirt good code.png',
            'image_detail' => 'assets/img/products/T-Shirt good code.png',
            'description' => 'Kaos wajib untuk para programmer handal.'
        ],
    ];

    /**
     * [PENAMBAHAN] Method baru untuk menampilkan data produk di Halaman Home.
     */
    public function home()
    {
        // Mengirim semua 6 produk ke halaman home
        return view('users.pages.home', ['products' => $this->products]);
    }

    /**
     * Menampilkan semua produk ke halaman shop.
     */
    public function index()
    {
        return view('users.pages.shop', ['products' => $this->products]);
    }

    /**
     * Menampilkan detail satu produk.
     */
    public function show($product_id)
    {
        $product = null;
        foreach ($this->products as $p) {
            if ($p['product_id'] == $product_id) {
                $product = $p;
                break;
            }
        }

        if (!$product) {
            abort(404);
        }
        
        return view('users.pages.product-detail', ['product' => $product]);
    }
}