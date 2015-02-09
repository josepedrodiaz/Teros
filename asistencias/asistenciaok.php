<?php require_once('../db/db.php'); ?>
<?php
//testGH
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

$colname_mostrar = "-1";
if (isset($_GET['dni'])) {
  $colname_mostrar = $_GET['dni'];
}
mysql_select_db($database_db, $db);
$query_mostrar = sprintf("SELECT * FROM beneficiarios WHERE dni = %s", GetSQLValueString($colname_mostrar, "int"));
$mostrar = mysql_query($query_mostrar, $db) or die(mysql_error());
$row_mostrar = mysql_fetch_assoc($mostrar);
$totalRows_mostrar = mysql_num_rows($mostrar);
?>
<header>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<style type="text/css">
.estilo1 {
	text-align: center;
	color: #F00;
	font-weight: bold;
}
</style>
</header>

<style type="text/css">
.letra1 {
	font-size: 24px;
}
.letra2 {
	color: #F00;
	font-size: 24px;
}
</style>
<body>
<table width="600" border="0" align="center">
  <tr>
    <td height="45" align="center"><a href="controlarasistencias.php"><img src="logo.jpg" width="319" height="191"></a></td>
  </tr>
  <tr>
    <td width="486" height="125" align="center"><p class="letra1">Ha registrado su asistencia en forma correcta:</p>
      <p class="letra2"><?php echo $row_mostrar['apellidos']; ?>, <?php echo $row_mostrar['nombres']; ?></p>
      <p><span class="letra1">Gracias</span></p>
      <p>&nbsp;</p>
      <p><a href="controlarasistencias.php" id="otro">CARGAR OTRA ASISTENCIA</a><br>
       <script type="text/javascript">
	      document.getElementById("otro").focus();
	   </script>
        <br>
    </p>
<script type="text/javascript">
      document.getElementById("otro").focus();
      </script>
    </td>
  </tr>
</table>
</body>
</html><?php
mysql_free_result($mostrar);
?>
