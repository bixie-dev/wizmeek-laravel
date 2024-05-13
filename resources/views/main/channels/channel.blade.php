@extends('main.layouts.app')

@section('main-content')
<!-- Main section -->
<main class="main">
    
    <div class="container">
        <!-- Channel description -->
        <section class="channel">
            <div href="#" class="channel__logo" style="background-image: url('{{ asset('storage/app/' . $channel->logo) }}');"></div>
            <article class="channel__info">
                <h2 class="channel__name">{{ $channel->name }}</h2>
                <p class="channel__description">{{ $channel->description_short }}</p>
            </article>
        </section>
        <!-- End Channel description -->
    </div>

    

    <div class="container">
        <!-- Video section with chat -->
        <section class="video">
            <!-- Player wrapper -->
            <div class="video__player--wrapper">
                <!-- 5cents.com Player -->
                <div class="video__player--wrapper__player">
                    <video id="my-video" class="video-js vjs-default-skin vjs-big-play-centered" playsinline autoplay controls>
                        <p class="vjs-no-js"> To view this video please enable JavaScript, and consider upgrading to a web browser that<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                    </video> 
                </div>

                <!-- Under video social buttons -->
                <div class="belowVideo__social--block">

                    <!-- Watching now widget -->
                    <div class="belowVideo__social--widget">
                        <div class="belowVideo__social--live">
                            <span></span>
                            <p>LIVE</p>
                        </div>
                        <svg class="belowVideo__social--share__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                            <path d="M26 15c-1.484-2.297-3.516-4.266-5.953-5.516 0.625 1.062 0.953 2.281 0.953 3.516 0 3.859-3.141 7-7 7s-7-3.141-7-7c0-1.234 0.328-2.453 0.953-3.516-2.438 1.25-4.469 3.219-5.953 5.516 2.672 4.125 6.984 7 12 7s9.328-2.875 12-7zM14.75 9c0-0.406-0.344-0.75-0.75-0.75-2.609 0-4.75 2.141-4.75 4.75 0 0.406 0.344 0.75 0.75 0.75s0.75-0.344 0.75-0.75c0-1.781 1.469-3.25 3.25-3.25 0.406 0 0.75-0.344 0.75-0.75zM28 15c0 0.391-0.125 0.75-0.313 1.078-2.875 4.734-8.141 7.922-13.687 7.922s-10.813-3.203-13.687-7.922c-0.187-0.328-0.313-0.688-0.313-1.078s0.125-0.75 0.313-1.078c2.875-4.719 8.141-7.922 13.687-7.922s10.813 3.203 13.687 7.922c0.187 0.328 0.313 0.688 0.313 1.078z"></path>
                        </svg>
                        <p class="belowVideo__social--watching__text">{{ $online_users }}</p>
                    </div>
                    <!-- / Watching now widget -->

                    <!-- Request repeat form -->
                    <div id="request_repeat" class="belowVideo__social--widget request__repeat">
                        <svg class="belowVideo__social--share__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                            <path d="M4 10h20v6l8-8-8-8v6h-24v12h4zM28 22h-20v-6l-8 8 8 8v-6h24v-12h-4z"></path>
                        </svg>
                        <p class="belowVideo__social--repeat__text">Request repeat</p>
                        <div id="request_repeat_form_wrapper" class="request__repeat--form__wrapper">
                            
                            @if(Auth::check())
                            <form action="{{ route('chan.repeatrequest.store') }}" id="request_repeat_form" class="request__repeat--form" method="POST">
                                
                                <p>Coming soon...</p>
                            </form>
                            @else
                            <p>To request a repeat you have to register or login first.</p>
                            @endif
                        </div>
                    </div>
                    <!-- / Request repeat form -->

                    <!-- Share button -->
                    <div class="belowVideo__social--widget">
                        <svg class="belowVideo__social--share__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28">
                            <path d="M22 15.453v4.047c0 2.484-2.016 4.5-4.5 4.5h-13c-2.484 0-4.5-2.016-4.5-4.5v-13c0-2.484 2.016-4.5 4.5-4.5h3.984c0.266 0 0.5 0.219 0.5 0.5 0 0.25-0.172 0.453-0.406 0.5-0.781 0.266-1.484 0.578-2.078 0.938-0.078 0.031-0.156 0.063-0.25 0.063h-1.75c-1.375 0-2.5 1.125-2.5 2.5v13c0 1.375 1.125 2.5 2.5 2.5h13c1.375 0 2.5-1.125 2.5-2.5v-3.344c0-0.187 0.109-0.359 0.281-0.453 0.313-0.141 0.594-0.344 0.844-0.578 0.141-0.141 0.359-0.203 0.547-0.125s0.328 0.25 0.328 0.453zM25.703 7.703l-6 6c-0.187 0.203-0.438 0.297-0.703 0.297-0.125 0-0.266-0.031-0.391-0.078-0.359-0.156-0.609-0.516-0.609-0.922v-3h-2.5c-3.437 0-5.625 0.656-6.844 2.047-1.266 1.453-1.641 3.797-1.156 7.391 0.031 0.219-0.109 0.438-0.313 0.531-0.063 0.016-0.125 0.031-0.187 0.031-0.156 0-0.313-0.078-0.406-0.203-0.109-0.156-2.594-3.672-2.594-6.797 0-4.188 1.313-9 11.5-9h2.5v-3c0-0.406 0.25-0.766 0.609-0.922 0.125-0.047 0.266-0.078 0.391-0.078 0.266 0 0.516 0.109 0.703 0.297l6 6c0.391 0.391 0.391 1.016 0 1.406z"></path>
                        </svg>
                        <p class="belowVideo__social--share__text">Share</p>
                    </div>
                    <!-- / Share button -->

                    <!-- Favorite form -->
                    <form id="favoritesButton" action="{{ route('ch.favorites.store', $channel->id) }}" method="post">
                        @csrf
                        <input name="channelId" id="channelId" type="hidden" value="{{ $channel->id }}">
                        @auth
                        @if(auth()->user()->favoriteChannels->contains($channel->id))
                        <button type="button" name="submit" class="belowVideo__social--like {{ $has_likes ? 'active' : '' }}" id="submit">
                            
                            <svg id="heartFilled" class="belowVideo__social--share__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512">
                                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                            </svg>
                            <svg id="heartEmpty" class="belowVideo__social--share__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512">
                                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                            </svg>

                            <p class="belowVideo__social--favorite__text">{{ $has_likes }}</p>
                        </button>
                        <!-- Ajax for the form -->
                        <script>
                            $(document).ready(function() {
                                $('#heartEmpty').hide();
                                $('#submit').on('click', function(event){
                                    console.log('click')
                                    event.preventDefault();

                                    let channelId = $('#channelId').val();

                                    $.ajax({
                                        url: $('#favoritesButton').attr('action'),
                                        type:"POST",
                                        dataType: "html",
                                        data:{
                                            "_token": "{{ csrf_token() }}"
                                        },
                                        success:function(){
                                            $('#heartEmpty').toggle();
                                            $('#heartFilled').toggle();
                                            $('#submit').toggleClass('active');
                                        },
                                        error:function(){
                                        }
                                    });
                                });
                            });
                            
                        </script>
                        <!-- / Ajax for the form -->
                        @else
                        <button type="button" name="submit" class="belowVideo__social--like" id="submit">
                            
                            <svg id="heartFilled" class="belowVideo__social--share__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512">
                                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                            </svg>
                            <svg id="heartEmpty" class="belowVideo__social--share__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512">
                                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                            </svg>
                            
                            <p class="belowVideo__social--favorite__text">{{ $has_likes }}</p>
                        </button>
                        <!-- Ajax for the form -->
                        <script>
                            $(document).ready(function() {
                                $('#heartFilled').hide();
                                $('#submit').on('click', function(event){
                                    event.preventDefault();

                                    let channelId = $('#channelId').val();

                                    $.ajax({
                                        url: $('#favoritesButton').attr('action'),
                                        type:"POST",
                                        dataType: "html",
                                        data:{
                                            "_token": "{{ csrf_token() }}"
                                        },
                                        success:function(){
                                            $('#heartEmpty').toggle();
                                            $('#heartFilled').toggle();
                                            $('#submit').toggleClass('active');
                                        },
                                        error:function(){
                                        }
                                    });
                                });
                            });
                            
                        </script>
                        <!-- / Ajax for the form -->
                        @endif
                        @endauth
                    </form>
                    <!-- / Favorite form -->
                </div>
                <!-- / Under video social buttons -->
            </div>
            <!-- / Player wrapper -->

            <div class="video__chat--box">
                <!-- Chat header -->
                <div class="video__chat--box__header">
                    <div class="video__chat--box__heading">Live Chat</div>

                    <!-- Chat close button -->
                    <svg class="video__chat--box__close" version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="28" viewBox="0 0 18 28">
                        <title>angle-double-down</title>
                        <path d="M16.797 13.5c0 0.125-0.063 0.266-0.156 0.359l-7.281 7.281c-0.094 0.094-0.234 0.156-0.359 0.156s-0.266-0.063-0.359-0.156l-7.281-7.281c-0.094-0.094-0.156-0.234-0.156-0.359s0.063-0.266 0.156-0.359l0.781-0.781c0.094-0.094 0.219-0.156 0.359-0.156 0.125 0 0.266 0.063 0.359 0.156l6.141 6.141 6.141-6.141c0.094-0.094 0.234-0.156 0.359-0.156s0.266 0.063 0.359 0.156l0.781 0.781c0.094 0.094 0.156 0.234 0.156 0.359zM16.797 7.5c0 0.125-0.063 0.266-0.156 0.359l-7.281 7.281c-0.094 0.094-0.234 0.156-0.359 0.156s-0.266-0.063-0.359-0.156l-7.281-7.281c-0.094-0.094-0.156-0.234-0.156-0.359s0.063-0.266 0.156-0.359l0.781-0.781c0.094-0.094 0.219-0.156 0.359-0.156 0.125 0 0.266 0.063 0.359 0.156l6.141 6.141 6.141-6.141c0.094-0.094 0.234-0.156 0.359-0.156s0.266 0.063 0.359 0.156l0.781 0.781c0.094 0.094 0.156 0.234 0.156 0.359z"></path>
                    </svg>
                    <!-- / Chat close button -->
                </div>
                <!-- /Chat header -->
                <!-- Chat message box -->
                <div class="video__chat--message__area" id="message_area" authId-data="{{ auth()->user()->id }}"></div>
                <!-- /Chat message box -->

                <!-- Message sending box -->

                <div class="video__chat--send__message--emoji__picker--wrapper"  id="emoji-picker-content">
                    <div class="video__chat--send__message--emoji__picker--close" id="emoji-picker-content-close">X</div>
                    <div class="video__chat--send__message--emoji__picker">
                        @include('parts/emojis')
                    </div>
                </div>
                
                <form   id="newMessage" 
                        action="{{ route('ch.chat.store', $channel->id) }}" 
                        method="post" 
                        class="video__chat--send__message--wrapper" 
                        data-emojiarea
                        data-type="image"
                        data-global-picker="false">
                    @csrf
                    <div id="emoji-picker" class="video__chat--send__message--emoji__button emoji emoji-smile emoji-button">
                        <svg class="video__chat--send__message--emoji__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                            <title>happy</title>
                            <path d="M16 32c8.837 0 16-7.163 16-16s-7.163-16-16-16-16 7.163-16 16 7.163 16 16 16zM16 3c7.18 0 13 5.82 13 13s-5.82 13-13 13-13-5.82-13-13 5.82-13 13-13zM16 18.711c3.623 0 7.070-0.963 10-2.654-0.455 5.576-4.785 9.942-10 9.942s-9.544-4.371-10-9.947c2.93 1.691 6.377 2.658 10 2.658zM8 11c0-1.657 0.895-3 2-3s2 1.343 2 3c0 1.657-0.895 3-2 3s-2-1.343-2-3zM20 11c0-1.657 0.895-3 2-3s2 1.343 2 3c0 1.657-0.895 3-2 3s-2-1.343-2-3z"></path>
                        </svg>
                    </div>
                    <input  name="message" 
                            class="video__chat--send__message--input" 
                            type="text"
                            id="emoji-input">
                    <button id="sendMessage" class="video__chat--send__message--button" type="submit">
                        <svg class="video__chat--send__message--send__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                            <title>paper-plane</title>
                            <path d="M27.563 0.172c0.328 0.234 0.484 0.609 0.422 1l-4 24c-0.047 0.297-0.234 0.547-0.5 0.703-0.141 0.078-0.313 0.125-0.484 0.125-0.125 0-0.25-0.031-0.375-0.078l-7.078-2.891-3.781 4.609c-0.187 0.234-0.469 0.359-0.766 0.359-0.109 0-0.234-0.016-0.344-0.063-0.391-0.141-0.656-0.516-0.656-0.938v-5.453l13.5-16.547-16.703 14.453-6.172-2.531c-0.359-0.141-0.594-0.469-0.625-0.859-0.016-0.375 0.172-0.734 0.5-0.922l26-15c0.156-0.094 0.328-0.141 0.5-0.141 0.203 0 0.406 0.063 0.562 0.172z"></path>
                        </svg>
                    </button>
                </form>
                <!-- /Message sending box -->
            </div>
        </section>
        <!-- End Video Section with chat -->
    </div>

    <div class="container">
    <section class="belowVideo">

            
            
        
    </section>
    </div>
    <div class="container">
        <section class="belowVideo">

            <div class="belowVideo__wrapper">

            <article class="belowVideo__info">
                <h2 class="belowVideo__heading">{{ $channel->name }}</h2>
                <p class="belowVideo__text">{{ $channel->description_full }}</p>
            </article>

            

            <div class="belowVideo__related">
                <h3 class="belowVideo__related--heading">Related channels</h3>
                @foreach($related_channels as $related_channel)
                    <div class="belowVideo__related--channel">
                        <a href="{{ route('chan.show', $related_channel->slug) }}">
                            <div class="belowVideo__related--channel__img" style="background-image: url('{{ asset('storage/app/' . $related_channel->logo) }}');"></div>
                        </a>
                        <div class="belowVideo__related--channel__info">
                            <a href="{{ route('chan.show', $related_channel->slug) }}" class="belowVideo__related--channel__description">{{ $related_channel->name }}</a>
                            <a href="{{ route('chan.show', $related_channel->slug) }}" class="belowVideo__related--channel__heading">{{ $related_channel->description_short }}</a>
                            <div class="belowVideo__related--channel__stats">
                                <div class="belowVideo__social--widget">
                                    <div class="belowVideo__social--live">
                                        <span></span>
                                        <p>LIVE</p>
                                    </div>
                                    <svg class="belowVideo__social--share__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                                        <path d="M26 15c-1.484-2.297-3.516-4.266-5.953-5.516 0.625 1.062 0.953 2.281 0.953 3.516 0 3.859-3.141 7-7 7s-7-3.141-7-7c0-1.234 0.328-2.453 0.953-3.516-2.438 1.25-4.469 3.219-5.953 5.516 2.672 4.125 6.984 7 12 7s9.328-2.875 12-7zM14.75 9c0-0.406-0.344-0.75-0.75-0.75-2.609 0-4.75 2.141-4.75 4.75 0 0.406 0.344 0.75 0.75 0.75s0.75-0.344 0.75-0.75c0-1.781 1.469-3.25 3.25-3.25 0.406 0 0.75-0.344 0.75-0.75zM28 15c0 0.391-0.125 0.75-0.313 1.078-2.875 4.734-8.141 7.922-13.687 7.922s-10.813-3.203-13.687-7.922c-0.187-0.328-0.313-0.688-0.313-1.078s0.125-0.75 0.313-1.078c2.875-4.719 8.141-7.922 13.687-7.922s10.813 3.203 13.687 7.922c0.187 0.328 0.313 0.688 0.313 1.078z"></path>
                                    </svg>
                                    <p class="belowVideo__social--watching__text">{{ count(App\Models\OnlineUser::where([['channel_id', '=', $related_channel->id], ['time', '>', (time() - 3600)]])->get()) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
            </div>
        </section>
    </div>

    
</main>

<!-- Ajax for chat -->
<script>
    $(document).ready(function(){

let start = 0
let autoScroll = true;
let authUserId = $('#message_area').attr('authid-data')

$('#sendMessage').click(function(e) { // capture submit
    e.preventDefault();
    sendMessage()
})

setInterval(loadMessages,3000);

function loadMessages(){
    $.ajax({
        url: "{{ route('ch.chat.messages', $channel->id) }}?start=" + start,
        cache: true,
        success: function(data){
            console.log(data);
            data.forEach(item => {
                $('#message_area').append(renderMessage(item))
                var authId = $('#message_area').attr('authid-data')
                var userId = $('.video__chat--message__wrapper').attr('userid-data')
                start = item.id;
            })
            if(autoScroll){
                $('#message_area').animate({scrollTop: $('#message_area')[0].scrollHeight})
            }

            let scrollPos = 0
            $('#message_area').scroll(function(){
                let st = $(this).scrollTop();
                if(st > scrollPos){
                    let a = $('#message_area')[0].scrollHeight
                    let b = $('#message_area').scrollTop() + $('#message_area').innerHeight() + 20
                    if(a <= b){autoScroll = true}
                } else {
                    autoScroll = false;
                }
            })
        }
    })
}
function renderMessage(item){
    return `<div class="video__chat--message__wrapper " userid-data="${item.user_id}">
                <a href="/user/${item.user_id}" class="video__chat--message__avatar" style="background-image: url('${item.avatar}');"></a>
                <div class="video__chat--message__message--wrapper">
                    <div class="video__chat--message__date">${item.date}</div>
                    <div class="video__chat--message">
                        <a href="/user/${item.user_id}" class="video__chat--message__name">${item.user_id == authUserId ? 'Me:' : item.user_name + ':'}</a>
                        <p class="video__chat--message__text">${item.message}</p>
                    </div>
                </div>
            </div>`
}
function sendMessage(){
    
    var form = document.getElementById('newMessage')
    var fd = new FormData(form); // XXX: Neex AJAX2
    console.log(fd)

    $.ajax({
        // url: $(this).attr('action'),
        url: "{{ route('ch.chat.store', $channel->id) }}",
        type:"POST",
        dataType: "html",
        data:{
            "_token": "{{ csrf_token() }}"
        },
        type: 'post',
        processData: false,
        contentType: false,
        data: fd,
        success: function(){
            document.getElementById('newMessage').reset();
        }
    })
    
}
});
</script>
<!-- / Ajax for chat -->
@endsection

