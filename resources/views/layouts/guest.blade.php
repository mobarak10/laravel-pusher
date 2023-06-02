<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ Vite::icon('favicon.svg') }}" type="image/x-icon">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('template/assets/icons/favicon.svg') }}" type="image/x-icon">

        <!-- icon -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css"
              integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg=="
              crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="container min-vh-100 d-flex flex-column justify-content-center">
        <div class="row">
            <div class="col-12">
                {{ $slot }}
            </div>
        </div>
    </div>
    </body>
    @stack('guestScript')
</html>
