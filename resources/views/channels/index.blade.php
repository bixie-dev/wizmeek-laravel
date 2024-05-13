@extends('main.layouts.app')

@section('main-content')
<!-- Main section -->
<main class="main">
    <div class="container">
        <a href="{{ route('channel.create') }}" style="margin-top: 100px;">Add new cahnnel</a>
        <div class="chennel__block">
            @forelse
                <div class="">
                    <h2>{{ $cahnnel->name }}</h2>
                    <p>{{ $channel->desc_short }}</p>
                    <a href="{{ route('channel.edit') }}">Edit</a>
                    <a href="{{ route('channel.delete') }}">Delete</a>
                </div>
            @empty
                <h3>No content yet</h3>
            @endforelse
        </div>
    </div>

</main>
@endsection