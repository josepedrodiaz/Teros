<?php 
require_once('../db/db.php'); 

$id_evento = $_GET["id_evento"];

#GET data de evento
$query_evento = "SELECT nombre, fecha FROM eventos
                  WHERE id = $id_evento";
$result_evento = mysql_query($query_evento, $db) or die(mysql_error());
while($row = mysql_fetch_array($result_evento)){
  $nombre_evento = $row["nombre"];
  $fecha_evento = $row["fecha"];
}
mysql_free_result($result_evento);


#GEt listado de asistentes
$query = "SELECT b.nombres AS nombres, b.apellidos AS apellidos, b.dni AS dni 
          FROM asistencia a, beneficiarios b
          WHERE a.id_evento = $id_evento
          AND a.dni = b.dni
          ORDER BY b.apellidos ASC";
$result = mysql_query($query) or die(mysql_error());

$total = mysql_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Listado</title>
</head>

<body>
<h1>EVENTO: <?=$nombre_evento?> (<?=$fecha_evento?>)</h1>
<h2>Total de asistentes a este evento: <?= $total ?></h2>
<p><a href="index.php">Atrás</a></p>
<table>
<?php
while($row = mysql_fetch_array($result)){ #recorre el arreglo de resultados y arma la tabla
  ?>

<tr><td><?=$row["apellidos"]?></td><td><?=$row["nombres"]?></td><td><?=$row["dni"]?></td></tr>
<?php
}
?>
</table>

<p><a href="index.php">Atrás</a></p>

</body>
</html>
<?php
mysql_free_result($result);
?>
