<form action="result.php" method="post" name="form">
<table   border="0" align="center" cellpadding="0" cellspacing="10">
  <tr>
    <td><h3>Consulta de datos personales</h3></td>
  </tr>
  <tr>
    <td>	
	<p>Seleccionar fracción en la que figura</p>	
	</td>
  </tr>
  <tr>
    <td align="center">
    <select class="input-large form-control" name="lote" id="lote">
    <option value="A">A</option>
    <option value="D">D</option>
	<option value="E">E</option>
    </select>    
    </td>
  </tr>
  <tr>
    <td><br /><br />
   <p>Ingresar DNI sin puntos</p>
    </select>    
    </td>
  </tr>
  <tr>
    <td><input class="form-control" type="text" name="DNI" id="dni" /></td>
  </tr>
  <tr>
    <td align="center">
	
	
		<?php
          require_once('recaptcha/recaptchalib.php');
          $publickey = "6LfqP_ESAAAAADYEVKfATvruV9cOARKsPys0AfGG"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
	</td>
  </tr>
  <tr>
    <td><input class="btn btn-default" type="button" value="Consultar datos" onClick="validateForm()" /></td>
  </tr>
</table>
</form>