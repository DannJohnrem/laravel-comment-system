@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 p-6 bg-white rounded-lg">

            @auth
                <form action="{{ route('comment.store') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('body') border-red-500 @enderror" placeholder="Write a comment..."></textarea>
                        @error('body')
                            <div class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="px-4 py-2 font-medium text-white bg-blue-500 rounded">Comment</button>
                    </div>
                </form>
            @endauth

            @forelse ($comments as $comment)
                <x-comment :comment="$comment" />
            @empty
                <p>You have no comment yet.</p>
            @endforelse

            {{ $comments->links('pagination::tailwind') }}

        </div>
    </div>
@endsection
