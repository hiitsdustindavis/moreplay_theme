<?php get_header(); ?>
<section class="main container">This is index.php
  <div class="row">
    <div class="col-md-9">

    <?php

    if( have_posts() ):

      while( have_posts() ): the_post();

      // get_template_part will look for a php file starting with 'content'.
      // If get_post_format() has a value then get_template_part() will look for a php file called 'content-something'.
      // The 'something' will be one of the 9 Wordpress Post formats. This is super cool becuase with one little piece of code you can control the rendering of multiple post formats

        get_template_part('content', get_post_format());

      endwhile;

    endif;

    ?>

  </div>
  <div class="col-md-3">
    <?php get_sidebar(); ?>
  </div>
</div>
</section>
<?php get_footer(); ?>
