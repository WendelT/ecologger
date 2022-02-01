<?php
header('Content-Type: application/json');
require('conexao.php');

//echo "tá mandando pra cá";
$range = $_GET['range'];
$time = $_GET['range2'];

$type = $_GET['type'];
$position = $_GET['position'];
$nm = $_GET["nome"]; //client name
$dt1 = $_GET["data_inicial"];
$dt2 = $_GET["data_final"];
$tm1 = $_GET['time1']; //start time
$tm2 = $_GET['time2']; // end time

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

function limitedTimesofDay($string1Start, $string2Finish)
{
    $start = new \DateTime($string1Start);

    //$times = 24 * 12; // 24 hours * 5 mins in an hour
    $Timeformat = 'H.i';


    $total_hours_start = date($Timeformat, strtotime($string1Start));
    $total_hours_finish = date($Timeformat, strtotime($string2Finish));
    $total_hours = $total_hours_finish - $total_hours_start;
    $times = $total_hours * 12;

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
function AmountOfDays($firstDay, $lastDay)
{
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


if ($range == 'hoje' || $range == 'ontem') {
    
    switch ($time != '') {
        case ($time == 'yes'):
            
            $timeArray = limitedTimesofDay($tm1, $tm2);
            $sizeofTime = sizeof($timeArray);
            
            $invs = "SELECT id_inv, dados_list as dados, date, hms_server FROM tab_final t1 WHERE date = '" . $dt1 . "' AND id_inv IN (SELECT DISTINCT t1.id_inversor as id_inv FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico ='" . $nm . "') t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv";

            $result2 = mysqli_query($conn, $invs);
            $data2 = array();
            foreach ($result2 as $row) {
                if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
                    $data2[] = $row;
                }
            }

            $sql = "SELECT hms_server as x, id_inv, dados_list as dados from tab_final t1 WHERE date = '" . $dt1 . "' AND id_unico ='" . $nm . "'";

            $result = mysqli_query($conn, $sql);
            $data1 = array();

            foreach ($result as $row) {
                $data1[] = $row;
            }

            $nData = sizeof($data1);
            $nInv = sizeof($data2);
            $helper = 0;

            for ($z = 0; $z < $nInv; $z++) {
                for ($i = 0; $i < $sizeofTime; $i++) {
                    $data[$z][$i]['x'] = $timeArray[$i + 1];
                    $array = explode(',', $data2[$z]['dados']);
                    $size = sizeof($array);
                    for ($c = 0; $c < $size; $c++) {
                        if ($array[$c] == $position) {
                            $pos = $c + 1;
                        }
                    }
                    for ($j = 0; $j < $nData; $j++) {
                        if ($data1[$j]['id_inv'] == $data2[$z]['id_inv']) {
                            $array1 = explode(',', $data1[$j]['dados']);
                            if ($data1[$j]['x'] > $timeArray[$i] && $data1[$j]['x'] <= $timeArray[$i + 1]) {
                                $helper++;
                                $tempo = $data1[$j]['x'];
                                $data[$z][$i]['y'] = $array1[$pos];
                            }
                        }
                        if ($helper == 0) {
                            $data[$z][$i]['y'] = null;
                        }
                    }
                    $helper = 0;
                }
                $data[$z] = array("number" => $data[$z]);
            }
            break;
        case ($time == 'no'):
            $timeArray = timesofDay();
            $sizeofTime = sizeof($timeArray);
            
            $invs = "SELECT id_inv, dados_list as dados, date, hms_server FROM tab_final t1 WHERE date = '" . $dt1 . "' AND id_inv IN (SELECT DISTINCT t1.id_inversor as id_inv FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico ='" . $nm . "') t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv";
            $result2 = mysqli_query($conn, $invs);
            $data2 = array();
            foreach ($result2 as $row) {
                if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
                    $data2[] = $row;
                }
            }

            $sql = "SELECT hms_server as x, id_inv, dados_list as dados from tab_final t1 WHERE date = '" . $dt1 . "' AND id_unico ='" . $nm . "'";

            $result = mysqli_query($conn, $sql);
            $data1 = array();

            foreach ($result as $row) {
                $data1[] = $row;
            }
            $nData = sizeof($data1);
            $nInv = sizeof($data2);
            $helper = 0;

            for ($z = 0; $z < $nInv; $z++) {
                for ($i = 0; $i < $sizeofTime; $i++) {
                    $data[$z][$i]['x'] = $timeArray[$i + 1];
                    $array = explode(',', $data2[$z]['dados']);
                    $size = sizeof($array);
                    for ($c = 0; $c < $size; $c++) {
                        if ($array[$c] == $position) {
                            $pos = $c + 1;
                        }
                    }
                    for ($j = 0; $j < $nData; $j++) {
                        if ($data1[$j]['id_inv'] == $data2[$z]['id_inv']) {
                            $array1 = explode(',', $data1[$j]['dados']);
                            if ($data1[$j]['x'] > $timeArray[$i] && $data1[$j]['x'] <= $timeArray[$i + 1]) {
                                $helper++;
                                $tempo = $data1[$j]['x'];
                                $data[$z][$i]['y'] = $array1[$pos];
                            }
                        }
                        if ($helper == 0) {
                            $data[$z][$i]['y'] = null;
                        }
                    }
                    $helper = 0;
                }
                $data[$z] = array("number" => $data[$z]);
            }



            break;
        default:
            $sql = "SELECT hms_server AS x, POWER((SPLIT_STRI(dados_list,',', $pos)),1) y FROM tab_final WHERE (id_unico='" . $nm . "') AND (date='" . $dt1 . "')";
    }
} else if ($range == '7daysAgo' || $range == '30daysAgo' || $range == 'chooseRange') {
    include('datafiller.php');
    $timeArray = timesofDay();
    $sizeofTime = sizeof($timeArray);
    $dateArray = dateArray($dt1, $dt2);
    $sizeOfDate = sizeof($dateArray);
    
    $invs = "SELECT id_inv, dados_list as dados, date, hms_server FROM tab_final WHERE date BETWEEN '" . $dt1 . "' AND '" . $dt2 . "' AND id_inv IN (SELECT DISTINCT t1.id_inversor as id_inv FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico ='" . $nm . "') t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv";
    $result2 = mysqli_query($conn, $invs);
    $data2 = array();
    foreach ($result2 as $row) {
        if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww'&& $row['id_inv'] != '
        ') {
            $data2[] = $row;
        }
    }

    $sql = "SELECT hms_server as x, date, id_inv, dados_list as dados from tab_final t1 WHERE date BETWEEN '" . $dt1 . "' AND '" . $dt2 . "' AND id_unico ='" . $nm . "' ORDER BY date ASC, hms_server ASC";

    $result = mysqli_query($conn, $sql);
    $data1 = array();

    foreach ($result as $row) {
        if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
            $data1[] = $row;
        }
    }

    $nData = sizeof($data1);
    $nInv = sizeof($data2);
    $helper = 0;
    $counter = 0;
    $timeCounter = 0;
    $tempo = '00:00:00';
    $placeholderX = "";
    $placeholdery = 0;
    $maxValue = 0;
    for ($z = 0; $z < $nInv; $z++) {
        
        for ($d = 0; $d < $sizeOfDate; $d++) {
            //echo "teste\n";
            $array = explode(',', $data2[$z]['dados']);
            $size = sizeof($array);
            for ($c = 0; $c < $size; $c++) {
                if ($array[$c] == $position) {
                    $pos = $c + 1;
                }
            }
            for ($j = 0; $j < $nData; $j++) {
                $previousTime = array();
                $previousTime = explode(' ', $data[$z][$counter-1]['x']);
               
                if ($data1[$j]['id_inv'] == $data2[$z]['id_inv']) {
                   // echo $data1[$j]['id_inv'];
                    if ($data1[$j]['date'] == $dateArray[$d]) {
                        $helperDate++;
                        $array1 = explode(',', $data1[$j]['dados']);
                        $x = 1;

                        while($array1[$pos] == 14316557.65 || $array1[$pos] == 1431655.765 || $array1[$pos] == 2184.5){
                            $array1 = explode(',', $data1[$j-$x]['dados']);
                            $x++;
                        }
                        
                        $tempo = $timeArray[$timeCounter+1];
                        while($helper == 0 && $timeCounter < $sizeofTime){
                            if ($data1[$j]['x'] > $timeArray[$timeCounter] && $data1[$j]['x'] <= $timeArray[$timeCounter+1]){
                                //está entre um intervalo
                                $watcher = 0;
                                $helper++;
                                $tempo = $timeArray[$timeCounter+1];
                                if( $tempo == $previousTime[1]){
                                    $counter=$counter-1;
                                }
                                $data[$z][$counter]['y'] = $array1[$pos];
                                $data[$z][$counter]['x'] = $dateArray[$d] . " " . $timeArray[$timeCounter+1];
                                $maxValue = $data[$z][$counter]['y'] = $array1[$pos];
                            } else if($data1[$j]['x'] > $timeArray[$timeCounter] && $data1[$j]['x'] >=$timeArray[$timeCounter+1] &&$tempo == $previousTime[1]){
                                $timeCounter++;
                            }
                            else {
                                //está mais a frente do intervalo
                                
                                if( $tempo == $previousTime[1]){
                                    $timeCounter++;
                                }
                                if($timeCounter != 0 && $maxValue != 0 && $position == "Ener" && $watcher == 0){
                                    $data[$z][$counter]['y'] = $maxValue;
                                } else {
                                    //echo "data: " . $dateArray[$d] . "\n";
                                    $data[$z][$counter]['y'] = null;
                                }

                                $data[$z][$counter]['x'] = $dateArray[$d] . " " . $timeArray[$timeCounter+1];

                                $timeCounter++;
                                $counter++;
                            }
                        }
                        $helper = 0;
                        $counter++;
                        $placeholderTimeAndDate =  $data[$z][$counter]['x'];
                    }
                    
                }

            }
            $lastDataOfTheDay= explode(" ",$placeholderTimeAndDate);
            if($lastDataOfTheDay[1] < '29:59' ){

                if($timeCounter == '00:00'){
                    $t = 0;
                } else {
                    $t = $timeCounter+1;
                }

                for ($i = $t; $i < $sizeofTime; $i++) {

                    if($timeCounter != 0 && $maxValue != 0 && $position == "Ener" && $dateArray[$d] != $dt2){
                        $data[$z][$counter]['y'] = $maxValue;
                    } else {
                        $data[$z][$counter]['y'] = null;
                        $watcher = 1;
                        //echo "data2: " . $dateArray[$d] . "\n";
                    }
                    
                    $data[$z][$counter]['x'] = $dateArray[$d]. " " . $timeArray[$i+1];
                    $counter++;
                }
            }
            $timeCounter = 0;
        }
        $counter = 0;
        $data[$z] = fillDataGapAnalytics($data[$z], $nm, $data2[$z]['id_inv']);
        $data[$z] = array("number" => $data[$z]);
    }
}
mysqli_close($conn);
echo json_encode($data);

/* encontrar máximo anterior 
SELECT id, id_inv, id_unico, dados_list as dados, date as x FROM tab_final WHERE id IN (SELECT MAX(id) FROM tab_final WHERE date = '2021-12-03' AND id < 509145 AND id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='Frigorifico') GROUP BY id_inv)*/
?>
