@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/product-detail.css') }}">
@endpush

@section('content')
    <section class="product-detail-section">
        <div class="container detail-container">
            
            <div class="product-image-container">
                <img src="{{ asset($product['image_detail']) }}" alt="{{ $product['name'] }}">
            </div>

            <div class="product-info-container">
                {{-- [PERUBAHAN] Bungkus semua pilihan dan tombol dalam form --}}
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    {{-- Input tersembunyi untuk mengirim data produk --}}
                    <input type="hidden" name="product_id" value="{{ $product['product_id'] }}">
                    <input type="hidden" name="name" value="{{ $product['name'] }}">
                    <input type="hidden" name="price" value="{{ $product['price'] }}">
                    <input type="hidden" name="image" value="{{ $product['image'] }}">

                    <h1>{{ $product['name'] }}</h1>
                    <p class="price">Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
                    <p class="description">{{ $product['description'] }}</p>

                    <div class="options">
                        <div class="size-option">
                            <label>Size</label>
                            {{-- Input tersembunyi untuk menyimpan ukuran yang dipilih --}}
                            <input type="hidden" name="size" id="selected-size" value="M">
                            <div class="size-buttons">
                                <button type="button" class="size-btn" data-value="S">S</button>
                                <button type="button" class="size-btn active" data-value="M">M</button>
                                <button type="button" class="size-btn" data-value="L">L</button>
                                <button type="button" class="size-btn" data-value="XL">XL</button>
                            </div>
                        </div>

                        <div class="color-option">
                            <label>Color</label>
                             {{-- Input tersembunyi untuk menyimpan warna yang dipilih --}}
                            <input type="hidden" name="color" id="selected-color" value="BLACK">
                            <div class="color-buttons">
                                <button type="button" class="color-btn active" data-value="BLACK">BLACK</button>
                                <button type="button" class="color-btn" data-value="WHITE">WHITE</button>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="add-to-cart-btn">ADD TO CART</button>
                </form>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
{{-- [PENAMBAHAN] JavaScript untuk interaksi pilihan size dan color --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk handle klik pada grup tombol
        function handleButtonClick(buttonGroupClass, hiddenInputId) {
            const buttons = document.querySelectorAll(buttonGroupClass);
            const hiddenInput = document.getElementById(hiddenInputId);

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    // Hapus kelas 'active' dari semua tombol di grup
                    buttons.forEach(btn => btn.classList.remove('active'));
                    // Tambah kelas 'active' ke tombol yang di-klik
                    this.classList.add('active');
                    // Update nilai input tersembunyi
                    hiddenInput.value = this.dataset.value;
                });
            });
        }

        // Terapkan fungsi ke pilihan ukuran (size)
        handleButtonClick('.size-btn', 'selected-size');
        // Terapkan fungsi ke pilihan warna (color)
        handleButtonClick('.color-btn', 'selected-color');
    });
</script>
@endpush