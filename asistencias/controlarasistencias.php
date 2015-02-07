<?php require_once('../db/db.php'); ?>
<?php
$error=0;
$id_evento_pred=6;

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
	
	//controlar que el beneficiario se encuentre cargado en la base de datos
	$consultar_1="SELECT * FROM beneficiarios WHERE dni=".$_POST['dni'];
	$respuesta_consultar_1=mysql_query($consultar_1) or die (mysql_error());
	if (mysql_num_rows($respuesta_consultar_1)==0) {
		$error=1;
	} 
	//controlar que el beneficiario no haya confirmado asistencia anteriormente al evento
	$consultar_2="SELECT * FROM asistencia WHERE dni=".$_POST['dni'];
	$respuesta_consultar_2=mysql_query($consultar_2) or die (mysql_error());
	if (mysql_num_rows($respuesta_consultar_2)>0) {
		$error=2;
	} 
	if($error<>1 && $error <>2) {
		  $insertSQL = sprintf("INSERT INTO asistencia (dni, id_evento) VALUES (%s, %s)",
							   GetSQLValueString($_POST['dni'], "int"),
							   GetSQLValueString($id_evento_pred, "int"));
		
		  //mysql_select_db($database_asistencias, $asistencias) or die(mysql_error());
		  $Result1 = mysql_query($insertSQL, $db) or die(mysql_error());
		  
		  $insertGoTo = "asistenciaok.php?dni=$_POST[dni]";

		  header(sprintf("Location: %s", $insertGoTo));
	}
}

//mysql_select_db($database_asistencias, $asistencias);
$query_asistencias = "SELECT * FROM asistencia";
$asistencias = mysql_query($query_asistencias, $db) or die(mysql_error());
$row_asistencias = mysql_fetch_assoc($asistencias);
$totalRows_asistencias = mysql_num_rows($asistencias);

mysql_free_result($asistencias);
?>
<style type="text/css">
.letra1 {	font-size: 24px;
}
.letra2 {
	color: #F00;
	font-size: 36px;
}
letra3 {
	font-size: 36px;
}
#form1 p {
	color: #F00;
	font-size: 36px;
}
.letra3 {
	font-size: 36px;
	text-align: center;
}
letra4 {
	font-size: 24px;
}
letra5 {
	color: #000;
}
.letra5 {
	font-size: 24px;
	color: #000;
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
function validar(form1) {
  if(form1.dni.value.length == 0) {
    form1.dni.focus();   
    alert('Falta escribir el DNI'); 
    return false;
  }
  if(isNaN(form1.dni.value)){
    form1.dni.focus();   
    alert('El DNI ingresado debe ser un número'); 
    return false;
  } 
  return true;
}
</script>
  <tr><?php if($error==1) { ?>
  <table width="600" border="0" align="center">
  <tr>
    <td height="45" align="center"><a href="controlarasistencias.php"><img src="logo.jpg" alt="" width="319" height="191" /></a></td>
  </tr>
  <tr>
    <td width="486" height="125" align="center"><p class="letra1">
<table width="480" border="0" align="center">
        <td width="474" align="center" class="letra3"><span class="letra2">El DNI ingresado no corresponde a un beneficiario registrado
        </span></td>
  </tr>
   <tr>
        <td height="93" align="center"><a href="controlarasistencias.php" class="letra2" id="otro"><span class="letra1">
        <span class="letra5">Intentar nuevamente</span></span></a>
        <script type="text/javascript">
      document.getElementById("otro").focus();
      </script>
        </td>
  </tr>
</table>
          <?php } else {
	if($error==2) {?>
    <table width="600" border="0" align="center">
  <tr>
    <td height="45" align="center"><a href="controlarasistencias.php"><img src="logo.jpg" alt="" width="319" height="191" /></a></td>
  </tr>
  <tr>
    <td width="486" height="125" align="center"><p class="letra1">
<table width="480" border="0" align="center">
<table width="480" border="0" align="center">
  <tr>
        <td width="474" align="center" class="letra3"><span class="letra2">El DNI ingresado ya confirmo su asistencia al evento
        </span></td>
  </tr>
   <tr>
        <td height="93" align="center"><a href="controlarasistencias.php" class="letra2" id="otro"><span class="letra1"><span class="letra5">Intentar nuevamente</span></span></a>
<script type="text/javascript">
      document.getElementById("otro").focus();
      </script>
        </td>
  </tr>
</table>
<?php } else { ?>
  
</table>
<table width="600" border="0" align="center">
  <tr>
    <td height="45" align="center"><a href="controlarasistencias.php"><img src="logo.jpg" alt="" width="319" height="191" /></a></td>
  </tr>
  <tr>
    <td width="486" height="125" align="center"><form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" onsubmit="return validar(this)">
      <p>INGRESAR DNI:</p>
      <table align="center">
        <tr valign="baseline">
          <td width="192" height="86" align="center"><input name="dni" type="text" class="letra3" value="" size="10" onKeyUp="cambiar(event)"/></td>
        </tr>
        <tr valign="baseline">
          <td height="85" align="center"><input type="submit" class="letra3" value="Confirmar asistencia" /></td>
        </tr>
      </table>
      <input type="hidden" name="id_evento" value="<?php echo $id_evento_pred; ?>" />
      <input type="hidden" name="MM_insert" value="form1" />
    </form>      <p class="letra1"><br />
        <br />
      </p></td>
  </tr>
</table>
<p>&nbsp;</p>
<script>
  form1.dni.focus(); 
</script>
<?php }}?>