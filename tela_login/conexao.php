<?php
define('HOST', 'smartlogger.mysql.dbaas.com.br');
define('USUARIO','smartlogger');
define('SENHA', 'F@%KNcle#d0fUo');
define('DB', 'smartlogger');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Não foi possível conectar');
