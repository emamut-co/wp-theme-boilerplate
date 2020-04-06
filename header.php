<!DOCTYPE html>
  <html lang="<?php language_attributes(); ?>" class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); wp_title(); ?></title>

    <?php wp_head(); ?>
  </head>
  <body>
    <script>
      wp_content = '<?php echo WP_CONTENT_URL ?>';
      myTheme = '<?php echo get_template_directory_uri() ?>';
    </script>

    <?php $url = ''; if(!is_home()) $url = get_site_url(); ?>

    <div ng-view>