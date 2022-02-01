<?php

header('Content-Type: application/json');
$host = "smartlogger.mysql.dbaas.com.br";                 // host = localhost because database hosted on the same server where PHP files are hosted
$dbname = "smartlogger";              // Database name
$username = "smartlogger";        // Database username
$password = "F@%KNcle#d0fUo";            // Database password



$conn = new mysqli($host, $username, $password, $dbname);
//$conn->query("SET lc_time_names = 'pt_BR'");
$type = $_GET['type'];
$position = $_GET['position'];
$nm = $_GET["nome"]; //client name
$dt1 = $_GET["date1"];
$dt2 = $_GET["date2"];
//echo "teste";
function dateArray($firstDay, $lastDay)
{
    $step = '+1 day';
    $format = 'Y-m-d';
    $dateArray = array();
    $day = strtotime($firstDay);
    $last = strtotime($lastDay);

    while ($day <= $last) {
        $dateArray[] = date($format, $day);
        $day = strtotime($step, $day);
    }

    return $dateArray;
}


function subtractor($data1, $dt1)
{

    $data = array();
    $size = count($data1);
    foreach ($data1 as $key => $value) {

        if ($data1[0]['x'] <= $dt1) {
            if ($key < sizeof($data1) - 1) {
                $data[$key]['x'] = $data1[$key + 1]['x'];
                //$data[$key]['y'] = number_format($data1[$key + 1]['y'] - $data1[$key]['y'], 2);
                $data[$key]['y'] = $data1[$key + 1]['y'] - $data1[$key]['y'];
                if ($data[$key]['y'] < 0) {
                    $data[$key]['y'] = 0;
                }
            }
        } else {
            if ($key > 0 && $key < sizeof($data1)) {
                $data[$key]['x'] = $data1[$key]['x'];
                //$data[$key]['y'] =  number_format($data1[$key]['y'] - $data1[$key - 1]['y'], 2);
                $data[$key]['y'] =  $data1[$key]['y'] - $data1[$key - 1]['y'];
                if ($data[$key]['y'] < 0) {
                    $data[$key]['y'] = 0;
                }
            } else {
                $data[0]['x'] = $data1[0]['x'];
                $data[0]['y'] = round($data1[0]['y'], 2);
            }
        }
    }

    return $data;
}

function timesofDay()
{
    $start = new \DateTime('00:00');
    $times = 24 * 12; // 24 hours * 5 mins in an hour

    for ($i = 0; $i <= $times; $i++) {

        if ($i == $times) {
            $time[$i] = $start->add(new \DateInterval('PT04M'))->format('H:i');
        } else if ($i == 0) {
            $time[0] = $start->add(new \DateInterval('PT00M'))->format('H:i');
        } else {
            $time[$i] = $start->add(new \DateInterval('PT05M'))->format('H:i');
        }
    }
    return $time;
}

