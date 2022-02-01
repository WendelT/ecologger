<?php

header('Content-Type: application/json');
    $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "smartlogger";              // Database name
    $username = "smartlogger";		// Database username
    $password = "F@%KNcle#d0fUo";	        // Database password


// Establish connection to MySQL database
    $conn = new mysqli($host, $username, $password, $dbname);
    //$sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";

   //echo "new version 11";
    //$dt1= "2021-07-27";
       //$pos = $_GET[]; //array position
       $nm = $_GET["nome"]; //client name
       $dt1= $_GET["data_inicial"];
       $dt2= $_GET["data_final"];
       $tm1 = $_GET['time1']; //start time
       $tm2 = $_GET['time2']; // end time
        

        //$sql = "SELECT DATE(date) as DATE, SUM(SPLIT_STRI(dados_list,',', 2)) totalEner FROM tab_final WHERE (id_cliente='".$nm."') AND (DATE BETWEEN '".$dt1."' AND '".$dt2."' ) GROUP BY DATE(date)";
        //$sql = "SELECT time AS x, POWER((SPLIT_STRI(value2,',', 2)),1) y FROM filter_test WHERE (value1='lorena') AND (date BETWEEN '2021-07-28' AND '2021-07-28')";
       $sql = "SELECT time, POWER((SPLIT_STRI(value2,',', 2)),1) totalEner FROM filter_test WHERE (value1='".$nm."') AND (date='".$dt1."') AND (time BETWEEN '".$tm1."' AND '".$tm2."')";
       //$sql = "SELECT time AS x, POWER((SPLIT_STRI(value2,',', 2)),1) y FROM filter_test WHERE (value1='".$nm."') AND (date BETWEEN '".$dt1."' AND '".$dt2."') AND (time BETWEEN '".$tm1."' AND '".$tm2."')";
        
        $result = mysqli_query($conn,$sql);
    
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        echo $data['y'];
        
        mysqli_close($conn);
        
        echo json_encode($data);
    
        //$sql = "SELECT    DATE(date) as DATE, SUM(value2) totalEner FROM filter_test WHERE value1='lorena' GROUP BY DATE(date)";
        
    
    //$sql = "SELECT id, value1, value2, DISTINCT date FROM filter_test WHERE value1='lorena'";
    //$sql = "SELECT    DATE(date) as DATE, SUM(value2) totalEner FROM filter_test WHERE value1='lorena' GROUP BY DATE(date)";
    
   
    ?>
