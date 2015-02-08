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
	
	<!-- Pedro -->
	<script type="text/javascript">
		 //Opciones del reCaptcha Plugin
		 var RecaptchaOptions = {
			lang : 'es'
		 };

		 
		 //Valido que el DNI sea un numero (mínimo)
		function validateForm()
		{
		var x=document.forms["form"]["DNI"].value;

			if (x=="" || isNaN(x) || x < 8888888 || x > 99999999)
			  {
			  alert("DNI incorrecto \n Escriba el DNI sin puntos");
			  return false;
			  }else{
			  document.forms["form"].submit();
			  }  
		}
	</script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">
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
                        <a href="#formulario">Formulario de consulta</a>
                    </li>                
					<li class="page-scroll">
                        <a href="#contact">Contacto</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <section class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">TEROS</h1>
						<p class="chica">Grupo Unificado Pro.Cre.Ar La Plata <br /> Zona Oeste</p>
                        <p class="intro-text">La unión y la organización<br /> hacen los sueños realidad.</p>
                        <div class="page-scroll">
                            <a href="#formulario" class="btn">
                                Consulta de datos personales
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="formulario" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              
                <?php
				require_once("formularioConsulta.php");
				?>
				
            </div>
        </div>
    </section>  
	
 <section id="contact" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">	
					<h2>Grupo Unificado Pro.Cre.Ar - La Plata <br /> Zona Oeste </h2>
						<p>Compra de terreno + construcción</p>
						<p>Contacto: prensagigantelp@gmail.com</p>
						<ul class="list-inline banner-social-buttons">
							<li><a href="https://www.facebook.com/groups/744232052253926/" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
							</li>				
						</ul>
						<br /><br />
				</div>
            </div>
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
