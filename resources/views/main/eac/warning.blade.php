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
                <div class="landing__main--warning__box warning__placeholder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 320 512">
                        <path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/>
                    </svg>
                    <p>{{$errorMessage}}</p>
                    <div>
                        <a href="{{ route('contact') }}">Contact our technical support </a>
                        <p> or </p>
                        <a href="{{ route('homepage') }}/#subscribe"> Try again</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<footer class="landing__footer">
    <div class="container">
        <div class="landing__footer--wrapper">
            <div class="landing__footer--column">
                <h4 class="landing__footer--column__heading">About us</h4>
                <p class="landing__footer--p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>
            <div class="landing__footer--column">
                <h4 class="landing__footer--column__heading">Links</h4>
                <a href="{{ route('user.login') }}" class="landing__footer--link">Login (for early access)</a>
                <a href="{{ route('contact')}}" class="landing__footer--link">Contact US</a>
                <a href="{{ route('privacy-policy') }}" class="landing__footer--link">Privacy Policy</a>
            </div>
            <div class="landing__footer--column">
                <h4 class="landing__footer--column__heading">Content</h4>
                <a href="" class="landing__footer--link">Submit</a>
                <a href="" class="landing__footer--link">Terms/Request</a>
            </div>
        </div>
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