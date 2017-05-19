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


$sql= "INSERT INTO temperaturaprogramacion ( NOMBRE, ACTIVO,hora_inicio,hora_fin,LUNES,MARTES,MIERCOLES,JUEVES,VIERNES,SABADO,DOMINGO,TEMPERATURA)
VALUES ('".$_REQUEST['Nombre']."','".$_REQUEST['Activo']."','".$_REQUEST['Inicio']."','".$_REQUEST['Fin']."','".$_REQUEST['L']."','".$_REQUEST['M']."','".$_REQUEST['X']."','".$_REQUEST['J']."','".$_REQUEST['V']."','".$_REQUEST['S']."','".$_REQUEST['D']."','".$_REQUEST['T']."')";
 

 $SQL->consulta($sql,2);
 
echo $sql;
	

