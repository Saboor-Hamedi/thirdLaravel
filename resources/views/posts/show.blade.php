
@extends('layouts.app')
@section('title', 'General page')
@section('content')
    <div class="container bg-white mt-3 p-3">
        <x-post :post="$post" />
    </div>
@endsection