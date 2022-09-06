<script>
  jQuery(document).ready(function($) {
    $( ".gallery-item" ).click(function() {
      // alert( "Handler for .click() called." );
      //$(this).css('display', 'none');
      $('#modal-gallery').css({'opacity': '1', 'visibility': 'visible'});
    });
    
    $( ".close, .overlay" ).click(function(event) {    
      $('#modal-gallery').css({'opacity': '0', 'visibility': 'hidden'});
    });

    $( ".overlay *" ).click(function(event) {
      event.stopPropagation();
    });
  });
  


  // let open = document.getElementsByClassName('gallery-item')[0];
  // let close = document.getElementsByClassName('close')[0];
  // let fade = document.getElementsByClassName('overlay')[0];
  // let cntModal = document.getElementsByClassName('full-post')[0];

  // open.onclick = function() {fade.style.opacity = 1; fade.style.visibility = 'visible'}

  // close.onclick = function() {fade.style.opacity = 0; fade.style.visibility = 'hidden'}

  // fade.onclick = function() {fade.style.opacity = 0; fade.style.visibility = 'hidden'}

  // cntModal.onclick = function(event) {event.stopPropagation()}

</script>

<?php
  $args = array(
  'post_type'=> 'post',
  'orderby'    => 'ID',
  'post_status' => 'publish',
  'order'    => 'DESC',
  'posts_per_page' => -1 // this will retrive all the post that is published 
  );
  $result = new WP_Query( $args );
?>

<div class="container">

  <div class="row">
    <div class="col">
      <h1 class="main-title"><?php single_post_title(); ?></h1>
    </div>
  </div>

    <div class="gallery">
      <?php
        if ( $result-> have_posts() ) : ?>
          <?php while ( $result->have_posts() ) : $result->the_post(); ?>
            <?php if( ($result->current_post % 3) === 0)
                        echo "<div class='row'>"; ?>


                <div id="<?php the_id(); ?>" class="col-4 gallery-item">
                  
                  <img src="<?php the_post_thumbnail_url(); ?>" class="gallery-image">

                  <div class="gallery-item-info">

                    <ul>
                      <li class="gallery-item-comments">
                        <i class="fas fa-comment"></i> <?php echo get_comments_number(); ?>
                      </li>
                    </ul>

                  </div>

                </div>


            <?php if( ($result->current_post % 3) === 2)
                        echo "</div>"; ?>
              
          <?php endwhile; ?>
      <?php endif; wp_reset_postdata(); ?>

  </div>

  <?php get_template_part( 'template-parts/content/content-post' ); ?>

</div>
