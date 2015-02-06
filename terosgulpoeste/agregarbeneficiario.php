<?php require_once('Connections/terosgulpoeste.php'); ?>
<?php
$error=0;

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	
	$consultarduplicado="SELECT * FROM beneficiarios WHERE dni=".$_POST['dni'];
	$respuesta_consultarduplicado=mysql_query($consultarduplicado) or die (mysql_error());
	if (mysql_num_rows($respuesta_consultarduplicado)>0) {
		$error=1;
	} else {
		
	  $insertSQL = sprintf("INSERT INTO beneficiarios (nombres, apellidos, dni) VALUES (%s, %s, %s)",
						   GetSQLValueString($_POST['nombres'], "text"),
						   GetSQLValueString($_POST['apellidos'], "text"),
						   GetSQLValueString($_POST['dni'], "int"));
	
	  mysql_select_db($database_terosgulpoeste, $terosgulpoeste);
	  $Result1 = mysql_query($insertSQL, $terosgulpoeste) or die(mysql_error());
	
	  $insertGoTo = "index.php";
	  if (isset($_SERVER['QUERY_STRING'])) {
		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
		$insertGoTo .= $_SERVER['QUERY_STRING'];
	  }
	  header(sprintf("Location: %s", $insertGoTo));
	}

}

mysql_select_db($database_terosgulpoeste, $terosgulpoeste);
$query_beneficiarios = "SELECT * FROM beneficiarios ORDER BY apellidos ASC";
$beneficiarios = mysql_query($query_beneficiarios, $terosgulpoeste) or die(mysql_error());
$row_beneficiarios = mysql_fetch_assoc($beneficiarios);
$totalRows_beneficiarios = mysql_num_rows($beneficiarios);mysql_select_db($database_terosgulpoeste, $terosgulpoeste);

mysql_free_result($beneficiarios);


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
<script>
function cambiar(e)
{
e=e || window.event;
el=e.srcElement || e.target;
el.value=el.value.split('.').join('');
el.value=el.value.split(',').join('');
el.value=el.value.split('-').join('');
}
</script>
</header>
<p>
  <?php if($error<>1) { ?>
</p>
<table width="500" border="0" align="center">
  <tr>
    <td align="center"><a href="index.php"><img src="logo.jpg" width="319" height="191" /></a></td>
  </tr>
  <tr>
    <td height="206" align="center"><form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Nombres:</td>
          <td><input type="text" name="nombres" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Apellidos:</td>
          <td><input type="text" name="apellidos" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td height="41" align="right" nowrap="nowrap">Dni:</td>
          <td><input type="text" name="dni" value="" size="32" onKeyUp="cambiar(event)"/></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td><br />
          <td><input type="submit" value="Agregar beneficiario" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1" />
    </form></td>
  </tr>
</table>
  <?php } else { ?>
<p class="estilo1">
<table width="500" border="0" align="center">
  <tr>
    <td align="center"><a href="index.php"><img src="logo.jpg" width="319" height="191" /></a></td>
  </tr>
  <tr>
    <td width="412" height="110" align="center"><p class="estilo1">Ya existe un beneficiario con su número de DNI.</p>
    <p class="estilo1"><a href="agregarbeneficiario.php">Volver a intentarlo</a></p></td>
  </tr>
</table>
<p><a href="agregarbeneficiario.php"></a></p></p>
<?php } ?>