function daysOfTheYear($date)
{
    $format = 'Y-m-d';
    $previousDate = strtotime($date);
    $step = '+1 day';
    // $initialDate = strtotime($step, $previousDate);
    $dateArray = array();
    $n = 0;
    for ($i = 0; $i < 13; $i++) {

        $dt  = date($format,  $previousDate);
        $dateArray[$n] = date("Y-m-01", strtotime($dt));
        $dateArray[$n + 1] = date("Y-m-t", strtotime($dt));
        $day = strtotime($dateArray[$n + 1]);
        $previousDate = strtotime($step, $day);
        $n = $n + 2;
    }
    return $dateArray;
}
$data = array();
if ($type == 'totalPower') {
    $time = timesofDay();
    $sizeofTime = sizeof($time);
    $data = array();
    $n = sizeof($time);

    $invs = "SELECT DISTINCT id_inv, dados_list as dados FROM tab_final WHERE date <= '".$dt2."' AND id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='" . $nm . "') ) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv";

    $result2 = mysqli_query($conn, $invs);
    $data2 = array();
    foreach ($result2 as $row) {
        if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
            $data2[] = $row;
        }
    }

    $sql = "SELECT hms_server as x, id_inv, dados_list as dados from tab_final t1 WHERE date = '" . $dt2 . "' AND id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='" . $nm . "'))";

    $result = mysqli_query($conn, $sql);
    $data1 = array();

    foreach ($result as $row) {
        $data1[] = $row;
    }
    $n = sizeof($data1);

    $nInv = sizeof($data2);
    $helper = 0;
    for ($i = 0; $i < $sizeofTime; $i++) {
        $sum = 0;
        for ($z = 0; $z < $nInv; $z++) {
            $array = explode(',', $data2[$z]['dados']);
            $size = sizeof($array);
            for ($c = 0; $c < $size; $c++) {
                if ($array[$c] == $position) {
                    $pos = $c + 1;
                }
            }
            $data[$i]['x'] = $time[$i + 1];
            for ($j = 0; $j < $n; $j++) {


                if ($data1[$j]['id_inv'] == $data2[$z]['id_inv']) {
                    $array1 = explode(',', $data1[$j]['dados']);

                    if ($data1[$j]['x'] > $time[$i] && $data1[$j]['x'] <= $time[$i + 1]) {
                        $helper++;
                        $tempo = $data1[$j]['x'];
                        $value = $array1[$pos];
                        $data[$i]['hora'] = $data1[$j]['x'];
                    }
                    if ($helper == 0) {
                        $data[$i]['hora'] = null;
                        $sum = $sum;
                        $value = $sum;
                    }
                }
            }
            $data[$i]['y'] = $sum + $value;
            $sum = $value;
            if ($data[$i]['y'] == 0) {
                $data[$i]['y'] = null;
            }
        }
        $helper = 0;
    }
} else if ($type == 'weeklyTotalEnergy' || $type == 'monthlyTotalEnergy') {

    $xAxis =  dateArray($dt1, $dt2);
    $sizeofX = sizeof($xAxis);

    $invs = "SELECT DISTINCT id_inv, dados_list as dados FROM tab_final WHERE date <= '".$dt2."' AND id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='" . $nm . "') ) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv";

    $result2 = mysqli_query($conn, $invs);
    $data2 = array();
    $pos = array();
    foreach ($result2 as $row) {
        if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
            $data2[] = $row;
        }
    }
    $nInv = sizeof($data2);
    $sql = "SELECT hms_server, date as x, id_inv, dados_list as dados from tab_final WHERE date BETWEEN '".$dt1."' AND '".$dt2."' AND id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='" . $nm . "') ) t2 ON t1.id_inversor=t2.id_inv) ORDER BY date ASC, hms_server ASC";
    $result = mysqli_query($conn, $sql);
    $data1 = array();

    foreach ($result as $row) {
        if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
            $data1[] = $row;
        }
    }
    $sizeofData = sizeof($data1);
    $sum = 0;
    $data = array();
    $array2 = array();
    $helper = 0;

    for($i = 0; $i < $sizeofX;$i++){
        $data[$i]['x'] = $xAxis[$i];

        for($z = 0; $z < $nInv; $z++){
            for($j = 0; $j < $sizeofData;$j++){
                if ($data1[$j]['id_inv'] == $data2[$z]['id_inv'] && $xAxis[$i] == $data1[$j]['x']){
                    $helper++;
                    $array2 = explode(',', $data1[$j]['dados']);
                    $size = sizeof($array2);
                    //se quebrar, apagar o laço abaixo
                    for ($v = 0; $v < $size; $v++) {
                        if ($array2[$v] == $position) {
                            $pos[$z] = $v + 1;
                        }
                    }
                    if($array2[$pos[$z]] != 14316557.65 && $array2[$pos[$z]] != 1431655.765 && $array2[$pos[$z]] != 2184.5){
                        $data[$i]['y'] = $array2[$pos[$z]] + $sum;
                    } 
                }
            }
            $sum = $data[$i]['y'];
        }
        if($helper == 0){
            $data[$i]['y'] = 0;
        }
        $sum = 0;
        $helper = 0;
    }


    
    require('IsThereAMaxValue.php');
    $data = dataFiller($data,$nm);
    $data = subtractor($data, $dt1);
    
} else if ($type == 'annualTotalEnergy') {

    $xAxis = daysOfTheYear($dt1);
    $sizeOfX = sizeof($xAxis);
    $invs = "SELECT DISTINCT id_inv, dados_list as dados FROM tab_final WHERE date <= '".$dt1."' AND id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='" . $nm . "') ) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv";

    $result2 = mysqli_query($conn, $invs);
    $data2 = array();
    $pos = array();
    foreach ($result2 as $row) {
        if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
            $data2[] = $row;
        }
    }
    $nInv = sizeof($data2);

    $sql = "SELECT id, hms_server, date as x, id_inv, dados_list as dados, infos_list as infos from tab_final WHERE id IN (SELECT MAX(id) FROM tab_final WHERE date BETWEEN '".$xAxis[0]."' AND '".$dt2."' AND id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='" . $nm . "') ) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv, MONTH(date) ORDER BY date ASC)";
    $result = mysqli_query($conn, $sql);
    $data1 = array();

    foreach ($result as $row) {
        if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
            $data1[] = $row;
        }
    }

    $sizeofData = sizeof($data1);
    $sum = 0;
    $data = array();
    $array = array();
    $helper = 0;
    $c = 0;

    for($i = 0; $i < $sizeOfX;$i = $i + 2){
        $data[$c]['x'] = $xAxis[$i + 1];
        
        for($z = 0; $z < $nInv; $z++){
            for($j = 0; $j < $sizeofData;$j++){
                if ($data1[$j]['id_inv'] == $data2[$z]['id_inv'] && $xAxis[$i] <= $data1[$j]['x'] && $data1[$j]['x'] <= $data[$c]['x']){
                    $helper++;
                    $array = explode(',', $data1[$j]['dados']);
                    $size = sizeof($array);
                    //se quebrar, apagar o laço abaixo
                    for ($v = 0; $v < $size; $v++) {
                        if ($array[$v] == $position) {
                            $pos[$z] = $v + 1;
                        }
                    }
                    if($array[$pos[$z]] != 14316557.65 && $array[$pos[$z]] != 1431655.765 && $array[$pos[$z]] != 2184.5){
                        
                        $data[$c]['y'] = $array[$pos[$z]] + $sum;
                    } 
                }
            }
            $sum = $data[$c]['y'];
        }
        if($helper == 0){
            $data[$c]['y'] = 0;
        }
        $sum = 0;
        $helper = 0;
        $c++;
    }
    require('IsThereAMaxValue.php');
    $data = dataFiller($data,$nm);
    $data = subtractor($data, $dt1);
} else if ($type == 'dailyTotalEnergy') {
    //$dt1 ='2022-01-05';
    //$dt2 = '2022-01-06';
    $time = timesofDay();
    $sizeofTime = sizeof($time);
    $data = array();
    $n = sizeof($time);
    $sum = 0;

    $max = "SELECT id, date as x, id_inv, dados_list as dados, infos_list as infos from tab_final WHERE id IN (SELECT MAX(id) FROM tab_final WHERE date < '" . $dt2 . "' AND id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='" . $nm . "') ) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv)";
    $result = mysqli_query($conn, $max);
    $data2 = array();
    foreach ($result as $row) {
        if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
            $data2[] = $row;
        }
    }

    if ($data2 == null) {
        $data[0]['y'] = $sum;
        $data[0]['x'] = $dt1;
        $sum = $data[0]['y'];
    } else {
        $n1 = sizeof($data2);
        for ($j = 0; $j < $n1; $j++) {
            $array = explode(',', $data2[$j]['dados']);
            $size = sizeof($array);

            for ($z = 0; $z < $size; $z++) {
                if ($array[$z] == $position) {
                    $pos = $z + 1;
                }
            }

            $data[0]['x'] = $dt1;
            $data[0]['y'] = $sum + $array[$pos];
            $sum = $data[0]['y'];

        }
    }

    $sql = "SELECT hms_server as x, id_inv, dados_list as dados from tab_final t1 WHERE date = '" . $dt2 . "' AND id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='" . $nm . "'))";

    $result = mysqli_query($conn, $sql);
    $data1 = array();

    foreach ($result as $row) {
        $data1[] = $row;
    }
    $n = sizeof($data1);

    $nInv = sizeof($data2);
    // echo "numero de inv: " . $nInv;
    $helper = 0;
    for ($i = 0; $i < $sizeofTime; $i++) {
        $sum = 0;
        for ($z = 0; $z < $nInv; $z++) {
            $array = explode(',', $data2[$z]['dados']);
            $size = sizeof($array);
            for ($c = 0; $c < $size; $c++) {
                if ($array[$c] == $position) {
                    $pos = $c + 1;
                }
            }
            $data[$i + 1]['x'] = $time[$i];
            for ($j = 0; $j < $n; $j++) {


                if ($data1[$j]['id_inv'] == $data2[$z]['id_inv']) {
                    $array1 = explode(',', $data1[$j]['dados']);

                    if ($data1[$j]['x'] > $time[$i] && $data1[$j]['x'] <= $time[$i + 1]) {
                        $helper++;
                        $size1 = sizeof($array1);

                        for ($z = 0; $z < $size1; $z++) {
                            if ($array1[$z] == $position) {
                                $pos = $z + 1;
                            }
                        }
                        $tempo = $data1[$j]['x'];
                        if($array1[$pos] != 14316557.65 && $array1[$pos] != 1431655.765 && $array1[$pos] != 2184.5 && $array1[$pos] != 42949672.95){
                            $value = $array1[$pos];

                        }
                        

                        $data[$i + 1]['hora'] = $data1[$j]['x'];
                    }
                    if ($helper == 0) {
                        $data[$i + 1]['hora'] = null;
                        $sum = $sum;
                        $value = $sum;
                    }
                }
            }
            $data[$i + 1]['y'] = $sum + $value;
            $sum = $value;
            if ($data[$i + 1]['y'] == 0) {
                $data[$i + 1]['y'] = null;
            }
        }
        $helper = 0;
    }
    //echo "valor de y antes : " . $data[0]['y'] . "\n" ;
    $dataSize = sizeof($data);
    $max = $data[0]['y'];
    for($i = 0; $i < $dataSize; $i++){
        if($data[$i]['y']>0){
            $data[$i]['y'] = $data[$i]['y'] - $max;
        }
    }
    //echo "valor de y depois: " . $data[0]['y'] . "\n" ;
    require('IsThereAMaxValue.php');
    $data = dataFiller($data,$nm);
    $data = subtractor($data,$dt1);
    

}
mysqli_close($conn);
echo json_encode($data);

?>