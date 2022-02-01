<?php 
session_start();
header('Content-Type: application/json');
$host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
$dbname = "smartlogger";              // Database name
$username = "smartlogger";		// Database username
$password = "F@%KNcle#d0fUo";	        // Database password

$conn = new mysqli($host, $username, $password, $dbname);

function Potencia_somada($conn){
//ENCONTRA OS INVERSORES DE CADA UNIDADE E PUXA O ÚLTIMO ROW DE CADA UM
$positionQuery = "SELECT id, id_inv, dados_list as dados, infos_list as infos from tab_final t1 WHERE id IN
(SELECT MAX(id) FROM tab_final WHERE id_inv IN(SELECT id_inv FROM tab_final WHERE id_unico IN (SELECT 
id_unico FROM unidade_logger WHERE id_unidade IN (SELECT id_unidade FROM cliente_unidade WHERE id_cliente='3')
) AND date = DATE(DATE_SUB(NOW(), INTERVAL 5 MINUTE)) AND hms_server BETWEEN time(DATE_SUB(NOW(), INTERVAL 5 
MINUTE)) AND NOW()) GROUP BY id_inv)";
    $result = mysqli_query($conn,$positionQuery);
    $data1 = array();
    foreach ($result as $row) {
        if($row['id_inv'] != '????????????????????' || $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww'){
            $data1[] = $row;
        }
       
    }
    $n = sizeof($data1);
    $pos = array();


//ACHA A POSIÇÃO DA VARIÁVEL NA STRING
    $sum = 0;

    for($i=0;$i<$n; $i++){
        //echo "n= " . $i. " ";
        $array = explode(',', $data1[$i]['dados']);
        $size = sizeof($array);
        for($j=0; $j<$size; $j++){
            if($array[$j] == 'W_CA'){
                $pos[$i] = $j + 2;
            }
        }
       // echo "pos: " . $pos[$i]. " ";


        $p = $pos[$i];
        $id = $data1[$i]['id_inv'];
        $idRow = $data1[$i]['id'];
                //$sql ="SELECT hms_log as x, POWER(SPLIT_STRI(dados_list,',',$p),1) as y from tab_teste WHERE id = '".$id."'";
        $sql = "SELECT id, POWER(SPLIT_STRI(dados_list,',', $p),1) as y from tab_final WHERE id='".$idRow."'";
        $result = mysqli_query($conn,$sql);
        foreach ($result as $row) {

            $data['y'] = $sum + $row['y'];
            $sum = $data['y'];
            $data['y'] . " ";

        }

        
    }
    $data['y'] = number_format($data['y'], 2, '.', '');
    mysqli_close($conn);
    //echo json_encode($maxTimes);
    echo "Potência somada dos inversores1: ".json_encode($data);
    }


    function EnergiaGerada($conn){
    //ENCONTRA OS INVERSORES DE CADA UNIDADE E PUXA O ÚLTIMO ROW DE CADA UM
    $positionQuery = "SELECT id, id_inv, dados_list as dados, infos_list as infos from tab_final t1 WHERE id IN
(SELECT MAX(id) FROM tab_final WHERE id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico IN (SELECT 
id_unico FROM unidade_logger WHERE id_unidade IN (SELECT id_unidade FROM cliente_unidade WHERE id_cliente='3'))) GROUP BY id_inv)";
    $result = mysqli_query($conn,$positionQuery);
    $data1 = array();
    foreach ($result as $row) {
        if($row['id_inv'] != '????????????????????' && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww'){
            $data1[] = $row;
        }
       
    }
    $n = sizeof($data1);
    $pos = array();


