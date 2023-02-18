<?php


function add_widget_Support() {
    register_sidebar( array(
                    'name'          => 'Sidebar',
                    'id'            => 'sidebar',
                    'before_widget' => '<div>',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2>',
                    'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'add_Widget_Support' );

function add_Main_Nav() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'add_Main_Nav' );


function custom_style_assets(){
    wp_enqueue_style('style',get_stylesheet_uri(), array(), '1.0');
}
add_action('wp_enqueue_scripts','custom_style_assets');


function grid_system_assets(){
    wp_enqueue_style('abril-grid-system', get_template_directory_uri() . '/assets/css/grid-system.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action('wp_enqueue_scripts','grid_system_assets');


wp_enqueue_script('twentytwentyone-customize-helpers', get_template_directory_uri() . '/assets/js/custom.js', array(), wp_get_theme()->get( 'Version' ), true);

?>