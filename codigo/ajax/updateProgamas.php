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



 $sql= "UPDATE temperaturaprogramacion SET NOMBRE='".$_REQUEST['Nombre']."' ,hora_inicio='".$_REQUEST['Inicio']."'
 ,hora_fin='".$_REQUEST['Fin']."',LUNES='".$_REQUEST['L']."'
,MARTES='".$_REQUEST['M']."',MIERCOLES='".$_REQUEST['X']."',JUEVES='".$_REQUEST['J']."'
,VIERNES='".$_REQUEST['V']."',SABADO='".$_REQUEST['S']."',DOMINGO='".$_REQUEST['D']."',ACTIVO='".$_REQUEST['Activo']."',TEMPERATURA='".$_REQUEST['T']."'  
WHERE id =".$_REQUEST['ID'] ;

 $SQL->consulta($sql,2);
 
echo $sql;
	

