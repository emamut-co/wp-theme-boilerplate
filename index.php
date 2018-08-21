<?php include_once 'helpers/quote.php';
  get_header(); ?>

  <section id="slider">
    <div class="container">
      <div id="main-slider" class="carousel slide" data-ride="carousel" ng-controller="sliderController">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#main-slider" data-slide-to="{{key}}" ng-class="{'active' : $first}" ng-repeat="(key, slide) in slides"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div ng-class="$first ? 'item active' : 'item'" ng-repeat="(key, slide) in slides">
            <img src={{slide}} alt="...">
          </div>
        </div>

        <a class="left carousel-control" href="#main-slider" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#main-slider" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="side left hidden-xs">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/foton-logo.png" alt="Foton">
        <span>INTERNACIONAL</span>
      </div>
      <div class="side right hidden-xs">
        <span>CONOCE TODO SOBRE NUESTRO POTENTE MOTOR</span>
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/cummins-logo.png" alt="Cummins">
      </div>
    </div>
  </section>

  <section id="showroom" ng-controller="showroomController">
    <div class="container">
      <div class="row mt-30">
        <div class="col-md-4">
          <h2>{{active_category.name}}</h2>
        </div>
        <div class="col-md-8 mt-30">
          <ul class="showroom-categories-menu">
            <li class="col-xs-4 col-md-2" ng-repeat="category in categories" ng-class="get_category_active_class(category.term_id)" ng-click="change_active_category(category.term_id)">
              <img class="img-responsive" src={{category.image}} alt={{category.slug}}>
              <p>{{category.name}}</p>
            </li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div id="cars-slider" class="carousel slide" data-ride="carousel" ng-controller="sliderController">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#cars-slider" data-slide-to="{{key}}" ng-class="{'active' : $first}" ng-repeat="(key, car) in cars"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div ng-class="$first ? 'item active' : 'item'" ng-repeat="(key, car) in cars">
              <img src={{car.custom_fields.slide_image}} alt="...">
              <div class="carousel-caption">
                <h3>{{car.post_title}}</h3>
                <div class="well hidden-xs">
                  <h4>FICHA TÉCNICA</h4>
                  <ul>
                    <li ng-repeat="item in car.custom_fields.car_ficha">{{item}}</li>
                  </ul>
                  <span class="label label-danger">{{car.custom_fields.car_prize[0] | currency}}</span>
                </div>
                <a href="#quote" class="nav-link btn btn-cotizar">COTIZAR</a>
                <i class="fa fa-caret-down fa-3x triangle" ng-if="car.custom_fields.pdf"></i>
                <a class="pdf-icon" href="{{car.custom_fields.pdf}}" ng-if="car.custom_fields.pdf" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/img/pdf-icon.png" alt="Descargar Ficha Técnica"></a>
              </div>
            </div>
          </div>

          <a class="left carousel-control" href="#cars-slider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#cars-slider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <img class="cummins-logo hidden-xs" src="<?php echo get_template_directory_uri() ?>/assets/img/cummins-logo.png" alt="Cummins">
      </div>
      <img class="light hidden-xs" src="<?php echo get_template_directory_uri() ?>/assets/img/faro.jpg" alt="Foton">
    </div>
  </section>

  <section id="contact-form" ng-controller="contactFormController">
    <div class="container">
      <div class="row">
        <div class="col-md-6 locations">
          <h2>TALLERES</h2>
          <div class="wrapper">
            <div class="city" ng-repeat="(key, city) in locations">
              <h3>{{key}}</h3>
              <ul>
                <li class="store" ng-repeat="(key, store) in city">
                  <h4>{{store.post_title}}<span></span></h4>
                  <p ng-bind-html="store.post_content"></p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 contact-form">
          <h3>Agenda <br>tu cita</h3>
            <?php echo do_shortcode('[contact-form-7 id="2904" title="Agenda tu cita"]') ?>;
          <img class="foton-total-care" src="<?php echo get_template_directory_uri() ?>/assets/img/foton-total-care.png" alt="Foton Total Care">
        </div>
      </div>
    </div>
  </section>

  <section id="quote" ng-controller="quoteController">
    <div class="container">
      <h2>COTIZAR</h2>
      <div id="cotizador">
          <form action="<?php echo get_site_url() ?>" method="post" onsubmit="return validarForm()" >
              <p><label for="nombre">Nombre: <span>*</span> <br><input name="nombre" id="nombre"
                                                                        value="<?php echo $nombre; ?>"
                                                                        required></label></p>
              <p><label for="cedula">Cedula/RUC: <span>*</span> <br><input name="cedula" id="cedula"
                                                                            value="<?php echo $cedula; ?>"
                                                                            required></label></p>
              <p><label for="email">Email: <span>*</span> <br><input type="email" name="email"
                                                                      id="email"
                                                                      value="<?php echo $email; ?>"
                                                                      required></label></p>
              <p><label for="cedula">Teléfono: <span>*</span> <br><input name="telefono" id="telefono"
                                                                            value="<?php echo $telefono; ?>"
                                                                            required></label></p>
              <p><label for="edad">Edad: <span>*</span> <br><input type="number" min="18" name="edad"
                                                                    id="edad"
                                                                    value="<?php echo empty( $edad ) ? '' : $edad; ?>"
                                                                    required></label></p>
              <p><label for="tipo_cliente">Tipo cliente: <span>*</span> <br>
                      <select name="tipo_cliente" id="tipo_cliente" required>
                          <option value="">Elegir un tipo</option>
    <?php
    foreach ( $arrTipoCliente as $val ) {
      echo "<option value='{$val}'";
      echo ( $val == $tipoCliente ) ? ' selected' : '';
      echo ">{$val}</option>";
    }
    ?>
                      </select>
                  </label></p>
              <p><label for="ciudad">Ciudad: <span>*</span> <br>
                      <select name="ciudad" id="ciudad" required>
                          <option value="">Elegir una ciudad</option>
    <?php
    foreach ( $arrCiudad as $key => $val ) {
      echo "<option value='{$key}'";
      echo ( $key == $ciudad ) ? ' selected' : '';
      echo ">{$key}</option>";
    }
    ?>
                      </select>
                  </label></p>
              <p><label>Marca:</label><span class="field">FOTON</span></p>
              <p><label for="modelo">Modelo: <span>*</span> <br>
                      <select name="modelo" id="modelo" required>
                          <option value="">Elegir un modelo</option>
    <?php
    foreach ( $arrModelos as $key => $arrVal ) {
      echo "<optgroup label='{$key}'>";
      foreach ( $arrVal as $val ) {
        echo "<option value='{$val}'";
        echo ( $val == $modelo ) ? ' selected' : '';
        echo ">{$val}</option>";
      }
      echo "</optgroup>";
    }
    ?>
                      </select>
                  </label></p>
              <p><label for="anio">Año: <span>*</span> <br>
                      <select name="anio" id="anio" required>
                          <option value="">Elegir un año</option>
    <?php
    foreach ( $arrAnios as $val ) {
      echo "<option value='{$val}'";
      echo ( $val == $anio ) ? ' selected' : '';
      echo ">{$val}</option>";
    }
    ?>
                      </select>
                  </label></p>
              <p><label>Tipo de vehículo:</label><span class="field"
                                                            id="tipo_vehiculo"><?php echo $tipoVehiculo ?></span>
              </p>
              <p><label for="valor">Valor del vehículo: <span>*</span> <br><input type="number"
                                                                                  min="0" name="valor"
                                                                                  id="valor"
                                                                                  value="<?php echo empty( $valor ) ? '' : $valor; ?>"
                                                                                  required></label>
              </p>
              <p><label for="accesorios">Accesorios: <br><input type="number" name="accesorios"
                                                                min="0" id="accesorios"
                                                                value="<?php echo empty( $accesorios ) ? '' : $accesorios; ?>"></label>
              </p>
              <div>
                  <h3>Condiciones del crédito</h3>
              </div>
              <p><label>Valor mínimo de entrada (20% del total):</label><span
                          class="field">$ <span
                              id="minimo_entrada"><?php echo $minimoEntrada ?></span></span></p>
              <p><label for="valor">Entrada: <span>*</span> <br><input type="number" min="0"
                                                                        name="entrada" id="entrada"
                                                                        value="<?php echo empty( $entrada ) ? '' : $entrada; ?>"
                                                                        required></label></p>
              <p><label for="plazo_credito">Plazo crédito (en meses): <span>*</span> <br>
                      <select name="plazo_credito" id="plazo_credito" required>
                          <option value="">Elegir un plazo</option>
    <?php
    foreach ( $arrPlazo as $val ) {
      echo "<option value='{$val}'";
      echo ( $val == $plazoCredito ) ? ' selected' : '';
      echo ">{$val}</option>";
    }
    ?>
                      </select>
                  </label></p>
              <div>
                  <h3>Datos del seguro</h3>
              </div>
              <p>Seguro Fotón:<span class="seguroFoton"><input type="checkbox" value="1"
                                                                    id="seguro_foton"
                                                                    name="seguro_foton" <?php if ( ! $enviado ) {
    echo 'checked';
  } elseif ( $seguro ) {
    echo 'checked';
  } ?>><label for="seguro_foton"></label></span></p>
              <p><label>Plazo seguro vehículo:</label><span class="field"
                                                                id="plazo_seguro"><?php if ( ! $enviado ) {
    echo '&nbsp;';
  } elseif ( $seguro ) {
    echo "{$plazoSeguro} meses";
  } else {
    echo 'NO APLICA';
  } ?></span></p>
              <p><label>Plazo seguro desgravamen:</label><span class="field"
                                                                    id="plazo_desgravamen"><?php if ( ! $enviado ) {
    echo '&nbsp;';
  } elseif ( $seguro ) {
    echo "{$plazoDesgravamen} meses";
  } else {
    echo 'NO APLICA';
  } ?></span></p>
              <p><label for="aseguradora">Aseguradora: <span <?php if ( $enviado && !$seguro ) {
    echo 'style="display:none;"';
  } ?>>*</span> <br>
                      <select name="aseguradora" id="aseguradora"
                              required <?php if ( $enviado && !$seguro ) {
    echo 'disabled';
  } ?>>
                          <option value="">Elegir una aseguradora</option>
    <?php
    foreach ( $arrAseguradoras as $val ) {
      echo "<option value='{$val}'";
      echo ( $val == $aseguradora ) ? ' selected' : '';
      echo ">{$val}</option>";
    }
    ?>
                      </select>
                  </label></p>
              <p><label for="uso_furgoneta" <?php if(!$enviado){ echo 'style="display:none;"'; } elseif($tipoVehiculo!='FURGONETA'){ echo 'style="display:none;"'; } ?>>Uso de la furgoneta: <span>*</span> <br>
                      <select name="uso_furgoneta" id="uso_furgoneta" required <?php if(!$enviado){ echo 'disabled'; } elseif($tipoVehiculo!='FURGONETA'){ echo 'disabled'; } ?>>
                          <option value="">Elegir un uso</option>
                  <?php
                  foreach ( $arrUsoFurgoneta as $val ) {
                    echo "<option value='{$val}'";
                    echo ( $val == $usoFurgoneta ) ? ' selected' : '';
                    echo ">{$val}</option>";
                  }
                  ?>
                      </select>
                  </label></p>
              <input type="hidden" name="enviado" value="1">
              <div><button id="submit" class="button">Cotizar</button></div>
          </form>
        <?php if($enviado): ?>
              <div id="cotizacion">
                  <h2>Cotización</h2>
                  <?php if(empty($cuotaMesesGracia)) : ?>
                      <h4>Cuota mensual: $<?php echo number_format($cuotaMensual,'2', ',','.') ?></h4>
                  <?php else : ?>
                      <h4>Cuota 3 primeros meses: $<?php echo number_format($cuotaMesesGracia,'2', ',','.') ?></h4>
                      <h4>Cuota a partir del 4° mes: $<?php echo number_format($cuotaMensual,'2', ',','.') ?></h4>
                  <?php endif; ?>
                  <h4>Monto a financiar: $<?php echo number_format($montoFinanciar,'2', ',','.') ?></h4>
                  <table>
                      <thead>
                          <tr>
                              <th>&nbsp;</th>
                              <th>Valor financiado</th>
                              <th>Porcentaje financiado</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <th>VEHICULO</th>
                              <td>$<?php echo number_format($financiamientoVehiculo,'2', ',','.') ?></td>
                              <td><?php echo number_format($porcentajeFinanciamientoVehiculo,'2', ',', '.') ?>%</td>
                          </tr>
                          <tr>
                              <th>GASTOS ADMINISTRATIVOS</th>
                              <td>$<?php echo number_format($valorCostosAdm,'2', ',','.') ?></td>
                              <td>100%</td>
                          </tr>
                          <tr>
                              <th>SEGURO</th>
                              <td>$<?php echo number_format($financiamientoSeguro,'2', ',','.') ?></td>
                              <td>100%</td>
                          </tr>
                      </tbody>
                  </table>
                  <button onclick="nuevaCotizacion()" class="button">Cotizar nuevamente</button>
              </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="cummins-section">
      <div class="container">
        <div class="col-md-3">
          <img class="cummins-big-logo" src="<?php echo get_template_directory_uri() ?>/assets/img/cummins-logo.png" alt="Motor Cummins">
        </div>
        <div class="col-md-6">
          <img class="cummins-motor" src="<?php echo get_template_directory_uri() ?>/assets/img/cummins-motor.png" alt="Motor Cummins">
        </div>
        <div class="col-md-3">
          <div class="technical-details">
            <h3>FICHA TÉCNICA</h3>
            <ul>
              <li>Limpios, eficientes y siempre confiables, los motores Cummins son la muestra de cómo se hace el trabajo duro. </li>
              <li>Nuestras divisiones “Dentro de Carretera”, “Fuera de Carretera” y “Marinos”, dan potencia a todo desde los camiones mineros de 360 toneladas hasta ambulancias, y a una línea completa de motores diésel marinos comerciales y recreativos.</li>
              <li>Todos nuestros motores están protegidos por nuestras partes <strong>Genuinas Cummins.</strong></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="foton-sport">
    <div class="container">
      <div class="row mt-30">
        <img class="foton-sport-logo img-responsive" src="<?php echo get_template_directory_uri() ?>/assets/img/foton-sport.png" alt="Foton Sports"></div>
      <div class="row">
        <div class="col-md-12">
          <?php echo do_shortcode('[Rich_Web_Video id="1"]');?>
        </div>
      </div>
    </div>
  </section>

  <section id="news" ng-controller="newsController">
    <div class="container">
      <h2>NOTICIAS</h2>
      <div class="row">
        <div class="col-md-12">
          <div class="well">
            <div id="myCarousel" class="carousel slide">
              <!-- Carousel items -->
              <div class="carousel-inner">
                <div class="item" ng-class="{'active' : $first}" ng-repeat="item in postsChunk">
                  <div class="row">
                    <div class="col-md-3 col-xs-12 post thumbnail" ng-repeat="post in item" ng-click="goToPost(post.guid)">
                      <img ng-if="post.featured_image" class="img-responsive" src={{post.featured_image}} alt={{post.post_name}}>
                      <div class="caption">
                        <h4 ng-bind-html="post.post_title"></h4>
                        <p class="date">Publicado: {{post.post_date}}</p>
                        <p class="content" ng-bind-html="post.post_content | limitTo: 100"></p>
                      </div>
                    </div>
                  </div>
                  <!--/row-->
                </div>
                <!--/item-->
              </div>
              <!--/carousel-inner-->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
          </div>
          <!--/myCarousel-->
        </div>
        <!--/well-->
        </div>
      </div>
    </div>
  </section>

  <script>
    var errEntrada = false;

    jQuery(document).ready(function ($) {

      $('#modelo').change(function () {
        var tipoVehiculo = $(':selected', this).parent();
        var label = tipoVehiculo.attr('label');
        var objUsoFurgoneta = $('#uso_furgoneta');

        // Solo existe label para los elementos dentro de un optgroup
        if (label) {
          $('#tipo_vehiculo').html(label);
          if (label === 'FURGONETA') {
            objUsoFurgoneta.attr('disabled', false);
            objUsoFurgoneta.parent().show();
          }
          else {
            objUsoFurgoneta.attr('disabled', 'disabled');
            objUsoFurgoneta.parent().hide();
          }
        }
        else {
          $('#tipo_vehiculo').html('&nbsp;');
          objUsoFurgoneta.attr('disabled', 'disabled');
          objUsoFurgoneta.parent().hide();
        }
      });

      var minimoEntrada = <?php echo is_nan(floatval($minimoEntrada)) ? 0 : floatval($minimoEntrada); ?>;
      $('#valor, #accesorios').blur(function () {
        var valorEntrada = parseFloat($('#valor').val()) || 0;
        var valorAccesorios = parseFloat($('#accesorios').val()) || 0;
        var valorTotal = valorEntrada + valorAccesorios;
        var objEntrada = $('#entrada');
        minimoEntrada = Math.ceil(valorTotal * <?php echo $porcentajeEntrada ?>);
        $('#minimo_entrada').html(Number(minimoEntrada).toLocaleString('ec'));

        var valEntrada = parseFloat(objEntrada.val());
        if (isNaN(valEntrada) || valEntrada === 0)
          objEntrada.val(minimoEntrada);
      });

      $('#entrada').blur(function () {
        var objEntrada = $(this);
        var valorEntrada = parseFloat(objEntrada.val()) || 0;
        if ((valorEntrada < minimoEntrada) && (errEntrada !== true)) {
          objEntrada.parent().append('<span style="display:block">El valor de la entrada no puede ser menor que el mínimo</span>');
          errEntrada = true;
        }
        else if (valorEntrada >= minimoEntrada) {
          objEntrada.next().remove();
          errEntrada = false;
        }
      });

      $('#plazo_credito, #seguro_foton').change(function () {
        var valPlazoCredito = parseInt($('#plazo_credito').val()) || 0;
        var mesesPlazo = 0;
        var objSeguroFoton = $('#seguro_foton');
        var objPlazoSeguro = $('#plazo_seguro');
        var objPlazoDesgravamen = $('#plazo_desgravamen');
        var objAseguradora = $('#aseguradora');
        if (objSeguroFoton.prop('checked') && (valPlazoCredito > 0)) {
          if (valPlazoCredito <= 12) {
            mesesPlazo = 12;
          }
          else if (valPlazoCredito <= 24) {
            mesesPlazo = 24;
          }
          else {
            mesesPlazo = valPlazoCredito;
          }

          objPlazoSeguro.html(mesesPlazo + ' meses');
          objPlazoDesgravamen.html(mesesPlazo + ' meses');
          objAseguradora.prop('disabled', false);
          objAseguradora.parent().find('span').show();
        }
        else {
          if (!objSeguroFoton.prop('checked')) {
            objPlazoSeguro.html('NO APLICA');
            objPlazoDesgravamen.html('NO APLICA');
            objAseguradora.attr('disabled', 'disabled');
            objAseguradora.parent().find('span').hide();
          }
          else {
            objPlazoDesgravamen.html('&nbsp;');
            objPlazoSeguro.html('&nbsp;');
            objAseguradora.prop('disabled', false);
            objAseguradora.parent().find('span').show();
          }
        }
      });

      var enviado = '<?php echo $enviado ?>';
      if (enviado) {
        $('#cotizador input, #cotizador select').each(function () {
          $(this).attr('disabled', 'disabled');
        });
        $('#submit').hide();
        $('html, body').animate({
          scrollTop: $("#cotizacion").offset().top
        }, 0);
      }
    });

    function nuevaCotizacion() {
      var valTipoVehiculo = jQuery('#tipo_vehiculo').html();
      jQuery('#cotizador input, #cotizador select').each(function () {
        var objItem = jQuery(this);
        if (objItem.attr('id') !== 'uso_furgoneta')
          objItem.attr('disabled', false);
        else if (valTipoVehiculo === 'FURGONETA')
          objItem.attr('disabled', false);
      });
      jQuery('#submit').show();
      jQuery('#cotizacion').hide();
      jQuery('html, body').animate({
        scrollTop: jQuery(".entry-header").offset().top
      }, 200);
    }

    function validarForm() {
      jQuery('#entrada').blur();
      if (errEntrada === true)
        return false;
    }
  </script>
<?php get_footer() ?>