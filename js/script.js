function getPosts() {
    let postId = $('#postId').val();

    $.ajax({
        type: 'GET',
        url: 'v1/getData.php',
        data: {'postId': postId},
        success: function (response) {
            $('#postTable').html(response);
        }
    });
}

function sendPost() {
    let postData = {
        title: $('postTitle').val(),
        body: $('postBody').val(),
        userId: $('userId').val()
    };

    $.ajax({
        url: 'v1/sendData.php',
        type: "POST",
        data: JSON.stringify(postData),
        success: function (data) {
            getPosts();
        }
    });
}
