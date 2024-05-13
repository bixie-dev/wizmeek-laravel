if($('#robots-filter').length) {
    let check = $('#robots-filter-check')
    let input = $('#robots-filter-key-count')
    let key_count = 0
    $(check).on("keyup", function() {
        key_count = key_count + 1
        $(input).val(key_count)
    })
}