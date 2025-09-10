@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endpush

@section('content')
<section class="cart-section">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cartItems) > 0)
            <div class="cart-container">
                <div class="cart-items">
                    <div class="cart-header">
                        <div class="header-product">PRODUCT</div>
                        <div class="header-size">SIZE</div>
                        <div class="header-quantity">QUANTITY</div>
                        <div class="header-total">TOTAL</div>
                        <div class="header-remove"></div>
                    </div>

                    @foreach($cartItems as $rowId => $item)
                    <div class="cart-item">
                        <div class="item-product">
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
                            <div class="product-details">
                                <p class="product-name">{{ $item['name'] }}</p>
                                <p class="product-price">Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="item-size">{{ $item['size'] }}</div>
                        <div class="item-quantity">
                            <form action="{{ route('cart.update', $rowId) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" onchange="this.form.submit()">
                            </form>
                        </div>
                        <div class="item-total">Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</div>
                        <div class="item-remove">
                            <a href="{{ route('cart.remove', $rowId) }}" class="remove-btn">
                                <i class='bx bx-trash'></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="cart-summary">
                    <h3>CART TOTAL</h3>
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total</span>
                        <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <button class="checkout-btn">CHECKOUT</button>
                </div>
            </div>
        @else
            <div class="cart-empty">
                <h2>Keranjang belanja Anda kosong.</h2>
                <a href="{{ route('shop') }}" class="btn-primary">Mulai Belanja</a>
            </div>
        @endif
    </div>
</section>
@endsection