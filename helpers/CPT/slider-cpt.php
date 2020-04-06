<?php
// Register Custom Post Type
function slider()
{
  $labels = array(
    'name'                => _x( 'Slider', 'Post Type General Name', 'slider' ),
    'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'slider' ),
    'menu_name'           => __( 'Slider', 'slider' ),
    'name_admin_bar'      => __( 'Slider', 'slider' ),
    'parent_item_colon'   => __( 'Parent Item:', 'slider' ),
    'all_items'           => __( 'Todos Los Slides', 'slider' ),
    'add_new_item'        => __( 'Añadir Nuevo Slide', 'slider' ),
    'add_new'             => __( 'Añadir Nuevo', 'slider' ),
    'new_item'            => __( 'Nuevo Slide', 'slider' ),
    'edit_item'           => __( 'Editar Slide', 'slider' ),
    'update_item'         => __( 'Actualizar Slide', 'slider' ),
    'view_item'           => __( 'Ver Slide', 'slider' ),
    'search_items'        => __( 'Buscar Slide', 'slider' ),
    'not_found'           => __( 'No encontrado', 'slider' ),
    'not_found_in_trash'  => __( 'No encontrado en papelera', 'slider' ),
  );

  $args = array(
    'label'                 => __( 'Slider', 'slider' ),
    'description'           => __( 'Slider Custom Post Type', 'slider' ),
    'labels'                => $labels,
    'supports'              => array( 'author', 'revisions' ),
    'hierarchical'          => false,
    'public'                => false,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-format-gallery',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => false,
    'capability_type'       => 'post',
    'show_in_rest'          => true,
    'rest_base'             => 'slider-api',
    'rest_controller_class' => 'WP_REST_Posts_Controller'
  );
  register_post_type( 'slider', $args );
}
add_action( 'init', 'slider', 0 );