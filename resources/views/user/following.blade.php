@extends('main.layouts.app')

@section('main-content')
<!-- Main section -->
<main class="main">
    <div class="container">
        <section class="followers">
            <h1 class="followers__heading">My followers</h1>
            <ul class="followers__ul">
                @foreach ($data['following'] as $follower)
                    <li>
                        <a href="{{ $follower->nickname ? route('user.profile', $follower->id) : route('user.profile', $follower->id)}}">
                            @if ($follower->avatar)
                                <div class="followers__avatar" style="background-image: url('{{ $follower->avatar }}')"></div>
                            @elseif($follower->google_avatar)
                                <div class="followers__avatar" style="background-image: url('{{ $follower->google_avatar }}')"></div>
                            @else
                                <div class="followers__avatar" style="background-image: url('{{ asset('public/img/content/avatars/no_avatar.png') }}')"></div>
                            @endif
                            <div class="followers__name">{{ $follower->name }}</div>
                        </a>
                        <form class="followers__form" action="{{ route('user.follow', $follower->id) }}" method="post">
                            @csrf
                            <button id="unfollow_btn" type="submit" class="followers__form--btn">Unfollow</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</main>
@endsection