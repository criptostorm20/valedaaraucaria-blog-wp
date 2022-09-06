<?php

  get_header();




  /* Start the Loop */
  while ( have_posts() ) :
    the_post();
    get_template_part( 'template-parts/content/content-page' );

    // If comments are open or there is at least one comment, load up the comment template.
    // if ( comments_open() || get_comments_number() ) {
    //   comments_template();
    // }
  endwhile; // End of the loop.

  /*single_post_title();

  if ( have_posts() ) :

	  while ( have_posts() ) : the_post(); ?>

      <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

      <?php the_content() ?>

    <?php endwhile;

  else :
    echo '<p>There are no posts!</p>';

  endif;*/


  get_footer();

 ?>