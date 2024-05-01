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

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->       
        @vite(['resources/css/app.css', 'resources/js/app.js'])        
    </head>
    <body class="font-sans antialiased bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="h-10 bg-white shadow">
                <div class="px-4 py-2">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <div class="mb-12">                       
            <main>
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 relative alert" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm0-2a6 6 0 1 0 0-12 6 6 0 0 0 0 12zM9 7a1 1 0 1 1 2 0v4a1 1 0 0 1-2 0V7zm1 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="font-bold">Gagal!</p>
                                <ul class="text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>                                        
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 relative" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M19.293 4.293a1 1 0 0 1 0 1.414l-10 10a1 1 0 0 1-1.414 0l-5-5a1 1 0 0 1 1.414-1.414L9 13.586l9.293-9.293a1 1 0 0 1 1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="font-bold">Sukses!</p>
                                <p class="text-sm text-green-600">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 relative alert" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm0-2a6 6 0 1 0 0-12 6 6 0 0 0 0 12zM9 7a1 1 0 1 1 2 0v4a1 1 0 0 1-2 0V7zm1 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="font-bold">Gagal!</p>
                                <p class="text-sm text-red-600">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                {{ $slot }}
            </main>            
        </div>

        <!-- Page Footer -->
        <footer class="fixed inset-x-0 bottom-0 bg-white shadow">
            <div class="px-4 py-2">
                Copyright &copy; 2023
            </div>
        </footer>

        <?php // <livewire:counter />  ?>
        
        @livewireScripts        
        @yield('js')
    </body>
</html>
