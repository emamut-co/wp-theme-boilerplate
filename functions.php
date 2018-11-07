<?php
require_once dirname( __FILE__ ) . '/helpers/TGM-Plugin-Activation-2.6.1/class-tgm-plugin-activation.php';

require_once dirname( __FILE__ ) . '/helpers/required-plugins.php';
// require_once dirname( __FILE__ ) . '/helpers/rest_custom_endpoints.php';

require_once dirname( __FILE__ ) . '/helpers/slider-cpt.php';
require_once dirname( __FILE__ ) . '/helpers/slider-metabox.php';

add_theme_support( 'post-thumbnails' );

function emamut_setup()
{
  load_theme_textdomain( 'emamut' );
}
add_action( 'after_setup_theme', 'emamut_setup' );

function add_theme_scripts()
{
  wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), '1.1', 'all');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css', array(), '1.1', 'all');

  wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');

  // wp_enqueue_script('angular', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js', array (), 1.1, true);
  // wp_enqueue_script('angular-resource', 'https://code.angularjs.org/1.7.2/angular-resource.min.js', array (), 1.1, true);
  // wp_enqueue_script('angular-sanitize', 'https://code.angularjs.org/1.7.2/angular-sanitize.min.js', array (), 1.1, true);

  wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array (), 1.1, true);
  wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array (), 1.1, true);
  wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array (), 1.1, true);

  // wp_enqueue_script('app.js', get_template_directory_uri() . '/assets/js/app.js', array (), 1.1, true);
  wp_enqueue_script('helpers.js', get_template_directory_uri() . '/assets/js/helpers.js', array (), 1.1, true);

  // $controllers_folder = '/assets/js/controllers/';
  // $files = array_diff(scandir(dirname( __FILE__ ) . $controllers_folder), array('.', '..'));

  // foreach($files as $key => $file)
  //   wp_enqueue_script($file, get_template_directory_uri() . $controllers_folder . $file, array (), 1.1, true);

  // $models_folder = '/assets/js/models/';
  // $files = array_diff(scandir(dirname( __FILE__ ) . $models_folder), array('.', '..'));

  // foreach($files as $key => $file)
  //   wp_enqueue_script($file, get_template_directory_uri() . $models_folder . $file, array (), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );