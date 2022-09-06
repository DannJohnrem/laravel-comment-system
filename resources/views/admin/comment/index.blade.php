@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 p-6 bg-white rounded-lg">
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

            @forelse ($comments as $comment)
                <div class="mb-4">
                    <a href="" class="font-bold">{{ $comment->user->name }}</a>
                    <span class="text-grey-600 text-small">{{ $comment->created_at->diffForHumans() }}</span>

                    <p class="mb-2">{{ $comment->body }}</p>

                    @if ( $comment->ownedBy(auth()->user()))
                        <div>
                            <form action="{{ route('comment.destroy', $comment) }}" method="POST" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500 mr-2">Delete</button>
                            </form>
                        </div>
                    @endif

                    <div class="flex item-center">
                    @auth
                        @if (!$comment->likedBy(auth()->user()))
                            <form action="{{ route('comment.like', $comment) }}" method="POST" class="mr-1">
                                @csrf
                                <button type="submit" class="text-blue-500 mr-2">Like</button>
                            </form>
                        @else
                            <form action="{{ route('comment.unlike', $comment) }}" method="POST" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500 mr-2">Unlike</button>
                            </form>
                        @endif
                    @endauth
                        <span>{{ $comment->likes->count() }} {{ Str::plural('Like', $comment->likes->count()) }}</span>

                    </div>
                </div>
            @empty
                <p>You have no comment yet.</p>
            @endforelse

            {{ $comments->links('pagination::tailwind') }}

        </div>
    </div>
@endsection
