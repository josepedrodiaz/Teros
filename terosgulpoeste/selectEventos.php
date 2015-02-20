<?php
require_once('../db/db.php'); 
#GET data de evento
$query_evento = "SELECT id, nombre, fecha FROM eventos";
$result_evento = mysql_query($query_evento, $db) or die(mysql_error());
?>

<select name="id_evento" onchange="manda(this.value)">
<option value="" selected>Seleccionar un evento para ver el listado de asistentes</option>

<?php
while($row = mysql_fetch_array($result_evento)){
  $id_evento = $row["id"];
  $nombre_evento = $row["nombre"];
  $fecha_evento = $row["fecha"];
?>

<option value="<?php echo $id_evento; ?>"> <?php echo  $nombre_evento; ?> (<?php echo  $fecha_evento; ?>) </option>

<?php
}
mysql_free_result($result_evento);
?>
</select>

<script languaje="JavaScript">
	function manda(url){
		javascript:location.href = "listados.php?id_evento=" + url;
		}
</script>