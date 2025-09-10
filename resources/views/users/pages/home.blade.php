@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <section class="hero-section">
        {{-- Bagian ini tidak berubah --}}
        <div class="container hero-container">
            <div class="hero-image">
                <img src="{{ asset('assets/img/img-shirt-black.png') }}" alt="Model mengenakan kaos hitam">
            </div>
            <div class="hero-content">
                <p>Men Collection from 1811</p>
                <h1>NEW ARRIVALS</h1>
                <div class="hero-buttons">
                    <a href="{{ route('shop') }}" class="btn btn-primary">SHOP NOW</a>
                    <a href="#" class="btn btn-secondary">Design Your T-Shirt</a>
                </div>
            </div>
        </div>
    </section>

    <section class="category-section">
        {{-- Bagian ini tidak berubah --}}
        <div class="container category-container">
            <div class="category-card">
                <img src="{{ asset('assets/img/img-women-style-1811.png') }}" alt="Kaos wanita">
            </div>
            <div class="category-card">
                 <img src="{{ asset('assets/img/img-men-style-1811.png') }}" alt="Kaos pria">
            </div>
        </div>
    </section>

    <section class="product-overview-section">
        <div class="container">
            <div class="product-header">
                <div class="product-header-title">
                    <h2>PRODUCT OVERVIEW</h2>
                    <div class="product-nav">
                        <a href="#" class="active">All Products</a>
                        <a href="#">Women</a>
                        <a href="#">Men</a>
                    </div>
                </div>
                <a href="#" class="btn btn-secondary">Design Your T-Shirt</a>
            </div>

            {{-- [PERBAIKAN] Mengganti product grid statis dengan loop dinamis --}}
            <div class="product-grid">
                @foreach ($products as $product)
                    <a href="{{ route('product.show', ['product_id' => $product['product_id']]) }}" class="product-card-link">
                        <div class="product-card">
                            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}">
                            <h3>{{ $product['name'] }}</h3>
                            <div class="product-footer">
                                <p>Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
                                <span class="cart-icon"><i class='bx bx-cart'></i></span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="load-more-container">
                <a href="{{ route('shop') }}" class="btn btn-load-more">LOAD MORE</a>
            </div>
        </div>
    </section>
@endsection

{{-- Menambahkan style untuk link produk agar sama seperti di halaman shop --}}
@push('styles')
    <style>
        .product-card-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
@endpush