if($('#emoji-picker').length) {
    console.log('Element')
    $('#emoji-picker').on("click", function() {
        // let val = $('#emoji-input').val()
        // $('#emoji-input').val(val + String.fromCodePoint(0x1F600))
        $('#emoji-picker-content').fadeIn(300)
    })
    $('#emoji-picker-content-close').on("click", function() {
        $('#emoji-picker-content').fadeOut(300)
    })
    $('#sendMessage').on("click", function() {
        $('#emoji-picker-content').fadeOut(300)
    }) 
    $('.emoji-picker-single-emoji').on("click", function() {
        let emoji = $(this).text()
        let val = $('#emoji-input').val()
        console.log(emoji)
        $('#emoji-input').val(val + emoji)
        $('#emoji-input').trigger("focus")
    })
    // $('#emoji-input').val(String.fromCodePoint(0x1F600))
}