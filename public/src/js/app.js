var postId = 0;
var postBodyElement = null;

$('.post').find('.interaction').find('.edit').on('click', function(event){

    event.preventDefault();

    postBodyElement = $(this).closest('.post').find('p:eq(0)');
    var postbody = postBodyElement.text();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postbody);
    $('#edit-modal').modal();
});

$('#modal-save').on('click', function() {

    $.ajax({
        method: 'POST',
        url: url,
        data: {body: $('#post-body').val(), postId: postId, _token: token}
    })
    .done(function(msg) {
        $(postBodyElement).text(msg['new_body']);
    });
});

