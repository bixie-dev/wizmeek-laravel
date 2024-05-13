if($('#feedback').length) {
    $('#rating').rating()

    let links = $('.feedback__tab--link')
    let tabs = $('.feedback__tab')

    $(links).on("click", function(e) {
        let href = $(this).attr('href')

        $(tabs).removeClass('active')
        $(links).removeClass('active')

        $(href).addClass('active')
        $(this).addClass('active')

        return false
    })
}