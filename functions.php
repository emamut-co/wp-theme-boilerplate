<?php
require_once dirname( __FILE__ ) . '/helpers/TGM-Plugin-Activation-2.6.1/class-tgm-plugin-activation.php';

require_once dirname( __FILE__ ) . '/helpers/required-plugins.php';
require_once dirname( __FILE__ ) . '/helpers/rest_custom_endpoints.php';

require_once dirname( __FILE__ ) . '/helpers/slider-cpt.php';
require_once dirname( __FILE__ ) . '/helpers/slider-metabox.php';

require_once dirname( __FILE__ ) . '/helpers/car-cpt.php';
require_once dirname( __FILE__ ) . '/helpers/car-metabox.php';
require_once dirname( __FILE__ ) . '/helpers/location-cpt.php';

add_theme_support( 'post-thumbnails' );

function fotonecuador_setup()
{
  load_theme_textdomain( 'fotonecuador' );
}
add_action( 'after_setup_theme', 'fotonecuador_setup' );

function add_theme_scripts()
{
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/libs/bootstrap/css/bootstrap.min.css', array(), '1.1', 'all');
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/libs/fontawesome/css/font-awesome.min.css', array(), '1.1', 'all');

  wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');

  wp_enqueue_script('angular', get_template_directory_uri() . '/assets/libs/angular/angular.min.js', array (), 1.1, true);
  wp_enqueue_script('angular-resource', get_template_directory_uri() . '/assets/libs/angular/angular-resource.min.js', array (), 1.1, true);
  wp_enqueue_script('angular-sanitize', get_template_directory_uri() . '/assets/libs/angular/angular-sanitize.min.js', array (), 1.1, true);

  wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/libs/jquery/jquery-3.2.1.min.js', array (), 1.1, true);
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/libs/bootstrap/js/bootstrap.min.js', array (), 1.1, true);
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/libs/bootstrap/bootstrap-hover-dropdown.min.js', array (), 1.1, true);
  wp_enqueue_script('lodash', get_template_directory_uri() . '/assets/libs/lodash/lodash.min.js', array (), 1.1, true);

  wp_enqueue_script('helpers.js', get_template_directory_uri() . '/assets/js/helpers.js', array (), 1.1, true);

  wp_enqueue_script('app.js', get_template_directory_uri() . '/assets/js/app.js', array (), 1.1, true);

  $controllers_folder = '/assets/js/controllers/';
  $files = array_diff(scandir(dirname( __FILE__ ) . $controllers_folder), array('.', '..'));

  foreach($files as $key => $file)
    wp_enqueue_script($file, get_template_directory_uri() . $controllers_folder . $file, array (), 1.1, true);

  $models_folder = '/assets/js/models/';
  $files = array_diff(scandir(dirname( __FILE__ ) . $models_folder), array('.', '..'));

  foreach($files as $key => $file)
    wp_enqueue_script($file, get_template_directory_uri() . $models_folder . $file, array (), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}