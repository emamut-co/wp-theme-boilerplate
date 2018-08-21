<?php
function my_theme_register_required_plugins()
{
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(

    array(
      'name'      => 'CodePress Admin Columns',
      'slug'      => 'codepress-admin-columns',
      'required'  => true
    ),
    array(
      'name'      => 'MetaBox',
      'slug'      => 'meta-box',
      'required'  => true
    ),
    array(
      'name'      => 'MB Rest API',
      'slug'      => 'mb-rest-api',
      'required'  => true
    ),
    array(
      'name'      => 'Intuitive Custom Post Order',
      'slug'      => 'intuitive-custom-post-order',
      'required'  => true
    ),
    array(
      'name'      => 'Smush Image Compression and Optimization',
      'slug'      => 'wp-smushit',
      'required'  => true
    )

  );

  $config = array(
    'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => true,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
  );

  tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );