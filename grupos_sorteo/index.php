<?php
 header('Content-Type: text/html; charset=utf-8');

//JOOMLA DEFINITIONS
define( '_JEXEC', 1 );
define( 'DS', DIRECTORY_SEPARATOR );
define( 'JPATH_BASE', $_SERVER[ 'DOCUMENT_ROOT' ] );

//JOOMLA LIBRARIES
require_once( JPATH_BASE . DS . 'includes' . DS . 'defines.php' ); 
require_once( JPATH_BASE . DS . 'includes' . DS . 'framework.php' ); 

//INIT APP
$mainframe = JFactory::getApplication('site');
$mainframe->initialise();
$user = JFactory::getUser();

if($user->name == ""){
	die("No es un usuario registrado");
}

 ?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-language" content="es" />
<title>Sorteo de lotes | GRUPOS - El Gigante</title>
</head>

<body>

<?php
require_once('../db/db.php');

$u = $user->username;

$query = "SELECT grupo from grupos_sorteo_de_lotes
			WHERE dni = $u LIMIT 1";

$resultado = mysql_query($query,$db) or die(mysql_error());

while($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)){
		$grupo = $fila["grupo"];
	}

mysql_free_result($resultado);
mysql_close($db);
?>
Tu grupo: <?=$grupo?>
</div>
</body>
</html>