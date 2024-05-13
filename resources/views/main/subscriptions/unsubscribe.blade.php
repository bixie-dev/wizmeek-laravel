<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wizmeek</title>
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
</head>
<body>

<main class="main">

    <!-- Secction header -->
    <section class="landing__header">
        <div class="container">
            <div class="landing__header--wrapper">
                <a href="{{ route('homepage') }}" class="landing__header--logo" style="background-image: url('{{ asset('public/img/content/wizmeek_logo.png') }}');"></a>
                <nav class="landing__header--nav">
                    <ul class="landing__header--ul">
                        @if(auth()->check())
                        <li class="landing__header--li"><a href="{{ route('chan.show', 9) }}" id="nav_link" class="landing__header--link">Project</a></li>
                        @else
                        <li class="landing__header--li"><a href="{{ route('homepage') }}" id="nav_link" class="landing__header--link">Home</a></li>
                        @endif
                        <li class="landing__header--li"><a href="{{ route('homepage') }}/#subscribe" id="nav_link" class="landing__header--link">Subscribe</a></li>
                        <li class="landing__header--li"><a href="{{ route('homepage') }}/#process" id="nav_link" class="landing__header--link">Process</a></li>
                        <li class="landing__header--li"><a href="{{ route('contact') }}" id="nav_link" class="landing__header--link">Contact</a></li>
                    </ul>
                </nav>
                <div id="burger" class="landing__header--burger">
                    <div class="landing__header--burger__central--line"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="main" class="landing__main">
        <div class="container">
            <div class="landing__main--wrapper">
                <div class="landing__main--warning__box success__placeholder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 512 512">
                        <path d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/>
                    </svg>
                    <p>{{$message}}</p>
                    <div>
                        <a href="{{ route('contact') }}">Contact our technical support </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__block">
                <h3 class="footer__heading">{{ App\Models\Admin\Landing::first()->about_heading }}</h3>
                @if(strlen(App\Models\Admin\Landing::first()->about_text) > 95)
                <div class="footer__text">
                    {{ substr(App\Models\Admin\Landing::first()->about_text, 0, 95) }}...
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
                        <li class="footer__li"><a href="/" class="footer__link">Home</a></li>
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
                        @if(Auth::check())
                        <li class="footer__li"><a href="{{ route('chan.show', 14) }}" class="footer__link">Project</a></li>
                        <li class="footer__li"><a href="{{ route('user.submit.index') }}" class="footer__link">Submit</a></li>
                        @else
                        <li class="footer__li"><a href="{{ route('user.login') }}" class="footer__link">Login (Early access only)</a></li>
                        <li class="footer__li"><a href="{{ route('user.submit.submit') }}" class="footer__link">Submit</a></li>
                        @endif
                        <li class="footer__li"><a href="{{ route('advertisement') }}" class="footer__link">Advertising</a></li>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $('#burger').click(function(){
            var nav = $('.landing__header--nav')
            var nav_link = $('.landing__header--link')
            var line = $('.landing__header--burger__central--line')
            var close = $('.landing__header--burger')
            nav.slideToggle(400)
            line.toggle("slide")
            close.toggleClass('active')

            nav_link.click(function(){
                nav.slideUp(400)
                close.removeClass('active')
                line.show(400)
            })
        })

            
    })
</script>
</body>
</html>