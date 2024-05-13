@extends('main.layouts.landing')


@section('main-content')
<div class="centered__wrapper">
    <article class="about">
        <h2 class="about__heading">{{ $response_data['text']->ads_heading }}</h2>
        <p class="about__text">{!! $response_data['text']->ads_text !!}</p>
    </article>
</div>
@endsection