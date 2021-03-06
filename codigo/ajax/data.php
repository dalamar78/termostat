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

 $sql= "SELECT temperatura, humedad FROM temperaturas WHERE id=( SELECT max(id) FROM temperaturas);";
 $SQL->consulta($sql,1);
 $valoresTemp = $SQL->extrae(1);
$SQL->libera(1);
	
class Temperatura {
 public $temperatura;
 public $humedad;

}
$temp = new Temperatura();
$temp->temperatura = $valoresTemp["temperatura"];
$temp->humedad = $valoresTemp["humedad"];


echo json_encode($temp);?>
