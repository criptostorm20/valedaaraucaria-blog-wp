$('#comment-form').submit(function (event) {
  // alert('Handler for .submit() called.');
  var post = $(this).attr('data-comment-id');
  var author = $('input[name="author"]').val();
  var comment = $('textarea[name="comment"]').val();

  if (author.length < 3 || comment.length < 5) {
    alert('Os campos NOME e COMENTÁRIO são necessários.');
    return false;
  }

  $.ajax({
    url: ajaxcomment.ajaxurl,
    type: 'post',
    data: {
      action: 'send_comment',
      post_id: post,
      author: author,
      comment: comment,
    },
    success: function (result) {
      var comment_response = JSON.parse(result);

      if (Number.isInteger(comment_response)) {
        $('.post-comments').prepend(
          "<div class='comment'><b>" + author + '</b> ' + comment + '</div>'
        );
      }
    },
    error: function (e) {
      console.log(e);
    },
  });

  event.preventDefault();
});

/*
$(document).on('click', '.gallery-item', function (event) {
  $('.post-comments').html('');
  var post = $(this).attr('id');
  console.log('post', post);
  $.ajax({
    url: ajaxposts.ajaxurl,
    type: 'post',
    data: {
      action: 'posts',
      post_id: post,
    },
    success: function (post_encoded) {
      var post = JSON.parse(post_encoded);
      var comments = post.comments;
      // console.log(post);
      $('#post-img').attr('src', post.url);
      $('.post-title').text(post.title);
      $('.post-text').html(post.content);

      comments.forEach((c) => {
        $('.post-comments').append(
          "<div class='comment'><b>" +
            c.comment_author +
            '</b> ' +
            c.comment_content +
            '</div>'
        );
      });
    },
    error: function (e) {
      console.log(e);
    },
  });
});
*/
