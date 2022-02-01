<?php

header('Content-Type: application/json');
    $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "smartlogger";              // Database name
    $username = "smartlogger";		// Database username
    $password = "F@%KNcle#d0fUo";	        // Database password


// Establish connection to MySQL database
    $conn = new mysqli($host, $username, $password, $dbname);
    //$sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";

   
    //$dt1= "2021-07-27";
    
       $nm = $_GET["nome"];
       $dt1= $_GET["data_inicial"];
       $dt2= $_GET["data_final"];
        //$nm =mysql_real_escape_string($_POST['nome']);
        //$dt2 = $_POST['data_superior'];
        //$dt1 = $_POST['data_inferior'];
        //CREATE FUNCTION SPLIT_STR(
            //x VARCHAR(255),
            //delim VARCHAR(12),
            //pos INT
          //)
          //RETURNS VARCHAR(255)
          //RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(x, delim, pos),
                 //LENGTH(SUBSTRING_INDEX(x, delim, pos -1)) + 1),
                 //delim, '');

        $sql = "SELECT DATE(date) as DATE, SUM(SPLIT_STRI(dados_list,',', 2)) totalEner FROM teste_tab1 WHERE (value1='".$nm."') AND (DATE BETWEEN '".$dt1."' AND '".$dt2."' ) GROUP BY DATE(date)";
        //$sql = "SELECT id, value1, value2, date FROM filter_test";
        $result = mysqli_query($conn,$sql);
    
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        echo $data['totalEner'];
        
        mysqli_close($conn);
        
        echo json_encode($data);
    
        //$sql = "SELECT    DATE(date) as DATE, SUM(value2) totalEner FROM filter_test WHERE value1='lorena' GROUP BY DATE(date)";
        
    
    //$sql = "SELECT id, value1, value2, DISTINCT date FROM filter_test WHERE value1='lorena'";
    //$sql = "SELECT    DATE(date) as DATE, SUM(value2) totalEner FROM filter_test WHERE value1='lorena' GROUP BY DATE(date)";
    
   
    ?>
