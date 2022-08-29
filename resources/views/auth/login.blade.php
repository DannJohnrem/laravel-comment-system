@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 p-6 bg-white rounded-lg">
            @if (session('status'))
                <div class="p-4 mb-6 text-center text-white bg-red-500 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email"
                    class="bg-grey-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}" autofocus>
                    @error('email')
                        <div class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password"
                    class="bg-grey-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
                    @error('password')
                        <div class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <div class="flex item-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full px-4 py-3 font-medium text-white bg-blue-500 rounded">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
