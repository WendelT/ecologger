<?php

header('Content-Type: application/json');
    $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "smartlogger";              // Database name
    $username = "smartlogger";		// Database username
    $password = "F@%KNcle#d0fUo";	        // Database password



    $conn = new mysqli($host, $username, $password, $dbname);
    $conn->query("SET lc_time_names = 'pt_BR'");
    $type = $_GET['type'];
    $pos = $_GET['position'];
    $nm = $_GET["nome"]; //client name
    $dt1 = $_GET["date1"];
    $dt2 = $_GET["date2"];
    //mysqli_query("SET GLOBAL lc_time_names=pt_BR;");

   //$teste = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $dt1) ) ));


    if($type == 'weeklyTotalEnergy' || $type == 'monthlyTotalEnergy'){

        $sql = "SELECT z.x, sum(z.w) AS y FROM (SELECT DISTINCT t1.id_inv, t1.hms_log, t1.date AS x, 
        POWER((SPLIT_STRI(dados_list,',', $pos)),1) AS w FROM tab_final t1 
        INNER JOIN 
        ( SELECT DISTINCT id_inv, date AS trade_date, MAX(hms_log) AS max_trade_time 
        FROM tab_final WHERE date BETWEEN '".$dt1."' AND '".$dt2."' AND id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='".$nm."') GROUP BY date, id_inv) t2 
        ON t2.trade_date = date AND t2.max_trade_time = t1.hms_log AND t1.id_inv = t2.id_inv AND id_unico IN (SELECT id_unico FROM unidade_logger) ) z GROUP BY z.x";

        $result = mysqli_query($conn,$sql);
    
        $data1 = array();
        
        
        //$allData = array();
        foreach ($result as $row) {
            $data1[] = $row;
        }
       // $n = sizeof($data1);
        //$data = array();
        $data = subtractor($data1,$dt1);
        
        //$sql = "SELECT DISTINCT SPLIT_STRI(infos_list,',',2) inv, t1.hms_log, t1.date AS x, POWER((SPLIT_STRI(dados_list,',', $pos)),1) AS y FROM tab_teste t1 INNER JOIN ( SELECT date AS trade_date, MAX(hms_log) AS max_trade_time FROM tab_teste WHERE (id_unico='".$nm."') GROUP BY date) t2 ON t2.trade_date = date AND t2.max_trade_time = t1.hms_log AND id_unico='".$nm."' AND inv = 'ID_LOG=1234512345' ORDER BY date";
    }else if ($type == 'totalPower') {
        
        $sql = "SELECT t2.x, sum(t2.W) AS y FROM (SELECT DISTINCT id_inv, date, hms_log AS x, POWER((SPLIT_STRI(dados_list,',', $pos)),1) W FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='".$nm."') AND date='".$dt1."') t2 GROUP BY t2.x";
        $result = mysqli_query($conn,$sql);
    
        $data = array();
        //$allData = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        $res = array();
        
    } else if ($type == 'annualTotalEnergy') {
         
        /*$sql="SELECT distinct DATE_FORMAT(c.dt, '%M') AS x, sum(c.w) AS y FROM 
            (SELECT tab_teste.id_inv, tab_teste.date AS dt, tab_teste.id_unico, tab_teste.hms_log, POWER((SPLIT_STRI(dados_list,',', $pos)),1) AS w from tab_teste,
                (select id_inv, MAX(hms_log) AS t, max(date) as d
                     from tab_teste
                     group by MONTH(date), id_inv) z
                  where tab_teste.id_inv=z.id_inv
                  and tab_teste.date=z.d AND tab_teste.hms_log=z.t AND tab_teste.id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='".$nm."')) c GROUP BY x";*/
        $sql = "SELECT DATE_FORMAT(z.d,'%M') AS x, sum(z.w) AS y FROM (SELECT DISTINCT t1.id_inv, t1.hms_log, t1.date AS d, 
        POWER((SPLIT_STRI(dados_list,',', $pos)),1) AS w FROM tab_final t1 
        INNER JOIN 
        ( SELECT DISTINCT id_inv, date AS trade_date, MAX(hms_log) AS max_trade_time 
        FROM tab_final WHERE date BETWEEN '".$dt1."' AND '".$dt2."' AND date IN (SELECT DISTINCT MAX(date) from tab_final GROUP by MONTH(date)) AND id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='".$nm."') GROUP BY date, id_inv) t2 
        ON t2.trade_date = date AND t2.max_trade_time = t1.hms_log AND t1.id_inv = t2.id_inv AND id_unico IN (SELECT id_unico FROM unidade_logger) ) z GROUP BY z.d";
        

        $result = mysqli_query($conn,$sql);
    
        $data1 = array();
        //$allData = array();
        foreach ($result as $row) {
            $data1[] = $row;
        }
        $data = subtractor($data1,$dt1);
        
    } else if ($type == 'dailyTotalEnergy'){
        $yesterdayMax = "SELECT z.x, sum(z.w) AS y FROM (SELECT DISTINCT t1.id_inv, t1.hms_log, t1.date AS x, 
        POWER((SPLIT_STRI(dados_list,',', $pos)),1) AS w FROM tab_final t1 
        INNER JOIN 
        ( SELECT DISTINCT id_inv, date AS trade_date, MAX(hms_log) AS max_trade_time 
        FROM tab_final WHERE date='".$dt1."' AND id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='".$nm."') GROUP BY date, id_inv) t2 
        ON t2.trade_date = date AND t2.max_trade_time = t1.hms_log AND t1.id_inv = t2.id_inv AND id_unico IN (SELECT id_unico FROM unidade_logger) ) z GROUP BY z.x";
        $data2 = array();
        $result1 = mysqli_query($conn,$yesterdayMax);
        foreach ($result1 as $row) {
            $data2[] = $row;  
        }

        $today = "SELECT t2.x, t2.date, sum(t2.W) AS y FROM (SELECT DISTINCT id_inv, date, hms_log AS x, POWER((SPLIT_STRI(dados_list,',', $pos)),1) W FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='".$nm."') AND date='".$dt2."') t2 GROUP BY t2.x";
        $result2 = mysqli_query($conn,$today);
        $data1 = array();
        $data = array();
        //$allData = array();
       
        foreach ($result2 as $row) {
            $data1[] = $row;  
        }
        if($data2[0]['y']!=null){
            $max = $data2[0]['y'];
        }else{
            $max = 0;
        }
        foreach ($data1 as $key => $value) {
            
            if($key < sizeof($data1)){
                $data[$key]['x'] = $data1[$key]['x'];
                $data[$key]['y'] = $data1[$key]['y'] - $max;
                $max = $data1[$key]['y'];
            }
                
        }
        //echo "Result: ".$data2[0]['y'];
        //$data = subtractor($data1);
    }

    function subtractor($data1,$dt1){

        $data = array();
        $size = count($data1);
        foreach ($data1 as $key => $value) {
            
            if($data1[0]['x'] == $dt1){
                  if($key < sizeof($data1)-1){
                    $data[$key]['x'] = $data1[$key+1]['x'];
                    $data[$key]['y'] = $data1[$key+1]['y'] - $data1[$key]['y'];
                  }
                
            } else {
                if($key > 0 && $key < sizeof($data1)){
                    $data[$key]['x'] = $data1[$key]['x'];
                    $data[$key]['y'] = $data1[$key]['y'] - $data1[$key-1]['y'];
                } else {
                    $data[0]['x'] = $data1[0]['x'];
                    $data[0]['y'] = $data1[0]['y'];
                }    
            }
        }

        return $data;
    }

    
    echo $data['y'];
    
        
    mysqli_close($conn);
    //echo json_encode($maxTimes);
    echo json_encode($data);
    
        
   
?>
