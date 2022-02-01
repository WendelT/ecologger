<?php

header('Content-Type: application/json');
    $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "smartlogger";              // Database name
    $username = "smartlogger";		// Database username
    $password = "F@%KNcle#d0fUo";	        // Database password



    $conn = new mysqli($host, $username, $password, $dbname);
    
    $range = $_GET['range'];
    $time = $_GET['range2'];
    $nm = $_GET["nome"]; //client name
    $dt1= $_GET["data_inicial"];
    $dt2= $_GET["data_final"];
    $tm1 = $_GET['time1']; //start time
    $tm2 = $_GET['time2']; // end time   
    $pos = $_GET['position']; //array position

    if($range == '7daysAgo' ||$range == '30daysAgo'|| $range == 'chooseRange' ){
        $sql = "SELECT date AS x, POWER((SPLIT_STRI(dados_list,',', $pos)),1) y FROM tab_final WHERE (id_unico='".$nm."') AND (date BETWEEN '".$dt1."' AND '".$dt2."')";
    }
    else if($range == 'hoje'|| $range == 'ontem') {
        switch($time!=''){
            case($time=='yes'):
                $sql = "SELECT hms_server AS x, POWER((SPLIT_STRI(dados_list,',', $pos)),1) y FROM tab_final WHERE (id_unico='".$nm."') AND (date='".$dt1."') AND (hms_server BETWEEN '".$tm1."' AND '".$tm2."')";
                break;
            case($time=='no'):
                $sql = "SELECT hms_server AS x, POWER((SPLIT_STRI(dados_list,',', $pos)),1) y FROM tab_final WHERE (id_unico='".$nm."') AND (date='".$dt1."')";
                break;
            default: 
                $sql = "SELECT hms_server AS x, POWER((SPLIT_STRI(dados_list,',', $pos)),1) y FROM tab_final WHERE (id_unico='".$nm."') AND (date='".$dt1."')";
            }  
    } else {
        $sql = "SELECT date AS x, POWER((SPLIT_STRI(dados_list,',', $pos)),1) y FROM tab_final WHERE (id_unico='".$nm."') AND (date BETWEEN '".$dt1."' AND '".$dt2."')";
    }

        
    $result = mysqli_query($conn,$sql);
    
    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }
    echo $data['y'];
        
    mysqli_close($conn);
        
    echo json_encode($data);
    
        
   
?>
