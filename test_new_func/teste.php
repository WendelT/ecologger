<?php
$host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
$dbname = "smartlogger";              // Database name
$username = "smartlogger";		// Database username
$password = "F@%KNcle#d0fUo";	        // Database password

$conn = new mysqli($host, $username, $password, $dbname);

$queryListunidades = "SELECT DISTINCT id_cliente AS clientsName FROM tab_final";
    $consulta = mysqli_query($conn, $queryListunidades);
    $data = array();
    if(mysqli_num_rows($consulta)>0){
        echo mysqli_num_rows($consulta) . "<br>";
        while($row = mysqli_fetch_assoc($consulta)){
          echo $row['clientsName'] . '<br>';
          $data[] = $row["clientsName"];
        }
    }

    echo count($data);
    //$aResult['result'] = mysqli_fetch_assoc($consulta)['clientsName'];
    //$aResult['result'] = $data;
    mysqli_close($conn);

?>