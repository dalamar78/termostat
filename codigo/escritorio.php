<?php
/**
 * pagina: PANEL PRINCIAL PERMITE EL ARRANQUE, Y CONTROL DE TEMPERATURA
 *
 * @autor Oscar Gonzalez <oskiyar78@gmail.com>
 * @package termostat
 * @version 0.1
 * @link  link a github
 * 
 */
 $sql= "SELECT temperatura, humedad FROM temperaturas WHERE id=( SELECT max(id) FROM temperaturas);";
 $SQL->consulta($sql);
 $valoresTemp = $SQL->extrae();
 $sql= "SELECT temperatura_objetivo,estado,metodo,activo FROM estado";
 $SQL->consulta($sql);
 $datosIniciales = $SQL->extrae();
 $estado_checked="";
#pinto el estado actual de la caldera  on-off, arrancada-parada 
 if ($datosIniciales["estado"] == 1 ){
	 $estado_checked="checked";
	 $texto_arra="ARRANCADO";
	 $clase_arra="text-success";
 }else{
	 $texto_arra="PARADO";
	 $clase_arra="text-danger";
 }
 if ($datosIniciales["activo"] == 1 ){
	 $texto_arra="ARRANCADO";
	 $clase_arra="text-success";
 }else{
	 $texto_arra="PARADO";
	 $clase_arra="text-danger";
 }
 $metodo_checked="";
 if ($datosIniciales["metodo"] == 1 ){
	 $metodo_checked="checked";
	 
 }
 $html='<div class="site-content-title">
                    <h2 class="float-xs-left content-title-main">Temperatura del hogar</h2>
                    <!-- START BREADCRUMB -->
                    <ol class="breadcrumb float-xs-right">
                        <li class="breadcrumb-item">
                            <span class="fs1" aria-hidden="true" data-icon=""></span>
                            <a href="#">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Escritorio</a></li>
                        
                    </ol>
                    <!-- END BREADCRUMB -->
                </div>
                <!-- END PAGE TITLE -->
                <!--  START DASHBOARD -->
                <div class="contain-inner dashboard-v1">
                    <div class="col-md-12">
							<div class="row">
                                <div class="col-md-12 static-widget-content">
                                    <div class="static-widget-box crl-dashboard-box">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="widget-box">
                                                    <div class="widget-info">
                                                        <div class="widget-content">
                                                            <h5 class="crm-title text-xs-center">Menu</h5>
                                                            <div class="text-xs-center content-switch">
                                                           <p class="'.$clase_arra.'" id="arra_para"  >'.$texto_arra.'</p>
															   <div class="text-xs-center" style="margin-left: 15px;">
																	<div class="switch-box">
																		<label class="switch-button switch-yes-no-button">
																			<input class="switch-input-button primary-switch estado" type="checkbox" '.$estado_checked.'/>
																			<span class="switch-label-button primary-switch" data-on="On" data-off="Off"></span> <span class="switch-handle-button "></span>
																		</label>
																	</div>
											   
																	<div class="switch-box">
																		<label class="switch-button switch-yes-no-button manual">
																			<input class="switch-input-button danger-switch programacion" type="checkbox" '.$metodo_checked.' />
																			<span class="switch-label-button danger-switch" data-on="Manual" data-off="Programado"></span> <span class="switch-handle-button"></span>
																		</label>
																	</div>
												                </div>
															</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider-xs-spacing"></div>
                                             <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="widget-box">
                                                    <div class="widget-info">
                                                        <div class="widget-content">
                                                            <h5 class="crm-title text-xs-center">Temperatura objetivo</h5>
                                                            <div class="text-xs-center">
                                                              <input type="text" data-plugin="jknob" name="temperaturaObjativo" id="temperaturaObjativo" 
															  data-min="15"
															  data-max="30"
															  data-step=".1"
															  data-skin="tron" 
															  value="'.$datosIniciales["temperatura_objetivo"].'" 
															  data-width="135" 
															  data-height="135"
															  data-thickness="0.4" 
															  data-anglearc="360" 
															  data-fgcolor="#FF9800" 
															  style="width: 71px; height: 45px; position: absolute; vertical-align: middle; margin-top: 45px; margin-left: -103px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 27px; line-height: normal; font-family: Arial; text-align: center; color: rgb(255, 152, 0); padding: 0px; -webkit-appearance: none;">  
																
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider-xs-spacing divider-lg-spacing"></div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="widget-box">
                                                    <div class="widget-info">
                                                        <div class="widget-content">
                                                            <h5 class="crm-title text-xs-center">Temperatura salón</h5>
                                                            <div class="text-xs-center">
																<input type="text" name="temperatura" id="temperatura"
																data-plugin="jknob" 
																value="'.$valoresTemp["temperatura"].'" 
																data-step=".1"
																data-width="125" 
																data-height="125" 
																data-thickness="0.25" 
																data-fgcolor="#E91E63" 
																readonly="readonly" 
																style="width: 66px; height: 41px; position: absolute; vertical-align: middle; margin-top: 41px; margin-left: -95px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 25px; line-height: normal; font-family: Arial; text-align: center; color: rgb(233, 30, 99); padding: 0px; -webkit-appearance: none;">                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider-xs-spacing"></div>
                                              <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="widget-box">
                                                    <div class="widget-info">
                                                        <div class="widget-content">
                                                            <h5 class="crm-title text-xs-center">Humedad salón</h5>
                                                            <div class="text-xs-center">
                                                         <input type="text"  name="humedad" id="humedad"
														 data-plugin="jknob"
														 data-step=".1"
														 data-skin="tron" 
														 value="'.$valoresTemp["humedad"].'" 
														 data-width="135" 
														 data-height="135" 
														 data-thickness="0.2" 
														 data-fgcolor="#00BCD4" 
														 readonly="readonly" 
													 style="width: 71px; height: 45px; position: absolute; vertical-align: middle; margin-top: 45px; margin-left: -103px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 27px; line-height: normal; font-family: Arial; text-align: center; color: rgb(0, 188, 212); padding: 0px; -webkit-appearance: none;">
															</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="content">
                                    <div class="dashboard-header">
                                        <h4 class="page-content-title float-xs-left">Evolución</h4>
                                        <div class="dashboard-action">
                                            <ul class="right-action float-xs-right">
                                                <li data-widget="collapse"><a href="javascript:void(0)"
                                                                              aria-hidden="true"><span
                                                            class="icon_minus-06"
                                                            aria-hidden="true"></span></a></li>
                                                <li data-widget="close"><a href="javascript:void(0)"><span
                                                            class="icon_close" aria-hidden="true"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dashboard-box text-xs-center">
                                        <div class="traffic-chart">
                                            <div id="rickshaw-realtime_y_axis"></div>
                                            <div id="rickshaw-realtime"></div>
                                        </div>
                                        <div class="row">
                                            <div class="data_widgets_block">
                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
