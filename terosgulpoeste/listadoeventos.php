<?php require_once('../db/db.php'); ?>
<?php
$contador1=0;

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<style type="text/css">
.fuente1 {
	color: #FFF;
	font-weight: bold;
}
</style>
 
<header>

<style type="text/css">
.estilo1 {
	text-align: center;
	color: #F00;
	font-weight: bold;
}
</style>
</header>
<?php 
mysql_select_db($database_db, $db);
$query_eventos_list = "SELECT * FROM eventos ORDER BY fecha ASC";
$eventos_list = mysql_query($query_eventos_list, $db) or die(mysql_error());
$row_eventos_list = mysql_fetch_assoc($eventos_list);
$totalRows_eventos_list = mysql_num_rows($eventos_list);
?>
<table width="500" border="0" align="center" >
  <tr>
    <td height="45" align="center"><a href="index.php"><img src="logo.jpg" alt="" width="319" height="191" /></a></td>
  </tr>
  <tr>
    <td width="486" height="152" align="center"><table align="center" style="border-collapse: collapse; color: #000000;" border="1"><tr>
          <td width="214" align="center" bgcolor="#000000" class="fuente1">Nombre del evento</td>
          <td width="185" align="center" bgcolor="#000000" class="fuente1">Fecha</td>
          </tr>
        <?php do { 
		$contador1 = $contador1 + 1;
		  
		if($contador1%2) 
			$par = 0;
		else 
			$par = 1;
		?>
          <tr>
            <td align="center" bgcolor="<?php 
			if($par == 1) {
				echo '#A9F5F2'; 
			} else {
				echo '#FFFFFF';
			}
				?>"><?php echo $row_eventos_list['nombre']; ?></td>
            <td align="center" bgcolor="<?php 
			if($par == 1) {
				echo '#A9F5F2'; 
			} else {
				echo '#FFFFFF';
			}
				?>"><?php echo date('d-m-Y', strtotime($row_eventos_list['fecha'])); ?></td>
          </tr>
          <?php } while ($row_eventos_list = mysql_fetch_assoc($eventos_list)); ?>
    </table></td>
  </tr>
</table>
<?php
mysql_free_result($eventos_list);
?>
