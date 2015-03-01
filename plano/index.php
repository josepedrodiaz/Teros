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
<title>Sorteo de lotes - El Gigante</title>
 <link rel="stylesheet" href="jquery-ui.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <script>
  jQuery(document).ready(function(){
    $( document ).tooltip({
  		position: { my: "left center", at: "right center" }
	});
	$( "#plaza" ).click(function() {
         location.reload();
	});
  });
  </script>

<style type="text/css">
	body{
		font-family: 'Helvetica', 'Arial', sans-serif;
		color: #000;
		position: relative;
		top: 15px;
	}
	#page{
		width: 1200px;
		overflow: hidden;
		margin: 15px 45px;
	}
    .lote-vertical,.lote-horizontal,.lote-cuadrado{
    	border: 1px solid #000;
    }
    .lote-vertical{
		width: 22px;
		height: 46px;
		float: left;
	}
	.lote-horizontal{
		width: 46px;
		height: 22px;
		float: left;
	}
	.lote-cuadrado{
		width: 30px;
		height: 30px;
		float: left;
	}
	.manzana-20{
		width: 250px;
		float:left;
	}
	.manzana-19{
		width: 106px;
		float:left;
		margin: 0 10px;
	}
	.ocupado{
		background-color: #ffd200;
		cursor: pointer;
	}
	.disponible{
		background-color: #FFF;
	}
	#plaza{
		float: left;
		height: 97px;
		width: 225px;
		margin: 5px;
		position: relative;
		top: 15px;
		cursor: pointer;
	}
	#equipamiento-comunitario, #placita{
		float: left;
		height: 97px;
		width: 125px;
		position: relative;
		top: 19px;
	}
	 #placita{
		margin-right: 10px;
		background-color: #63B213;
	}
	#equipamiento-comunitario{
		background-color: #EAEAEA;
		margin-right: 5px;
	}
	#plaza{
		background-color: #94D636;
	}
	div{
		text-align: center;
	}
	div.manzana-20 p.titulo-manzana{
	    top: 70px;
	    display: block;
	    width: 100px;
	    left: 60px;
	    top: 60px;
	    position: relative;
	}
	div.manzana-19 p.titulo-manzana{
	    top: 145px;
	    right: 1px;
	    position: relative;
	    background-color: #EAEAEA;
	    -webkit-transform: rotate(-90deg);
  		-moz-transform: rotate(-90deg);
  		-ms-transform: rotate(-90deg);
  		-o-transform: rotate(-90deg);
  		transform: rotate(-90deg);
  		-webkit-transform-origin: 50% 50%;
  		-moz-transform-origin: 50% 50%;
  		-ms-transform-origin: 50% 50%;
  		-o-transform-origin: 50% 50%;
  		transform-origin: 50% 50%;
  		filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
	}
	p.titulo-manzana{
		font-weight: 700;
	    margin: 0;
	    color: #000;
	    background-color: #EAEAEA;
	    
	}
	div.lote-vertical span.numero-de-lote{
		position: relative;
		top: 17px;
	}
	div.lote-horizontal span.numero-de-lote{
		position: relative;
		top: 4px;
	}
	div.lote-cuadrado span.numero-de-lote{
		position: relative;
		top: 10px;
	}
	#calle47, #calle48, #calle49, #calle49bis, #calle50, #calle52, 
	#calle173, #calle173bis, #calle174, #calle174_2, #calle174bis, #calle175, #calle175_2, #calle175bis, #calle176, #calle176_2, #calle176bis,#calle177{

		position: absolute;	
	} 
	#calle47{
		left: 495px;
		top: 100px;
	}
	#calle48{
		left: 400px;
		top: 234px;
	}
	#calle49{
		left: 400px;
		top: 347px;
	}
	#calle49bis{
		left: 400px;
		top: 462px;
	}
	#calle50{
		left: 400px;
		top: 577px;
	}

	#calle51{
		left: 400px;
		top: 522px;
	}
	#calle52{
		left: 355px;
		top: 847px;
	}
	#calle173bis{	
		top: 675px;
		left: 888px;
		white-space: nowrap;
	}
	#calle174{	
		top: 350px;
		left: 762px;
		white-space: nowrap;
	}
	#calle174_2{	
		top: 675px;
		left: 770px;
		white-space: nowrap;
	}
	#calle174bis{	
		top: 675px;
		left: 633px;
		white-space: nowrap;
	}
	#calle175{	
		top: 350px;
		left: 512px;
		white-space: nowrap;
	}
	#calle175_2{	
		top: 675px;
		left: 518px;
		white-space: nowrap;
	}
	#calle175bis{	
		top: 675px;
		left: 383px;
		white-space: nowrap;
	}
	#calle176{	
		top: 350px;
		left: 261px;
		white-space: nowrap;	
	}
	#calle176_2{
		top: 675px;
		left: 264px;
		white-space: nowrap;	
	}
	#calle176bis{	
		top: 675px;
	left: 128px;
	white-space: nowrap;
	}
	#calle177{
		top: 400px;
		left: -40px;
	}
	#calle173{
		top: 400px;
		left: 1015px;
		white-space: nowrap;
	}

	#calle173, #calle173bis, #calle174, #calle174_2, #calle174bis, #calle175, #calle175_2, #calle175bis, #calle176, #calle176_2, #calle176bis,#calle177{
	-webkit-transform: rotate(-90deg);
  		-moz-transform: rotate(-90deg);
  		-ms-transform: rotate(-90deg);
  		-o-transform: rotate(-90deg);
  		transform: rotate(-90deg);
  		-webkit-transform-origin: 50% 50%;
  		-moz-transform-origin: 50% 50%;
  		-ms-transform-origin: 50% 50%;
  		-o-transform-origin: 50% 50%;
  		transform-origin: 50% 50%;
  		filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
  		}

  	#calle173bis, #calle174, #calle174_2, #calle174bis, #calle175, #calle175_2, #calle175bis, #calle176, #calle176_2, #calle176bis, #calle48, #calle49, #calle49bis, #calle50 {
		background-color: chartreuse;
  	}

  	#plaza h1,
  	#placita h2{
  		font-size: 14px;
  		position: relative;
  		top: 41px;
  	}

  	#norte{
  		position: relative;
  		top: 30px;
  		float: right;
  	}
