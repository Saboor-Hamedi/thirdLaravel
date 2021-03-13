
@extends('layouts.app')
@section('title', 'General page')
@section('content')
<div class="container bg-white p-2" style="width: 400px; margin-top: 3rem">
    <div class="row">
        <div class="col-md-12 form">
            <form action="{{ route('register') }}" method="post" >
                @csrf
                <div class="form-group ">
                    <input type="text" name="name" id="name" class="form-control @error('name') border border-danger @enderror"  value="{{ old('name') }}"  placeholder="Name"  autocomplete="off">
                    @error('name')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                    
                </div>
              
                <div class="form-group ">
                    <input type="text" name="username" id="username" class="form-control @error('username') border border-danger @enderror"  value="{{ old('username') }}"  placeholder="Username"  autocomplete="off">
                    @error('username')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
                </div>
                <div class="form-group ">
                    <input type="text" name="email" id="email" class="form-control @error('email') border border-danger @enderror"  value="{{ old('email') }}"  placeholder="Your email"  autocomplete="off">
                    @error('email')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
                </div>
                <div class="form-group ">
                    <input type="password" name="password" id="password " class="form-control @error('password') border border-danger @enderror "  value=""  placeholder="Your password"  autocomplete="off">
                    @error('password')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
                </div>
                <div class="form-group ">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') border border-danger @enderror"  value=""  placeholder="Password confirmation" autocomplete="off">
                    @error('password_confirmation')
                         <p class="text-danger mt-2 ">{{ $message }}</p>
                     @enderror
                </div>
                <div class="form-group ">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary"  value="Submit" style="width: 100%">Submit</button>
                </div>
            </form>
          
        </div>
    </div>
</div>
@endsection