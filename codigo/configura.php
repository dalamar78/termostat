<?php
if (strstr($_SERVER['PHP_SELF'], 'configura.php')) 
	die ('No puedes acceder directamente a este archivo!');

// Fichero de configuración principal.
global $CFG;
$CFG = array();

// Selección de la base de datos de trabajo y usuario de acceso
$CFG['db_servidor'] = 'localhost';
$CFG['db_usuario'] = 'root';
$CFG['db_clave'] = '';
$CFG['db_base'] = 'hogar';
$CFG['ruta_defecto'] = '/hogar/';


$CFG['ruta_pyton'] = 'C:\xampp\htdocs\termostat\python';
$CFG['ruta_raiz'] = 'C:\xampp\htdocs\termostat';

$CFG['ruta_javascript'] = 'http://localhost/codigo/js';
$CFG['ruta_asset'] = 'http://localhost/codigo/asset';
$CFG['ruta_ajax'] = 'http://localhost/codigo';
$CFG['ruta_clases'] = 'http://localhost/codigo/clases';
$CFG['ruta_index'] = 'http://localhost/index.php';

// Personalización de portada y listados


$CFG['modulo'] = 'login';

?>
