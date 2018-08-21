<?php
function slider_register_meta_boxes($meta_boxes)
{
  $prefix = 'slide_';

  $meta_boxes[] = array(
    'id'         => 'slider',
    'title'      => 'Slider',
    'post_types' => 'slider',
    'context'    => 'normal',
    'priority'   => 'high',
    'fields'     => array(
      array(
        'name'              => 'Imagen',
        'id'                => $prefix . 'slide',
        'type'              => 'image_upload',
        'max_status'        => false,
        'max_file_uploads'  => 1,
        'image_size'        => 'medium'
      )
    )
  );

  return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'slider_register_meta_boxes' );