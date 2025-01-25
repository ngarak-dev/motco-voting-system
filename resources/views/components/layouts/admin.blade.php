<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    <link rel="icon" href="{{ asset('img/logo_kura.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('img/logo_kura.svg') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

     @vite(['resources/css/app.css', 'resources/js/app.js'])

     <script src="{{ asset('jquery-3.2.1.min.js') }}"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
     <link href="https://fonts.googleapis.com/css2?family=Gloock&display=swap" rel="stylesheet">

     <style>
        body {
            position: relative;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url({{ asset('img/logo_kura.svg') }}) no-repeat center center fixed;
            background-size: contain;
            filter: blur(4px);
            opacity: 0.4;
            z-index: 0;
            pointer-events: none;
        }
        .x-main {
            position: relative;
            z-index: 1;
        }
    </style>

</head>
<body class="min-h-screen antialiased bg-base-200/50 dark:bg-base-200">

    <x-main>
        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{-- <x-theme-changer/> --}}

            {{-- NavBar --}}
            <div class="flex justify-center mb-4">
                <img src="{{ asset('img/logo_kura.svg') }}" class="w-36"/>
                <x-theme-changer/>
            </div>

            <header class="sticky inset-x-0 top-0 z-50 flex flex-wrap w-full text-sm md:justify-start md:flex-nowrap">
                <nav class="relative max-w-2xl w-full border border-gray-200 shadow-md rounded-[2rem] mx-2 py-2.5 md:flex md:items-center md:justify-between md:py-0 md:px-4 md:mx-auto bg-gray-50">
                  <div class="flex items-center justify-between px-4 md:px-0">
                    <div class="flex items-center">
                      <a class="flex-none inline-block font-semibold rounded-mdfocus:outline-none focus:opacity-80" href="{{ route('admin-dashboard') }}" aria-label="Logo">
                        {{ auth()->user()->name }}
                      </a>
                    </div>
                  </div>

                  <div id="hs-navbar-header-floating" class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow md:block" aria-labelledby="hs-navbar-header-floating-collapse">
                    <div class="flex flex-col gap-2 py-2 mt-3 md:flex-row md:items-center md:justify-end md:gap-3 md:mt-0 md:py-0 md:ps-7">
                        <a class="py-0.5 md:py-3 px-4 md:px-1 border-s-2 md:border-s-0 md:border-b-2 border-transparent link-success focus:outline-none" href="{{ route('admin-dashboard') }}" aria-current="page">Nyumbani</a>
                        <a class="py-0.5 md:py-3 px-4 md:px-1 border-s-2 md:border-s-0 md:border-b-2 border-transparent link-success focus:outline-none" href="{{ route('admin-candidates') }}">Wagombea</a>
                        <a class="py-0.5 md:py-3 px-4 md:px-1 border-s-2 md:border-s-0 md:border-b-2 border-transparent link-success focus:outline-none" href="{{ route('admin-import-voters') }}">Wapiga Kura</a>
                        <x-button tooltip-right="Ondoka kwenye akaunti" class="btn-circle btn-xs hover:bg-red-400" icon-right="o-power" spinner no-wire-navigate link="/admin/logout" />
                    </div>
                  </div>
                </nav>
            </header>

            <div class="flex items-center justify-center">
                <h1 class="text-3xl font-bold text-white uppercase glowing-text ">UCHAGUZI WA SERIKALI YA WANACHUO {{ now()->year }}</h1>
            </div>

            {{-- slot --}}
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />
</body>
</html>
