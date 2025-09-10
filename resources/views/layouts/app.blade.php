<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1811 STORE</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    @stack('styles')
</head>
<body>

    @include('users.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('users.partials.footer')

    {{-- Script untuk membuka & menutup menu mobile --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('menu-toggle');
            const closeMenu = document.getElementById('close-menu');
            const navbarNav = document.querySelector('.navbar-nav');

            if(menuToggle) {
                menuToggle.addEventListener('click', () => navbarNav.classList.add('active'));
            }
            if(closeMenu) {
                closeMenu.addEventListener('click', () => navbarNav.classList.remove('active'));
            }
        });
    </script>
    
    @stack('scripts') {{-- This will include scripts from other pages --}}

</body>
</html>