</style>
<!-- <meta http-equiv="refresh" content="3"> -->
</head>

<body>
<!-- Señala el Norte -->
<img src="http://gigantedeloeste.org/teros/img/Norte.jpg" id="norte" />


<!-- Calles circundantes -->
<h1 id="calle47">Calle 47</h1>
<h1 id="calle52">Ampliación Av. 52 (a ceder)</h1>
<h1 id="calle177">Calle 177</h1>
<h1 id="calle173">Av. 173</h1>

<!-- Calles internas horizontales -->
<h5 id="calle48">Calle 48</h5>
<h5 id="calle49">Calle 49</h5>
<h5 id="calle49bis">Calle 49 bis</h5>
<h5 id="calle50">Calle 50</h5>

<!-- Calles internas horizontales -->
<h5 id="calle176bis">Calle 176 bis</h5>
<h5 id="calle176">Calle 176</h5>
<h5 id="calle176_2">Calle 176</h5>
<h5 id="calle175bis">Calle 175 bis</h5>
<h5 id="calle175">Calle 175</h5>
<h5 id="calle175_2">Calle 175</h5>
<h5 id="calle174bis">Calle 174 bis</h5>
<h5 id="calle174">Calle 174</h5>
<h5 id="calle174_2">Calle 174</h5>
<h5 id="calle173bis">Calle 173 bis</h5>


<div id="page">
<?php
require_once('../db/db.php');

mysql_query("SET NAMES 'utf8'",$db);

for($m=1;$m<23;$m++){

$query = "SELECT * from lotes
			WHERE manzana = $m";

$resultado = mysql_query($query,$db) or die(mysql_error());

switch ($m) {
	case 1:
	case 2:
	case 3:
	case 4:
	case 5:
	case 6:
	case 7:
	case 8:
	case 9:
	case 10:
	case 11:
	case 12:
	case 13:
	case 14:
		$lotesPorManzana = "20";
		break;
	case 15:
	case 16:
	case 17:
	case 18:
	case 19:
	case 20:
	case 21:
	case 22:
		$lotesPorManzana = "19";
		break;
	default:
		# code...
		break;
}


echo "<div class='manzana-$lotesPorManzana'>";

echo "<p class='titulo-manzana'>Manzana $m</p>";

while($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)){
	$l = $fila["lote"];
	$d = $fila["dni-beneficiario"];
	if($fila["dni-beneficiario"] > 0){
		$sql = "SELECT beneficiarios.nombres AS nombres,
				  beneficiarios.apellidos AS apellidos
				  FROM beneficiarios
				  WHERE dni = " . $fila["dni-beneficiario"] . " LIMIT 1";
		$query = mysql_query($sql, $db) or die(mysql_error());
		while($result = mysql_fetch_array($query, MYSQL_ASSOC)){
				$n = $result["nombres"] . " " . $result["apellidos"];
			}
	}
		if($fila["dni-beneficiario"]=="0"){//si el campo DNI beneficiario tiene un valor diff a 0
			$class = "disponible";
			$title = ""; 
		}else{
			$class = "ocupado";
			$title = $n . " DNI " . $d;
		}

		if($lotesPorManzana == "20" ){
			$tipoDeLote = "lote-vertical";
		}
		if($lotesPorManzana == "19" && ($l==17 || $l==18 || $l==19 || $l==1) ){
			$tipoDeLote = "lote-vertical";
		}
		if($lotesPorManzana == "19" && ($l==2 || $l==3 || $l==4 || $l==5 || $l==6 || $l==7 || $l==11 || $l==12|| $l==13 || $l==14 || $l==15 || $l==16) ){
			$tipoDeLote = "lote-horizontal";
		}
		if($lotesPorManzana == "19" && ($l==8 || $l==9 || $l==10) ){
			$tipoDeLote = "lote-cuadrado";
		}
		echo "<div id='l".$l."' class='".$class." $tipoDeLote' title='".$title."' ><span class='numero-de-lote'>".$l."</span></div>";
	}
	echo "</div>";
	if($m == 13){//Luego de la manzana 13 imprime plazas y espacio cedido para equipamiento Urbano
		echo "<div id='equipamiento-comunitario'><p>Espacio reservado para equipamiento comunitario</p></div>";
		echo "<div id='plaza'><h1>Plaza</h1></div>";
		echo "<div id='placita'><p>Espacio reservado para equipamiento comunitario</p></div>";
		//echo "<div id='equipamiento-comunitario'><p>Espacio reservado para equipamiento comunitario</p></div>";
	}
	if($m == 14){//Separa los lotes verticales de los apaisados
		echo "<div style='clear:both'> </div>";
	}
}

mysql_free_result($resultado);
mysql_close($db);
?>
</div>
</body>
</html>