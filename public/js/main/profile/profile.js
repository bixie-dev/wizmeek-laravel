$(document).ready(function(){
    /* Follow/Unfollow Visuals */
    var follow_nav = $('#follow_nav');
    var unfollow_btn = $('#unfollow_btn');
    var follow_shevron = $('#follow_shevron');

    $(follow_nav).on('click', function() {
        if($(follow_nav).hasClass('active')){
            $(this).removeClass('active');
            $(unfollow_btn).slideUp(300);
            $(follow_shevron).css({'transform' : 'rotate(-360deg)'});
        } else {
            $(this).addClass('active');
            $(unfollow_btn).slideDown(300);
            $(follow_shevron).css({'transform' : 'rotate(-180deg)'});
        }
    });
});