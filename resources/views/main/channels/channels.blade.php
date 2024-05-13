@extends('main/layouts/app')


@section('main-content')
<div class="container">
    <div class="channels__wrapper">
        @foreach($channels as $channel)
        <div class="channels__channel--box">
            <a href="{{ route('chan.show', $channel->slug) }}" class="channels__channel--box__poster" style="background-image: url('{{ asset('storage/app/' . $channel->poster) }}');"></a>
            <div class="channels__channel--box__wrapper">
                <a href="{{ route('chan.show', $channel->slug) }}" class="channels__channel--box__name">{{ $channel->name }}</a>
                <a href="{{ route('chan.show', $channel->slug) }}" class="channels__channel--box__description--short">{{ $channel->description_short }}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection