<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('public/wizmeek-06.png') }}" type="image/x-icon">
    <title>Wizmeek</title>
    <!-- <link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet">
    <link href="https://unpkg.com/@videojs/themes@1/dist/sea/index.css" rel="stylesheet"> -->

    <!-- Plyr.io player styles CDN -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.3/plyr.css" />

    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ asset('public/css/font-awesome.css')}}">


    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">

    @if(Route::is('chan.show'))
    <link href="https://player.5centscdn.com/videojs/7.7.6/video-js.min.css" rel="stylesheet" />
    <style type="text/css"> 
        html, body { 
            margin : 0; 
            padding : 0; 
            background - color : #000;
        } 
        .video-js.vjs-hls-quality-selector { 
            display : block 
        } 
        .vjs-menu-button-popup .vjs-menu .vjs-menu-content { 
            max-height: 20em;
        } 
        @media screen and ( orientation: portrait ) {
            .video-js { 
                width : 100vw; 
                height : 40vh;
            } 
        } 
        @media screen and ( orientation: landscape) { 
            .video-js{
                width: 100vw;
                height: 100vh;
            } 
        } 
    </style>
    <script src="https://player.5centscdn.com/videojs/ie8/1.1.2/videojs-ie8.min.js"></script>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->
</head>
<body>



<header class="header">
    <!-- Nav bar -->
    <div class="nav__bar">
        <nav class="nav__bar--nav">
            <ul class="nav__bar--ul">

            <!-- Sidebar "Profile" link -->
                <li class="nav__bar--li">
                    <svg class="nav__bar--link__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28">
                        <title>home</title>
                        <path d="M22 15.5v7.5c0 0.547-0.453 1-1 1h-6v-6h-4v6h-6c-0.547 0-1-0.453-1-1v-7.5c0-0.031 0.016-0.063 0.016-0.094l8.984-7.406 8.984 7.406c0.016 0.031 0.016 0.063 0.016 0.094zM25.484 14.422l-0.969 1.156c-0.078 0.094-0.203 0.156-0.328 0.172h-0.047c-0.125 0-0.234-0.031-0.328-0.109l-10.813-9.016-10.813 9.016c-0.109 0.078-0.234 0.125-0.375 0.109-0.125-0.016-0.25-0.078-0.328-0.172l-0.969-1.156c-0.172-0.203-0.141-0.531 0.063-0.703l11.234-9.359c0.656-0.547 1.719-0.547 2.375 0l3.813 3.187v-3.047c0-0.281 0.219-0.5 0.5-0.5h3c0.281 0 0.5 0.219 0.5 0.5v6.375l3.422 2.844c0.203 0.172 0.234 0.5 0.063 0.703z"></path>
                    </svg>
                    <a href="{{ route('chan.show', 'ham') }}" class="nav__bar--link">Home</a>
                </li>
                <li class="nav__bar--li">
                    <svg class="nav__bar--link__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V384c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1V320 192 174.9l14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z"/>
                    </svg>
                    <a href="{{ route('chan.index') }}" class="nav__bar--link">Channels</a>
                </li>
            @if(Auth::check())
                @if(auth()->user()->role == 'admin' || auth()->user()->role == 'copywrighter')
                <li class="nav__bar--li">
                    <svg class="nav__bar--link__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
                    </svg>
                    <a href="{{ route('admin.panel') }}" class="nav__bar--link">Admin panel</a>
                </li>
                @endif
                <li class="nav__bar--li__dropdown" style="margin-bottom: 15px;">
                    <svg class="nav__bar--link__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <title>video_library</title>
                        <path d="M12 14.484l6-4.5-6-4.5v9zM20.016 2.016q0.797 0 1.383 0.586t0.586 1.383v12q0 0.797-0.586 1.406t-1.383 0.609h-12q-0.797 0-1.406-0.609t-0.609-1.406v-12q0-0.797 0.609-1.383t1.406-0.586h12zM3.984 6v14.016h14.016v1.969h-14.016q-0.797 0-1.383-0.586t-0.586-1.383v-14.016h1.969z"></path>
                    </svg>
                    <div class="nav__bar--link">Content</div>                    
                </li>
                <div class="nav__bar--additional__wrapper">
                    <div class="nav__bar--additional__wrapper--link">
                        <svg class="nav__bar--link__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                            <title>clipboard</title>
                            <path d="M12 26h14v-10h-6.5c-0.828 0-1.5-0.672-1.5-1.5v-6.5h-6v18zM16 3.5v-1c0-0.266-0.234-0.5-0.5-0.5h-11c-0.266 0-0.5 0.234-0.5 0.5v1c0 0.266 0.234 0.5 0.5 0.5h11c0.266 0 0.5-0.234 0.5-0.5zM20 14h4.672l-4.672-4.672v4.672zM28 16v10.5c0 0.828-0.672 1.5-1.5 1.5h-15c-0.828 0-1.5-0.672-1.5-1.5v-2.5h-8.5c-0.828 0-1.5-0.672-1.5-1.5v-21c0-0.828 0.672-1.5 1.5-1.5h17c0.828 0 1.5 0.672 1.5 1.5v5.125c0.203 0.125 0.391 0.266 0.562 0.437l6.375 6.375c0.594 0.594 1.062 1.734 1.062 2.562z"></path>
                            </svg>
                        <a href="{{ route('terms') }}" class="nav__bar--link__small">Terms of Use</a>
                    </div>
                    <div class="nav__bar--additional__wrapper--link">
                        <svg class="nav__bar--link__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                            <title>clipboard</title>
                            <path d="M12 26h14v-10h-6.5c-0.828 0-1.5-0.672-1.5-1.5v-6.5h-6v18zM16 3.5v-1c0-0.266-0.234-0.5-0.5-0.5h-11c-0.266 0-0.5 0.234-0.5 0.5v1c0 0.266 0.234 0.5 0.5 0.5h11c0.266 0 0.5-0.234 0.5-0.5zM20 14h4.672l-4.672-4.672v4.672zM28 16v10.5c0 0.828-0.672 1.5-1.5 1.5h-15c-0.828 0-1.5-0.672-1.5-1.5v-2.5h-8.5c-0.828 0-1.5-0.672-1.5-1.5v-21c0-0.828 0.672-1.5 1.5-1.5h17c0.828 0 1.5 0.672 1.5 1.5v5.125c0.203 0.125 0.391 0.266 0.562 0.437l6.375 6.375c0.594 0.594 1.062 1.734 1.062 2.562z"></path>
                            </svg>
                        <a href="{{ route('privacy-policy') }}" class="nav__bar--link__small">Privacy Policy</a>
                    </div>
                </div>
            @endif
            <!-- / Sidebar "Profile" link -->

            <!-- Sidebar "About Us" link -->
                <li class="nav__bar--li">
                    <svg class="nav__bar--link__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">
                        <title>info-circle</title>
                        <path d="M16 21.5v-2.5c0-0.281-0.219-0.5-0.5-0.5h-1.5v-8c0-0.281-0.219-0.5-0.5-0.5h-5c-0.281 0-0.5 0.219-0.5 0.5v2.5c0 0.281 0.219 0.5 0.5 0.5h1.5v5h-1.5c-0.281 0-0.5 0.219-0.5 0.5v2.5c0 0.281 0.219 0.5 0.5 0.5h7c0.281 0 0.5-0.219 0.5-0.5zM14 7.5v-2.5c0-0.281-0.219-0.5-0.5-0.5h-3c-0.281 0-0.5 0.219-0.5 0.5v2.5c0 0.281 0.219 0.5 0.5 0.5h3c0.281 0 0.5-0.219 0.5-0.5zM24 14c0 6.625-5.375 12-12 12s-12-5.375-12-12 5.375-12 12-12 12 5.375 12 12z"></path>
                    </svg>
                    <a href="{{ route('about') }}" class="nav__bar--link">About us</a>
                </li>
            <!-- / Sidebar "About Us" link -->
