<?php
add_action( 'rest_api_init', function () {
  register_rest_route( 'slider/v1', '/get', array(
    'methods' => 'GET',
    'callback' => 'get_slider'
  ));
});

function get_slider()
{
  $args = array(
    'post_type' => 'slider',
  );
  $post_array = new WP_Query($args);

  $slide_array = array();
  if($post_array->post_count == 0)
    return array( 'http://via.placeholder.com/1200x600', 'http://via.placeholder.com/1200x600' );

  $post_array = $post_array->posts;

  foreach ($post_array as $post)
  {
    $post->custom_fields = get_post_custom($post->ID);
    $image = wp_get_attachment_image_src( $post->custom_fields['slide_slide'][0] , 'large' );

    $slide_array[] = $image[0];
  }

  return $slide_array;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'cars/v1', '/get_categories', array(
    'methods' => 'GET',
    'callback' => 'get_cars_categories'
  ));
});

function get_cars_categories()
{
  $terms = get_terms([
    'taxonomy' => 'category',
    'order' => 'DESC',
    'hide_empty' => true,
    'exclude' => 1
  ]);

  foreach ($terms as $term)
  {
    $image = get_wp_term_image( $term->term_id );
    $term->image = $image;
  }

  return $terms;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'cars/v1', '/get/(?P<id_category>\d+)', array(
    'methods' => 'GET',
    'callback' => 'get_cars',
    'params' => ['id_category']
  ));
});

function get_cars($request_data)
{
  $params = $request_data->get_params();
  $id_category = $params['id_category'];

  $args = array(
    'post_type' => 'car',
    'order' => 'ASC',
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field' => 'term_id',
        'terms' => $id_category
      )
    )
  );
  $post_array = new WP_Query($args);

  $post_array = $post_array->posts;

  foreach ($post_array as $post)
  {
    $post->custom_fields = get_post_custom($post->ID);
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

    if(isset($post->custom_fields['car_pdf'][0]))
      $post->custom_fields['pdf'] = wp_get_attachment_url( $post->custom_fields['car_pdf'][0] );

    if(!empty($post->custom_fields['car_ficha']))
      $post->custom_fields['car_ficha'] = unserialize($post->custom_fields['car_ficha'][0]);

    $post->custom_fields['slide_image'] = $image[0];
  }
  return $post_array;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'locations/v1', '/get', array(
    'methods' => 'GET',
    'callback' => 'get_locations'
  ));
});

function get_locations()
{
  $locations_array = array();
  $cities_array = get_terms('cities', array('orderby' => 'ID'));

  foreach ($cities_array as $key => $city)
  {
    $args = array(
      'post_type' => 'location',
      'orderby' => 'ID',
      'order' => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'cities',
          'field' => 'slug',
          'terms' => array($city->slug),
          'operator' => 'IN'
        )
      )
    );
    $post_array = new WP_Query($args);
    $locations_array[$city->name] = $post_array->posts;
  }

  return $locations_array;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'news_posts/v1', '/get', array(
    'methods' => 'GET',
    'callback' => 'get_news_posts',
  ));
});

function get_news_posts()
{
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 12
  );
  $post_array = new WP_Query($args);
  $post_array = $post_array->posts;

  foreach ($post_array as $post)
  {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
    $post->featured_image = $image[0];
  }

  return $post_array;
}