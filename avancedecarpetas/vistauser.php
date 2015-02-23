<?php

//si todos los items estan completos usar la clase panel-collapse collapse sino usar panel-collapse collapse in

//Niveles de progreso va del 0 al 100

$niveldeprogreso = 81;

//Grupos de opciones false abierto, true cerrado

$grupo1 = false;
$grupo2 = false;
$grupo3 = false;

if($grupo1 == false)
    $grupo1_resultado = 'panel-collapse collapse in';
    else
        $grupo1_resultado = 'panel-collapse collapse';

if($grupo2 == false)
    $grupo2_resultado = 'panel-collapse collapse in';
    else
        $grupo2_resultado = 'panel-collapse collapse';

if($grupo3 == false) 
    $grupo3_resultado = 'panel-collapse collapse in';
    else
        $grupo3_resultado = 'panel-collapse collapse';

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

 <!-- Switch button CSS --> 
 <link rel="stylesheet" href="http://olance.github.io/jQuery-switchButton/jquery.switchButton.css">

 <!-- Optional theme -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

 <title>El Gigante del Oeste</title>
</head>
<body>
    <p><p>
    <header>
        <div class="container">
            <div class="col-md-7 col-xl-7">
                <h4>Apellido y Nombre:</h4><p>
                <h4>DNI: 11.111.111</h4><br>
            </div>
            <div class="progress col-md-5 col-xl-5">
                <?php
                //Niveles de avance del 0 al 49%
                if($niveldeprogreso >= 0 && $niveldeprogreso <= 49) { 
                    ?>
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $niveldeprogreso;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $niveldeprogreso;?>%">
                        <span class="sr-only"><?php echo $niveldeprogreso;?>% Complete (danger)</span><?php echo $niveldeprogreso;?> %
                    </div>

                <?php 
                }

                //Niveles de avance del 50 al 79%
                if($niveldeprogreso >= 50 && $niveldeprogreso <= 79) { 
                    ?>
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $niveldeprogreso;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $niveldeprogreso;?>%">
                        <span class="sr-only"><?php echo $niveldeprogreso;?>% Complete (warning)</span><?php echo $niveldeprogreso;?> %
                    </div>

                <?php 
                }

                //Niveles de avance del 80 al 100%
                if($niveldeprogreso >= 80 && $niveldeprogreso <= 100) { 
                    ?>
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $niveldeprogreso;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $niveldeprogreso;?>%">
                        <span class="sr-only"><?php echo $niveldeprogreso;?>% Complete (success)</span><?php echo $niveldeprogreso;?> %
                    </div>

                <?php 
                }
                ?>

            </div>
        </div>
    </header>
    <div class="container">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-controls="collapseOne">
                  Grupo de items #1
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="<?php echo $grupo1_resultado;?>" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        Opcion 1
                      </label>
                    </div><p>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        Opcion 2
                      </label>
                    </div><p>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        Opcion 3
                      </label>
                    </div><p>
                </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-controls="collapseTwo">
                  Grupo de items #2
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="<?php echo $grupo2_resultado;?>" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        Opcion 1
                      </label>
                    </div><p>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        Opcion 2
                      </label>
                    </div><p>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        Opcion 3
                      </label>
                    </div><p>
                </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseThree">
                  Grupo de items #3
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="<?php echo $grupo3_resultado;?>" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        Opcion 1
                      </label>
                    </div><p>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        Opcion 2
                      </label>
                    </div><p>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="">
                        Opcion 3
                      </label>
                    </div><p>
                </div>
          </div>
        </div>
    </div>
    <footer>
        <class class="text-center"><a href="#"><h3>Ver avance general</h3></a></class>
    </footer>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- JQUERY UI -->
    <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
    <!-- Switch Button -->
    <script src="http://olance.github.io/jQuery-switchButton/jquery.switchButton.js"></script>
</body>
</html>