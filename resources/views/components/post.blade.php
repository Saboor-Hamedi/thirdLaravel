{{-- reusable compoenet --}}
@props(['post' => $post])
<div class="posts shadow-sm p-3 mb-2 bg-white rounded">
    <a href="{{ route('users.posts', $post->user) }}">
        <h4 class="mb-2">{{ $post->user->name }}</h4>
    </a>
    <div class="mb-2">
        <small>{{ $post->created_at->diffForHumans() }}</small>
    </div>
    <div class="mb-2">
        {!! $post->body !!}
    </div>
    <div class="likes">

        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm">Unlike</button>
                </form>

            @endif
            {{-- delete post --}}
            @can('delete',$post)
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm">Delete</button>
                </form>
            @endcan
            {{-- delete post end --}}
          
        @endauth
        <span class="m-2">
            {{ Str::plural('like', $post->likes->count()) }}
        </span>
        <div>
            {{ $post->likes->count() }}
        </div>
    </div>
</div>