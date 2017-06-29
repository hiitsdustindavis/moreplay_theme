<?php get_header(); ?>
<section class="container"> This is page.php
  <?php

  $postCat = new WP_Query('type=post&post_per_page=-1');

  if( $postCat->have_posts() ):

    while( $postCat->have_posts() ): $postCat->the_post();

      get_template_part('content');

    endwhile;

  endif;

  ?>
</section>
<?php get_footer(); ?>
