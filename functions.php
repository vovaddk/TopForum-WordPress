<?php
add_action('wp_enqueue_scripts', 'topforum_styles');
add_action('wp_enqueue_scripts', 'topforum_scripts');
function topforum_styles()
{
  wp_enqueue_style('topforum_styles', get_stylesheet_uri());
}
;
function topforum_scripts()
{
  wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.1.min.js', array(), '3.6.1', true);
  wp_enqueue_script('topforum-script', get_template_directory_uri() . '/index.js', array('jquery'), false, true);
}
;
add_theme_support('menus');

?>