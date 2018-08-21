<!DOCTYPE html>
  <html lang="<?php language_attributes(); ?>" class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo( 'name' ); ?></title>

    <?php wp_head(); ?>
  </head>
  <body ng-app="app" data-spy="scroll" data-target="#navbar" data-offset="50">
    <script>
      wp_content = '<?php echo WP_CONTENT_URL ?>';
      myTheme = '<?php echo get_template_directory_uri() ?>';
      myViews = '<?php echo get_template_directory_uri() ?>/assets/js/views/';
    </script>

    <?php $url = ''; if(!is_home()) $url = get_site_url(); ?>

    <a id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <div class="loader"></div>

    <!-- Fixed navbar -->
    <nav id="navbar" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand nav-link" href="<?php echo $url ?>#main-slider">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" alt="<?php bloginfo('name')?>">
          </a>
        </div>
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right hidden-xs">
            <li><img src="<?php echo get_template_directory_uri() ?>/assets/img/icons.png" alt="Social" class="social-icons pull-right" usemap="#socialmap"></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle nav-link" id="showroom-nav" href="#showroom" role="button" aria-haspopup="true" aria-expanded="false">Showroom</a>
              <ul class="dropdown-menu hidden-xs" ng-controller="showroomController">
                <li ng-repeat="category in categories" ng-class="get_category_active_class(category.term_id, true)" ng-click="change_active_category(category.term_id)">
                  <a class="nav-link" href="<?php echo $url ?>#showroom">
                    <img class="img-responsive" src={{category.image}} alt={{category.slug}}>
                    <p>{{category.name}}</p>
                  </a>
                </li>
              </ul>
            </li>
            <li><a class="nav-link" href="<?php echo $url ?>#contact-form">Post Venta</a></li>
            <li><a class="nav-link" href="<?php echo $url ?>#quote">Cotizar</a></li>
            <li><a class="nav-link" href="<?php echo $url ?>#foton-sport">Foton Sport</a></li>
            <li><a class="nav-link" href="<?php echo $url ?>#news">Noticias</a></li>
            <li><a href="https://www.fotonecuador.com/subasta/" target="_blank">Subasta</a></li>
            <li><a href="https://automotoresyanexos.hiringroom.com/jobs" target="_blank">Trabaja con nosotros</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <map name="socialmap">
      <area target="_blank" alt="OLX" title="OLX" href="https://www.olx.com.ec" coords="13,15,14" shape="circle">
      <area target="_blank" alt="Facebook" title="Facebook" href="https://www.facebook.com/fotondelecuador" coords="50,13,14" shape="circle">
      <area target="_blank" alt="LinkedIn" title="LinkedIn" href="https://www.linkedin.com/company/11314376/" coords="87,14,14" shape="circle">
    </map>

    <div ng-view>