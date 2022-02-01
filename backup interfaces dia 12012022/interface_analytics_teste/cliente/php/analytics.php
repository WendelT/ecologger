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
    //$timeArray = timesofDay();
    //$sizeofTime = sizeof($timeArray);
    switch ($time != '') {
        case ($time == 'yes'):
            //echo "time 1: " . $tm1 . "\n";
            // echo "time 2: " . $tm2  . "\n";
            $timeArray = limitedTimesofDay($tm1, $tm2);
            // print_r($timeArray);
            $sizeofTime = sizeof($timeArray);
            /*$invs = "SELECT DISTINCT id_inv, dados_list as dados FROM tab_final t1 WHERE date = '" . $dt1 . "' AND id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico ='" . $nm . "') GROUP BY id_inv";*/
            $invs = "SELECT DISTINCT id_inv, dados_list as dados FROM tab_final t1 WHERE date = '" . $dt1 . "' AND id_unico ='" . $nm . "' GROUP BY id_inv";
            $result2 = mysqli_query($conn, $invs);
            $data2 = array();
            foreach ($result2 as $row) {
                if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
                    $data2[] = $row;
                }
            }

            /*$sql = "SELECT hms_server as x, id_inv, dados_list as dados from tab_final t1 WHERE date = '" . $dt1 . "' AND id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico ='" . $nm . "')";*/
            $sql = "SELECT hms_server as x, id_inv, dados_list as dados from tab_final t1 WHERE date = '" . $dt1 . "' AND id_unico ='" . $nm . "'";

            $result = mysqli_query($conn, $sql);
            $data1 = array();

            foreach ($result as $row) {
                $data1[] = $row;
            }
            $nData = sizeof($data1);
            //echo "n: " . $nData;
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
                        // echo "j: " . $j . "\n";
                        if ($data1[$j]['id_inv'] == $data2[$z]['id_inv']) {
                            $array1 = explode(',', $data1[$j]['dados']);
                            if ($data1[$j]['x'] > $timeArray[$i] && $data1[$j]['x'] <= $timeArray[$i + 1]) {
                                $helper++;
                                $tempo = $data1[$j]['x'];
                                $data[$z][$i]['y'] = $array1[$pos];
                                //$data[$z][$i]['x'] = $timeArray[$i + 1];
                                //echo " pos: " . $pos. " " . "valor: " . $array1[$pos]. " sum: " . $sum;

                                //$data[$z][$i]['x'] = $data1[$j]['x'];
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
            /*$invs = "SELECT DISTINCT id_inv, dados_list as dados FROM tab_final t1 WHERE date = '" . $dt1 . "' AND id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico ='" . $nm . "') GROUP BY id_inv";*/
            $invs = "SELECT DISTINCT id_inv, dados_list as dados FROM tab_final t1 WHERE date = '" . $dt1 . "' AND id_unico ='" . $nm . "' GROUP BY id_inv";
            $result2 = mysqli_query($conn, $invs);
            $data2 = array();
            foreach ($result2 as $row) {
                if ($row['id_inv'] != "????????????????????" && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww') {
                    $data2[] = $row;
                }
            }

            /*$sql = "SELECT hms_server as x, id_inv, dados_list as dados from tab_final t1 WHERE date = '" . $dt1 . "' AND id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico ='" . $nm . "')";*/
            $sql = "SELECT hms_server as x, id_inv, dados_list as dados from tab_final t1 WHERE date = '" . $dt1 . "' AND id_unico ='" . $nm . "'";

            $result = mysqli_query($conn, $sql);
            $data1 = array();

            foreach ($result as $row) {
                $data1[] = $row;
            }
            $nData = sizeof($data1);
            //echo "n: " . $nData;
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
                        // echo "j: " . $j . "\n";
                        if ($data1[$j]['id_inv'] == $data2[$z]['id_inv']) {
                            $array1 = explode(',', $data1[$j]['dados']);
                            if ($data1[$j]['x'] > $timeArray[$i] && $data1[$j]['x'] <= $timeArray[$i + 1]) {
                                $helper++;
                                $tempo = $data1[$j]['x'];
                                $data[$z][$i]['y'] = $array1[$pos];
                                //$data[$z][$i]['x'] = $timeArray[$i + 1];
                                //echo " pos: " . $pos. " " . "valor: " . $array1[$pos]. " sum: " . $sum;

                                //$data[$z][$i]['x'] = $data1[$j]['x'];
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
    //echo "entrou\n";
    $timeArray = timesofDay();
    $sizeofTime = sizeof($timeArray);
    $dateArray = dateArray($dt1, $dt2);
    //print_r($dateArray);
    $sizeOfDate = sizeof($dateArray);
    /*$invs = "SELECT DISTINCT id_inv, dados_list as dados FROM tab_final t1 WHERE date = '" . $dt1 . "' AND id_inv IN (SELECT id_inv FROM tab_final WHERE id_unico ='" . $nm . "') GROUP BY id_inv";*/
    $invs = "SELECT DISTINCT id_inv, dados_list as dados FROM tab_final t1 WHERE date BETWEEN '" . $dt1 . "' AND '" . $dt2 . "' AND id_unico ='" . $nm . "' GROUP BY id_inv";
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
    //echo "nTempo: " . $sizeofTime;
    $nInv = sizeof($data2);
    $helper = 0;
    $counter = 0;
    $timeCounter = 0;
    $tempo = '00:00:00';
    $placeholderX = "";
    $placeholdery = 0;
    //echo "n° inv: " .  $nInv . "\n";
    // echo "n° dias: " .  $sizeOfDate . "\n";
    //preenchendo os dias iniciais sem dados
    //echo "teste";
    for ($z = 0; $z < $nInv; $z++) {
        /*if ($data1[0]['date'] > $dateArray[0]) {
            $n = AmountOfDays($dateArray[0], $data1[0]['date']);
            // echo "number of days: " . $n;
            for ($a = 0; $a < $n; $a++) {
                echo "number of days: " . $n;
                for ($b = 0; $b < $sizeofTime; $b++) {
                    $data[$z][$counter]['y'] = null;
                    $data[$z][$counter]['x'] = $dateArray[$a] . " " . $timeArray[$b+1];

                    echo "horário: " . $data[$z][$counter]['x'] . "\n";
                    $counter++;
                }
            }
        }*/
        for ($d = 0; $d < $sizeOfDate; $d++) {
            //echo "teste\n";
            $array = explode(',', $data2[$z]['dados']);
            $size = sizeof($array);
            for ($c = 0; $c < $size; $c++) {
                if ($array[$c] == $position) {
                    $pos = $c + 1;
                }
            }

            //echo "time: " . $timeArray[$timeCounter+1];

            // $data[$z][$counter]['x'] = $dateArray[$d];
            for ($j = 0; $j < $nData; $j++) {
                $previousTime = array();
                $previousTime = explode(' ', $data[$z][$counter-1]['x']);

                if ($data1[$j]['id_inv'] == $data2[$z]['id_inv']) {
                   // echo $data1[$j]['id_inv'];
                    if ($data1[$j]['date'] == $dateArray[$d]) {
                        $helperDate++;

                        $array1 = explode(',', $data1[$j]['dados']);
                        //$tempo = $data1[$j]['x'];
                        //if($array1[$pos]!=14316557.65){
                        //$data[$z][$counter]['y'] = $array1[$pos];
                        //$data[$z][$counter]['x'] = $dateArray[$d] . " " . $data1[$j]['x'];
                        //}
                        
                        $x = 1;
                        while($array1[$pos] == 14316557.65 || $array1[$pos] == 1431655.765 || $array1[$pos] == 2184.5){
                            $array1 = explode(',', $data1[$j-$x]['dados']);
                            $x++;
                        }
                        $tempo = $timeArray[$timeCounter+1];
                        while($helper == 0 && $timeCounter < $sizeofTime){
                            if ($data1[$j]['x'] > $timeArray[$timeCounter] && $data1[$j]['x'] <= $timeArray[$timeCounter+1]){
                                //está entre um intervalor
                                $helper++;
                               
                                $tempo = $timeArray[$timeCounter+1];
 
                               // $previousTime = array();
                                //$previousTime = explode(' ', $data[$z][$counter-1]['x']);
                                if( $tempo == $previousTime[1]){
                                    
                                    //echo "counter anterior: " . $counter . "\n";
                                    //echo "tempo atual: ".  $tempo . "\n";
                                    //echo "tempo anterior: ".  $previousTime[1] . "\n";
                                    //echo "y atual: ". $data[$z][$counter-1]['y'] . "\n";
                                    //echo "x atual: ". $data[$z][$counter-1]['x'] . "\n";
                                    //echo "\n";
                                    
                                
                                    //echo "y anterior: ". $data[$z][$counter-2]['y'] . "\n";
                                    //echo "x anterior: ". $data[$z][$counter-2]['x'] . "\n";
                                    //echo "\n";
                                    $counter=$counter-1;
                                    //echo "counter atual: " . $counter . "\n";
                                }
                        $data[$z][$counter]['y'] = $array1[$pos];
                        $data[$z][$counter]['x'] = $dateArray[$d] . " " . $timeArray[$timeCounter+1];
                            } else if($data1[$j]['x'] > $timeArray[$timeCounter] && $data1[$j]['x'] >=$timeArray[$timeCounter+1] &&$tempo == $previousTime[1]){
                                $timeCounter++;
                            }
                            else {
                                //está mais a frente do intervalo
                                
                                //$previousTime = array();
                                //$previousTime = explode(' ', $data[$z][$counter-1]['x']);
                                if( $tempo == $previousTime[1]){
                                   //echo "y anterior: ". $data[$z][$counter-1]['y'] . "\n";
                                    //echo "x anterior: ". $data[$z][$counter-1]['x'] . "\n";
                                    $timeCounter++;
                                }
                                $data[$z][$counter]['y'] = null;
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
                    $data[$z][$counter]['y'] = null;
                    $data[$z][$counter]['x'] = $dateArray[$d]. " " . $timeArray[$i+1];

                    //$data[$z][$counter]['hour'] = $timeArray[$b];
                    $counter++;
                }
            }
            $timeCounter = 0;
            //echo "\n";
        }
        $counter = 0;
        $data[$z] = array("number" => $data[$z]);
    }
}
mysqli_close($conn);
echo json_encode($data);

/* encontrar máximo anterior 
SELECT id, id_inv, id_unico, dados_list as dados, date as x FROM tab_final WHERE id IN (SELECT MAX(id) FROM tab_final WHERE date = '2021-12-03' AND id < 509145 AND id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='Frigorifico') GROUP BY id_inv)*/
