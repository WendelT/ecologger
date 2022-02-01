<?php
session_start();
include_once('verifica_login.php');
header('Content-Type: application/json');

    $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "smartlogger";              // Database name
    $username = "smartlogger";		// Database username
    $password = "F@%KNcle#d0fUo";	        // Database password

    $conn = new mysqli($host, $username, $password, $dbname);
    // Establish connection to MySQL database
    
    $sql = "SELECT id, date as x, id_inv, dados_list as dados, infos_list as infos from tab_final WHERE id IN (SELECT MAX(id) FROM tab_final WHERE id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico from unidade_logger WHERE id_unidade = 'Frigorifico')) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv)";

    $result = mysqli_query($conn, $sql);
    $data1 = array();

    foreach ($result as $row) {
        $data1[] = $row;
    }
    
    $sizeOfData = sizeof($data1);
    $infos = array();
    $divider = array();
    include('hv3.php');
    for($i = 0; $i < $sizeOfData; $i++){
        $infos = explode(',', $data1[$i]['infos']);
        //echo "data: " . $data1[$i]['infos'] . "\n";
        $sizeOfInfos = sizeof($infos);
        for($j = 0; $j < $sizeOfInfos; $j++){
            if($infos[$j] == "IM=HUWAEI_V30_"){
                
                $data2[$i]['wrngs'] = warningAnalizer($data1[$i]['dados'], $data1[$i]['id_inv']);
                //$data[$i]['id_inv'] = $data1[$i]['id_inv'];
                
            }
            
        }
        $data[$i] = array("inv" => $data2);
        //$t[0]['wrng'] = "Não há avisos";
        //$t[0]['inv_id'] = "12334";
        //$data2[0]['wrngs'] = $t;
        //$data = array("inv" => $data2[0]);
        //
        
    }
    $aResult['result'] = $data;
    mysqli_close($conn);
    echo json_encode($aResult);
    $listaErros = 
    [
        "0202" => "ERRO ALEATORIO",
    ]
?>