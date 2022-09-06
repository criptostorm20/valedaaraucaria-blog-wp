<?php

function vale_da_araucaria_scripts() {
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/all.min.css');
  wp_enqueue_style( 'raleway-google-fonts', 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700', false );
  wp_enqueue_style( 'Playfair-google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700', false );
  wp_enqueue_style('style', get_stylesheet_uri());

  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array('jquery'), '3.6.0', true );

  // ajax
  wp_enqueue_script( 'ajax-posts',  get_stylesheet_directory_uri() . '/js/ajax-posts.js', array( 'jquery' ), '1.0', true );
  wp_localize_script( 'ajax-posts', 'ajaxposts', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' )
  ));

  wp_enqueue_script( 'ajax-comment',  get_stylesheet_directory_uri() . '/js/ajax-comment.js', array( 'jquery' ), '1.0', true );
  wp_localize_script( 'ajax-comment', 'ajaxcomment', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' )
  ));
}
add_action('wp_enqueue_scripts', 'vale_da_araucaria_scripts');


function vale_da_araucaria_setup() {
  add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'vale_da_araucaria_setup' );


function my_ajax_send_comment() {
  $post_id = $_POST['post_id'];
  $author = $_POST['author'];
  $comment = $_POST['comment'];

  // $agent = $_SERVER['HTTP_USER_AGENT'];
  $data = array(
    'comment_post_ID' => $post_id,
    'comment_author' => $author,
  //   'comment_author_email' => 'dave2@domain.com',
  //   'comment_author_url' => 'http://www.someiste.com',
    'comment_content' => $comment,
  //   'comment_author_IP' => '127.3.1.1',
  //   'comment_agent' => $agent,
  //   'comment_type'  => '',
  //   'comment_date' => date('Y-m-d H:i:s'),
  //   'comment_date_gmt' => date('Y-m-d H:i:s'),
  //   'comment_approved' => 1,
  );

  $comment_id = wp_insert_comment($data);

  exit( json_encode( $comment_id ) );
}
add_action( 'wp_ajax_nopriv_send_comment', 'my_ajax_send_comment' );
add_action( 'wp_ajax_send_comment', 'my_ajax_send_comment' );

function my_ajax_posts() {
  $id = $_POST['post_id'];

  $post = get_post( $id );

  // CONTENT POST
  $content = $post->post_content;
  $content = apply_filters('the_content', $content);

  // GET COMMENTS
  $comments = get_comments( ['post_id' => $_POST['post_id']] );

  
  // $agent = $_SERVER['HTTP_USER_AGENT'];
  // $data = array(
  //   'comment_post_ID' => 1,
  //   'comment_author' => 'Daveee2',
  //   'comment_author_email' => 'dave2@domain.com',
  //   'comment_author_url' => 'http://www.someiste.com',
  //   'comment_content' => 'Lorem ipsum dolor sit ametLorem ipsum dolor sit amet...',
  //   'comment_author_IP' => '127.3.1.1',
  //   'comment_agent' => $agent,
  //   'comment_type'  => '',
  //   'comment_date' => date('Y-m-d H:i:s'),
  //   'comment_date_gmt' => date('Y-m-d H:i:s'),
  //   'comment_approved' => 1,
  // );

  // $comment_id = wp_insert_comment($data);
  

  $post_formated = array (
    'url' => get_the_post_thumbnail_url( $post->ID ),
    'title' => $post->post_title,
    'content' => $content,
    'date' => $post->post_date,
    'coment_count' => $post->comment_count,
    'comments' => $comments
  );


  exit( json_encode( $post_formated ) );
    // exit( json_encode( get_post( $_POST['post_id'] ) ) );
}
add_action( 'wp_ajax_nopriv_posts', 'my_ajax_posts' );
add_action( 'wp_ajax_posts', 'my_ajax_posts' );

?>