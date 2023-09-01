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
		
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
		
		<style>

            #social-links ul{
                padding-left: 0;
                display:flex;
                float:right;
                padding-bottom: 1.5rem;
            }
            #social-links ul li {
                display:flex;
            } 
            #social-links ul li a {
                padding: 6px;
                border-radius: 5px;
                margin: 1px;
                font-size: 25px;
                color: #8A9FBD;
            }
            #social-links ul li a:hover{
                color: #728cb0;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
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
            <main>
				@if(session()->has('notice'))
					<div class="bg-indigo-150 px-3 py-2 text-center text-white"> {{session() -> get('notice')}} </div>
				@endif
                {{ $slot }}
            </main>
        </div>
        <footer>
            <div class="bg-gray-100 font-sans antialiased">
                <div class="py-12 px-12 grid grid-cols-12 gap-4">
                    <div class="col-span-0 lg:col-span-1"></div>
                    <div class="mx-auto col-span-5 md:col-span-4 lg:col-span-2 sm:px-6  lg:px-8">
                        <p class="text-base text-indigo-600"> {{__("關於")}} </p>
                        <div class="text-sm mt-4">
                            <a href = "{{route('about')}}"> {{ __("關於我們") }} </a>
                        </div>
                        <div class="text-sm mt-2">
                            <a href = "{{route('connection')}}"> {{ __("聯絡我們") }} </a>
                        </div>
                    </div>
                    <div class="mx-auto col-span-5 md:col-span-4 lg:col-span-2 sm:px-6  lg:px-8">
                        <p class="text-base text-indigo-600"> {{__("幫助")}} </p>
                        <div class="text-sm mt-4">
                            <a href = "{{route('apply')}}"> {{ __("申請專業帳號") }} </a>
                        </div>
                        <div class="text-sm mt-2">
                            <a href = "{{route('announce')}}"> {{ __("發布注意事項") }} </a>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
    </body>
    
</html>
