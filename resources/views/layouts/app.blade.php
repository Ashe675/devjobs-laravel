<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevJobs - @yield('title')</title>
    <link rel="icon" href="{{ asset('images/logo.ico') }}">

    <!-- Meta Description -->
    <meta name="description"
        content="@yield('meta_description', 'Find remote tech jobs or post developer vacancies on DevJobs — the platform connecting developers and recruiters globally.')">

    <!-- Keywords (SEO) -->
    <meta name="keywords"
        content="developer jobs, remote tech jobs, job board for developers, DevJobs, tech recruiters, coding jobs, developer career, apply for developer jobs, hire developers">

    <!-- Author -->
    <meta name="author" content="DevJobs Team">

    <!-- Robots -->
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="@yield('og_title', 'DevJobs - Developer Jobs Platform')">
    <meta property="og:description"
        content="@yield('meta_description', 'Find remote tech jobs or post developer vacancies on DevJobs — the platform connecting developers and recruiters globally.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'DevJobs - Developer Jobs Platform')">
    <meta name="twitter:description"
        content="@yield('meta_description', 'Find remote tech jobs or post developer vacancies on DevJobs — the platform connecting developers and recruiters globally.')">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
    @stack('styles')
</head>

<body class="font-sans antialiased">
    <div class="min-h-dvh bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="px-2 sm:px-0">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
    @stack('scripts')
    <script type="module">
        const isSuccess = @json(session()->has('success'));
        if (isSuccess) {
            alertUtils.success({
                title: "Success",
                text: "{{ session('success') }}",
            });
        }
        const isError = @json(session()->has('error'));
        if (isError) {
            alertUtils.error({
                title: "Error",
                text: "{{ session('error') }}",
            });
        }

        window.addEventListener('show-success-alert', (event) => {
            const message = event.detail.message || 'Operation completed successfully.';
            alertUtils.success({
                title: 'Success',
                text: message
            });
        });

        window.addEventListener('show-error-alert', (event) => {
            const message = event.detail.message || 'Ups, an error occurred.';
            alertUtils.error({ title: 'Error', text: message });
        });

    </script>
</body>

</html>