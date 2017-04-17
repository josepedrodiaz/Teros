<!DOCTYPE html>
<html>
<head>
<title>ADMIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<style type="text/css">
.estilo1 {
	text-align: center;
	color: #F00;
	font-weight: bold;
}
</style>
</head>

<body>
<table width="500" border="0" align="center">
  <tr>
    <td height="45" align="center"><img src="logo.jpg" width="319" height="191" /></td>
  </tr>
  <tr>
    <td height="45" align="center"><!-- <a href="agregarbeneficiario.php">Agregar beneficiario </a> --></td>
  </tr>
  <tr>
    <td width="486" height="38" align="center"><a href="listadobeneficiarios.php">Ver listado de beneficiarios</a></td>
  </tr>
  <tr>
    <td height="38" align="center"><a href="crearevento.php">Crear un evento/asamblea</a></td>
  </tr>
  <tr>
    <td height="38" align="center"><a href="listadoeventos.php">Ver listado de eventos/asambleas</a></td>
  </tr>
  <tr>
    <td height="38" align="center"><a href="elegirlotes.php">Elegir lotes</a></td>
  </tr>
  <tr>
    <td height="38" align="center">Ver listado de asistentes a eventos: <?php include("selectEventos.php"); /*genero el select de Eventos*/ ?> </td>
  </tr>
</table>
</body>
</html>