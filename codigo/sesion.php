<?php
/**
 * pagina: control de usuarios y sesion
 *
 * @autor Oscar Gonzalez <oskiyar78@gmail.com>
 * @package termostat
 * @version 0.1
 * @link  link a github
 * 
 */
 error_reporting(0);
if (strstr($_SERVER['PHP_SELF'], 'sesion.php')) 
	die ('No puedes acceder directamente a este archivo!');    

ini_set("session.cookie_name","termostat");
ini_set("session.cookie_path","/");

// Iniciamos o recuperamos una sesión de trabajo
session_start();

$_SESSION['ultimoAcceso']= date("Y-m-d H:i:s");

// Se asegura de contar siempre con una variable de sesión con nombre
// $_SESSION[$nombre] válida, y sólo cambiará si llegan nuevos datos
// con el mismo nombre de variable.

function recuerda_sesion($nombre, $p_defecto='') {
	if (isset($_REQUEST[$nombre])) 
		$_SESSION[$nombre] = $_REQUEST[$nombre];
	elseif (! isset($_SESSION[$nombre])) $_SESSION[$nombre] = $p_defecto;
	return $_SESSION[$nombre];
	}

function registra_actividad($texto='',$tipo='') {
	global $SQL;
	global $_SESSION;
	$sql= "INSERT INTO log "
	      ." VALUES (NULL, now(),"
		  ." (SELECT ID FROM user WHERE usuario = '".$_SESSION['u_nombre']."'),"
		  ."'$texto',"
		   ." '${_SERVER['REMOTE_ADDR']}')";
		  
	$SQL->consulta($sql);
	}

// Recuperamos/actualizamos/definimos por primera vez algunas variables
// de control importantes.	
recuerda_sesion('u_nombre', '');
recuerda_sesion('u_id', '');
recuerda_sesion('modulo', $CFG['modulo']);
recuerda_sesion('login_check', '0');
recuerda_sesion('u_imagen', 'img_128x128.png');
// ***************************************************************** //
// Control de presencia del usuario: Entrada, salida
// 
 // controlamos si se ha logeado

// Si se ha pulsado el botón del formulario de entrada intentaremos
// validar al usuario.
if (isset($_REQUEST['boton_entrada'])) {
  
  $nombre = addslashes(trim($_REQUEST['nombre']));
  $clave  = md5($_REQUEST['password']);        
	$sql= "SELECT u.id, u.usuario,u.imagen "
				  ." FROM user AS u "
				  ." WHERE (u.usuario = '$nombre') "
				  ." AND (u.password = '$clave') "
				  ." LIMIT 1;";
				  
	$SQL->consulta($sql);
	//echo $sql;
	if ($SQL->numeroFilas() == 1) {
		$fila = $SQL->extrae();
		$_SESSION['u_nombre'] = $fila['usuario'];
		$_SESSION['u_id']     = $fila['id'];
		$_SESSION['u_imagen'] = $fila['imagen'];
		
    registra_actividad('Inicio de sesión de '.$_SESSION['u_nombre'].'  con ip '.$_SERVER['REMOTE_ADDR'],"2");


    include_once('codigo/entorno.php');

	$_SESSION['modulo'] = "escritorio";
    include_once('codigo/'. $_SESSION['modulo'] .'.php');
    $_SESSION['login_check'] = "1";

  } else {  
  		registra_actividad('Fallo en Inicio de sesión de '. $_REQUEST['nombre'].'  con ip '.$_SERVER['REMOTE_ADDR'] ,"2");      
      echo '<div style="position:absolute; width:460px; height:75px; top:45%; left:50%; margin-top:-35px; margin-left:-230px; background-image: url(\'images/login-alert.png\'); color: #FFFFFF; font-weight: bold; text-align: center; z-index: 2000;">
            <span><br>No ha sido posible inciar la sesi&oacuten.<br>Por favor, comprueba tus datos de acceso.</span>
			      </div>';
  }
  
 $SQL->libera();	

} //fin isset boton_entrada

// Si se ha pulsado el boton de "fin de sesión", cerraremos la misma y
// recuperamos los valores por defecto.
if (isset($_REQUEST['boton_salida'])) {
	registra_actividad('Fin de sesión',"2");
	session_destroy();
	unset($_SESSION);
}

if ($_SESSION['login_check'] == "0"){
  include_once('codigo/login.php');
  session_destroy();
	unset($_SESSION);
}
 
// *********************************************************************
// Validación del módulo a cargar en función de las tablas de permisos
// Si no hay permiso o no está activo cargamos una página de error.



if ( isset($_SESSION['u_id'])) {
	$SQL->libera();
	registra_actividad('entra en '. $_SESSION['modulo'].' el user'.$_SESSION['u_id'],'2');
  if ( $_SESSION['modulo'] == "login") {
    registra_actividad('Fin de sesión'.$_SESSION['u_id'],"2");
    recuerda_sesion('u_nombre', 'An&oacute;nimo');
     recuerda_sesion('modulo', 'login');
    recuerda_sesion('login_check', '0');
    include_once('codigo/login.php');
    session_destroy();
    unset($_SESSION);
  } else {
      include_once('codigo/entorno.php');
      include_once('codigo/'. $_SESSION['modulo'] .'.php'); 
	  $PAG->salida();
  }
  
} else {
    registra_actividad('Fallo inicio de módulo',"2");
    if (isset($_SESSION['login_check']) == 1){
      include_once('codigo/entorno.php');
      include_once('codigo/accesoIncorrecto.php');
	  
    }          
}


?>
