@extends('layouts.app')

@push('styles')
    {{-- Link ke file CSS khusus untuk halaman shop --}}
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endpush

@section('content')
    <section class="shop-section">
        <div class="container shop-container">

            <main class="shop-products">

                <div class="product-grid">
                    
                    {{-- Loop untuk menampilkan semua produk --}}
                    @foreach ($products as $product)
                        {{-- [PERBAIKAN] Ubah parameter 'id' menjadi 'product_id' --}}
                        <a href="{{ route('product.show', ['product_id' => $product['product_id']]) }}" class="product-card-link">
                            <div class="product-card">
                                <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}">
                                <h3>{{ $product['name'] }}</h3>
                                <div class="product-footer">
                                    <p>Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
                                    {{-- Ikon keranjang bisa tetap ada atau dihilangkan sesuai selera --}}
                                    <span class="cart-icon"><i class='bx bx-cart'></i></span>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
                
            </main>

        </div>
    </section>
@endsection

@push('styles')
    {{-- Tambahkan sedikit style agar link tidak memiliki garis bawah --}}
    <style>
        .product-card-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
@endpush