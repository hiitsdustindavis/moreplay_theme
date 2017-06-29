<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php wp_head(); ?>
  </head>

  <?php
    if ( is_front_page() ):
    // if( is_home() ):
      // the is_home() function determines the home page to be the page that has the loop housing the posts. This means that the Home Page, as well as About and Work will get the class 'interior-page-class'. The Blog page will get the classes 'main-home-class' and 'secondary-home-class'
      // To exhibit the desired behavior of displaying the home classs on the home page we should is_front_page() instead of is_home().
      $custom_body_class = array('main-home-class', 'secondary-home-class');
    else:
      $custom_body_class = array('interior-page-class');
    endif;

  ?>

  <body <?php body_class( $custom_body_class ); ?> >
    <!--
     body_class() is amazing! it adds the class of whichever page or post you are on.
     It accepts an array of class name parameters: https://developer.wordpress.org/reference/functions/body_class/
     body_class(array('my-first-class', 'my-second-class'));
    -->
    <header>
      <section class="container">
        <h1>This is the header!</h1>
        <!--
        wp_nav_menu() accepts an array of a ton of parameters. Remember the '=>' operator signifies a key=>value pair.
        theme_location is a preset key and its value must match the specific name you created
        See the codex: https://developer.wordpress.org/reference/functions/wp_nav_menu/
        -->
      <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
      </section>
    </header>
