@extends('main.layouts.app')

@section('main-content')
<!-- Main section -->
<main class="main">
    <div class="container">
        <div class="submit__info--wrapper">
            <h2 class="channel__name">{{ $text->submit_heading }}</h2>
        </div>
        <div class="submit__info--wrapper">
            <p class="info__text--neutral">{{ $text->submit_text }}</p>
        </div>
        <div class="submit__info--wrapper">
            <p class="info__text--note">{{ $text->submit_text_red }}</p>
        </div>

        <!-- Submit form -->
        
        @if(Auth::check())
            <form class="theme__form" id="video_submit" method="post" action="{{ route('user.submit.store') }}" enctype="multipart/form-data">
                <!-- Loading scren -->
                <div class="loading__wrapper">
                    <div class="loading">
                        <div class="loading__ring">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                <path d="M85.5,42c-0.2-0.8-0.5-1.7-0.8-2.5c-0.3-0.9-0.7-1.6-1-2.3c-0.3-0.7-0.6-1.3-1-1.9c0.3,0.5,0.5,1.1,0.8,1.7  c0.2,0.7,0.6,1.5,0.8,2.3s0.5,1.7,0.8,2.5c0.8,3.5,1.3,7.5,0.8,12c-0.4,4.3-1.8,9-4.2,13.4c-2.4,4.2-5.9,8.2-10.5,11.2  c-1.1,0.7-2.2,1.5-3.4,2c-0.5,0.2-1.2,0.6-1.8,0.8s-1.3,0.5-1.9,0.8c-2.6,1-5.3,1.7-8.1,1.8l-1.1,0.1L53.8,84c-0.7,0-1.4,0-2.1,0  c-1.4-0.1-2.9-0.1-4.2-0.5c-1.4-0.1-2.8-0.6-4.1-0.8c-1.4-0.5-2.7-0.9-3.9-1.5c-1.2-0.6-2.4-1.2-3.7-1.9c-0.6-0.3-1.2-0.7-1.7-1.1  l-0.8-0.6c-0.3-0.1-0.6-0.4-0.8-0.6l-0.8-0.6L31.3,76l-0.2-0.2L31,75.7l-0.1-0.1l0,0l-1.5-1.5c-1.2-1-1.9-2.1-2.7-3.1  c-0.4-0.4-0.7-1.1-1.1-1.7l-1.1-1.7c-0.3-0.6-0.6-1.2-0.9-1.8c-0.2-0.5-0.6-1.2-0.8-1.8c-0.4-1.2-1-2.4-1.2-3.7  c-0.2-0.6-0.4-1.2-0.5-1.9c-0.1-0.6-0.2-1.2-0.3-1.8c-0.3-1.2-0.3-2.4-0.4-3.7c-0.1-1.2,0-2.5,0.1-3.7c0.2-1.2,0.3-2.4,0.6-3.5  c0.1-0.6,0.3-1.1,0.4-1.7l0.1-0.8l0.3-0.8c1.5-4.3,3.8-8,6.5-11c0.8-0.8,1.4-1.5,2.1-2.1c0.9-0.9,1.4-1.3,2.2-1.8  c1.4-1.2,2.9-2,4.3-2.8c2.8-1.5,5.5-2.3,7.7-2.8s4-0.7,5.2-0.6c0.6-0.1,1.1,0,1.4,0s0.4,0,0.4,0h0.1c2.7,0.1,5-2.2,5-5  c0.1-2.7-2.2-5-5-5c-0.2,0-0.2,0-0.3,0c0,0-0.2,0.1-0.6,0.1c-0.4,0-1,0-1.8,0.1c-1.6,0.1-4,0.4-6.9,1.2c-2.9,0.8-6.4,2-9.9,4.1  c-1.8,1-3.6,2.3-5.4,3.8C26,21.4,25,22.2,24.4,23c-0.2,0.2-0.4,0.4-0.6,0.6c-0.2,0.2-0.5,0.4-0.6,0.7c-0.5,0.4-0.8,0.9-1.3,1.4  c-3.2,3.9-5.9,8.8-7.5,14.3l-0.3,1l-0.2,1.1c-0.1,0.7-0.3,1.4-0.4,2.1c-0.3,1.5-0.4,2.9-0.5,4.5c0,1.5-0.1,3,0.1,4.5  c0.2,1.5,0.2,3,0.6,4.6c0.1,0.7,0.3,1.5,0.4,2.3c0.2,0.8,0.5,1.5,0.7,2.3c0.4,1.6,1.1,3,1.7,4.4c0.3,0.7,0.7,1.4,1.1,2.1  c0.4,0.8,0.8,1.4,1.2,2.1c0.5,0.7,0.9,1.4,1.4,2s0.9,1.3,1.5,1.9c1.1,1.3,2.2,2.7,3.3,3.5l1.7,1.6c0,0,0.1,0.1,0.1,0.1c0,0,0,0,0,0  c0,0,0,0,0,0l0.1,0.1l0.1,0.1h0.2l0.5,0.4l1,0.7c0.4,0.2,0.6,0.5,1,0.7l1.1,0.6c0.8,0.4,1.4,0.9,2.1,1.2c1.4,0.7,2.9,1.5,4.4,2  c1.5,0.7,3.1,1,4.6,1.5c1.5,0.3,3.1,0.7,4.7,0.8c1.6,0.2,3.1,0.2,4.7,0.2c0.8,0,1.6-0.1,2.4-0.1l1.2-0.1l1.1-0.1  c3.1-0.4,6.1-1.3,8.9-2.4c0.8-0.3,1.4-0.6,2.1-0.9s1.3-0.7,2-1.1c1.3-0.7,2.6-1.7,3.7-2.5c0.5-0.4,1-0.9,1.6-1.3l0.8-0.6l0.2-0.2  c0,0,0.1-0.1,0.1-0.1c0.1-0.1,0,0,0,0v0.1l0.1-0.1l0.4-0.4c0.5-0.5,1-1,1.5-1.5c0.3-0.3,0.5-0.5,0.8-0.8l0.7-0.8  c0.9-1.1,1.8-2.2,2.5-3.3c0.4-0.6,0.7-1.1,1.1-1.7c0.3-0.7,0.6-1.2,0.9-1.8c2.4-4.9,3.5-9.8,3.7-14.4C87.3,49.7,86.6,45.5,85.5,42z"></path>
                            </svg>
                        </div>
                        <div class="loading__ring">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                <path d="M85.5,42c-0.2-0.8-0.5-1.7-0.8-2.5c-0.3-0.9-0.7-1.6-1-2.3c-0.3-0.7-0.6-1.3-1-1.9c0.3,0.5,0.5,1.1,0.8,1.7  c0.2,0.7,0.6,1.5,0.8,2.3s0.5,1.7,0.8,2.5c0.8,3.5,1.3,7.5,0.8,12c-0.4,4.3-1.8,9-4.2,13.4c-2.4,4.2-5.9,8.2-10.5,11.2  c-1.1,0.7-2.2,1.5-3.4,2c-0.5,0.2-1.2,0.6-1.8,0.8s-1.3,0.5-1.9,0.8c-2.6,1-5.3,1.7-8.1,1.8l-1.1,0.1L53.8,84c-0.7,0-1.4,0-2.1,0  c-1.4-0.1-2.9-0.1-4.2-0.5c-1.4-0.1-2.8-0.6-4.1-0.8c-1.4-0.5-2.7-0.9-3.9-1.5c-1.2-0.6-2.4-1.2-3.7-1.9c-0.6-0.3-1.2-0.7-1.7-1.1  l-0.8-0.6c-0.3-0.1-0.6-0.4-0.8-0.6l-0.8-0.6L31.3,76l-0.2-0.2L31,75.7l-0.1-0.1l0,0l-1.5-1.5c-1.2-1-1.9-2.1-2.7-3.1  c-0.4-0.4-0.7-1.1-1.1-1.7l-1.1-1.7c-0.3-0.6-0.6-1.2-0.9-1.8c-0.2-0.5-0.6-1.2-0.8-1.8c-0.4-1.2-1-2.4-1.2-3.7  c-0.2-0.6-0.4-1.2-0.5-1.9c-0.1-0.6-0.2-1.2-0.3-1.8c-0.3-1.2-0.3-2.4-0.4-3.7c-0.1-1.2,0-2.5,0.1-3.7c0.2-1.2,0.3-2.4,0.6-3.5  c0.1-0.6,0.3-1.1,0.4-1.7l0.1-0.8l0.3-0.8c1.5-4.3,3.8-8,6.5-11c0.8-0.8,1.4-1.5,2.1-2.1c0.9-0.9,1.4-1.3,2.2-1.8  c1.4-1.2,2.9-2,4.3-2.8c2.8-1.5,5.5-2.3,7.7-2.8s4-0.7,5.2-0.6c0.6-0.1,1.1,0,1.4,0s0.4,0,0.4,0h0.1c2.7,0.1,5-2.2,5-5  c0.1-2.7-2.2-5-5-5c-0.2,0-0.2,0-0.3,0c0,0-0.2,0.1-0.6,0.1c-0.4,0-1,0-1.8,0.1c-1.6,0.1-4,0.4-6.9,1.2c-2.9,0.8-6.4,2-9.9,4.1  c-1.8,1-3.6,2.3-5.4,3.8C26,21.4,25,22.2,24.4,23c-0.2,0.2-0.4,0.4-0.6,0.6c-0.2,0.2-0.5,0.4-0.6,0.7c-0.5,0.4-0.8,0.9-1.3,1.4  c-3.2,3.9-5.9,8.8-7.5,14.3l-0.3,1l-0.2,1.1c-0.1,0.7-0.3,1.4-0.4,2.1c-0.3,1.5-0.4,2.9-0.5,4.5c0,1.5-0.1,3,0.1,4.5  c0.2,1.5,0.2,3,0.6,4.6c0.1,0.7,0.3,1.5,0.4,2.3c0.2,0.8,0.5,1.5,0.7,2.3c0.4,1.6,1.1,3,1.7,4.4c0.3,0.7,0.7,1.4,1.1,2.1  c0.4,0.8,0.8,1.4,1.2,2.1c0.5,0.7,0.9,1.4,1.4,2s0.9,1.3,1.5,1.9c1.1,1.3,2.2,2.7,3.3,3.5l1.7,1.6c0,0,0.1,0.1,0.1,0.1c0,0,0,0,0,0  c0,0,0,0,0,0l0.1,0.1l0.1,0.1h0.2l0.5,0.4l1,0.7c0.4,0.2,0.6,0.5,1,0.7l1.1,0.6c0.8,0.4,1.4,0.9,2.1,1.2c1.4,0.7,2.9,1.5,4.4,2  c1.5,0.7,3.1,1,4.6,1.5c1.5,0.3,3.1,0.7,4.7,0.8c1.6,0.2,3.1,0.2,4.7,0.2c0.8,0,1.6-0.1,2.4-0.1l1.2-0.1l1.1-0.1  c3.1-0.4,6.1-1.3,8.9-2.4c0.8-0.3,1.4-0.6,2.1-0.9s1.3-0.7,2-1.1c1.3-0.7,2.6-1.7,3.7-2.5c0.5-0.4,1-0.9,1.6-1.3l0.8-0.6l0.2-0.2  c0,0,0.1-0.1,0.1-0.1c0.1-0.1,0,0,0,0v0.1l0.1-0.1l0.4-0.4c0.5-0.5,1-1,1.5-1.5c0.3-0.3,0.5-0.5,0.8-0.8l0.7-0.8  c0.9-1.1,1.8-2.2,2.5-3.3c0.4-0.6,0.7-1.1,1.1-1.7c0.3-0.7,0.6-1.2,0.9-1.8c2.4-4.9,3.5-9.8,3.7-14.4C87.3,49.7,86.6,45.5,85.5,42z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- / Loading screen -->
                @csrf
                <!-- Artist name input -->
                <div class="form__block">
                    <div id="artist_name_error" class="alert__danger"></div>
                    @if(old('artist_name'))
                        <input type="text" name="artist_name" id="submit_name" class="theme__form--input" value="{{ old('artist_name') }}">
                    @else
                        <input type="text" name="artist_name" id="submit_name" class="theme__form--input" placeholder="Artist name*">
                    @endif
                </div>

                <!-- Song title input -->
                <div class="form__block">
                    <!-- <label for="submit_title" class="theme__form--label">Song title*</label> -->
                    <div id="song_title_error" class="alert__danger"></div>
                    @if(old('song_title'))
                        <input type="text" name="song_title" id="submit_title" class="theme__form--input" value="{{ old('song_title') }}">
                    @else
                        <input type="text" name="song_title" id="submit_title" class="theme__form--input" placeholder="Song title*">
                    @endif
                </div>

                <!-- Genre input -->
                <div class="form__block">
                    <!-- <label for="genre" class="theme__form--label">Genre*</label> -->
                    <div id="genre_error" class="alert__danger"></div>
                    <div class="theme__form--select__wrapper">
                        <svg class="theme__form--select__arrow" xmlns="http://www.w3.org/2000/svg" height="48" width="48" viewBox="0 0 48 48">
                            <path d="m24 30.75-12-12 2.15-2.15L24 26.5l9.85-9.85L36 18.8Z"/>
                        </svg>
                        <select class="theme__form--select" name="genre" id="genre">
                            <option value="">Select genre*</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Release year input -->
                <div class="form__block">
                    <!-- <label for="release_date" class="theme__form--label">Release year*</label> -->
                    <div id="release_date_error" class="alert__danger"></div>
                    <!-- <input name="release_date" id="release_date" class="theme__form--input" type="number" min="1900" max="2099" step="1" value="{{ old('release_date') ? old('release_date') : '2016'}}" /> -->
                    <div class="theme__form--select__wrapper">
                        <svg class="theme__form--select__arrow" xmlns="http://www.w3.org/2000/svg" height="48" width="48" viewBox="0 0 48 48">
                            <path d="m24 30.75-12-12 2.15-2.15L24 26.5l9.85-9.85L36 18.8Z"/>
                        </svg>
                        <select class="theme__form--select" name="release_date" id="release_date">
                            <option value="" disabled selected>Select Release date*</option>
                            @for($i = 2024; $i >= 1980; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>


                <!-- Youtube link input -->
                <div class="form__block">
                    <!-- <label for="youtube_link" class="theme__form--label">YouTube link</label> -->
                    <div id="youtube_link_error" class="alert__danger"></div>
                    @if(old('youtube_link'))
                        <input type="text" name="youtube_link" id="youtube_link" class="theme__form--input" value="{{ old('youtube_link') }}">
                    @else
                        <input type="text" name="youtube_link" id="youtube_link" class="theme__form--input" placeholder="Send video from YouTube (link)">
                    @endif
                </div>

                <!-- Youtube preview -->
                @if(old('youtube_link'))
                <script>
                    $(document).ready(function(){
                        const regex = /(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11,})/;
                        var link = $('#youtube_link').val().match(regex)
                        var link = link[1];
                            $('#youtube__video__container').html('<iframe width="200" height="113" src="https://www.youtube.com/embed/'+ link + '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>')
                            $('#youtube__video__container').addClass('active')
                    })
                </script>
                @else
                <script>
                    $(document).ready(function(){
                        $('#youtube_link').change(function() {
                            const regex = /(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11,})/;
                            var link = $(this).val().match(regex)
                            var link = link[1];
                            $('#youtube__video__container').html('<iframe width="200" height="113" src="https://www.youtube.com/embed/' + link + '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>')
                            $('#youtube__video__container').addClass('active')
                            console.log(link)
                        });
                    });
                </script>
                @endif

                <!-- Video preview -->
                <div class="form__block--youtube__container" id="youtube__video__container"></div>

                <!-- Between Inputs text -->
                <!-- <div class="theme__form--betweenInputs__text">or</div> -->

            <!-- Video Upload input -->
            <!-- <div class="form__block">
                <input type='file' id='file' class="form__block--file__input" name='file' />
                <div class="form__block--file__holder">
                    <span id="inputTmpLink">Choose a video (.avi, .mp4, .mov)</span>
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
            </div> -->

            <!-- Upload progress script -->
            <script>
            $(document).ready(function(){
                $('#file').change(function(){
                    var tmpLink = $('#file').val().split('\\')
                    var filename = tmpLink[tmpLink.length - 1];
                    $('#inputTmpLink').html(filename)
                    console.log(tmpLink)
                });
                $('#upload_video').click(function(e) { // capture submit
                    e.preventDefault();
                    console.log('clicked')
                    var form = document.getElementById('video_submit')
                    var fd = new FormData(form); // XXX: Neex AJAX2
        
                    // You could show a loading image for example...
    
                    $.ajax({
                        // url: $(this).attr('action'),
                        url: "{{ route('user.submit.video') }}",
                        type:"POST",
                        dataType: "html",
                        data:{
                            "_token": "{{ csrf_token() }}"
                        },
                        xhr: function() { // custom xhr (is the best)
               
                        var xhr = new XMLHttpRequest();
                        var total = 0;
                        
                        // Get the total size of files
                        $.each(document.getElementById('file').files, function(i, file) {
                            total += file.size;
                        });
    
                        // Called when upload progress changes. xhr2
                        xhr.upload.addEventListener("progress", function(evt) {
                            // show progress like example
                            var loaded = (evt.loaded / total).toFixed(2)*100; // percent
                            var loaded = Math.ceil(loaded)
                            
                            $('#form__block--progress__bar').addClass('active')
                            $('#form__block--progress_line').css('width', loaded + '%')
                            $('#form__block--percentage').text(loaded + '%' );
                        }, false);
    
                        return xhr;
                    },
                        type: 'post',
                        processData: false,
                        contentType: false,
                        data: fd,
                        success: function(data) {

                            var videoPath = '/' + JSON.parse(data)
                            $('#video_path').attr('value', videoPath)
                            var videoPathPlayer = "{{ asset('storage/app') }}" + videoPath
                            $('#video__container').html('<video id="video_preview" width="200" height="113" controls><source id="video_preview_source" src="' + videoPathPlayer + '"></video>')
                            $('#video__container').addClass('active')                
            
                            //$('#video_preview_source').attr('src', "{{ asset('storage/app/') }}" + videoPath)
                            //$('#video_preview').css('visibility', 'visible')
                            
                                //console.log('changed')
                            //var $source = $('#video_preview_source');
                            //$source.src = URL.createObjectURL(videoPath);
                            //$source.parent().load();
                        },
                        error: function(data) {

                        }
                    });
                });
            });
            </script>

            <!-- Video preview -->
            <div class="form__block--video__container" id="video__container"></div>
            

            <!-- Video Path (hidden) -->
            <input type="hidden" name="video_path" id="video_path" vlaue="">

            <!-- Policy agreement checkbox -->
            <div id="policy_agreement_error" class="alert__danger"></div>
            <div class="remember__me">
                <input type="checkbox" name="policy_agreement" id="policy_agreement" value="on">
                <label for="policy_agreement">
                    Yes, i understand and agree to the
                    <a class="theme__form--link" href="{{ route('terms') }}"> Terms of Service</a>
                    and
                    <a class="theme__form--link" href="{{ route('privacy-policy') }}"> Privacy policy</a>.
                </label>
            </div>

            <!-- Submit button -->
            <button class="form__block--submit" id="form_submit" type="submit">Submit video</button>
        </form>
        @endif
        <div class="form__success--wrapper">
        <svg class="form__success--icon" xmlns="http://www.w3.org/2000/svg" height="48" width="48" viewBox="0 0 48 48">
            <path d="M21.05 33.1 35.2 18.95l-2.3-2.25-11.85 11.85-6-6-2.25 2.25ZM24 44q-4.1 0-7.75-1.575-3.65-1.575-6.375-4.3-2.725-2.725-4.3-6.375Q4 28.1 4 24q0-4.15 1.575-7.8 1.575-3.65 4.3-6.35 2.725-2.7 6.375-4.275Q19.9 4 24 4q4.15 0 7.8 1.575 3.65 1.575 6.35 4.275 2.7 2.7 4.275 6.35Q44 19.85 44 24q0 4.1-1.575 7.75-1.575 3.65-4.275 6.375t-6.35 4.3Q28.15 44 24 44Zm0-3q7.1 0 12.05-4.975Q41 31.05 41 24q0-7.1-4.95-12.05Q31.1 7 24 7q-7.05 0-12.025 4.95Q7 16.9 7 24q0 7.05 4.975 12.025Q16.95 41 24 41Zm0-17Z"/>
        </svg>
            <h6 class="form__success--message__heading">Thank you for your submission!</h6>
            <p class="form__success--message__text">We will review your video as soon as possible</p>
        </div>

        <!-- Sending submit script -->
        <script>
            $(document).ready(function() {
                $('#video_submit').on('submit', function(e) {
                    e.preventDefault();

                    /* Loader */
                    $('.loading__wrapper').fadeIn(500)

                    var data = new FormData(this)

                    $.ajax({
                        // url: $(this).attr('action'),
                        url: "{{ route('user.submit.store') }}",
                        type:"POST",
                        dataType: "json",
                        data:data,
                        processData:false,
                        contentType:false,
                        success: function(data) {
                            /* Loader */
                            $('.loading__wrapper').slideUp(300)
                            $('#video_submit').slideUp(300)
                            $('.form__success--wrapper').slideDown(300).delay(300)
                        },
                        error: function(data) {
                            $('.loading__wrapper').fadeOut(300)
                            if(data.responseJSON.errors.artist_name != undefined) {
                                $('#artist_name_error').text(data.responseJSON.errors.artist_name).slideDown(300)
                            }
                            if(data.responseJSON.errors.song_title != undefined) {
                                $('#song_title_error').text(data.responseJSON.errors.song_title).slideDown(300)
                            }
                            if(data.responseJSON.errors.genre != undefined) {
                                $('#genre_error').text(data.responseJSON.errors.genre).slideDown(300)
                            }
                            if(data.responseJSON.errors.release_date != undefined) {
                                $('#release_date_error').text(data.responseJSON.errors.release_date).slideDown(300)
                            }
                            if(data.responseJSON.errors.policy_agreement != undefined) {
                                $('#policy_agreement_error').text(data.responseJSON.errors.policy_agreement).slideDown(300)
                            }
                            if(data.responseJSON.errors.policy_agreement != undefined) {
                                $('#description_error').text(data.responseJSON.errors.description).slideDown(300)
                            }
                        }
                    });
                });
            });
        </script>
        
    </div>
</main>
@endsection