<!-- 
                <li class="nav__bar--li">
                    <svg class="nav__bar--link__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <title>video_library</title>
                        <path d="M12 14.484l6-4.5-6-4.5v9zM20.016 2.016q0.797 0 1.383 0.586t0.586 1.383v12q0 0.797-0.586 1.406t-1.383 0.609h-12q-0.797 0-1.406-0.609t-0.609-1.406v-12q0-0.797 0.609-1.383t1.406-0.586h12zM3.984 6v14.016h14.016v1.969h-14.016q-0.797 0-1.383-0.586t-0.586-1.383v-14.016h1.969z"></path>
                    </svg>
                    <a href="#" class="nav__bar--link">Library</a>
                </li>
                <li class="nav__bar--li">
                    <svg class="nav__bar--link__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                        <title>bullhorn</title>
                        <path d="M32 13.414c0-6.279-1.837-11.373-4.109-11.413 0.009-0 0.018-0.001 0.027-0.001h-2.592c0 0-6.088 4.573-14.851 6.367-0.268 1.415-0.438 3.102-0.438 5.047s0.171 3.631 0.438 5.047c8.763 1.794 14.851 6.367 14.851 6.367h2.592c-0.009 0-0.018-0.001-0.027-0.001 2.272-0.040 4.109-5.134 4.109-11.413zM27.026 23.102c-0.293 0-0.61-0.304-0.773-0.486-0.395-0.439-0.775-1.124-1.1-1.979-0.727-1.913-1.127-4.478-1.127-7.223s0.4-5.309 1.127-7.223c0.325-0.855 0.705-1.54 1.1-1.979 0.163-0.182 0.48-0.486 0.773-0.486s0.61 0.304 0.773 0.486c0.395 0.439 0.775 1.124 1.1 1.979 0.727 1.913 1.127 4.479 1.127 7.223s-0.4 5.309-1.127 7.223c-0.325 0.855-0.705 1.54-1.1 1.979-0.163 0.181-0.48 0.486-0.773 0.486zM7.869 13.414c0-1.623 0.119-3.201 0.345-4.659-1.48 0.205-2.779 0.323-4.386 0.323-2.096 0-2.096 0-2.096 0l-1.733 2.959v2.755l1.733 2.959c0 0 0 0 2.096 0 1.606 0 2.905 0.118 4.386 0.323-0.226-1.458-0.345-3.036-0.345-4.659zM11.505 20.068l-4-0.766 2.558 10.048c0.132 0.52 0.648 0.782 1.146 0.583l3.705-1.483c0.498-0.199 0.698-0.749 0.444-1.221l-3.853-7.161zM27.026 17.148c-0.113 0-0.235-0.117-0.298-0.187-0.152-0.169-0.299-0.433-0.424-0.763-0.28-0.738-0.434-1.726-0.434-2.784s0.154-2.046 0.434-2.784c0.125-0.33 0.272-0.593 0.424-0.763 0.063-0.070 0.185-0.187 0.298-0.187s0.235 0.117 0.298 0.187c0.152 0.169 0.299 0.433 0.424 0.763 0.28 0.737 0.434 1.726 0.434 2.784s-0.154 2.046-0.434 2.784c-0.125 0.33-0.272 0.593-0.424 0.763-0.063 0.070-0.185 0.187-0.298 0.187z"></path>
                    </svg>
                    <a href="#" class="nav__bar--link">Subscriptions</a>
                </li>
                 -->

            <!-- Sidebar "Login/Signup" links -->
            @if(!Auth::check())
                <li class="nav__bar--li">
                    <svg class="nav__bar--link__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="30" height="28" viewBox="0 0 30 28">
                        <title>cogs</title>
                        <path d="M14 14c0-2.203-1.797-4-4-4s-4 1.797-4 4 1.797 4 4 4 4-1.797 4-4zM26 22c0-1.094-0.906-2-2-2s-2 0.906-2 2c0 1.109 0.906 2 2 2 1.109 0 2-0.906 2-2zM26 6c0-1.094-0.906-2-2-2s-2 0.906-2 2c0 1.109 0.906 2 2 2 1.109 0 2-0.906 2-2zM20 12.578v2.891c0 0.203-0.156 0.438-0.359 0.469l-2.422 0.375c-0.125 0.406-0.297 0.797-0.5 1.188 0.438 0.625 0.906 1.203 1.406 1.797 0.063 0.094 0.109 0.187 0.109 0.313 0 0.109-0.031 0.219-0.109 0.297-0.313 0.422-2.063 2.328-2.516 2.328-0.125 0-0.234-0.047-0.328-0.109l-1.797-1.406c-0.391 0.203-0.781 0.359-1.203 0.484-0.078 0.797-0.156 1.656-0.359 2.422-0.063 0.219-0.25 0.375-0.469 0.375h-2.906c-0.219 0-0.438-0.172-0.469-0.391l-0.359-2.391c-0.406-0.125-0.797-0.297-1.172-0.484l-1.844 1.391c-0.078 0.078-0.203 0.109-0.313 0.109-0.125 0-0.234-0.047-0.328-0.125-0.406-0.375-2.25-2.047-2.25-2.5 0-0.109 0.047-0.203 0.109-0.297 0.453-0.594 0.922-1.172 1.375-1.781-0.219-0.422-0.406-0.844-0.547-1.281l-2.375-0.375c-0.219-0.031-0.375-0.234-0.375-0.453v-2.891c0-0.203 0.156-0.438 0.359-0.469l2.422-0.375c0.125-0.406 0.297-0.797 0.5-1.188-0.438-0.625-0.906-1.203-1.406-1.797-0.063-0.094-0.109-0.203-0.109-0.313s0.031-0.219 0.109-0.313c0.313-0.422 2.063-2.312 2.516-2.312 0.125 0 0.234 0.047 0.328 0.109l1.797 1.406c0.391-0.203 0.781-0.359 1.203-0.5 0.078-0.781 0.156-1.641 0.359-2.406 0.063-0.219 0.25-0.375 0.469-0.375h2.906c0.219 0 0.438 0.172 0.469 0.391l0.359 2.391c0.406 0.125 0.797 0.297 1.172 0.484l1.844-1.391c0.094-0.078 0.203-0.109 0.313-0.109 0.125 0 0.234 0.047 0.328 0.125 0.406 0.375 2.25 2.063 2.25 2.5 0 0.109-0.047 0.203-0.109 0.297-0.453 0.609-0.922 1.172-1.359 1.781 0.203 0.422 0.391 0.844 0.531 1.281l2.375 0.359c0.219 0.047 0.375 0.25 0.375 0.469zM30 20.906v2.188c0 0.234-2.016 0.453-2.328 0.484-0.125 0.297-0.281 0.562-0.469 0.812 0.141 0.313 0.797 1.875 0.797 2.156 0 0.047-0.016 0.078-0.063 0.109-0.187 0.109-1.859 1.109-1.937 1.109-0.203 0-1.375-1.563-1.531-1.797-0.156 0.016-0.313 0.031-0.469 0.031s-0.313-0.016-0.469-0.031c-0.156 0.234-1.328 1.797-1.531 1.797-0.078 0-1.75-1-1.937-1.109-0.047-0.031-0.063-0.078-0.063-0.109 0-0.266 0.656-1.844 0.797-2.156-0.187-0.25-0.344-0.516-0.469-0.812-0.313-0.031-2.328-0.25-2.328-0.484v-2.188c0-0.234 2.016-0.453 2.328-0.484 0.125-0.281 0.281-0.562 0.469-0.812-0.141-0.313-0.797-1.891-0.797-2.156 0-0.031 0.016-0.078 0.063-0.109 0.187-0.094 1.859-1.094 1.937-1.094 0.203 0 1.375 1.547 1.531 1.781 0.156-0.016 0.313-0.031 0.469-0.031s0.313 0.016 0.469 0.031c0.438-0.609 0.906-1.219 1.437-1.75l0.094-0.031c0.078 0 1.75 0.984 1.937 1.094 0.047 0.031 0.063 0.078 0.063 0.109 0 0.281-0.656 1.844-0.797 2.156 0.187 0.25 0.344 0.531 0.469 0.812 0.313 0.031 2.328 0.25 2.328 0.484zM30 4.906v2.187c0 0.234-2.016 0.453-2.328 0.484-0.125 0.297-0.281 0.562-0.469 0.812 0.141 0.313 0.797 1.875 0.797 2.156 0 0.047-0.016 0.078-0.063 0.109-0.187 0.109-1.859 1.109-1.937 1.109-0.203 0-1.375-1.563-1.531-1.797-0.156 0.016-0.313 0.031-0.469 0.031s-0.313-0.016-0.469-0.031c-0.156 0.234-1.328 1.797-1.531 1.797-0.078 0-1.75-1-1.937-1.109-0.047-0.031-0.063-0.078-0.063-0.109 0-0.266 0.656-1.844 0.797-2.156-0.187-0.25-0.344-0.516-0.469-0.812-0.313-0.031-2.328-0.25-2.328-0.484v-2.188c0-0.234 2.016-0.453 2.328-0.484 0.125-0.281 0.281-0.562 0.469-0.812-0.141-0.313-0.797-1.891-0.797-2.156 0-0.031 0.016-0.078 0.063-0.109 0.187-0.094 1.859-1.094 1.937-1.094 0.203 0 1.375 1.547 1.531 1.781 0.156-0.016 0.313-0.031 0.469-0.031s0.313 0.016 0.469 0.031c0.438-0.609 0.906-1.219 1.437-1.75l0.094-0.031c0.078 0 1.75 0.984 1.937 1.094 0.047 0.031 0.063 0.078 0.063 0.109 0 0.281-0.656 1.844-0.797 2.156 0.187 0.25 0.344 0.531 0.469 0.812 0.313 0.031 2.328 0.25 2.328 0.484z"></path>
                    </svg>
                    <a href="/login" class="nav__bar--link">Login</a>
                </li>
                <li class="nav__bar--li">
                    <svg class="nav__bar--link__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="30" height="28" viewBox="0 0 30 28">
                        <title>cogs</title>
                        <path d="M14 14c0-2.203-1.797-4-4-4s-4 1.797-4 4 1.797 4 4 4 4-1.797 4-4zM26 22c0-1.094-0.906-2-2-2s-2 0.906-2 2c0 1.109 0.906 2 2 2 1.109 0 2-0.906 2-2zM26 6c0-1.094-0.906-2-2-2s-2 0.906-2 2c0 1.109 0.906 2 2 2 1.109 0 2-0.906 2-2zM20 12.578v2.891c0 0.203-0.156 0.438-0.359 0.469l-2.422 0.375c-0.125 0.406-0.297 0.797-0.5 1.188 0.438 0.625 0.906 1.203 1.406 1.797 0.063 0.094 0.109 0.187 0.109 0.313 0 0.109-0.031 0.219-0.109 0.297-0.313 0.422-2.063 2.328-2.516 2.328-0.125 0-0.234-0.047-0.328-0.109l-1.797-1.406c-0.391 0.203-0.781 0.359-1.203 0.484-0.078 0.797-0.156 1.656-0.359 2.422-0.063 0.219-0.25 0.375-0.469 0.375h-2.906c-0.219 0-0.438-0.172-0.469-0.391l-0.359-2.391c-0.406-0.125-0.797-0.297-1.172-0.484l-1.844 1.391c-0.078 0.078-0.203 0.109-0.313 0.109-0.125 0-0.234-0.047-0.328-0.125-0.406-0.375-2.25-2.047-2.25-2.5 0-0.109 0.047-0.203 0.109-0.297 0.453-0.594 0.922-1.172 1.375-1.781-0.219-0.422-0.406-0.844-0.547-1.281l-2.375-0.375c-0.219-0.031-0.375-0.234-0.375-0.453v-2.891c0-0.203 0.156-0.438 0.359-0.469l2.422-0.375c0.125-0.406 0.297-0.797 0.5-1.188-0.438-0.625-0.906-1.203-1.406-1.797-0.063-0.094-0.109-0.203-0.109-0.313s0.031-0.219 0.109-0.313c0.313-0.422 2.063-2.312 2.516-2.312 0.125 0 0.234 0.047 0.328 0.109l1.797 1.406c0.391-0.203 0.781-0.359 1.203-0.5 0.078-0.781 0.156-1.641 0.359-2.406 0.063-0.219 0.25-0.375 0.469-0.375h2.906c0.219 0 0.438 0.172 0.469 0.391l0.359 2.391c0.406 0.125 0.797 0.297 1.172 0.484l1.844-1.391c0.094-0.078 0.203-0.109 0.313-0.109 0.125 0 0.234 0.047 0.328 0.125 0.406 0.375 2.25 2.063 2.25 2.5 0 0.109-0.047 0.203-0.109 0.297-0.453 0.609-0.922 1.172-1.359 1.781 0.203 0.422 0.391 0.844 0.531 1.281l2.375 0.359c0.219 0.047 0.375 0.25 0.375 0.469zM30 20.906v2.188c0 0.234-2.016 0.453-2.328 0.484-0.125 0.297-0.281 0.562-0.469 0.812 0.141 0.313 0.797 1.875 0.797 2.156 0 0.047-0.016 0.078-0.063 0.109-0.187 0.109-1.859 1.109-1.937 1.109-0.203 0-1.375-1.563-1.531-1.797-0.156 0.016-0.313 0.031-0.469 0.031s-0.313-0.016-0.469-0.031c-0.156 0.234-1.328 1.797-1.531 1.797-0.078 0-1.75-1-1.937-1.109-0.047-0.031-0.063-0.078-0.063-0.109 0-0.266 0.656-1.844 0.797-2.156-0.187-0.25-0.344-0.516-0.469-0.812-0.313-0.031-2.328-0.25-2.328-0.484v-2.188c0-0.234 2.016-0.453 2.328-0.484 0.125-0.281 0.281-0.562 0.469-0.812-0.141-0.313-0.797-1.891-0.797-2.156 0-0.031 0.016-0.078 0.063-0.109 0.187-0.094 1.859-1.094 1.937-1.094 0.203 0 1.375 1.547 1.531 1.781 0.156-0.016 0.313-0.031 0.469-0.031s0.313 0.016 0.469 0.031c0.438-0.609 0.906-1.219 1.437-1.75l0.094-0.031c0.078 0 1.75 0.984 1.937 1.094 0.047 0.031 0.063 0.078 0.063 0.109 0 0.281-0.656 1.844-0.797 2.156 0.187 0.25 0.344 0.531 0.469 0.812 0.313 0.031 2.328 0.25 2.328 0.484zM30 4.906v2.187c0 0.234-2.016 0.453-2.328 0.484-0.125 0.297-0.281 0.562-0.469 0.812 0.141 0.313 0.797 1.875 0.797 2.156 0 0.047-0.016 0.078-0.063 0.109-0.187 0.109-1.859 1.109-1.937 1.109-0.203 0-1.375-1.563-1.531-1.797-0.156 0.016-0.313 0.031-0.469 0.031s-0.313-0.016-0.469-0.031c-0.156 0.234-1.328 1.797-1.531 1.797-0.078 0-1.75-1-1.937-1.109-0.047-0.031-0.063-0.078-0.063-0.109 0-0.266 0.656-1.844 0.797-2.156-0.187-0.25-0.344-0.516-0.469-0.812-0.313-0.031-2.328-0.25-2.328-0.484v-2.188c0-0.234 2.016-0.453 2.328-0.484 0.125-0.281 0.281-0.562 0.469-0.812-0.141-0.313-0.797-1.891-0.797-2.156 0-0.031 0.016-0.078 0.063-0.109 0.187-0.094 1.859-1.094 1.937-1.094 0.203 0 1.375 1.547 1.531 1.781 0.156-0.016 0.313-0.031 0.469-0.031s0.313 0.016 0.469 0.031c0.438-0.609 0.906-1.219 1.437-1.75l0.094-0.031c0.078 0 1.75 0.984 1.937 1.094 0.047 0.031 0.063 0.078 0.063 0.109 0 0.281-0.656 1.844-0.797 2.156 0.187 0.25 0.344 0.531 0.469 0.812 0.313 0.031 2.328 0.25 2.328 0.484z"></path>
                    </svg>
                    <a href="/signup" class="nav__bar--link">Signup</a>
                </li>
            @endif
            <!-- / Sidebar "Login/Signup" links -->
                <li class="nav__bar--li"><a href="#" class="nav__bar--link"></a></li>
                
            <!-- Sidebar "Logout" link -->  
            @if(Auth::check())  
                <li class="nav__bar--li">
                    <svg class="nav__bar--link__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="28" viewBox="0 0 25 28">
                        <title>sign-out</title>
                        <path d="M10 22.5c0 0.438 0.203 1.5-0.5 1.5h-5c-2.484 0-4.5-2.016-4.5-4.5v-11c0-2.484 2.016-4.5 4.5-4.5h5c0.266 0 0.5 0.234 0.5 0.5 0 0.438 0.203 1.5-0.5 1.5h-5c-1.375 0-2.5 1.125-2.5 2.5v11c0 1.375 1.125 2.5 2.5 2.5h4.5c0.391 0 1-0.078 1 0.5zM24.5 14c0 0.266-0.109 0.516-0.297 0.703l-8.5 8.5c-0.187 0.187-0.438 0.297-0.703 0.297-0.547 0-1-0.453-1-1v-4.5h-7c-0.547 0-1-0.453-1-1v-6c0-0.547 0.453-1 1-1h7v-4.5c0-0.547 0.453-1 1-1 0.266 0 0.516 0.109 0.703 0.297l8.5 8.5c0.187 0.187 0.297 0.438 0.297 0.703z"></path>
                    </svg>
                    <a href="/logout" class="nav__bar--link">Logout</a>
                </li>
            @endif
            <!-- / Sidebar "Login/Signup" links -->
            
            </ul>
        </nav>
    </div>
    <!-- /Nav bar -->
    <div class="header__burger--holder">
        <div class="header__burger"></div>
    </div>
    <a href="{{ route('chan.show', 'ham') }}" class="header__logo" style="background-image: url('{{ asset('public/img/content/wizmeek_logo.png') }}')"></a>
    <a href="{{ route('chan.show', 'ham') }}" class="header__logo--test">Beta</a>
    
    @if(Auth::check())
    <div class="header__user">
        @if(auth()->user()->avatar)
            <div class="header__user--avatar" style="background-image: url('{{ asset('storage/app/content/user/avatars/' . auth()->user()->avatar) }}')"></div>
        @elseif(auth()->user()->google_avatar)
            <div class="header__user--avatar" style="background-image: url('{{ auth()->user()->google_avatar }}')"></div>
        @else
            <div class="header__user--avatar" style="background-image: url('{{ asset('public/img/content/avatars/no_avatar.png') }}')"></div>
        @endif
        <div class="header__user--name">{{ auth()->user()->name }}</div>

        <!-- Profile dropdown -->
        <div class="header__user--dropdown">
            <nav class="header__user--dropdown__nav">
                <ul class="header__user--dropdown__ul">
                    <li class="header__user--dropdown__li">
                        <svg class="header__user--dropdown--icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="28" viewBox="0 0 20 28">
                            <title>user</title>
                            <path d="M20 21.859c0 2.281-1.5 4.141-3.328 4.141h-13.344c-1.828 0-3.328-1.859-3.328-4.141 0-4.109 1.016-8.859 5.109-8.859 1.266 1.234 2.984 2 4.891 2s3.625-0.766 4.891-2c4.094 0 5.109 4.75 5.109 8.859zM16 8c0 3.313-2.688 6-6 6s-6-2.688-6-6 2.688-6 6-6 6 2.688 6 6z"></path>
                        </svg>
                        @if (auth()->user()->nickname)
                            <a href="{{ route('user.profile', ['user' => auth()->user()->nickname]) }}" class="header__user--dropdown--link">Profile</a>
                        @else
                            <a href="{{ route('user.profile', ['user' => auth()->user()->id]) }}" class="header__user--dropdown--link">Profile</a>
                        @endif
                        
                    </li>

                    <!-- Sidebar "Settings" link -->
                    @if(Auth::check())
                    <li class="header__user--dropdown__li">
                        <svg class="header__user--dropdown--icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="30" height="28" viewBox="0 0 30 28">
                            <title>cogs</title>
                            <path d="M14 14c0-2.203-1.797-4-4-4s-4 1.797-4 4 1.797 4 4 4 4-1.797 4-4zM26 22c0-1.094-0.906-2-2-2s-2 0.906-2 2c0 1.109 0.906 2 2 2 1.109 0 2-0.906 2-2zM26 6c0-1.094-0.906-2-2-2s-2 0.906-2 2c0 1.109 0.906 2 2 2 1.109 0 2-0.906 2-2zM20 12.578v2.891c0 0.203-0.156 0.438-0.359 0.469l-2.422 0.375c-0.125 0.406-0.297 0.797-0.5 1.188 0.438 0.625 0.906 1.203 1.406 1.797 0.063 0.094 0.109 0.187 0.109 0.313 0 0.109-0.031 0.219-0.109 0.297-0.313 0.422-2.063 2.328-2.516 2.328-0.125 0-0.234-0.047-0.328-0.109l-1.797-1.406c-0.391 0.203-0.781 0.359-1.203 0.484-0.078 0.797-0.156 1.656-0.359 2.422-0.063 0.219-0.25 0.375-0.469 0.375h-2.906c-0.219 0-0.438-0.172-0.469-0.391l-0.359-2.391c-0.406-0.125-0.797-0.297-1.172-0.484l-1.844 1.391c-0.078 0.078-0.203 0.109-0.313 0.109-0.125 0-0.234-0.047-0.328-0.125-0.406-0.375-2.25-2.047-2.25-2.5 0-0.109 0.047-0.203 0.109-0.297 0.453-0.594 0.922-1.172 1.375-1.781-0.219-0.422-0.406-0.844-0.547-1.281l-2.375-0.375c-0.219-0.031-0.375-0.234-0.375-0.453v-2.891c0-0.203 0.156-0.438 0.359-0.469l2.422-0.375c0.125-0.406 0.297-0.797 0.5-1.188-0.438-0.625-0.906-1.203-1.406-1.797-0.063-0.094-0.109-0.203-0.109-0.313s0.031-0.219 0.109-0.313c0.313-0.422 2.063-2.312 2.516-2.312 0.125 0 0.234 0.047 0.328 0.109l1.797 1.406c0.391-0.203 0.781-0.359 1.203-0.5 0.078-0.781 0.156-1.641 0.359-2.406 0.063-0.219 0.25-0.375 0.469-0.375h2.906c0.219 0 0.438 0.172 0.469 0.391l0.359 2.391c0.406 0.125 0.797 0.297 1.172 0.484l1.844-1.391c0.094-0.078 0.203-0.109 0.313-0.109 0.125 0 0.234 0.047 0.328 0.125 0.406 0.375 2.25 2.063 2.25 2.5 0 0.109-0.047 0.203-0.109 0.297-0.453 0.609-0.922 1.172-1.359 1.781 0.203 0.422 0.391 0.844 0.531 1.281l2.375 0.359c0.219 0.047 0.375 0.25 0.375 0.469zM30 20.906v2.188c0 0.234-2.016 0.453-2.328 0.484-0.125 0.297-0.281 0.562-0.469 0.812 0.141 0.313 0.797 1.875 0.797 2.156 0 0.047-0.016 0.078-0.063 0.109-0.187 0.109-1.859 1.109-1.937 1.109-0.203 0-1.375-1.563-1.531-1.797-0.156 0.016-0.313 0.031-0.469 0.031s-0.313-0.016-0.469-0.031c-0.156 0.234-1.328 1.797-1.531 1.797-0.078 0-1.75-1-1.937-1.109-0.047-0.031-0.063-0.078-0.063-0.109 0-0.266 0.656-1.844 0.797-2.156-0.187-0.25-0.344-0.516-0.469-0.812-0.313-0.031-2.328-0.25-2.328-0.484v-2.188c0-0.234 2.016-0.453 2.328-0.484 0.125-0.281 0.281-0.562 0.469-0.812-0.141-0.313-0.797-1.891-0.797-2.156 0-0.031 0.016-0.078 0.063-0.109 0.187-0.094 1.859-1.094 1.937-1.094 0.203 0 1.375 1.547 1.531 1.781 0.156-0.016 0.313-0.031 0.469-0.031s0.313 0.016 0.469 0.031c0.438-0.609 0.906-1.219 1.437-1.75l0.094-0.031c0.078 0 1.75 0.984 1.937 1.094 0.047 0.031 0.063 0.078 0.063 0.109 0 0.281-0.656 1.844-0.797 2.156 0.187 0.25 0.344 0.531 0.469 0.812 0.313 0.031 2.328 0.25 2.328 0.484zM30 4.906v2.187c0 0.234-2.016 0.453-2.328 0.484-0.125 0.297-0.281 0.562-0.469 0.812 0.141 0.313 0.797 1.875 0.797 2.156 0 0.047-0.016 0.078-0.063 0.109-0.187 0.109-1.859 1.109-1.937 1.109-0.203 0-1.375-1.563-1.531-1.797-0.156 0.016-0.313 0.031-0.469 0.031s-0.313-0.016-0.469-0.031c-0.156 0.234-1.328 1.797-1.531 1.797-0.078 0-1.75-1-1.937-1.109-0.047-0.031-0.063-0.078-0.063-0.109 0-0.266 0.656-1.844 0.797-2.156-0.187-0.25-0.344-0.516-0.469-0.812-0.313-0.031-2.328-0.25-2.328-0.484v-2.188c0-0.234 2.016-0.453 2.328-0.484 0.125-0.281 0.281-0.562 0.469-0.812-0.141-0.313-0.797-1.891-0.797-2.156 0-0.031 0.016-0.078 0.063-0.109 0.187-0.094 1.859-1.094 1.937-1.094 0.203 0 1.375 1.547 1.531 1.781 0.156-0.016 0.313-0.031 0.469-0.031s0.313 0.016 0.469 0.031c0.438-0.609 0.906-1.219 1.437-1.75l0.094-0.031c0.078 0 1.75 0.984 1.937 1.094 0.047 0.031 0.063 0.078 0.063 0.109 0 0.281-0.656 1.844-0.797 2.156 0.187 0.25 0.344 0.531 0.469 0.812 0.313 0.031 2.328 0.25 2.328 0.484z"></path>
                        </svg>
                        <a href="{{ route('user.edit', auth()->user()->id) }}" class="header__user--dropdown--link">Settings</a>
                    </li>
                    @endif
            <!-- / Sidebar "Settings" link -->

                    <!-- <li class="header__user--dropdown__li">
                        <svg class="header__user--dropdown--icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28">
                            <title>upload</title>
                            <path d="M20 23c0-0.547-0.453-1-1-1s-1 0.453-1 1 0.453 1 1 1 1-0.453 1-1zM24 23c0-0.547-0.453-1-1-1s-1 0.453-1 1 0.453 1 1 1 1-0.453 1-1zM26 19.5v5c0 0.828-0.672 1.5-1.5 1.5h-23c-0.828 0-1.5-0.672-1.5-1.5v-5c0-0.828 0.672-1.5 1.5-1.5h6.672c0.422 1.156 1.531 2 2.828 2h4c1.297 0 2.406-0.844 2.828-2h6.672c0.828 0 1.5 0.672 1.5 1.5zM20.922 9.375c-0.156 0.375-0.516 0.625-0.922 0.625h-4v7c0 0.547-0.453 1-1 1h-4c-0.547 0-1-0.453-1-1v-7h-4c-0.406 0-0.766-0.25-0.922-0.625-0.156-0.359-0.078-0.797 0.219-1.078l7-7c0.187-0.203 0.453-0.297 0.703-0.297s0.516 0.094 0.703 0.297l7 7c0.297 0.281 0.375 0.719 0.219 1.078z"></path>
                        </svg>
                        <a href="#" class="header__user--dropdown--link">Upload video</a>
                    </li>
                    <li class="header__user--dropdown__li">
                        <svg class="header__user--dropdown--icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                            <title>bullhorn</title>
                            <path d="M32 13.414c0-6.279-1.837-11.373-4.109-11.413 0.009-0 0.018-0.001 0.027-0.001h-2.592c0 0-6.088 4.573-14.851 6.367-0.268 1.415-0.438 3.102-0.438 5.047s0.171 3.631 0.438 5.047c8.763 1.794 14.851 6.367 14.851 6.367h2.592c-0.009 0-0.018-0.001-0.027-0.001 2.272-0.040 4.109-5.134 4.109-11.413zM27.026 23.102c-0.293 0-0.61-0.304-0.773-0.486-0.395-0.439-0.775-1.124-1.1-1.979-0.727-1.913-1.127-4.478-1.127-7.223s0.4-5.309 1.127-7.223c0.325-0.855 0.705-1.54 1.1-1.979 0.163-0.182 0.48-0.486 0.773-0.486s0.61 0.304 0.773 0.486c0.395 0.439 0.775 1.124 1.1 1.979 0.727 1.913 1.127 4.479 1.127 7.223s-0.4 5.309-1.127 7.223c-0.325 0.855-0.705 1.54-1.1 1.979-0.163 0.181-0.48 0.486-0.773 0.486zM7.869 13.414c0-1.623 0.119-3.201 0.345-4.659-1.48 0.205-2.779 0.323-4.386 0.323-2.096 0-2.096 0-2.096 0l-1.733 2.959v2.755l1.733 2.959c0 0 0 0 2.096 0 1.606 0 2.905 0.118 4.386 0.323-0.226-1.458-0.345-3.036-0.345-4.659zM11.505 20.068l-4-0.766 2.558 10.048c0.132 0.52 0.648 0.782 1.146 0.583l3.705-1.483c0.498-0.199 0.698-0.749 0.444-1.221l-3.853-7.161zM27.026 17.148c-0.113 0-0.235-0.117-0.298-0.187-0.152-0.169-0.299-0.433-0.424-0.763-0.28-0.738-0.434-1.726-0.434-2.784s0.154-2.046 0.434-2.784c0.125-0.33 0.272-0.593 0.424-0.763 0.063-0.070 0.185-0.187 0.298-0.187s0.235 0.117 0.298 0.187c0.152 0.169 0.299 0.433 0.424 0.763 0.28 0.737 0.434 1.726 0.434 2.784s-0.154 2.046-0.434 2.784c-0.125 0.33-0.272 0.593-0.424 0.763-0.063 0.070-0.185 0.187-0.298 0.187z"></path>
                        </svg>

                        <a href="#" class="header__user--dropdown--link">Subscriptions</a>
                    </li> -->

                    <li class="header__user--dropdown__li"><a href="#" class="header__user--dropdown--link"></a></li>
                    <li class="header__user--dropdown__li">
                        <svg class="header__user--dropdown--icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="28" viewBox="0 0 25 28">
                            <title>sign-out</title>
                            <path d="M10 22.5c0 0.438 0.203 1.5-0.5 1.5h-5c-2.484 0-4.5-2.016-4.5-4.5v-11c0-2.484 2.016-4.5 4.5-4.5h5c0.266 0 0.5 0.234 0.5 0.5 0 0.438 0.203 1.5-0.5 1.5h-5c-1.375 0-2.5 1.125-2.5 2.5v11c0 1.375 1.125 2.5 2.5 2.5h4.5c0.391 0 1-0.078 1 0.5zM24.5 14c0 0.266-0.109 0.516-0.297 0.703l-8.5 8.5c-0.187 0.187-0.438 0.297-0.703 0.297-0.547 0-1-0.453-1-1v-4.5h-7c-0.547 0-1-0.453-1-1v-6c0-0.547 0.453-1 1-1h7v-4.5c0-0.547 0.453-1 1-1 0.266 0 0.516 0.109 0.703 0.297l8.5 8.5c0.187 0.187 0.297 0.438 0.297 0.703z"></path>
                        </svg>

                        <a href="/logout" class="header__user--dropdown--link">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- /Profile dropdown -->

    </div>
    
    {{-- <div class="header__user--notifications">
            
            <svg class="header__user--notofocations__svg" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                <title>bell</title>
                <path d="M14.25 26.5c0-0.141-0.109-0.25-0.25-0.25-1.234 0-2.25-1.016-2.25-2.25 0-0.141-0.109-0.25-0.25-0.25s-0.25 0.109-0.25 0.25c0 1.516 1.234 2.75 2.75 2.75 0.141 0 0.25-0.109 0.25-0.25zM27 22c0 1.094-0.906 2-2 2h-7c0 2.203-1.797 4-4 4s-4-1.797-4-4h-7c-1.094 0-2-0.906-2-2 2.312-1.953 5-5.453 5-13 0-3 2.484-6.281 6.625-6.891-0.078-0.187-0.125-0.391-0.125-0.609 0-0.828 0.672-1.5 1.5-1.5s1.5 0.672 1.5 1.5c0 0.219-0.047 0.422-0.125 0.609 4.141 0.609 6.625 3.891 6.625 6.891 0 7.547 2.688 11.047 5 13z"></path>
            </svg>
            <div class="header__user--notifications__flag">
                <div class="header__user--notifications__num">24</div>
            </div>

            <!-- Notification drop down -->

            <!-- /Notification dropdown -->
    </div> --}}
    @endif

    @if(!Auth::check())
    <nav class="header__nav">
        <ul class="header__nav--ul">
            <li class="header__nav--li">
                <a href="{{ asset('/signup') }}" class="header__nav--link">Sign up</a>
            </li>
            <li class="header__nav--li">
                <a href="{{ asset('/login') }}" class="header__nav--link">Login</a>
            </li>
        </ul>
    </nav>
    @endif

