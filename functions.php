<?php
define( 'TRAININGTRIANGLE_CSS', get_template_directory_uri().'/css/' );
define( 'TRAININGTRIANGLE_JS', get_template_directory_uri().'/js/' );
define( 'TRAININGTRIANGLE_DIR', get_template_directory() );


if ( ! function_exists( 'trainingtriangle_setup' ) ) :

	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	* If you're building a theme based on trainingtriangle, use a find and replace
	* to change 'trainingtriangle' to the name of your theme in all the template files.
	*/
	function trainingtriangle_setup() {
		load_theme_textdomain( 'trainingtriangle', get_template_directory() . '/languages' );	
	}

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

	// Register Menu
	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Triangle Main Menu', 'trainingtriangle' ),
			'header-menu' => esc_html__( 'Triangle Header Menu', 'trainingtriangle' )
		)
	);
	
	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	// Add Custom Image Size.
	add_image_size( 'trainingtriangle-large', 1140, 570, true );
	add_image_size( 'trainingtriangle-medium', 850, 550, true );
endif;
add_action( 'after_setup_theme', 'trainingtriangle_setup' );

//Register widget area.
if(!function_exists('trainingtriangle_widgets_init')):
    function trainingtriangle_widgets_init() {

        register_sidebar(array(
                'name'          => esc_html__( 'Sidebar', 'trainingtriangle' ),
                'id'            => 'sidebar',
                'description'   => esc_html__( 'Widgets in this area will be shown on Sidebar.', 'trainingtriangle' ),
                'before_title'  => '<h3 class="widget_title">',
                'after_title'   => '</h3>',
                'before_widget' => '<div id="%1$s" class="widget %2$s" >',
                'after_widget'  => '</div>'
            )
		);
		
        register_sidebar(array(
            'name'          => esc_html__( 'Footer', 'trainingtriangle' ),
            'id'            => 'triangle-footer',
            'description'   => esc_html__( 'Widgets in this area will be shown before Bottom 4.' , 'trainingtriangle'),
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
            'before_widget' => '<div class="bottom-widget"><div id="%1$s" class="widget %2$s" >',
            'after_widget'  => '</div></div>'
            )
		);
		
    }
    add_action('widgets_init','trainingtriangle_widgets_init');
endif;

//Enqueue scripts and styles.
if(!function_exists('trainingtriangle_style')):

    function trainingtriangle_style(){

        wp_enqueue_style( 'default-google-font', '//fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700' );
        # CSS
        wp_enqueue_style( 'trainingtriangle-main', TRAININGTRIANGLE_CSS . 'main.css',false,'all');
		wp_enqueue_style( 'trainingtriangle-style',get_stylesheet_uri());
		
        # JS
        wp_enqueue_script('trainingtriangle-main',TRAININGTRIANGLE_JS.'main.js',array(),false,true);
	
	}
    add_action('wp_enqueue_scripts','trainingtriangle_style');

endif;


// Adds custom classes to the array of body classes.
function trainingtriangle_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'trainingtriangle_body_classes' );
require TRAININGTRIANGLE_DIR . '/inc/core-function.php';