//ACHA A POSIÇÃO DA VARIÁVEL NA STRING
    $sum = 0;

    for($i=0;$i<$n; $i++){
        //echo "n= " . $i. " ";
        $array = explode(',', $data1[$i]['dados']);
        $size = sizeof($array);
        for($j=0; $j<$size; $j++){
            if($array[$j] == 'Ener'){
                $pos[$i] = $j + 2;
            }
        }
       // echo "pos: " . $pos[$i]. " ";


        $p = $pos[$i];
        $id = $data1[$i]['id_inv'];
        $idRow = $data1[$i]['id'];
                //$sql ="SELECT hms_log as x, POWER(SPLIT_STRI(dados_list,',',$p),1) as y from tab_teste WHERE id = '".$id."'";
        $sql = "SELECT id, POWER(SPLIT_STRI(dados_list,',', $p),1) as y from tab_final WHERE id='".$idRow."'";
        $result = mysqli_query($conn,$sql);
        foreach ($result as $row) {

            $data['y'] = $sum + $row['y'];
            $sum = $data['y'];
            echo $data['y'] . " ";

        }

    }
    

    $data['y'] = number_format($data['y'], 2, '.', '');

    mysqli_close($conn);
    //echo json_encode($maxTimes);
    echo "Energia1: ".json_encode($data);
    }

    ////////////////////////////////////////////////////////////////////----////////////


    function pot_2($conn){
    //ENCONTRA OS INVERSORES DE CADA UNIDADE E PUXA O ÚLTIMO ROW DE CADA UM
    $positionQuery = "SELECT id, id_inv, dados_list as dados, infos_list as infos from tab_final t1 WHERE id IN
    (SELECT MAX(id) FROM tab_final WHERE id_inv IN(SELECT id_inv FROM tab_final WHERE id_unico IN (SELECT 
    id_unico FROM unidade_logger WHERE id_unidade IN (SELECT id_unidade FROM cliente_unidade WHERE id_cliente='".$_SESSION['id']."')
    ) AND date = DATE(DATE_SUB(NOW(), INTERVAL 5 MINUTE)) AND hms_server BETWEEN time(DATE_SUB(NOW(), INTERVAL 5 
    MINUTE)) AND NOW()) GROUP BY id_inv)";
        $result = mysqli_query($conn,$positionQuery);
        $data1 = array();
        foreach ($result as $row) {
            $data1[] = $row;
        }
        $n = sizeof($data1);
        $pos = array();
    
    
    //ACHA A POSIÇÃO DA VARIÁVEL NA STRING
        $sum = 0;
    
        for($i=0;$i<$n; $i++){
            //echo "n= " . $i. " ";
            $array = explode(',', $data1[$i]['dados']);
            $size = sizeof($array);
            for($j=0; $j<$size; $j++){
                if($array[$j] == 'W_CA'){
                    $pos[$i] = $j + 2;
                }
            }
           // echo "pos: " . $pos[$i]. " ";
    
    
            $p = $pos[$i];
            $id = $data1[$i]['id_inv'];
            $idRow = $data1[$i]['id'];
                    //$sql ="SELECT hms_log as x, POWER(SPLIT_STRI(dados_list,',',$p),1) as y from tab_teste WHERE id = '".$id."'";
            $sql = "SELECT id, POWER(SPLIT_STRI(dados_list,',', $p),1) as y from tab_final WHERE id='".$idRow."'";
            $result = mysqli_query($conn,$sql);
            foreach ($result as $row) {
                $data['y'] = $sum + $row['y'];
                $sum = $data['y'];
    
            }
    
        }
    
        $data['y'] = number_format($data['y'], 2, '.', '');
    
        mysqli_close($conn);
        //echo json_encode($maxTimes);
        echo "        AAAAAAAAAAAAAAAA:".json_encode($data);
        }
        ////////////////////////////////////////////
    
    function pot_3($conn){
    //ENCONTRA OS INVERSORES DE CADA UNIDADE E PUXA O ÚLTIMO ROW DE CADA UM
    $positionQuery = "SELECT id, id_inv, date, hms_log,hms_server, dados_list as dados, infos_list as infos from tab_final t1 WHERE id IN (SELECT MAX(id) FROM tab_final WHERE hms_server BETWEEN '12:00:00' AND '12:30:00' AND DATE='2021-11-08' AND id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='Frigorifico') ) GROUP by id_inv)";
        $result = mysqli_query($conn,$positionQuery);
        $data1 = array();
        foreach ($result as $row) {
            $data1[] = $row;
        }
        $n = sizeof($data1);
        $pos = array();
    
    
    //ACHA A POSIÇÃO DA VARIÁVEL NA STRING
        $sum = 0;
    
        for($i=0;$i<$n; $i++){
            //echo "n= " . $i. " ";
            $array = explode(',', $data1[$i]['dados']);
            $size = sizeof($array);
            for($j=0; $j<$size; $j++){
                if($array[$j] == 'W_CA'){
                    $pos[$i] = $j + 2;
                }
            }
           // echo "pos: " . $pos[$i]. " ";
    
    
            $p = $pos[$i];
            $id = $data1[$i]['id_inv'];
            $idRow = $data1[$i]['id'];
                    //$sql ="SELECT hms_log as x, POWER(SPLIT_STRI(dados_list,',',$p),1) as y from tab_teste WHERE id = '".$id."'";
            $sql = "SELECT id, POWER(SPLIT_STRI(dados_list,',', $p),1) as y from tab_final WHERE id='".$idRow."'";
            $result = mysqli_query($conn,$sql);
            foreach ($result as $row) {
                $data['y'] = $sum + $row['y'];
                $sum = $data['y'];
    
            }
    
        }
    
        $data['y'] = number_format($data['y'], 2, '.', '');
    
        mysqli_close($conn);
        //echo json_encode($maxTimes);
        echo "        BBBBBBBBBBBBBB:".json_encode($data);
    }

    function EnergiaArvores($conn){
        $queryEnergiaGeradaUnidades = "SELECT sum(POWER(SPLIT_STRI(dados_list,',', 2),1)) as y from tab_final t1 WHERE id IN (SELECT MAX(id) FROM tab_final WHERE id_unico IN (SELECT DISTINCT id_unico from tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade IN (SELECT id_unidade FROM cliente_unidade WHERE id_cliente='".$_SESSION['id']."'))) GROUP BY id_unico)";
        $consulta = mysqli_query($conn, $queryEnergiaGeradaUnidades);
        $aResult['result'] = mysqli_fetch_assoc($consulta)['y'];
        $valArvores = ($aResult['result'] * 5.04) * (10 ** (-4));
        $aResult['result2'] = number_format($valArvores, 2, '.', '');
        echo $aResult['result']."<br>" ;
        echo $aResult['result2'];
    }

    function potTeste($conn){
        $positionQuery = "SELECT id, id_inv, dados_list as dados, infos_list as infos from tab_final t1 WHERE id IN
        (SELECT MAX(id) FROM tab_final WHERE id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico IN (SELECT 
        id_unico FROM unidade_logger WHERE id_unidade IN (SELECT id_unidade FROM cliente_unidade WHERE id_cliente='3'))) GROUP BY id_inv)";
        $result = mysqli_query($conn,$positionQuery);
        $data1 = array();
        foreach ($result as $row) 
        {
            if($row['id_inv'] != '????????????????????' && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww'){
                $data1[] = $row;
            }
        
        }
        $n = sizeof($data1);
        $pos = array();


        //ACHA A POSIÇÃO DA VARIÁVEL NA STRING
        $sum = 0;

        for($i=0;$i<$n; $i++){
            //echo "n= " . $i. " ";
                $array = explode(',', $data1[$i]['dados']);
                $size = sizeof($array);
                for($j=0; $j<$size; $j++){
                    if($array[$j] == 'W_CA'){
                        $pos = $j + 1;
                    }
                }
            // echo "pos: " . $pos[$i]. " ";

            $data3['y'] = $sum + $array[$pos];
            $sum = $data3['y'];
            echo $data3['y'] . " ";
        }
        echo "Potência total - uma unidade: ";
        echo json_encode($data3);
    }

    function testeStatus($conn){
        $queryListunidades = "SELECT id_unidade AS unitsName FROM cliente_unidade WHERE id_cliente = '".$_SESSION['id']."'";
        $consulta = mysqli_query($conn, $queryListunidades);
        $data = array();
            foreach($consulta as $clients)
            {
            $querystatusUnidade = "SELECT MAX(id) FROM tab_final WHERE hms_server BETWEEN DATE(DATE_SUB(NOW(), INTERVAL 5 MINUTE)) AND DATE(NOW()) AND date = DATE(NOW()) AND id_unico IN (SELECT id_unico from unidade_logger WHERE id_unidade = '".$clients["unitsName"]."')"; 
                //obtém o status da unidade $i
            $consulta = mysqli_query($conn, $querystatusUnidade);
            $ultimo = mysqli_fetch_assoc($consulta);
            if($ultimo === null){
                $status = "Offline";
            }
            else {
                $status = "Online";
            }
            
            $data[] = 
            [ 
                $clients,
                $status
            ];
            echo $status;
            }
    }
    testeStatus($conn);
    //potTeste($conn);
    //Potencia_somada($conn);
    //EnergiaArvores($conn);
    //EnergiaGerada($conn);
    //pot_3($conn);
    //pot_2($conn);
    //Potencia_somada($conn);

?>