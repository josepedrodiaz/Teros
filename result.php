<?php
setlocale(LC_ALL,'es_ES');
$lote =  $_POST["lote"];

//Seleccina la hoja de cáculo de acuerdo al lote elegido
if($lote == "A"){
	$worksheetID = 'od6';
	//Armo el listado de referentes para el mensaje dfinal de contacto
	$referentes ='<a href="https://www.facebook.com/Marisssh" target="_blank">Marissa Carr</a>, <a href="https://www.facebook.com/m.jimena.cazalla" target="_blank">M. Jimena Cazalla</a> o <a href="https://www.facebook.com/laura.berardoni.5" target="_blank">Laura Berardoni</a>';
}else if($lote == "D"){
	$worksheetID = 'od7';
	//Armo el listado de referentes para el mensaje dfinal de contacto
	$referentes ='<a href="https://www.facebook.com/profile.php?id=100000082944460" target="_blank">Silvia Garcia</a>, <a href="https://www.facebook.com/elizabeth.quiroga.10" target="_blank">Elizabeth Quiroga</a>, <a href="https://www.facebook.com/gisela.zalazar.338" target="_blank">Gizela Salazar</a>, <a href="https://www.facebook.com/evangelina.command" target="_blank">Evangelina Command</a> o <a href="https://www.facebook.com/p3dr0d14z" target="_blank">Pedro Díaz</a>';
}else if($lote == "E"){
	$worksheetID = 'od5';
	//Armo el listado de referentes para el mensaje dfinal de contacto
	$referentes ='<a href="https://www.facebook.com/flor.sinmaceta?fref=ts">Florencia</a>';
}else{
	die("ERROR WS ID". $lote);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Herramienta de consulta de datos de los Consorcios de la Zona Oeste. Teros GULP.">
    <meta name="author" content="Pedro Diaz">

    <title>Gestión Online - Teros GULP - Zona Oeste</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Tienne' rel='stylesheet' type='text/css'>

    <!-- Custom Theme CSS -->
    <link href="http://elmistihostels.com/pedro/pedrodiaz.no-ip.org/css/grayscale.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">
                    <span class="light">Inicio</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php#formulario">Formulario de consulta</a>
                    </li>                
					<li class="page-scroll">
                        <a href="index.php#contact">Contacto</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	 <section class="container content-section">
                <div class="row">
					 <table width="600" border="0" align="center" cellpadding="0" cellspacing="10">
						  <tr>
							<td><h3>Consulta por DNI</h3></td>
						  </tr>
							  <tr>
								<td>
								<p>Lote <?= $lote ?> - Teros GULP - Zona Oeste </p>

					  <?php
					  require_once('recaptcha/recaptchalib.php');
					  $privatekey = "6LfqP_ESAAAAANPn8S8bWUnUwpo-MoeTzGZ-lHRj";
					  $resp = recaptcha_check_answer ($privatekey,
													$_SERVER["REMOTE_ADDR"],
													$_POST["recaptcha_challenge_field"],
													$_POST["recaptcha_response_field"]);

					  if (!$resp->is_valid) {
						// What happens when the CAPTCHA was entered incorrectly
						if($resp->error == "incorrect-captcha-sol"){
							echo "Código incorrecto, vuelva a intentarlo.";
							echo '<p align="center"><a href="index.php#formulario">Volver</a></p>';
						}else{
							echo  "(ERROR: " . $resp->error . ")";
							 }
					  } else {
					//ESTO HAGO SI PUSO BIEN EL CAPTCHA

					$dni = $_POST["DNI"];	
						
						// load Zend Gdata libraries
						require_once 'Zend/Loader.php';
						Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
						Zend_Loader::loadClass('Zend_Gdata_ClientLogin');

						// set credentials for ClientLogin authentication
						$user = "gmailuser@gmail.com";
						$pass = "xxxxx";

						try {  
						  // connect to API
						  $service = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
						  $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
						  $service = new Zend_Gdata_Spreadsheets($client);

						  
						  // define worksheet query
						  // get list feed for query
						  $query = new Zend_Gdata_Spreadsheets_ListQuery();
						  $query->setSpreadsheetKey('0AmB8IYe_ePCudHVNMGw2TzF5MldtRWxBemRjYXYtX0E');
						   $query->setWorksheetId($worksheetID);
						  $query->setSpreadsheetQuery('dni='.$dni);
						  $listFeed = $service->getListFeed($query);
						  
						  
						  
						} catch (Exception $e) {
							die('ERROR: ' . $e->getMessage());		
						} 
						
						if(count($listFeed)==0 && $dni!== ""){
						$dniConPuntos = substr($dni, 0,2) . '.' . substr($dni, 2,3). '.' . substr($dni, 5);
						echo "<p>No hay resultados para el DNI $dniConPuntos en la fracción $lote</p>";
						echo '<p align="center"><a href="index.php#formulario">Volver</a></p>';
						}else{
						
						//Itero entre filas
							  foreach ($listFeed as $listEntry) {//fila x fila
								$rowData = $listEntry->getCustom();
								$i=0;
									foreach($rowData as $customEntry) { //celda x  celda
									  //Asigno las variables a los datos que voy ausar de ese registro				  
									  if($i==1){
									  $orden = $customEntry->getText();
									  }				  
									  if($i==3){
									  $apellido = $customEntry->getText();
									  }
									  if($i==2){
									  $nombre = $customEntry->getText();
									  }		  
									  if($i==7){
									  $tel = $customEntry->getText();
									  }	
									  if($i==8){
									  $dni = $customEntry->getText();
									  $dniRaw = $dni;
									  $dni = substr($dni, 0,2) . '.' . substr($dni, 2,3). '.' . substr($dni, 5);
									  }	
									  if($i==9){
									  $cuil = $customEntry->getText();
									  }
									  if($i==10){
									  $e_civil = $customEntry->getText();
									  }
									  if($i==11){
									  $nombre_conyugue = $customEntry->getText();
									  }
									  if($i==12){
									  $apellido_conyugue = $customEntry->getText();
									  }
									  if($i==13){
									  $dni_conyugue = $customEntry->getText();
									  if($dni_conyugue != ""){
										$dni_conyugue = substr($dni_conyugue, 0,2) . '.' . substr($dni_conyugue, 2,3). '.' . substr($dni_conyugue, 5);
									  }
									  }	
									  if($i==14){
									  $nombre_padre = $customEntry->getText();
									  }	
									  if($i==15){
									  $apellido_padre = $customEntry->getText();
									  }	
									  if($i==16){
									  $nombre_madre = $customEntry->getText();
									  }
									  if($i==17){
									  $apellido_madre = $customEntry->getText();
									  }
									  if($i==18){
									  $sexo = $customEntry->getText();
									  }
									  if($i==19){
									  $calle = $customEntry->getText();
									  }
									  if($i==20){
									  $ciudad = $customEntry->getText();
									  }
									  if($i==21){
									  $fecha_nacimiento = $customEntry->getText();
									  }				  
									  $i++;
									}
							  }
							  
							  //echo "<b>No. de Orden Interno:</b> " . $lote . "-" . $orden;
							  echo "<br /><b>Nombre:</b> " . mb_strtoupper($nombre . " " . $apellido, 'UTF-8');
							  echo "<br /><b>Fecha de Nacimiento:</b> " . $fecha_nacimiento;
							  echo "<br /><b>Sexo:</b> " . strtoupper($sexo);
							  echo "<br /><b>DNI:</b> " . $dni;
							  echo "<br /><b>CUIL:</b> " . $cuil;
							  echo "<br /><b>Dirección:</b> " . ucwords($calle);
							  echo "<br /><b>Ciudad:</b> " . ucwords($ciudad);
							  echo "<br /><b>Telefono:</b> " . $tel;
							  echo "<br /><b>Estado Civil:</b> " . ucwords($e_civil);
							  echo "<br /><b>Nombre Padre:</b> " . mb_strtoupper($nombre_padre . " " . $apellido_padre, 'UTF-8');
							  echo "<br /><b>Nombre Madre:</b> " . mb_strtoupper($nombre_madre . " " . $apellido_madre, 'UTF-8');  
							   echo "<br /><b>Nombre conyugue:</b> " . mb_strtoupper($nombre_conyugue . " " . $apellido_conyugue, 'UTF-8');
							   echo "<br /><b>DNI conyugue:</b> " . $dni_conyugue;		 
							   
						?> 	  
							   
							   <hr />
						  <div style="width:100%">
						  <h3>VERIFICAR </h3>
								<ul>
								<li>Que <b><u>todos</u></b> los datos estén completos</li> 
								<li>Que la dirección sea la que figura en el DNI del beneficiario</li> 			
								
							<br />						
							
							<div id="datosNO" class="prettyprint style="display:none">
							<h4>Si tiene datos incorrectos o incompletos contactarse por mensaje privado con <?= $referentes ?></h4>														
							</div>
								
						 </div>
						  
						  
						  <p align="center"><a href="index.php">Volver</a></p>						  
						  
						 
						<?php
						}//FINAL DE DESPLIEGUE DE DATOS SI HAY DOCUMENTO ASOCIADO	  
						  
					  }//FINAL DE SUCESO RECAPTCHA
					  ?>	
						 
						 </td>
							  </tr>
							</table>
						</div>
					</section>
 <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="http://elmistihostels.com/pedro/pedrodiaz.no-ip.org/js/grayscale.js"></script>

	<!-- Analytics -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-49589151-1', 'no-ip.org');
	  ga('send', 'pageview');

	</script>
	
	
</body>

</html>
