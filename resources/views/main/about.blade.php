@extends('main.layouts.landing')


@section('main-content')
<div class="centered__wrapper">
    <article class="about">
        <h2 class="about__heading">{{ $text->about_heading }}</h2>
        <p class="about__text">{!! $text->about_text !!}</p>
    </article>
</div>
@endsection