@extends('main.layouts.landing')

@section('main-content')
<!-- Main section -->
<main class="main">
    <form class="theme__form" action="{{ route('user.contactus.store') }}" method="post">
        @csrf
        <h4 class="theme__form--heading">Contact us</h4>
        <input type="text" name="email" class="theme__form--input" placeholder="Email">
        <input type="text" name="name" class="theme__form--input" placeholder="Name">
        <textarea name="message" style="resize:none;" class="theme__form--input" placeholder="Your message"></textarea>
        <button type="submit" class="form__block--submit">Send</button>
    </form>
</main>
@endsection