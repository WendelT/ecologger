<?php 

define('host','smartlogger.mysql.dbaas.com.br');
define('dbname','smartlogger');
define('username','smartlogger');
define('password','F@%KNcle#d0fUo');

$conn = mysqli_connect(host,username,password,dbname) or die('Não foi possível conectar ao servidor');