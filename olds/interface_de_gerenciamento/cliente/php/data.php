<?php

header('Content-Type: application/json');
    $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "smartlogger";              // Database name
    $username = "smartlogger";		// Database username
    $password = "F@%KNcle#d0fUo";	        // Database password



    $conn = new mysqli($host, $username, $password, $dbname);
    
    $nm = $_GET["nome"];
    $dt1= $_GET["data_inicial"];
    $dt2= $_GET["data_final"];
     

    $sql = "SELECT DATE(date) as DATE, SUM(SPLIT_STRI(dados_list,',', 2)) totalEner FROM tab_final WHERE (id_unico='".$nm."') AND (DATE BETWEEN '".$dt1."' AND '".$dt2."' ) GROUP BY DATE(date)";
       
    $result = mysqli_query($conn,$sql);
    
    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }
    echo $data['totalEner'];
        
    mysqli_close($conn);
        
    echo json_encode($data);
        
?>
