<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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