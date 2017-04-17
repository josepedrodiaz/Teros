<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script>

  $().ready(function() {

    $("#form").validate({
      rules: {
        dni: "required"
      },
      messages: {
        dni: " <h4>Ingresa un DNI</h4>"
      }
    });

  });
  </script>
  <style>
  body {
      font-family: Arial, Helvetica;
  }



  #content{
    position: fixed;
    left: 50%;
    top: 50%;

    height: 400px;
    margin-top: -400px;

    width: 600px;
    margin-left: -300px;
    color: #615639;
    padding: 100px;
  }

  input, select {
    padding: 10px;
    width: 150px;
    height: 30px;
    font-size: 18px;
  }

  select{
    -webkit-appearance: menulist-button;
  }
  
</style>

  <title>Elegir lotes</title>
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body <?php if(!isset($_POST['enviar'])) { echo 'onload="document.form.dni.focus()"'; } ?> >

<div id="content">

<img src="logo.jpg" width="319" height="191" longdesc="index.php" />

  <?php
if(isset($_POST['enviar'])) 
{ 
   require_once('../db/db.php');
   
   
   //Checkeo que el DNI sea correcto
   $queryDNI = "SELECT dni FROM beneficiarios
   				WHERE dni = ". $_POST["dni"];
				
	$result_DNI = mysql_query($queryDNI, $db) or die(mysql_error() . " #1");
	
	if(mysql_num_rows($result_DNI) == 0 ) die ("NO SE ENCUENTRA EL DNI ". $_POST["dni"]);
	
	//Checkeo que el el lote exista
   $queryLOTE = "SELECT id, `dni-beneficiario` as dni FROM lotes
   				WHERE manzana = ". $_POST["manzana"] . "
				AND lote = " .  $_POST["lote"] ;
	$result_LOTE = mysql_query($queryLOTE) or die(mysql_error() . " #2");
				
	if(mysql_num_rows($result_LOTE) == 0 ) die ("NO SE ENCUENTRA EL LOTE ". $_POST["lote"] . " dentro de la manzana ". $_POST["manzana"]  );
	
	//Checkeo que el lote este disponible para elegir
	while($row = mysql_fetch_array($result_LOTE)){
			$dni = $row["dni"];
			$id = $row["id"];
		}

  if($dni > 0 ) die("EL LOTE YA ESTA ELEGIDO POR EL VECINO QUE TIENE SIGUIENTE DNI: " . $dni);

  //CHECKEO que ese DNI ya no haya elegido un lote
   $queryDNIonLotes = "SELECT `dni-beneficiario` as dni FROM lotes
          WHERE `dni-beneficiario`  = ". $_POST["dni"];
        
  $result_DNIonLotes = mysql_query($queryDNIonLotes, $db) or die(mysql_error() . " #3");
  
  if(mysql_num_rows($result_DNIonLotes) > 0 ) die ("ESTE DNI YA ELIGIO UN LOTE ". $_POST["dni"]);
	

	
	
	//Si todo anda bien hago el INSERT
	$updateLote = "UPDATE lotes
					SET `dni-beneficiario` = " . $_POST["dni"] . "
					WHERE id = " . $id;
	$queryUpdate = mysql_query($updateLote) or die(mysql_error() . " #4 " . $updateLote);
	
	echo "<p>Se ha seleccionado el lote correctamente</p>";
	
}
?>


<h3>ELEGIR LOTE </h3>

<form id="form" name="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="10">
  <tr>
    <td><label>
      <input type="text" name="dni" id="dni"  placeholder="DNI" maxlength="8" />
    </label></td>
  </tr>
  <tr>
    <td>MANZANA</td>
  </tr>
  <tr>
    <td><label>
      <select name="manzana" id="manzana">
      <script language="javascript">
      for (var i = 1; i < 23; i ++ ){
		  document.write("<option value=\""+i+"\">"+i+"</option>");
	  }
      </script>
      </select>
    </label></td>
  </tr>
  <tr>
    <td>LOTE</td>
  </tr>
  <tr>
    <td><label>
      <select name="lote" id="lote">
      <script language="javascript">
      for (var i = 1; i < 21; i ++ ){
		  document.write("<option value=\""+i+"\">"+i+"</option>");
	  }
      </script>
      </select>
    </label></td>
  </tr>
  <tr>
    <td><input type="submit" name="enviar" id="enviar" value="Elegir Lote" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>

</body>
</html>

