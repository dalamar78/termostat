<?php
/**
 * Clase: compone la pagina
 *
 * @autor Oscar Gonzalez <oscar.gonzalez@mrinformatica.es>
 * @package GesDes
 * @version 0.1
 * @link http://173.88.52.154/gesdep
 * @Basado en collabtive
 */
if (strstr($_SERVER['PHP_SELF'], 'paginaHtml.php')) 
	die ('No puedes acceder directamente a este archivo!');


class paginaHtml {
  /* Componentes de la cabecera */
  private $titulo    = '';       // Título de la ventana del navegador
  private $metaequiv = array();  // Campos Metaequiv
  private $metaname  = array();  // Campos MetaName
  private $favicon   = '';       // Icono a mostrar al lado de la URL en el navegador
  private $fich_js   = array();  // Ficheros externos con código javascript
  private $fich_css  = array();  // Ficheros externos con definiciones de estilos
  private $estilos   = '';       // Definiciones locales de estilos
  private $codigojs  = '';       // Código javascript local
  private $fich_rel   = array();  // Ficheros externos rel


  /* Componentes del cuerpo de la página */
  private $body = '';            // Elementos que acompañarán a la etiqueta BODY
  private $men_error = array();  // Mensajes de error
  private $men_info  = array();  // Mensajes de tipo informativo
  private $men_debug = array();  // Mensajes para depurar el código
  private $men_aviso = array();  // Menasjes para advertencias y avisos
  
  private $arriba    = array();   // Parte superior de la página
  private $menu      = array();   // Parte menu página
  private $izquierda = array();   // Columna de la izquierda
  private $derecha   = array();   // Columna de la derecha
  private $centro    = array();   // Contenido principal
  private $pie       = array();   // Pié de página

  /* Variables de control */
  private $produccion   = true;  // Elimina los comentarios y los retornos de carro
  private $fichero      = '';    // Si está definida vuelca la página a un fichero
  private $tipo         = 'html_t';    // html_s, html_t, xhtml_s o xhtml_t. P.def XHTML_s
  private $codificacion = 'UTF-8';    // Tabla de codificación de caracteres. P.def UTF-8
  
//<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=iso-8859-1" />

  /* Constructor */  
  function __construct($produccion=false, $tipo='xhtml_s', $codificacion='UTF-8', $fichero='') {
      $this->produccion = $produccion;
      $this->fichero    = $fichero;
      if ($produccion) define('N', ''); // Evitamos los saltos de línea
      else define('N', "\n");           // o lo definimos en caso sontrario
      $this->ponTipo($tipo);
      $this->ponMetaequiv('content-type', 'text/html; charset='.$codificacion );
      }
 
  /* Asignación de valores */
  function ponMetaequiv($t, $v) {$this->metaequiv[$t] = $v;}
  function ponMetaname($t, $v)  {$this->metaname[$t]  = $v;}
  
  function ponTitulo($t)    {$this->titulo    = $t;}
  function ponFavicon($t)   {$this->favicon   = $t;}
  function ponFich_js($t)   {$this->fich_js[] = $t;}
  function ponFich_rel($t)   {$this->fich_rel[] = $t;}
  function ponFich_css($t)  {$this->fich_css[]= $t;}
  function ponEstilo($t)    {$this->estilos  .= $t.N;}
  function ponCodigojs($t)  {$this->codigojs .= $t.N;}
  
  function ponBody($t)      {$this->body .= ' '.$t;}
  function ponMensaje($m, $t) {
      switch (strtolower($m[0])) {
        case 'e' : $this->men_error[] = $t; break;
        case 'i' : $this->men_info[]  = $t; break;
        case 'd' : $this->men_debug[] = $t; break;
        default  : $this->men_aviso[] = $t; break;
        }
      }
    
  function ponArriba   ($t, $n=0)  {if (isset($this->arriba[$n])) $this->arriba[$n]       .= $t; else $this->arriba[$n] = $t;}
  function ponCentro   ($t, $n=0)  {if (isset($this->centro[$n])) $this->centro[$n]       .= $t; else $this->centro[$n] = $t;}
  function ponPie      ($t, $n=0)  {if (isset($this->pie[$n])) $this->pie[$n]             .= $t; else $this->pie[$n] = $t;}
  
  /* Control de la codificación */
  function ponTipo($t) {
      switch ($t) {
          case 'html_s' : 
              $this->tipo = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">'.N;
              break;
          case 'html_t' : 
              $this->tipo = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">'.N;
              break;
          case 'xhtml_s': 
              $this->tipo = '<?xml version="1.0" encoding="UTF-8"?>'.N
                           .'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"'
                           .' "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'.N;
              break;
          default: 
              $this->tipo = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"'
                           .' "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'.N;
          }
      }
  
