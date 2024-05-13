$(document).ready(function() {
    /* Request repeat visauals*/
    var req_btn = $('#request_repeat');
    var req_form = $('#request_repeat_form');
    var req_form_btn = $('#request_repeat_form_btn');
    var req_form_wr = $('#request_repeat_form_wrapper');
    $(document).mouseup(function(e){
        if($(req_btn).hasClass('active')){
            if ( !req_form_wr.is(e.target) && req_form_wr.has(e.target).length === 0 ) {
                $(req_form_wr).slideUp(300, 'swing', function(){
                    $(req_btn).removeClass('active')
                }); 
            }
        }
    });
    $(req_btn).on('click', function(e){
        if($(this).hasClass('active')){
            if ( !req_form_wr.is(e.target) && req_form_wr.has(e.target).length === 0 ) {
                $(req_form_wr).slideUp(300, 'swing', function(){
                    $(req_btn).removeClass('active');
                }); 
            }
        } else {
            $(req_btn).addClass('active');
            $(req_form_wr).delay(200).slideDown(300, 'swing');
        }
    });
    $(req_form_btn).on('click', function(){
        
    });

    /* Request repeat AJAX - store */
    $(req_form).on('submit', function(e){
        e.preventDefault();

        var form = document.getElementById('request_repeat_form');
        var formAction = $(req_form).attr('action');
        var formData = new FormData(form);

        /* for (var [key, value] of formData.entries()) { 
            console.log(key, value);
        } */

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: formAction,
            type: "POST",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                $('#artist_name_input').val("");
                $('#song_name_input').val("");
                $('#artist_name_error').slideUp(300);
                $('#song_name_error').slideUp(300);
                $(req_form_wr).slideUp(300, 'swing', function(){
                    $(req_btn).removeClass('active').css("background-color", "#2fff75").delay(1000).queue(function(next){
                        $(this).css("background-color", "#353340");
                        next();
                    });

                });
                
            },
            error: function(response){
                if(response.responseJSON.errors.artist_name != undefined) {
                    $('#artist_name_error').text(response.responseJSON.errors.artist_name).slideDown(300);
                } else {
                    $('#artist_name_error').slideUp(300);
                }
                if(response.responseJSON.errors.song_name != undefined) {
                    $('#song_name_error').text(response.responseJSON.errors.song_name).slideDown(300);
                } else {
                    $('#song_name_error').slideUp(300);
                }
            }
        });
    })


});