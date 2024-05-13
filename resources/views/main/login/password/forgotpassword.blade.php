@extends('main.layouts.landing')


@section('main-content')


</div>
<div class="centered__wrapper--login">
    @if(session('message'))
        <p class="landing__text">{{ session('message') }}</p>
    @endif
    <form action="{{ route('forget.password.post') }}" method="post" class="theme__form--login">

    @csrf

        @error('email')
            <div class="alert__danger--static">{{ $message }}</div>
        @enderror
            
        <input type="text" name="email" class="theme__form--input" placeholder="Email" value="{{ old('email') ? old('email') : '' }}">
        

        <button type="submit" name="submit" class="theme__form--button">Send Reset Link</button>

    </form>
</div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var message = @json(session('message', ''));
        if( message != '' ) {
            document.querySelector(".theme__form--login").style.display = "none";
        }
    });
</script>