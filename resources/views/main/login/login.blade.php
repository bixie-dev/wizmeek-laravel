@extends('main.layouts.landing')


@section('main-content')

<div class="centered__wrapper--login">
    <form action="{{ route('user.login') }}" method="post" class="theme__form--login">

    @csrf

        @error('email')
            <div class="alert__danger--static">{{ $message }}</div>
        @enderror
            
        <input type="text" name="email" class="theme__form--input" placeholder="Email" value="{{ old('email') ? old('email') : '' }}">
        

        @error('password')
            <div class="alert__danger--static">{{ $message }}</div>
        @enderror

        <input type="password" name="password" class="theme__form--input" placeholder="Password" value="{{ old('password') }}">
        
        <div class="remember__me" style="display: flex; align-items: center; justify-content:space-between;">
            <div>
                <input type="checkbox" name="remember" id="remember" value="1">
                <label for="remember">Remeber me</label>
            </div>
            <a class="btn btn-link landing__text" href="{{ route('password.request') }}" style="text-decoration: none; font-size:14px;">
                Forgot Your Password?
            </a>
        </div>

        <button type="submit" name="submit" class="theme__form--button">Login</button>

        <!-- <div class="theme__form--hr"></div>
        <div class="theme__form--additional__text">or</div>

        <a href="{{ route('google-auth') }}" class="google__button">
            <svg class="google__button--icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">
                <title>google</title>
                <path d="M12 12.281h11.328c0.109 0.609 0.187 1.203 0.187 2 0 6.844-4.594 11.719-11.516 11.719-6.641 0-12-5.359-12-12s5.359-12 12-12c3.234 0 5.953 1.188 8.047 3.141l-3.266 3.141c-0.891-0.859-2.453-1.859-4.781-1.859-4.094 0-7.438 3.391-7.438 7.578s3.344 7.578 7.438 7.578c4.75 0 6.531-3.406 6.813-5.172h-6.813v-4.125z"></path>
            </svg>
            Continue with Google
        </a> -->
    </form>
</div>
@endsection