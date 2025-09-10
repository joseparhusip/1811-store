@extends('layouts.app')

@push('styles')
    {{-- Memuat CSS khusus untuk halaman ini --}}
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@section('content')
    <main>
        <section class="about-header">
            <img src="{{ asset('assets/img/img-about.png') }}" alt="About 1811 Store Banner">
        </section>
    
        <section class="about-content">
            <div class="container">
                {{-- Blok "Our Story" --}}
                <div class="content-block">
                    <h2>OUR STORY</h2>
                    <div class="content-text">
                        <p>
                            We took the name 1811 from the year of birth of Raden Saleh, a great Indonesian artist. We are inspired by him because we believe that art is a way for humans to freely express their feelings.
                        </p>
                        <p>
                            Through the name 1811, we want to bring that spirit into each of our works. We believe that everyone has a story, has feelings, and has the right to express them—one way being through what they wear.
                        </p>
                        <p>
                            At 1811, we don't just make clothes; you can create designs that hold meaning, that can become part of your identity and lifestyle.
                        </p>
                        <p>
                            Because for us, Good Clothes Made From Good Hand.
                        </p>
                    </div>
                    <div class="content-image">
                        <img src="{{ asset('assets/img/products/T-Shirt From 1811-2.png') }}" alt="Our Story Image">
                    </div>
                </div>
    
                {{-- Blok "Our Mission" --}}
                <div class="content-block reverse">
                    <h2>OUR MISSION</h2>
                    <div class="content-text">
                        <p>
                            Our mission at 1811 is to bring the spirit of art into everyday life through meaningful and expressive designs.
                        </p>
                        <p><strong>We aim to:</strong></p>
                        <p>
                            Create clothing that is not only comfortable but also tells a story. Provide a space for everyone to express themselves freely. Elevate Indonesian art and culture into contemporary styles.
                        </p>
                        <p>
                            We believe that everyone is unique, and clothing can be a way to show who we truly are. That's why every 1811 product is crafted with care, attention to detail, and a message to convey.
                        </p>
                    </div>
                    <div class="content-image">
                         <img src="{{ asset('assets/img/products/T-Shirt From 1811-1.png') }}" alt="Our Mission Image">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection