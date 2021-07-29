<?php

header('Content-Type: application/json');
    $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "smartlogger";              // Database name
    $username = "smartlogger";		// Database username
    $password = "F@%KNcle#d0fUo";	        // Database password


// Establish connection to MySQL database
    $conn = new mysqli($host, $username, $password, $dbname);
    //$sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";
    
    $sql = "SELECT id, value1, value3 FROM teste_tab1 WHERE value1='CLIENTE_FOR_01' LIMIT 10";
    
    $result = mysqli_query($conn,$sql);
    
    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }
    
    mysqli_close($conn);
    
    echo json_encode($data);
    ?>