  /***** Generación de contenidos *********/
  
  /* Añade secciones o columnas */

  function bloque(&$html, &$contenido, $inicio, $final, $comentario='') {
      if (is_array($contenido) AND (sizeof($contenido) == 0))  return;
      else if ($contenido == '') return;
      
      if ((!$this->produccion) AND ($comentario != '')) 
          $html .= N.N.'<!-- '.$comentario .'-->'.N.N;
      $html .= $inicio.N;   
      if (is_array($contenido)) {
          foreach ($contenido as $texto) 
              if ($this->produccion) $html .= str_replace(N, '', $texto).N;
              else $html .= $texto.N;
          }
      else 
          if ($this->produccion) $html .= str_replace(N, '', $contenido).N;
          else $html .= $contenido.N;
      $html .= N.$final.N;
      }
      
  /* Añade listas de mensajes agrupados por tipo */
  function mensajes (&$lista, $tipo='info') {
      $html = '';
      foreach ($lista as $mensaje) $html .= '<div class="men_'. $tipo .'">'. $mensaje .'</div>'.N;
      return $html;
      }
      
  /* Genera el documento final */
  function salida() {
     $html = $this->tipo
            .'<html>'.N.'<head>'.N
            .'<title>'. $this->titulo. '</title>'.N;

     foreach ($this->metaequiv as $n => $v){ 
        $html .= '<meta http-equiv="'. $n .'" content="'. $v .'" />' . N;
    }
     $html .= '<meta name="viewport" content="width=device-width">' . N;
     foreach ($this->metaname  as $n => $v) 
        $html .= '<meta http-name="'. $n .'" content="'. $v .'">' . N;
     if ($this->favicon) 
        $html .= '<link rel="shortcut icon" href="'. $this->favicon .'">'. N;
	
	$html.='<link rel="apple-touch-icon" href="../assets/favicon/apple-touch-icon.png" />'. N;
    $html .= '<link rel="apple-touch-icon" sizes="57x57" href="../assets/favicon/apple-touch-icon-57x57.png" />'. N;
    $html .= '<link rel="apple-touch-icon" sizes="72x72" href="../assets/favicon/apple-touch-icon-72x72.png" />'. N;
    $html .= '<link rel="apple-touch-icon" sizes="76x76" href="../assets/favicon/apple-touch-icon-76x76.png" />'. N;
    $html .= '<link rel="apple-touch-icon" sizes="114x114" href="../assets/favicon/apple-touch-icon-114x114.png" />'. N;
    $html .= '<link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-touch-icon-120x120.png" />'. N;
    $html .= '<link rel="apple-touch-icon" sizes="144x144" href="../assets/favicon/apple-touch-icon-144x144.png" />'. N;
    $html .= '<link rel="apple-touch-icon" sizes="152x152" href="../assets/favicon/apple-touch-icon-152x152.png" />'. N;
   $html .= ' <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon-180x180.png" />'. N;

     foreach ($this->fich_css as $f) 
        $html .= '<link rel="stylesheet" type="text/css" href="'. $f .'">' .N;
    

    $this->bloque($html, $this->estilos, '<style type="text/css">', '</style>', 
            'Inicio definición de estilos CSS internos');
    
    $html .= '</head>'. N .'<body'. $this->body .'>'. N;
     
     
      
    $html.='<div class="loader-overlay">
				<div class="loader-preview-area">
					<div class="spinners">
						<div class="loader">
							<div class="rotating-plane"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="wrapper">';
    $this->bloque($html, $this->arriba, ' <header id="header">', '</header>', 'Inicio cabecera de la p�gina');
    
	$html .= '<section id="main" class="container-fluid">
				<div class="row">';
  
	$this->bloque($html, $this->centro,    '    <section id="content-wrapper" class="form-elements">',    '</section>', 'Inicio contenido derecho');
	$html .= '	</div>'. N;
    $html .= '</section>'. N;
  
  #pie
  $this->bloque($html, $this->pie, 	    ' <footer id="footer">', '</footer>', 'Inicio del pie de página');
  $html .= '</div>'. N;
  $html .= '</div>'. N;



 foreach ($this->fich_js  as $f) 
        $html .= '<script language="JavaScript" type="text/javascript" src="'. $f .'"></script>'. N;
//$html.='</div>';   
$this->bloque($html, $this->codigojs, '<script language="JavaScript" type="text/javascript">', 
            '</script>', 'Inicio definición de código javascript interno');
$html .='</body>'. N .'</html>'. N;
     
     if ($this->fichero != '') {
		    $fch = fopen($fichero, 'w');
		    fwrite($fch, $html);
		    fclose($fch);
		    }
	   else {
      echo $html;
     } 
  }
}
?>
