
@extends('layouts.app')
@section('title', 'General page')
@section('content')
    <div class="container bg-white mt-3 p-3">
       
            {{-- user  --}}
            <div class="container mt-3 justify-content-center p-0">
                <h3 class="lead">Name: {{ $user->name }}</h3>
                <h2 class="lead">Total of Posts: {{ $posts->count() }}</h2>
                <h2 class="lead">Total of Likes: {{ $user->receivedLikes->count()}}</h2>
            </div>

            {{-- end user --}}
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
                {{ $user->name }} <p>Does not have any post</p>
            </p>
        </div>
    @endif
    </div>
@endsection