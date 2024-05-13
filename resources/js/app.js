require('./bootstrap');

$(document).ready(function() {

    /* Main nav bar */
    $('.header__burger--holder').click(function(){
        $('.nav__bar').toggleClass('active');

        $('.nav__bar--li').click(function(){
            $('.nav__bar').removeClass('active');
        });

        $(document).mouseup( function(e){
            var div = $('.nav__bar');
            var burger = $('.header__burger--holder');
            if ( !div.is(e.target) // if click is not on the div
                && div.has(e.target).length === 0 // and not child elements
                && !burger.is(e.target) ) { // and not a burger
                div.removeClass('active'); // Deleting class "active"
            }
        });
    });

    /* Link drop downs */
    $('.nav__bar--link').click(function(){
        $('.nav__bar--additional__wrapper').toggleClass('active');
    });
    /* End link drop downs */
    
    /* End Main nav bar */

    /* User dropdown menu */
    $('.header__user--avatar').click(function(){
        $('.header__user--dropdown').toggleClass('active');
    });
    $('.header__user--name').click(function(){
        $('.header__user--dropdown').toggleClass('active');
    });
    $('.header__user--dropdown--link').click(function(){
        $('.header__user--dropdown').removeClass('active');
    });
    $(document).mouseup( function(e){
        var div = $('.header__user--dropdown');
        var user_avatar = $('.header__user--avatar');
        var user_name = $('.header__user--name');
        if ( !div.is(e.target) // if click is not on the div
            && div.has(e.target).length === 0 // and not child elements
            && !user_avatar.is(e.target)
            && !user_name.is(e.target) ) { // and not a user buttons
            div.removeClass('active'); // Deleting class "active"
        }
    });
    /* End User dropdown menu */

    /* Mobile Chat drop up */
    $('.belowVideo__social--stats__row--chat__button').click(function(){
        $('.video__chat--box').toggleClass('active');
    });
    $('.video__chat--box__close').click(function(){
        $('.video__chat--box').removeClass('active');
    });

    /* End Mobile chat drop up */

    /* Channel edit Pop-up */
    $('.channel__edit').click(function(){
        var popup = $('.channel__edit--popup');
        var close = $('.channel__edit--form__close--icon');
        popup.toggleClass('active');

        if(popup.hasClass('active')){
            console.log('has class');
            $(document).mouseup( function(e){
                if ( !popup.is(e.target) && popup.has(e.target).length === 0) {
                    popup.removeClass('active');            
                }
            });
            close.click(function(){
                popup.removeClass('active');
            });
        }
    });
    /* End channel Pop-up */

    /* Avatar update pop-up */
    var popup_btn = $("#avatar_popup_btn")
    var popup = $("#avatar_popup")
    popup_btn.click(function(){
        popup.toggle(250)
    })
    $(document).mouseup(function(e) {
        if (!popup.is(e.target) && popup.has(e.target).length === 0) {
            popup.hide(250);
        }
    });
    /* End of Avatar update pop-up */

    require('./robots-filter');
    require('./feedback');
    require('./emoji-picker');
    require('./summernote');
});