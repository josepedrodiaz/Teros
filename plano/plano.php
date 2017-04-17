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