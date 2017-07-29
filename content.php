<!-- <section class="container">
  <h3><?php the_title();?></h3>
  <small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> in <?php the_category(); ?></small>
  <p><?php the_content(); ?></p>
</section>
 -->

<div class="post">
  <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
  <div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?></div>
  <small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> in <?php the_category(); ?></small>
  <p><?php the_content(); ?></p>
</div>
