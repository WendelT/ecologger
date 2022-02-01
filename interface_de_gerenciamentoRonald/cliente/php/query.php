<?php 
session_start();
header('Content-Type: application/json');
$host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
$dbname = "smartlogger";              // Database name
$username = "smartlogger";		// Database username
$password = "F@%KNcle#d0fUo";	        // Database password

$conn = new mysqli($host, $username, $password, $dbname);

//ENCONTRA OS INVERSORES DE CADA UNIDADE E PUXA O ÚLTIMO ROW DE CADA UM
$positionQuery = "SELECT id, id_inv, dados_list as dados, infos_list as infos from tab_final t1 WHERE id IN
(SELECT MAX(id) FROM tab_final WHERE id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico IN (SELECT 
id_unico FROM unidade_logger WHERE id_unidade IN (SELECT id_unidade FROM cliente_unidade WHERE id_cliente='".$_SESSION['id']."'))) GROUP BY id_inv)";
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
                $pos = $j + 1;
            }
        }
       // echo "pos: " . $pos[$i]. " ";

       $data['y'] = $sum + $array[$pos];
       $sum = $data['y'];
       echo $data['y'] . " ";
    }
    
    //echo json_encode($maxTimes);
    echo "Energia total - todas as unidades: ";
    echo json_encode($data);



///////////////////////////////////////////////////////////////////////////////////////


    $positionQuery = "SELECT id, id_inv, dados_list as dados, infos_list as infos from tab_final t1 WHERE id IN
    (SELECT MAX(id) FROM tab_final WHERE id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico IN (SELECT 
    id_unico FROM unidade_logger WHERE id_unidade='Frigorifico')) GROUP BY id_inv)";
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
                $pos = $j + 1;
            }
        }
       // echo "pos: " . $pos[$i]. " ";

       $data2['y'] = $sum + $array[$pos];
       $sum = $data2['y'];
       echo $data2['y'] . " ";

    }

    echo "Energia total - uma unidade: ";
    echo json_encode($data2);

////////////////////////////////////////////////////////////////////////////////////////////////


    //ENCONTRA OS INVERSORES DE CADA UNIDADE E PUXA O ÚLTIMO ROW DE CADA UM
    $positionQuery = "SELECT id, id_inv, dados_list as dados, infos_list as infos from tab_final t1 WHERE id IN
    (SELECT MAX(id) FROM tab_final WHERE id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico IN (SELECT 
    id_unico FROM unidade_logger WHERE id_unidade IN (SELECT id_unidade FROM cliente_unidade WHERE id_cliente='".$_SESSION['id']."'))) GROUP BY id_inv)";
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
            if($array[$j] == 'W_CA'){
                $pos = $j + 1;
            }
        }
       // echo "pos: " . $pos[$i]. " ";

       $data3['y'] = $sum + $array[$pos];
       $sum = $data3['y'];
       
       echo $data3['y'] . " ";

       
    }
    echo "Potência total - todas unidades: jjj ";
    $resultadoFinal = number_format($data3['y'], 2, '.', '');
    echo json_encode($resultadoFinal);
?> 