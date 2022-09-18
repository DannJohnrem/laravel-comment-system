@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2x1 font-medium mb-1">{{ $user->name }}</h1>
                <p><span class="font-bold">Created: </span> {{ $comments->count() }} {{ Str::plural('comment', $comments->count()) }} and received {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }}</p>
            </div>
            <div class="p-6 bg-white rounded-lg">
                @forelse ($comments as $comment)
                    <x-comment :comment="$comment" />
                @empty
                    <p>You have no comment yet.</p>
                @endforelse

                {{ $comments->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection
