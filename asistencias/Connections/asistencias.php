<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_asistencias = "localhost";
$database_asistencias = "teros";
$username_asistencias = "root";
$password_asistencias = "Jac6992!";
$asistencias = mysql_pconnect($hostname_asistencias, $username_asistencias, $password_asistencias) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_asistencias, $asistencias);
?>