$(document).on('click', '.gallery-item', function (event) {
  $('#post-img').remove();
  $('.post-title').empty();
  $('.post-text').empty();
  $('.post-comments').html('');
  var post = $(this).attr('id');
  $('#comment-form').attr('data-comment-id', post);

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
      $('.bg-img').prepend(
        $('<img>', {
          id: 'post-img',
          class: 'img-fluid w-100 h-100',
          src: post.url,
        })
      );
      // <img id="post-img" src="#" class="img-fluid w-100 h-100"></img>
      // $('#post-img').attr('src', post.url);
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
