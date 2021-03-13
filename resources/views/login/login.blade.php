@extends('layouts.app')
@section('title', 'General page')
@section('content')
    <div class="container bg-white p-2" style="width: 400px; margin-top: 10rem">
        <div class="row">
            <div class="col-md-12 form">
                @if (session('status'))
                    <p class="lead text-danger text-center">{{ session('status') }}</p>
                @endif
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group ">
                        <input type="text" name="email" id="email"
                            class="form-control @error('email') border border-danger @enderror" value="{{ old('email') }}"
                            placeholder="Your email" autocomplete="off">
                        @error('email')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <input type="password" name="password" id="password "
                            class="form-control @error('password') border border-danger @enderror " value=""
                            placeholder="Your password" autocomplete="off">
                        @error('password')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" name="remember"id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <div class="form-group ">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit"
                            style="width: 100%">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
