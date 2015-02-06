<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_terosgulpoeste = "localhost";
$database_terosgulpoeste = "teros";
$username_terosgulpoeste = "root";
$password_terosgulpoeste = "Jac6992!";
$terosgulpoeste = mysql_pconnect($hostname_terosgulpoeste, $username_terosgulpoeste, $password_terosgulpoeste) or trigger_error(mysql_error(),E_USER_ERROR); 
?>