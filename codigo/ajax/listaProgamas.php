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

 $sql= "SELECT id,nombre,hora_inicio,hora_fin,TEMPERATURA,LUNES,MARTES,MIERCOLES,JUEVES,VIERNES,SABADO,DOMINGO,activo FROM temperaturaprogramacion;";
 $SQL->consulta($sql,1);

$programas = array();
     while ($row = $SQL->extrae(1)) {
    $id=$row['id'];
    $nombre=$row['nombre'];
	$hora_inicio=$row['hora_inicio'];
	$hora_fin=$row['hora_fin'];
    $LUNES=$row['LUNES'];
    $MARTES=$row['MARTES'];
	$MIERCOLES=$row['MIERCOLES'];
	$JUEVES=$row['JUEVES'];
	$VIERNES=$row['VIERNES'];
	$SABADO=$row['SABADO'];
	$DOMINGO=$row['DOMINGO'];
	$activo=$row['activo'];
    $TEMPERATURA=$row['TEMPERATURA'];

    $programas[] = array('ID'=> $id, 'Nombre'=> $nombre, 'Inicio'=> $hora_inicio, 'Fin'=> $hora_fin,'T'=> $TEMPERATURA,
                        'L'=> $LUNES, 'M'=> $MARTES, 'X'=> $MIERCOLES, 'J'=> $JUEVES,
						'V'=> $VIERNES, 'S'=> $SABADO, 'D'=> $DOMINGO, 'Activo'=> $activo);
      }
$SQL->libera(1);	



$texto=json_encode($programas);
//echo $a;
 $texto=str_replace('"false"','false',$texto); 
  $texto=str_replace('"true"','true',$texto); 
echo $texto;