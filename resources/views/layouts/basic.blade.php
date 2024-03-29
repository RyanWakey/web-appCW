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

    @livewireStyles
</head>

<div class="flex-auto p-4 bg-blue-400 neutral">
    <h1 class="flex-auto p-2 bg-blue-600 text-3xl font-semibold text-red-900 shadow"> Blog - @yield('title')
        @if (Route::has('login'))
            <div class="hidden absolute top-0 right-0 px-6 py-2 sm:block">
                @auth
                    @if(auth()->user()->profile != null)
                        <a href="{{ route('userprofiles.show', ['profile' => auth()->user()->profile])}}" 
                            class="text-sm font-black text-red-700 dark:text-gray-500 no-underline hover:underline">View Profile</a>
                    @else
                        <a href="{{route('userprofiles.create', ['user' => auth()->user()->profile])}}"
                            class="text-sm font-black text-red-700 dark:text-gray-500 no-underline hover:underline">View Profile</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-sm text-red-700 text-right dark:text-gray-500 no-underline hover:underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-red-800 dark:text-gray-500 no-underline hover:underline">Register</a>
                @endif
                
            @endauth
        </div>
    @endif 
    </h1>
</div>
        
<body class="antialiased bg-blue-300">  
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
            @livewireScripts   
        </div> 
</body>

</html>