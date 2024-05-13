@extends('main.layouts.landing')


@section('main-content')

<div class="centered__wrapper--login">
    @if(session('error'))
        <p class="landing__text">{{ session('error') }}</p>
    @endif
    <form action="{{ route('reset.password.post') }}" method="post" class="theme__form--login">

    @csrf

        <input type="hidden" name="token" value="{{ $token }}">


        @error('email')
            <div class="alert__danger--static">{{ $message }}</div>
        @enderror
            
        <input type="text" name="email" class="theme__form--input" placeholder="Email" value="{{ old('email') ? old('email') : '' }}">
        

        @error('password')
            <div class="alert__danger--static">{{ $message }}</div>
        @enderror

        <input type="password" name="password" class="theme__form--input" placeholder="Password" value="{{ old('password') }}">
        
        

        @error('password_confirmation')
        <div class="alert__danger--static">{{ $message }}</div>
        @enderror

        <input type="password" name="password_confirmation" class="theme__form--input" placeholder="Password confirmation" value="{{ old('password_confirmation') }}">


        <button type="submit" name="submit" class="theme__form--button">Reset Password</button>

    </form>
</div>
@endsection

<script>
     document.addEventListener("DOMContentLoaded", function() {
        var error = @json(session('error', ''));
        if( error != '' ) {
            document.querySelector(".theme__form--login").style.display = "none";
        }
    });
</script>