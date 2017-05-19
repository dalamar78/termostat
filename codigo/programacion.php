<?php
/**
 * pagina: programacion del termostato
 *
 * @autor Oscar Gonzalez <oskiyar78@gmail.com>
 * @package termostat
 * @version 0.1
 * @link  link a github
 * 
 */
 
 $PAG->ponFich_css('../assets/global/plugins/jsgrid/dist/jsgrid.min.css');
 //$PAG->ponFich_css('../assets/global/css/componentes.css');
  $PAG->ponFich_css('../assets/global/plugins/jt.timepicker/jquery.timepicker.css');
 $PAG->ponFich_css('../assets/global/plugins/material-design-iconic-font/dist/css/material-design-iconic-font.min.css');
 $PAG->ponFich_css('../assets/global/plugins/jt.timepicker/lib/site.css');
 $PAG->ponFich_css('../assets/global/plugins/jt.timepicker/lib/bootstrap-datepicker.css');
 $PAG->ponFich_css('../assets/global/plugins/jt.timepicker/jquery.timepicker.css');
 
 $PAG->ponFich_js("../assets/global/js/global/db.js");
 $PAG->ponFich_js("../assets/global/plugins/jsgrid/dist/jsgrid.min.js");
 $PAG->ponFich_js("../assets/global/js/global/jsgrid.js");

 $PAG->ponFich_js("../assets/global/plugins/jt.timepicker/lib/bootstrap-datepicker.js");
 $PAG->ponFich_js("../assets/global/plugins/jt.timepicker/lib/site.js");
  $PAG->ponFich_js("../assets/global/plugins/jt.timepicker/jquery.timepicker.js");


 $sql= "SELECT temperatura, humedad FROM temperaturas WHERE id=( SELECT max(id) FROM temperaturas);";
 $SQL->consulta($sql);
 $valoresTemp = $SQL->extrae();
 
   $html=' 
   
   <div class="site-content-title">
                    <h2 class="float-xs-left content-title-main">Programador</h2>
                    <!-- START BREADCRUMB -->
                    <ol class="breadcrumb float-xs-right">
                        <li class="breadcrumb-item">
                            <span class="fs1" aria-hidden="true" data-icon=""></span>
                            <a href="'.$CFG['ruta_index'].'?modulo=escritorio">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Programación</a></li>
                       
                    </ol>
                    <!-- END BREADCRUMB -->
                </div>
                <!-- END PAGE TITLE -->
                <div class="content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h4 class="page-content-title">Listado</h4>
                            <p>recuerde activar  el modo programdor <code>programador</code></p>
							<p>formato de la hora <code>hh:mm:ss</code></p>
                            <div id="jsGridBasic"></div>
                        </div>
                    </div>
                </div>

              
                    ';
$js="$('#basicExample').timepicker();";
$PAG->ponCodigojs($js);
$PAG->ponTitulo('Programación');
$PAG->ponCentro($html);