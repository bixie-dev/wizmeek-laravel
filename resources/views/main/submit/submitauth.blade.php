@extends('main.layouts.landing')

@section('main-content')
<!-- Main section -->
<main class="main">
    <div class="container">
        <div class="submit__info--wrapper">
            <h2 class="channel__name">{{ $text->submit_heading }}</h2>
        </div>
        <div class="submit__info--wrapper">
            <p class="info__text--neutral">{{ $text->submit_text }}</p>
        </div>
        <div class="submit__info--wrapper">
            <p class="info__text--note">{{ $text->submit_text_red }}</p>
        </div>

        
        
        <form class="theme__form" action="{{ route('user.submit.eacreq') }}" method="post">
        <h4 class="theme__form--heading">Request an Early Access Code</h4>
            @csrf
            <div class="alert__danger">Some</div>
            <input type="text" name="email" class="theme__form--input" placeholder="Enter your email" vlaue="{{ old('email') }}">

            <div class="alert__danger"></div>
            <input type="text" name="name" class="theme__form--input" placeholder="Enter your name" vlaue="{{ old('name') }}">
            <button class="form__block--submit" type="submit">Submit</button>
        </form>

    </div>
</main>
@endsection