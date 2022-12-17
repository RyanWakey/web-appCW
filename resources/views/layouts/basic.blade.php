<!DOCTYPE html>

<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Blog - @yield('title')</title>
     <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- CSS -->
    @vite('resources/css/app.css')
</head>

<div class="flex-auto p-4 bg-blue-500 neutral">
    <h1 class="flex-auto p-2 bg-blue-400 text-3xl font-semibold text-yellow-400 shadow"> Blog - @yield('title')
        @if (Route::has('login'))
            <div class="hidden absolute top-0 right-0 px-6 py-2 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-red-700 text-right dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-red-800 dark:text-gray-500 underline">Register</a>
                @endif
                
            @endauth
        </div>
    @endif 
    </h1>
</div>

<body class="antialiased">
    <div class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if ($errors->any())
            <div>
                Errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        @if (session('message'))
            <p><b>{{ session('message') }}</b></p>
        @endif

        <div>
            @yield('content')
        </div>
    
</body>

</html>