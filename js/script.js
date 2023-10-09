function getPosts() {
    let postId = $('#postId').val();

    $.ajax({
        type: 'POST',
        url: 'api.php',
        data: {'postId': postId},
        success: function (response) {
            $('#postTable').html(response);
        }
    });
}
