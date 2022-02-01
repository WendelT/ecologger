<?php
session_start();
include_once('verifica_login.php');
header('Content-Type: application/json');

    $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "smartlogger";              // Database name
    $username = "smartlogger";		// Database username
    $password = "F@%KNcle#d0fUo";	        // Database password

    $conn = new mysqli($host, $username, $password, $dbname);
    $tarifasQuery = "SELECT valor, data_inicio, data_fim FROM tarifa WHERE UF IN (SELECT estado FROM cliente_unidade WHERE id_unidade='Frigorifico')";
                $consulta = mysqli_query($conn,$tarifasQuery);
                $data = array();
                var_dump($consulta);
                foreach($consulta as $row){
                    $data[] = $row;
                }
                $aResult['result'] = $data;
            var_dump($aResult);
    
?>
<html>
    h1
</html>