</header>

@yield('main-content')

<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__block">
                <h3 class="footer__heading">{{ App\Models\Admin\Landing::first()->about_heading }}</h3>
                @if(strlen(App\Models\Admin\Landing::first()->about_text) > 95)
                <div class="footer__text">
                    {!! substr(App\Models\Admin\Landing::first()->about_text, 0, 150) !!}...
                    <a class="footer__text" href="{{ route('about') }}">view more</a>
                </div>
                @else
                    <p class="footer__text">{{ App\Models\Admin\Landing::first()->about_text }}</p>
                @endif
            </div>
            <div class="footer__block">
                <h3 class="footer__heading">Links</h3>
                <nav class="footer__nav">
                    <ul class="footer__ul">
                        <li class="footer__li"><a href="{{ route('chan.show', 'ham') }}" class="footer__link">Home</a></li>
                        <li class="footer__li"><a href="{{ route('contact') }}" class="footer__link">Contact us</a></li>
                        <li class="footer__li"><a href="{{ route('about') }}" class="footer__link">About us</a></li>
                        <li class="footer__li"><a href="{{ route('privacy-policy') }}" class="footer__link">Privacy policy</a></li>
                        <li class="footer__li"><a href="{{ route('terms') }}" class="footer__link">Terms</a></li>
                        <li class="footer__li"><a href="{{ route('requests') }}" class="footer__link">Requests</a></li>
                    </ul>
                </nav>
            </div>
            <div class="footer__block">
                <h3 class="footer__heading">Content</h3>
                <nav class="footer__nav">
                    <ul class="footer__ul">
                        <li class="footer__li"><a href="{{ route('user.submit.index') }}" class="footer__link">Submit</a></li>
                        <li class="footer__li"><a href="{{ route('advertisement') }}" class="footer__link">Advertising</a></li>
                        <li class="footer__li"><a href="{{ route('user.feedback') }}" class="footer__link">Feedback</a></li>
                    </ul>
                </nav>
            </div>
            <!-- <div class="footer__block">
                <h3 class="footer__heading">Our Partners</h3>
                <div class="footer__social">
                    <div class="footer__social--logo" style="background-image: url('{{ asset('/img/content/channels/10.png') }}')"></div>
                    <div class="footer__social--logo" style="background-image: url('{{ asset('/img/content/channels/10.png') }}')"></div>
                    <div class="footer__social--logo" style="background-image: url('{{ asset('/img/content/channels/10.png') }}')"></div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="footer__copy">
        <p class="footer__copy--text">Copyright © 2024 Wizmeek inc. All Right Reserved.</p>    
    </div>
