<?php 
function findMaxValue($nm, $dt1, $inv){
    require('conexao.php');
    $dt1 = '2022-01-19';
    $nm = 'Frigorifico';
    $inv = 'HV2010012882';
    $max = "SELECT id, date as x, id_inv, dados_list as dados, infos_list as infos from tab_final WHERE id IN (SELECT MAX(id) FROM tab_final WHERE date < '" . $dt1 . "' AND id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='" . $nm . "') ) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv)";
    $result = mysqli_query($conn, $max);
    $data1 = array();
    foreach ($result as $row) {
        if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
            $data1[] = $row;
        }
    }
    if ($data1 == null){
       // echo "nulo\n";
       $maxValue = null;
    } else {
        
        $n = sizeof($data1);
        echo " " . $data1[$j]['dados'] . "\n";
        for($i = 0; $i < $n; $i++){
            if($inv == $data1[$i]['id_inv']){
                //echo "entrou\n";
                $dataContent = explode(',', $data1[$i]['dados']);
                $size = sizeof($dataContent);
                //echo " " . $data1[$j]['dados'] . "\n";
                for ($z = 0; $z < $size; $z++) {
                    if ($dataContent[$z] == 'Ener') {
                        $pos = $z + 1;
                        //echo "pos: " . $pos . "\n";
                        //echo "valor: " . $dataContent[$pos] . "\n";
                    }
                }
                $maxValue = $dataContent[$pos];
            }
        }
    
    }
    mysqli_close($conn);
    return $maxValue;
    
}
function fillerMax($dataArray, $numberOfNulls, $max){

    for($i = 0; $i < $numberOfNulls; $i++){
        $dataArray[$i]['y'] = $max;
    }

    return $dataArray;
}

function isThereAValue($dataArray){
    $size = sizeof($dataArray);
    $counter = 0;
    $watcher = 0;
    while($watcher == 0 || $counter < $size){
        if($dataArray[$counter]['y'] != null){
            $watcher = 1;
            return true;
        } else {
            return false;
        }
    }
}

function fillDataGapAnalytics($dataArray, $nm, $id_inv){
    $isThereAValue = isThereAValue($dataArray);
    if($dataArray[0]['y'] == null){
        $datetime = explode(' ', $dataArray[0]['x']);
        $date = $datetime[0];
        $time = $datetime[1];
        $max = findMaxValue($nm, $date, $id_inv);
        $dataArray[0]['y'] = $max;
        
    }
    /*$counter = 0;
    $numberOfNulls = 0;
    for($i = 0; $i < sizeof($dataArray); $i++){
        if($dataArray[$i]['y'] == null){
            $counter++;
        } else {
            if($counter!=0 && $max != null && $dataArray[0]['y'] == null){
                while($counter != 0){
                    $dataArray[$i - $]
                }
            }
        }
        /*$datetime = explode(' ', $dataArray[$i]['x']);
        $date = $datetime[0];
        $time = $datetime[1];
        if($dataArray[$i]['y'] == null){

        }*/
        
    //}
    return $dataArray;
}
?>