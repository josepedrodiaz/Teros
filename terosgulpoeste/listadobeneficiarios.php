<?php require_once('Connections/terosgulpoeste.php'); ?>
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
mysql_select_db($database_terosgulpoeste, $terosgulpoeste);
$query_beneficiarios_list = "SELECT * FROM beneficiarios ORDER BY apellidos ASC";
$beneficiarios_list = mysql_query($query_beneficiarios_list, $terosgulpoeste) or die(mysql_error());
$row_beneficiarios_list = mysql_fetch_assoc($beneficiarios_list);
$totalRows_beneficiarios_list = mysql_num_rows($beneficiarios_list);
?>
<table width="600" border="0" align="center" >
  <tr>
    <td height="45" align="center"><a href="index.php"><img src="logo.jpg" alt="" width="319" height="191" /></a></td>
  </tr>
  <tr>
    <td width="486" height="152" align="center"><table align="center" style="border-collapse: collapse; color: #000000;" border="1"><tr>
          <td width="211" align="center" bgcolor="#000000" class="fuente1">Apellidos</td>
          <td width="220" align="center" bgcolor="#000000" class="fuente1">Nombres</td>
          <td width="141" align="center" bgcolor="#000000" class="fuente1">DNI</td>
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
				?>"><?php echo $row_beneficiarios_list['apellidos']; ?></td>
            <td align="center" bgcolor="<?php 
			if($par == 1) {
				echo '#A9F5F2'; 
			} else {
				echo '#FFFFFF';
			}
				?>"><?php echo $row_beneficiarios_list['nombres']; ?></td>
            <td align="center" bgcolor="<?php 
			if($par == 1) {
				echo '#A9F5F2'; 
			} else {
				echo '#FFFFFF';
			}
				?>"><?php echo $row_beneficiarios_list['dni']; ?></td>
          </tr>
          <?php } while ($row_beneficiarios_list = mysql_fetch_assoc($beneficiarios_list)); ?>
    </table></td>
  </tr>
</table>
<?php
mysql_free_result($beneficiarios_list);
?>
