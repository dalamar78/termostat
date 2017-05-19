<?php



class baseDatos {
	// Propidades (variables) internas
	protected $servidor = 'localhost';
	protected $usuario  = '';
	protected $clave    = '';
	protected $base     = '';
	
	public $enlace   = false;
	protected $error    = '';
	
	// Lista de consultas para poder mantener más de una de forma
	// simultánea
	protected $consulta = array();

	
	// Contrustor que inicializa la conexión con la base de datos y
	// guarda en su interior los parámetros como propiedades que la definen.
	// En caso de problemas se actualiza la propiedad "error".
	function __construct($servidor, $usuario, $clave, $base) {
		$this->servidor = $servidor;
		$this->usuario  = $usuario;
		$this->clave    = $clave;
		$this->base     = $base;
		$this->enlace = @mysql_connect($this->servidor, $this->usuario, $this->clave);
		if ($this->enlace) {
			$ok = @mysql_select_db($this->base, $this->enlace);
			if (! $ok) {
				$this->error='No se pudo abrir la base de datos: '. $this->base;
				$this->enlace = false;
				}
			}
		else {
			$this->error='No se pudo acceder al servidor de MySQL';
			}
		}
		
		
	// Método complementario a la "construcción" de la conexión. A usar al
	// final del programa para cerrar (liberar) la conexión
	function cierra() {
		if ($this->enlace) mysql_close($this->enlace);
		}
		
		
	// Método para "preguntar" y dar órdenes a la base. "Senetencia" será
	// la consulta en SQL y opcionalmente la individualizaremos mediante
	// un "nº de consulta". Solo se pregunta si hay un enlace válido. 
	function consulta($sentencia, $numero=0) {
		$this->consulta[$numero] = array();
		$this->consulta[$numero]['sql'] = $sentencia;
		if ($this->enlace) 
			$this->consulta[$numero]['resultado'] = mysql_query($sentencia, $this->enlace);
		else {
		    $this->consulta[$numero]['resultado'] = false;
			$this->error = 'No se pudo completar la consulta: '. $sentencia;
			}
		return $this->consulta[$numero]['resultado'];
		}
	
	
	// Método para explorar y extraer una fila de la tabla temporal de
	// resultados de la consulta. Devuelve un array con todas las columnas
	// solicitadas y avanza una posición.
	function extrae($numero=0) {
		if (($this->enlace) AND (isset($this->consulta[$numero])) AND ($this->consulta[$numero]['resultado'])) {
			return mysql_fetch_array($this->consulta[$numero]['resultado']);
			}
		else return false;
		}
	
	
	// Método para eliminar de la memoria la tabla temporal cuando ya no
	// la necesite.
	function libera($numero=0) {
		if (($this->enlace) AND (isset($this->consulta[$numero])) AND ($this->consulta[$numero]['resultado'])) {
			mysql_free_result($this->consulta[$numero]['resultado']);
			unset ($this->consulta[$numero]);
			}
		}
	
	
	// Devuelve el contenido de la propiedad "error";
	function error() { 
		return $this->error; 
		}
	
	
	// Obtiene el número de filas de la tabla temporal y cachea el resultado
	// para evitar nuevas consultas al volver a solicitar dicho valor.
	function numeroFilas($numero=0) {
		$filas = false;
		if (($this->enlace) AND (isset($this->consulta[$numero])) AND ($this->consulta[$numero]['resultado'])) 
			if (isset($this->consulta[$numero]['num_filas'])) 
				$filas = $this->consulta[$numero]['num_filas'];
			else {
				$filas = mysql_num_rows($this->consulta[$numero]['resultado']);
				$this->consulta[$numero]['num_filas'] = $filas;
				}
		
		return $filas;
		}
	
  function ultimoID($numero=0) {
	
				$ids = mysql_insert_id();
				
						return $ids;
		}
	// Devuelve la sentencia utilizada para realizar la consulta "nº" x.
	function sql($numero=0) {
		if (($this->enlace) AND (isset($this->consulta[$numero]))) 
			return $this->consulta[$numero]['sql'];
		else return '';
		}
	
	}
?>
