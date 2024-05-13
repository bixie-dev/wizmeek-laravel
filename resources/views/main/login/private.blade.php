@extends('main.layouts.app')

@section('main-content')
<!-- Main section -->
<main class="main">
    <div class="container">

        <div class="private__wrapper">
            <div class="private__block--left">
            @if(auth()->user()->avatar)
                <div class="private__block--avatar" style="background-image: url('{{ auth()->user()->avatar }}')"></div>
            @else
                <div class="private__block--avatar" style="background-image: url('{{ asset('public/img/content/avatars/no_avatar.png') }}')"></div>
            @endif
                <a href="#" class="private__block--avatar__link">Change avatar</a>
                <p class="private__block--avatar__name">{{ auth()->user()->name }}</p>
            </div>
            <div class="private__block--main">
                <div class="private__block--main__name">Name: {{ auth()->user()->name }}</div>
                <div class="private__block--main__email">Email: {{ auth()->user()->email }}</div>
                <div class="private__block--main__buttons">
                    <button class="private__block--button__action">Change name</button>
                    <button class="private__block--button__action">Change email</button>
                    <button class="private__block--button__destroy">Delete account</button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection