<?php
add_theme_support('post-thumbnails');

function emamut_setup()
{
  load_theme_textdomain('emamut');
}
add_action('after_setup_theme', 'emamut_setup');

function add_theme_scripts()
{
  wp_enqueue_style('app', get_template_directory_uri() . '/dist/css/app.css');
  wp_enqueue_script(
    'app',
    get_template_directory_uri() . '/dist/js/app.js',
    [],
    1.1,
    true
  );
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

register_nav_menus([
  'primary' => __('Primary Menu', 'emamut'),
]);

function register_navwalker()
{
  require_once dirname(__FILE__) . '/helpers/rest_custom_endpoints.php';
  require_once dirname(__FILE__) . '/helpers/theme_admin_fields.php';
}
add_action('after_setup_theme', 'register_navwalker');

function config_custom_logo()
{
  add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'config_custom_logo');

function theme_get_custom_logo()
{
  if (has_custom_logo()) {
    $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');

    echo '<img class="img-fluid" id="logo" src="' .
      esc_url($logo[0]) .
      '" alt="' .
      get_bloginfo('name') .
      '">';
  } else {
    echo '<h1>' . get_bloginfo('name') . '</h1>';
  }
}

add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl()
{
  echo "<script type=\"text/javascript\">
      let siteURL = '" .
    get_site_url() .
    "',
      themePath = '" .
    get_template_directory_uri() .
    "'
    </script>";
}
