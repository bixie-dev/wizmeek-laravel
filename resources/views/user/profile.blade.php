@extends('main.layouts.app')

@section('main-content')
<!-- Main section -->
<main class="main">
    <div class="container">

        <div class="private__wrapper">
            <div class="private__block--left">
            @if($user->avatar)
                <div class="private__block--avatar" style="background-image: url('{{ asset('storage/app/content/user/avatars/' . $user->avatar) }}')"></div>
            @elseif($user->google_avatar)
                <div class="private__block--avatar__update--avatar__old" style="background-image: url('{{ $user->google_avatar }}')"></div>
            @else
                <div class="private__block--avatar" style="background-image: url('{{ asset('public/img/content/avatars/no_avatar.png') }}')"></div>
            @endif

            @if(auth()->user()->id == $user->id)
                <a id="avatar_popup_btn" class="private__block--avatar__link">
                    <svg class="private__block--avatar__icon" xmlns="http://www.w3.org/2000/svg" height="48" width="48" viewBox="0 0 48 48">
                        <path d="M29.45 6v3H9v30h30V18.6h3V39q0 1.2-.9 2.1-.9.9-2.1.9H9q-1.2 0-2.1-.9Q6 40.2 6 39V9q0-1.2.9-2.1Q7.8 6 9 6ZM38 6v4.05h4.05v3H38v4.05h-3v-4.05h-4.05v-3H35V6ZM12 33.9h24l-7.2-9.6-6.35 8.35-4.7-6.2ZM9 9v30V9Z"/>
                    </svg>
                </a>
            @endif

            @if(auth()->user()->id == $user->id)
                <p class="private__block--avatar__name">{{ auth()->user()->name }}</p>
            @else
                <p class="private__block--avatar__name">{{ $user->name }}</p>
            @endif
            </div>


            <!-- Avatar update pop-up -->
            <div id="avatar_popup" class="private__block--avatar__update--popUp">
                <div class="private__block--avatar__update--popUp__inner">
                    @if($user->avatar)
                        <div class="private__block--avatar__update--avatar__old" style="background-image: url('{{ asset('storage/app/content/user/avatars/' . $user->avatar) }}')"></div>
                    @elseif($user->google_avatar)
                        <div class="private__block--avatar__update--avatar__old" style="background-image: url('{{ $user->google_avatar }}')"></div>
                    @else
                        <div class="private__block--avatar__update--avatar__old" style="background-image: url('{{ asset('public/img/content/avatars/no_avatar.png') }}')"></div>
                    @endif


                    <form class="private__block--avatar__update--form" action="{{ route('user.updateAvatar', ['user' => auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form__block">
                            <!-- <label class="theme__form--label">Choose a video</label> -->
                            <input type='file' id='file' class="form__block--file__input" name='file' />
                            <div class="form__block--file__holder">
                                <span id="inputTmpLink" class="alone">Choose image</span>
                                <label for="file" class="form__block--file__label" role="button">
                                    <svg class="form__block--file__upload--icon" xmlns="http://www.w3.org/2000/svg" height="48" width="48" viewBox="0 0 48 48">
                                        <title>Attach file</title>
                                        <path d="M23 44q-4.55 0-7.775-3.125Q12 37.75 12 33.2V11.7q0-3.2 2.275-5.45T19.75 4q3.25 0 5.5 2.25t2.25 5.5v19.7q0 1.9-1.3 3.225Q24.9 36 23 36q-1.9 0-3.2-1.425-1.3-1.425-1.3-3.375V11.6h2v19.75q0 1.1.725 1.875Q21.95 34 23 34q1.05 0 1.775-.75.725-.75.725-1.8V11.7q0-2.4-1.675-4.05T19.75 6q-2.4 0-4.075 1.65Q14 9.3 14 11.7v21.6q0 3.65 2.65 6.175T23 42q3.75 0 6.375-2.55T32 33.2V11.6h2v21.55q0 4.55-3.225 7.7Q27.55 44 23 44Z"/>
                                    </svg>
                                    
                                </label> 
                                <div id="upload_video" class="form__block--file__upload">
                                    <svg class="form__block--file__upload--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                        <title>Upload file</title>
                                        <path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"/>
                                    </svg>
                                </div>
                            </div>
                       
                
                            <div class="form__block--progress__bar" id='form__block--progress__bar'>
                                <div class="form__block--progress_line" id="form__block--progress_line" style="width:0%;"></div>
                                <p class="form__block--percentage" id="form__block--percentage">50%</p>
                            </div>
                        </div>

                        <button type="submit" class="private__block--avatar__update--form__button">Change avatar</button>
                    </form>
                </div>
            </div>
            <!-- / Avatar update pop-up -->

            <div class="private__block--main">

                @if($user->description)
                    <div class="private__block--main__email">{{ $user->description }}</div>
                @endif
                
                <div class="private__block--main__joined--wrapper">
                    <svg class="private__block--main__joined--icon" id="icon-calendar" width="26" height="26" viewBox="0 0 26 28">
                        <path d="M2 26h4.5v-4.5h-4.5v4.5zM7.5 26h5v-4.5h-5v4.5zM2 20.5h4.5v-5h-4.5v5zM7.5 20.5h5v-5h-5v5zM2 14.5h4.5v-4.5h-4.5v4.5zM13.5 26h5v-4.5h-5v4.5zM7.5 14.5h5v-4.5h-5v4.5zM19.5 26h4.5v-4.5h-4.5v4.5zM13.5 20.5h5v-5h-5v5zM8 7v-4.5c0-0.266-0.234-0.5-0.5-0.5h-1c-0.266 0-0.5 0.234-0.5 0.5v4.5c0 0.266 0.234 0.5 0.5 0.5h1c0.266 0 0.5-0.234 0.5-0.5zM19.5 20.5h4.5v-5h-4.5v5zM13.5 14.5h5v-4.5h-5v4.5zM19.5 14.5h4.5v-4.5h-4.5v4.5zM20 7v-4.5c0-0.266-0.234-0.5-0.5-0.5h-1c-0.266 0-0.5 0.234-0.5 0.5v4.5c0 0.266 0.234 0.5 0.5 0.5h1c0.266 0 0.5-0.234 0.5-0.5zM26 6v20c0 1.094-0.906 2-2 2h-22c-1.094 0-2-0.906-2-2v-20c0-1.094 0.906-2 2-2h2v-1.5c0-1.375 1.125-2.5 2.5-2.5h1c1.375 0 2.5 1.125 2.5 2.5v1.5h6v-1.5c0-1.375 1.125-2.5 2.5-2.5h1c1.375 0 2.5 1.125 2.5 2.5v1.5h2c1.094 0 2 0.906 2 2z"></path>
                    </svg>
                    <p class="private__block--main__joined--text">Joined: {{ date("M Y", strtotime($user->created_at)) }}</p>
                </div>

            </div>
            <div class="private__block--right">
                <div class="private__block--right__follow--wrapper">
                    <div class="private__block--right__follow--inner">
                        <div class="private__block--right__follow--text">Followers</div>
                        @if(isset($followers))
                        <a href="{{ route('user.followers') }}" class="private__block--right__follow--counter">{{ count($followers) }}</a>
                        @else
                        <a href="{{ route('user.followers') }}" class="private__block--right__follow--counter">0</a>
                        @endif
                    </div>
                    <div class="private__block--right__follow--inner">
                        <div class="private__block--right__follow--text">Following</div>
                        @if(isset($following))
                        <a href="{{ route('user.following') }}" class="private__block--right__follow--counter">{{ count($following) }}</a>
                        @else
                        <a href="{{ route('user.following') }}" class="private__block--right__follow--counter">0</a>
                        @endif
                    </div>
                </div>

                @if(auth()->user()->id == $user->id)
                <div class="private__block--main__buttons">
                    <a href="{{ route('user.edit', ['user' => auth()->user()->id]) }}" class="private__block--button__action">Edit profile</a>
                </div>
                @else
                <div class="private__block--main__buttons">
                    <form class="" action="{{ route('user.follow', $user->id) }}" method="post">
                        @csrf
                        @if(auth()->user()->following->contains($user->id))
                        <button id="follow_nav" type="button" class="private__block--button__action">
                            Following
                            <svg id="follow_shevron" xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 512 512">
                                <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/>
                            </svg>
                        </button>
                        <button id="unfollow_btn" type="submit" class="private__block--button__action unfollow">Unfollow</button>
                        @else
                        <button type="submit" class="private__block--button__action">Follow</button>
                        @endif
                    </form>
                </div>
                @endif

            </div>
        </div>

        @if(auth()->user()->nickname == $user->nickname)
            <div class="private__channels--wrapper">
                <div class="private__channels--counter__wrapper">
                    <p class="private__channels--counter">Following channels: <span>{{ count($channels) }}</span></p>
                </div>
            
                <div class="channels__wrapper">
                    @if(count($channels) > 0)
                    @foreach($channels as $channel)
                        <div class="channels__channel--box">
                            <a href="{{ route('chan.show', $channel->slug) }}" class="channels__channel--box__poster" style="background-image: url('{{ asset('storage/app/' . $channel->poster) }}');"></a>
                            <div class="channels__channel--box__wrapper">
                                <a href="{{ route('chan.show', $channel->slug) }}" class="channels__channel--box__name">{{ $channel->name }}</a>
                                <a href="{{ route('chan.show', $channel->slug) }}" class="channels__channel--box__description--short">{{ $channel->description_short }}</a>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="private__channels--suggestions__wrapper">
                            <p class="private__channels--suggestions">Favorite suggestions? <a href="#" class="private__channels--suggestions__link">Click here</a></p>
                        </div>
                    @endif
                </div>
            
            </div>
        @endif
    </div>
</main>
@endsection