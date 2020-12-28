function check_all() {
    $('input[class="item_check"]:checkbox').each(function () {
        if ($('input[class="check_all"]:checkbox:checked').length == 0) {
            $(this).prop('checked', false)
        } else {
            $(this).prop('checked', true)
        }
    });
}
function delete_all() {
    $(document).on('click', '.delBtn', function () {
        var item_checked =  $('input[class="item_check"]:checkbox').filter(":checked").length;
        if (item_checked > 0 ){
            $('.record_count').text(item_checked);
            $('.not_empty_record').removeClass('invisible');
            $('.empty_record').addClass('invisible');
        } else {
            $('.not_empty_record').addClass('invisible');
            $('.empty_record').removeClass('invisible');
        }
        $('#mutlipleDelete').modal('show');
    });
}
function submit_delete() {
    $(document).on('click', '.del_all', function () {
        $('#form_data').submit();
    });
}