$js="$(document).ready(function() { 
/*modificamos la temperatura y humedad cada 10''*/   
/*pintamos si esta arrancado o no */   
    function tomaTemperaturas(){
           
		   $.post( 'codigo/ajax/tomaTemperaturas.php', function( data ) {
		  		var obj = JSON.parse(data);	
				var temperatura=obj.temperatura ;
				var humedad =obj.humedad ;
				var temperaturaObjativo=obj.temperaturaObjetivo ;
				var activo = obj.activo ;
				console.log(data);
				if (activo === '1' ){
					$('#arra_para').removeClass('text-danger');
					$('#arra_para').html('ARRANCADO');
					$('#arra_para').addClass('text-success');
				  }else{
					$('#arra_para').removeClass('text-success');
					$('#arra_para').html('PARADO');
					$('#arra_para').addClass('text-danger');
				}
				$('#temperatura').val(temperatura);
				$('#temperatura').trigger('change');
	
				$('#humedad').val(humedad);
				$('#humedad').trigger('change');
				 
				$('#temperaturaObjativo').val(temperaturaObjativo);
				$('#temperaturaObjativo').trigger('change');
 
			});
	}
	tomaTemperaturas();
    setInterval(tomaTemperaturas, 10000);
	
/* llamamos ajax para modificar la temperatura objetivo*/
	
		
		$('#temperaturaObjativo').knob({
		'draw': function() {
        console.log(this.$.val());
		var temperaturaObjativo = this.$.val();
		$.post( 'codigo/ajax/cambiaTemperatura.php',{ temperaturaObjativo: temperaturaObjativo},  function( data ) {
		  		  console.log('cambiado a : '+data);
 
			});
      
	  }
    });
/*LLAMAMOS AJAX para cambiar el estado 0 apagado 1 encendido*/	
	var changeCheckbox = document.querySelector('.estado');
	changeCheckbox.onchange = function() {
			$.post( 'codigo/ajax/cambiaEstado.php',{ estado: changeCheckbox.checked},  function( data ) {
		  		  console.log('cambiado a ESTADO: '+data);
				 /* if (data === '1' ){
					$('#arra_para').removeClass('text-danger');
					$('#arra_para').html('ARRANCADO');
					$('#arra_para').addClass('text-success');
				  }else{
					$('#arra_para').removeClass('text-success');
					$('#arra_para').html('PARADO');
					$('#arra_para').addClass('text-danger');
				  }*/
				  
 
			});
	};	
	
/*LLAMAMOS AJAX para cambiar el preogramacion 0 manual 1 programacion*/	
	var changeCheckbox1 = document.querySelector('.programacion');
	changeCheckbox1.onchange = function() {
			$.post( 'codigo/ajax/cambiaPrograma.php',{ programa: changeCheckbox1.checked},  function( data ) {
		  		  console.log('cambiado a programa a : '+data);
 
			});
	};			
});";
$PAG->ponCodigojs($js);
$PAG->ponTitulo('Escritorio');
$PAG->ponCentro($html);