</footer>
</body>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
@if(Route::is('chan.show'))
<script src="https://player.5centscdn.com/videojs/7.7.6/video.min.js"></script>
<script src="https://player.5centscdn.com/videojs/videojs-contrib-quality-levels.min.js"></script>
<script src="https://player.5centscdn.com/videojs/videojs-hls-quality-selector.min.js"></script>
<script src="https://player.5centscdn.com/videojs/videojs.hotkeys.min.js"></script>
<script type="text/javascript"> 
    let player = {};
    $(document).ready(function () { 
        player = videojs('my-video', { 
            fit: true, 
            responsive: true, 
            controls: true, 
            liveui: true, 
            techOrder: ["html5"], 
            html5: { 
                hls: { 
                    overrideNative: true, 
                    enableLowInitialPlaylist: true, 
                    useBandwidthFromLocalStorage: true, 
                    allowSeeksWithinUnsafeLiveWindow:true, 
                }, 
                nativeAudioTracks: false, 
                nativeVideoTracks: false, 
                nativeControlsForTouch: false, 
            }, 
            plugins: {

            }, 
            sources: [{ 
                type: "application/x-mpegurl", 
                src: "{{ $channel->stream }}" 
            }], 
        }, 
        function () { 
            this.reloadSourceOnError(); 
            this.hlsQualitySelector({ 
                displayCurrentQuality: true, 
            }); 
            this.hotkeys({ 
                volumeStep: 0.1, 
                seekStep: 5, 
                enableModifiersForNumbers: false, 
                alwaysCaptureHotkeys: true, }); 
                setTimeout(function () { 
                    player.play(); 
                }, 750); 
            }); 
        }); 
    </script>
    <script src="{{ asset('public/js/main/channels/channel-show.js') }}"></script>
@endif

@if(Route::is('user.profile'))
    <script src="{{ asset('public/js/main/profile/profile.js') }}"></script>
@endif
<!-- <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script> -->
<script src="https://cdn.plyr.io/3.7.3/plyr.js"></script>
<script src="{{ asset('public/js/simple-rating.js') }}"></script>
<script src="{{ asset('public/js/config.min.js') }}"></script>
<script src="{{ asset('public/js/util.min.js') }}"></script>
<script src="{{ asset('public/js/jquery.emojiarea.min.js') }}"></script>
<script src="{{ asset('public/js/emoji-picker.min.js') }}"></script>

<script src="{{ asset('public/js/app.js') }}"></script>
</html>
