<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name', 'Laravel')  }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gray-200">
        <nav class="flex justify-between p-6 mb-6 bg-white">
            <ul class="flex items-center">
                <li>
                    <a href="" class="p-3">Home</a>
                </li>
                <li>
                    <a href="{{ route('dashboard.index') }}" class="p-3">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('comment.index') }}" class="p-3">Comment</a>
                </li>
            </ul>
            <ul class="flex items-center">
                <li>
                    <img src="{{ asset('/assets/images/glamware_logo.png') }}" alt="Comment System Logo" width="50" height="50">
                </li>
            </ul>
            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="" class="p-3"> {{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="inline p-3">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{ route('login') }}" class="p-3">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="p-3">Register</a>
                    </li>
                @endguest
            </ul>
        </nav>

        <main class="container px-4 py-4 mx-auto">
            @yield('content')
        </main>


        <!-- Scripts -->
        @stack('scripts')

    </body>
</html>
