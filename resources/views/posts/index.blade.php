@extends('layouts.app')
@section('title', 'General page')
@section('content')
    <div class="container mt-3 shadow-sm p-3 mb-2 bg-white rounded">
        <form action="{{ route('posts') }}" method="post">
            @csrf
            @auth
                <div class="form-group">
                    <textarea class="form-control @error('body') border border-danger @enderror " name="body" id="body" rows="5"
                        placeholder="What is in your mind, {{ auth()->user()->name }} ?"></textarea>
                    @error('body')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" name="post" id="post" class="btn btn-primary">Post</button>
                </div>
            @endauth
            @guest
                <a href="/login" class="btn btn-primary">Login</a>
            @endguest
        </form>
    </div>

    @if ($posts->count())
        <div class="container mt-3 justify-content-center p-0">
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
            {{-- paginate --}}
            <nav aria-label="Page navigation bg-dark p-2 ">
                <ul class="pagination justify-content-end mb-3">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </ul>
            </nav>
            {{-- end pagite --}}
        </div>
    @else
        <div class="container  shadow-sm p-3 mb-1 bg-white rounded">
            <p class="lead">
                No post updated
            </p>
        </div>
    @endif

@endsection
