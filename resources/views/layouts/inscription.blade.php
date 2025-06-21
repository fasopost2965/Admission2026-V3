<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Inscription') - École La Victoire</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/inscription.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo-section">
                <div class="logo-icon">🎓</div>
                <div class="logo-text">
                    <div class="logo-title">École La Victoire</div>
                    <div class="logo-subtitle">مدرسة النصر</div>
                </div>
            </div>
            <div class="operator-info">
                <span>{{ Auth::user()->name ?? 'Opératrice' }}</span>
                <div class="operator-avatar">{{ substr(Auth::user()->name ?? 'OP', 0, 2) }}</div>
            </div>
        </div>
    </header>

    <!-- Progress Bar Component -->
    @include('components.progress-bar', ['currentStep' => $currentStep ?? 1])

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ asset('js/inscription.js') }}"></script>
    @stack('scripts')
</body>
</html> 