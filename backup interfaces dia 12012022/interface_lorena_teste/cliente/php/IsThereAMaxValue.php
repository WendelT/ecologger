<?php
//https://stackoverflow.com/questions/44576156/using-unknown-number-of-datasets-in-chart-js
//function Teste(){
//header('Content-Type: application/json');

function IsThereAMaxValue($dt1,$nm){
    require('conexao.php');
    $sum = 0;
    $max = "SELECT id, date as x, id_inv, dados_list as dados, infos_list as infos from tab_final WHERE id IN (SELECT MAX(id) FROM tab_final WHERE date <= '" . $dt1 . "' AND id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='" . $nm . "') ) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv)";
    $result = mysqli_query($conn, $max);
    $data1 = array();
    foreach ($result as $row) {
        if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
            $data1[] = $row;
        }
    }
    //echo "data: " . $date . "id: " . $data1['id_inv'] . "\n";
    if ($data1 == null) {
        // echo "nulo ";
        $data[0]['y'] = $sum;
        $data[0]['x'] = $dt1;
        $sum = $data[0]['y'];
    } else {
        $n1 = sizeof($data1);
        //$pos = array();
        for ($j = 0; $j < $n1; $j++) {
            $array = explode(',', $data1[$j]['dados']);
            $size = sizeof($array);
            //echo " " . $data1[$j]['id'] . " ";
            for ($z = 0; $z < $size; $z++) {
                if ($array[$z] == 'Ener') {
                    $pos = $z + 1;
                }
            }
            $data[0]['x'] = $data1[$j]['x'];
            $data[0]['y'] = $sum + $array[$pos];
            //echo "y: " . $array[1] . " ";
            $sum = $data[0]['y'];
        }
    }
    if($data[0]['x'] != $dt1){
        $data[0]['n'] = AmountOfDays($data[0]['x'], $dt1);
        //echo "quantidade de dias: ". $n . "\n";
    }
    mysqli_close($conn);
    //echo json_encode($data);
    //print_r($data);
    return $data;
}


function AmountOfDays($firstDay, $lastDay){
    $step = '+1 day';
    $day = strtotime($firstDay);
    $last = strtotime($lastDay);
    $n = 0;
    while ($day < $last) {
        $day = strtotime($step, $day);
        $n = $n + 1;
    }

    return $n;
}

function notZero($array){
    $n = sizeof($array);
    $notZeroPos = array();
    for($i = 0; $i < $n; $i++){
        if($array[$i]['y'] != 0){
            $notZeroPos[]=$i;
        }
    }
    return $notZeroPos;
}

function dataConstructor($day1, $day2 ){
    $nDays = AmountOfDays($day1, $day2);
    return $nDays;

}

function dataFiller($dataArray, $nm){
    $notZeros = notZero($dataArray);
    $dataSize = sizeof($dataArray);
    $notZeroSize = sizeof($notZeros);
    if($dataArray[0]['y'] == 0){
        //echo "é zero ";
        $x = IsThereAMaxValue($dataArray[0]['x'],$nm);
       // echo "x: " .$x[0]['y'] . " \n";
       // echo "not null: " . $notZeros[0] . " \n";
        if($x[0]['y'] != 0 && $notZeros[0] != null){
            $n = AmountOfDays($x[0]['x'], $dataArray[$notZeros[0]]['x']);
            $dataArray[0]['y'] = $x[0]['y'] + (($dataArray[$notZeros[0]]['y'] - $x[0]['y'])/$n)*$x[0]['n'];
           // echo "nDias: " . $n . " \n";
           // echo "y: " . $dataArray[0]['y'] . " \n";
        }
    }
    
    for($i = 0; $i < $notZeroSize; $i++){
        for($j = 1; $j < $dataSize; $j++){

            if($dataArray[$j]['y'] == 0 && $j < $notZeros[$i] && $dataArray[0]['y'] != 0){
                 
                $n = AmountOfDays($dataArray[$j]['x'], $dataArray[$notZeros[$i]]['x']);
                //echo "not null: " . $dataArray[$notZeros[$i]]['y'] . " \n";
                $dataArray[$j]['y'] = $dataArray[$j-1]['y'] + (( $dataArray[$notZeros[$i]]['y'] - $dataArray[$j-1]['y'])/($n+1));
            }
        }
    }
    

    
    return $dataArray;
}
?>



