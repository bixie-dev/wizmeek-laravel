@extends('main.layouts.landing')

@section('main-content')
<!-- Main section -->
<div class="centered__wrapper">
    <article class="about">
        <h2 class="about__heading">{{ $text->terms_and_conditions_heading }}</h2>
        <p class="about__text">{!! $text->terms_and_conditions_text !!}</p>
    </article>
</div>
@endsection