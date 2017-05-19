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



 $sql= "delete from temperaturaprogramacion WHERE id =".$_REQUEST['ID'] ;

 $SQL->consulta($sql,2);
 
echo $sql;
	

