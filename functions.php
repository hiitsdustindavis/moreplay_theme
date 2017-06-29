<?php
/*
========================================
ENQUEUE SCRIPTS AND STYLES FUNCTION
========================================
*/
	function enqueue_files(){
	/*
	 wp_enqueue_style() has five arguments (separated by commas):
	 	1. $handle
		 		type: string (Required)
		 		purpose/use: It's the name the WordPress uses to identify and use the file
		 		note: A default behavior of this WordPress Standard function is that it will add '-css' to the end of the $handle

 		2. $src
	 			type: mixed (Optional)
	 			purpose/use: The directory location of the file
	 			note: Wordpress needs the absolute, not relative path, to locate the file. WordPress has a handy builtin function called get_template_directory_uri() that will print the directory of the current template location

			3. $deps
	 			type: array (Optional)
	 			purpose/use: An array within which we can specify the dependencies of the file.
	 			note: If there are no dependencies we can simply use and empty array: array(); Not quite sure what the dependencies might be?

			4. $ver
	 			type: mixed (Optional)
	 			purpose/use: Specify which version of your theme or the file? It's good to leave a "paper" trail.

			5. $media
	 			type: string (Optional)
	 			purpose/use: This is where we specify which type of media we want this style to display. i.e. print, mobile, all, etc.
	 			note: If we leave it blank the default is "all"
	 */
		wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), '1.0.0', 'all');
		wp_enqueue_style('jquery-ui-structure', get_template_directory_uri() . '/css/jquery-ui.structure.min.css', array(), '1.0.0', 'all');
		wp_enqueue_style('jquery-ui-theme', get_template_directory_uri() . '/css/jquery-ui.theme.min.css', array(), '1.0.0', 'all');
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '1.0.0', 'all');
		wp_enqueue_style('main-style', get_template_directory_uri() . '/css/all.css', array(). '1.0.0', 'all');

	/*
	 wp_enqueue_scripts() takes 5 arguments. All are the same as wp_enqueue_style() except the 5th which is a boolean that decides whether or not it will be printed in the footer. Default is false. It's better to print it in the footer. I wonder why the default is false?

	 Last Step:
	 in the footer.php add <?php wp_footer(); ?>
	 */
	 	wp_enqueue_script('jquery-main', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array('jquery'), '3.2.1', true);
		wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), '1.12.1', true);
		wp_enqueue_script('tether-util-js', get_template_directory_uri() . '/tether/src/js/utils.js', array('jquery'), '4.0.0', true);
		wp_enqueue_script('tether-js', get_template_directory_uri() . '/tether/src/js/tether.js', array('jquery'), '4.0.0', true);
		wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
	 	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);
	}


	/*
	 In order to execute the enqueue_files() function we need to use the WordPress hook, add_action(). It allows us to connect the WordPress execution process to custom functions. The WordPress execution process basically when it does stuff. Basically everytime WordPress does something there is a hook connecting to a function

	 add_action() takes 4 paramaeters: add_action( $hook, $function_to_add, $priority, $accepted_args );
	 1. $tag
	 		type: string (Required)
	 		purpose/use: The name of the action to which the $function_to_add is hooked.
	 		note:

	 2. $function_to_add
	 		type: string (Required)
	 		purpose/use: The name of the function we wish to be called
	 		note:

	 3. $priority
	 		type: int (Optional)
	 		purpose/use: Used to specify the order in which the functions associated with a particular action are executed.
	 		note: Lower numbers correspond with earlier execution, and functions with the same priority are executed in the order in which they were added to the action. Default value: 10.

	 4. $accepted_args
	 		type: int (Optional)
	 		purpose/use: The number of arguments the function accepts.
	 		note: Default value: 1

	 */
	add_action('wp_enqueue_scripts', 'enqueue_files');

	/*
	 Final Step:
	 	Add <?php wp_head(); ?> in the <head> tag of header.php to print the <link style...> tag
	*/


/*
	========================================
		REGISTER NAV BARS
	========================================
*/
function moreplay_theme_setup(){
// Here we are activating the theme support for menus to appear in the Appearance tab of the admin
//add_theme_support() has 10 premade arguments.
add_theme_support('menus');
//Register Nav Menu function takes two arguments the name to be referenced where ever the menu appears and the description.
register_nav_menu('primary', 'primary header navigation');
register_nav_menu('secondary', 'footer navigation');
}
// Alessandor keeps talking about these "moments" when WordPress does something. Seems critical to understand these moments. He specifies that in order for our moreplay_theme_setup() function to run we must use the 'init' or 'after_theme_setup' parameters in the add_action() function.
add_action('init', 'moreplay_theme_setup');



/*
	========================================
		THEME SUPPORT
	========================================
*/
//custom-background will make an option called "Background" appear in the appearance tab in the admin. With in the background options you choose an image and align / repeat it and/or you can select a background color.
//add_theme_support() doesn't need to live inside a function becuase it is just fine to be executed on initialization
add_theme_support('custom-background');

//custom-header allows the user to add a background image to the header
/*
after adding the theme support for custom-header you then must specify where the image should print with this code:

<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

the height, width, and alt object values are optional
*/
add_theme_support('custom-header');

/*
 post-thumbail makes the featured image option available on any post-thumbnails
 similar to custom-background you must specify within the template where the image is to print.
 here is an example of printing the thumbnail image:
 <div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?></div>
*/
add_theme_support('post-thumbnails');
// Link to add_theme_support in the codex: https://developer.wordpress.org/reference/functions/add_theme_support/

//post-format activates up to 9 different wordpress post formats
add_theme_support('post-formats', array('aside', 'image', 'video'));

/*
	========================================
		SIDEBAR FUNCTION
	========================================
*/

function moreplay_widget_setup() {

	register_sidebar(
		array(
		'name'  => 'sidebar', //name is the string that wordpress will use to reference it
		'id'    => 'sidebar-1', // id makes it a unique recongnizable element
		'class' => 'custom', //class will apply a class name to the widget wrapper of the backend. when it prints WP will prepend 'sidebar-' your class name
		'description' => 'sidebar', //useful to add instructions for the user to know how to use your widget
		//These last four parameters are super important because you can use them to control the markup
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',  //%1$s and %2$s are custom variables that are connected to the printf() function. They are connected to the id and class and both change based upon the developers spec
		'after_widget' => '</aside>',
		'before_title' => '<h1  class="widget-title">',
		'after_title' => '</h1>',
		)
	);
}

add_action('widgets_init','moreplay_widget_setup');
