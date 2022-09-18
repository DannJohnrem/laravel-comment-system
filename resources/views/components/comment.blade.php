
@props(['comment' => $comment])

<div class="mb-4">
    <a href="{{ route('user.view.comments', $comment->user) }}" class="font-bold">{{ $comment->user->name }}</a>
    <span class="text-grey-600 text-small">{{ $comment->created_at->diffForHumans() }}</span>

    <p class="mb-2">{{ $comment->body }}</p>

    @can('delete', $comment)
        <form action="{{ route('comment.destroy', $comment) }}" method="POST" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="mr-2 text-blue-500">Delete</button>
        </form>
    @endcan

    <div class="flex item-center">
    @auth
        @if (!$comment->likedBy(auth()->user()))
            <form action="{{ route('comment.like', $comment) }}" method="POST" class="mr-1">
                @csrf
                <button type="submit" class="mr-2 text-blue-500">Like</button>
            </form>
        @else
            <form action="{{ route('comment.unlike', $comment) }}" method="POST" class="mr-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="mr-2 text-blue-500">Unlike</button>
            </form>
        @endif
    @endauth
        <span>{{ $comment->likes->count() }} {{ Str::plural('Like', $comment->likes->count()) }}</span>
    </div>
</div>
