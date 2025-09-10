@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('content')
    <main>
        <section class="contact-header">
            <img src="{{ asset('assets/img/img-contact.png') }}" alt="Contact 1811 Store Banner">
        </section>

        <section class="contact-content">
            <div class="container">
                <div class="contact-wrapper">
                    <div class="contact-form">
                        <h3>Send Us A Message</h3>
                        <form action="#">
                            <div class="form-group">
                                <label for="email"><i class='bx bx-envelope'></i> Your Email Address</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">How Can We Help?</label>
                                <textarea id="message" name="message" rows="6" required></textarea>
                            </div>
                            <button type="submit" class="btn-submit">SUBMIT</button>
                        </form>
                    </div>

                    <div class="contact-info">
                        <div class="info-item">
                            <i class='bx bx-map'></i>
                            <div>
                                <h4>Address</h4>
                                <p>Jl. Sariasih No.54, Sarijadi, Kec. Sukasari, Kota Bandung, Jawa Barat 40151</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class='bx bx-phone'></i>
                            <div>
                                <h4>Lets Talk</h4>
                                <p>+6282213859516</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class='bx bxs-envelope'></i>
                            <div>
                                <h4>Sale Support</h4>
                                <p>1811studioproduction@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection