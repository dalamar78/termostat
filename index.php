<?php


include_once('codigo/configura.php');

//include_once('clases/ClaseAjax.php');
// Cargamos la plantilla para generar la p��gina

// Abrimos la conexi��n con la base de datos $SQL
include_once('clases/baseDatos.php');
$SQL = new baseDatos($CFG['db_servidor'], $CFG['db_usuario'], $CFG['db_clave'], $CFG['db_base']);
global $SQL;
// Incorporamos el soporte para el seguimiento de la "sesi��n" de trabajo,
// que adem��s valida al usuario y carga el m��dulo apropiado si procede
include_once('codigo/sesion.php');

?>
