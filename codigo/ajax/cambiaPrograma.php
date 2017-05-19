<?php
/**
 * pagina: devuelve un json con los ultimos datos almacenados en bb
 *
 * @autor Oscar Gonzalez <oskiyar78@gmail.com>
 * @package termostat
 * @version 0.1
 * @link  link a github
 * 
 */

include_once("../configura.php");
include_once("../../clases/baseDatos.php");

 $SQL = new baseDatos($CFG['db_servidor'], $CFG['db_usuario'], $CFG['db_clave'], $CFG['db_base']);
global $SQL;

if( $_REQUEST['programa'] == "true" ){
		$metodo=1;
}else{
	$metodo=0;
	}

 $sql= "UPDATE estado SET metodo='".$metodo."'";;
 $SQL->consulta($sql,2);
 

	

echo $metodo;