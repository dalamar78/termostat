<?php
if (strstr($_SERVER['PHP_SELF'], 'entorno.php')) 
	die ('No puedes acceder directamente a este archivo!');

// Representamos los formularios de entrada/salida según proceda
include_once('clases/paginaHtml.php');
$PAG = new paginaHtml();



$PAG->ponFich_css('../assets/global/plugins/bootstrap/dist/css/bootstrap.min.css');
$PAG->ponFich_css('../assets/icons_fonts/elegant_font/elegant.min.css');
$PAG->ponFich_css('../assets/layouts/layout-top-menu/css/color/light/color-default.min.css');
$PAG->ponFich_css('../assets/global/plugins/switchery/dist/switchery.min.css');
$PAG->ponFich_css('../assets/global/plugins/perfect-scrollbar/css/perfect-scrollbar.min.css');

$PAG->ponFich_css('../assets/global/plugins/font-awesome/css/font-awesome.min.css');
$PAG->ponFich_css('../assets/global/plugins/pixeden-stroke-7-icon/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css');
$PAG->ponFich_css('../assets/global/plugins/weather-icons/css/weather-icons.min.css');
$PAG->ponFich_css('../assets/global/plugins/weather-icons/css/weather-icons-wind.min.css');
$PAG->ponFich_css('../assets/global/plugins/morris.js/morris.min.css');
$PAG->ponFich_css('../assets/global/plugins/rickshaw/rickshaw.min.css');
$PAG->ponFich_css('../assets/global/plugins/owl.carousel/dist/assets/owl.carousel.min.css');
$PAG->ponFich_css('../assets/global/plugins/owl.carousel/dist/assets/owl.theme.default.min.css');
$PAG->ponFich_css('../assets/global/css/components.min.css');
$PAG->ponFich_css('../assets/layouts/layout-top-menu/css/layout.min.css');


$PAG->ponFavicon("../assets/favicon/favicon.ico"); 

#css y js externos

$PAG->ponFich_js("../assets/global/plugins/jquery/dist/jquery.min.js");
$PAG->ponFich_js("../assets/global/plugins/tether/dist/js/tether.min.js");
$PAG->ponFich_js("../assets/global/plugins/bootstrap/dist/js/bootstrap.min.js");
$PAG->ponFich_js("../assets/global/plugins/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js");
$PAG->ponFich_js("../assets/global/plugins/switchery/dist/switchery.min.js");
$PAG->ponFich_js("../assets/global/plugins/screenfull.js/dist/screenfull.min.js");
$PAG->ponFich_js("../assets/global/plugins/classie/classie.js");
$PAG->ponFich_js("../assets/global/plugins/jquery-knob/dist/jquery.knob.min.js");
$PAG->ponFich_js("../assets/global/plugins/raphael/raphael.min.js");
$PAG->ponFich_js("../assets/global/plugins/morris.js/morris.min.js");
$PAG->ponFich_js("../assets/global/plugins/arcseldon-jquery.sparkline/dist/jquery.sparkline.js");
$PAG->ponFich_js("../assets/global/plugins/progressbar.js/dist/progressbar.min.js");
$PAG->ponFich_js("../assets/global/plugins/CoolClock/coolclock.js");
$PAG->ponFich_js("../assets/global/plugins/d3/d3.min.js");
$PAG->ponFich_js("../assets/global/plugins/rickshaw/rickshaw.min.js");
$PAG->ponFich_js("../assets/global/js/site.min.js");
$PAG->ponFich_js("../assets/global/js/global/dashboard_v1.js");
$PAG->ponFich_js("../assets/layouts/layout-top-menu/js/layout.min.js");






// Personalizamos la cabecera
$html_arriba='		<div class="header-width">
			<div class="col-xl-9">
				<div class="logo float-xs-left">
					<a href="'.$CFG['ruta_index'].'?modulo=escritorio"><img src="../assets/global/image/web-logo.png" alt="logo"></a>
				</div>

				<div class="menucontainer">
					<div class="overlapblackbg"></div>
					<a id="navtoggle" class="animated-arrow"><span></span></a>


				</div>

			</div>

			<div class="col-xl-3 header-right">
				<div class="header-inner-right">
				   
					<div class="float-default chat">
						<div class="right-icon">
							<a href="#" data-plugin="fullscreen">
								<i class="arrow_expand"></i>
							</a>
						</div>
					</div>
					<div class="user-dropdown">
						<div class="btn-group">
							<a href="#" class="user-header dropdown-toggle" data-toggle="dropdown"
							   data-animation="slideOutUp" aria-haspopup="true"
							   aria-expanded="false">
								<img src="../assets/global/image/'.$_SESSION["u_imagen"].'" alt="Profile image"/>
							</a>
							<div class="dropdown-menu drop-profile">
								<div class="userProfile">
									<img src="../assets/global/image/'.$_SESSION["u_imagen"].'" alt="Profile image"/>
									<h5>'.$_SESSION["u_nombre"].'</h5>
								</div>
								<div class="dropdown-divider"></div>
								<a class="btn left-spacing link-btn" href="'.$CFG['ruta_index'].'?modulo=programacion" role="button">Programador</a>
								<a class="btn left-second-spacing link-btn" href="#" role="button">Graficos</a>
								 <a class="btn left-second-spacing link-btn" href="#" role="button">Logs</a>
								<a class="btn btn-primary float-xs-right right-spacing" href="'.$CFG['ruta_index'].'?modulo=login"
								   role="button">Salir</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>';

$PAG->ponArriba($html_arriba);
// Personalizamos el pie 

$PAG->ponPie(' Copyright&copy; 2017, All Rights Reserved.');
			
$SQL->libera();	
?>
