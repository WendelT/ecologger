<?php 
header('Content-Type: application/json');
require('conexao.php');
//$nm = "Frigorifico";
//$nm = "84:F3:EB:B1:9E:0D";
$nm = "1";

$sql = "SELECT id, date as x, id_inv, dados_list as dados, infos_list as infos from tab_teste WHERE id IN (SELECT MAX(id) FROM tab_teste WHERE id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_teste WHERE id_unico IN (SELECT id_unico from unidade_logger WHERE id_unidade = '".$nm."')) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv)";

/*$sql = "SELECT id, date as x, id_inv, dados_list as dados, infos_list as infos from tab_final WHERE id IN (SELECT MAX(id) FROM tab_final WHERE id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico from unidade_logger WHERE id_unidade = '".$nm."')) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv)";*/

$result = mysqli_query($conn, $sql);
$data1 = array();

foreach ($result as $row) {
    $data1[] = $row;
}
 
$sizeOfData = sizeof($data1);
$infos = array();
$divider = array();
include('hv3.php');
include('hv2.php');
$previous = null;
for($i = 0; $i < $sizeOfData; $i++){
    //for($i = 0; $i < 2; $i++){
    $infos = explode(',', $data1[$i]['infos']);
    //echo "data: " . $data1[$i]['infos'] . "\n";
    $sizeOfInfos = sizeof($infos);
    $current = array();
    for($j = 0; $j < $sizeOfInfos; $j++){
        
        if($infos[$j] == "IM=HUWAEI_V30_"){
            
            $data2[$i]['wrngs'] = warningAnalizerHv3($data1[$i]['dados'], $data1[$i]['id_inv']);
            //$data[$i]['id_inv'] = $data1[$i]['id_inv'];
            echo "id_inv: " . $data1[$i]['id_inv'] . "data: " . $data1[$i]['x'] . "\n";
            $current[]['wrngs'] = $data2[$i]['wrngs'];
        } else if ($infos[$j] == "IM=HUWAEI_V20_"){
            $data2[$i]['wrngs'] = warningAnalizerHv2($data1[$i]['dados'], $data1[$i]['id_inv']);
            $current[]['wrngs'] = $data2[$i]['wrngs'];
        }
        
    }
    //$data[$i] = ["inv" => $currentData[$i]] ;
    $data[$i] = array("inv" => $current) ;
    
    //$t[0]['wrng'] = "Não há avisos";
    //$t[0]['inv_id'] = "12334";
    //$data2[0]['wrngs'] = $t;
    //$data = array("inv" => $data2);
    //
    
}

mysqli_close($conn);
echo json_encode($data, JSON_UNESCAPED_UNICODE);
//Ener,25997.06,0027AB1A,W_CA,0,00000000,Vps1,0,0000,Ips1,218.45,5555,Vps2,2184.5,5555,Ips2,218.45,5555,Vps3,2184.5,5555,Ips3,218.45,5555,Vps4,2184.5,5555,Ips4,218.45,5555,Vps5,2184.5,5555,Ips5,218.45,5555,Vps6,2184.5,5555,Ips6,218.45,5555,Vps7,2184.5,5555,Ips7,218.45,5555,Vps8,2184.5,5555,Ips8,218.45,5555,Vps9,2184.5,5555,Ips9,218.45,5555,Vp10,2184.5,5555,Ip10,218.45,5555,Vp11,2184.5,5555,Ip11,218.45,5555,Vp12,2184.5,5555,Ip12,218.45,5555,Vp13,2184.5,5555,Ip13,218.45,5555,Vp14,2184.5,5555,Ip14,218.45,5555,Vp15,2184.5,5555,Ip15,218.45,5555,Vp16,2184.5,5555,Ip16,218.45,5555,Vp17,2184.5,5555,Ip17,218.45,5555,Vp18,2184.5,5555,Ip18,218.45,5555,Vp19,2184.5,5555,Ip19,218.45,5555,Vp20,2184.5,5555,Ip20,218.45,5555,Vp21,2184.5,5555,Ip21,218.45,5555,Vp22,2184.5,5555,Ip22,218.45,5555,Vp23,2184.5,5555,Ip23,218.45,5555,Vp24,2184.5,5555,Ip24,218.45,5555,N_ps,21845,5555,PVar,1431655.765,55555555,Wrn1,21845,5555,Wrn2,21845,5555,Wrn3,21845,5555,W_CC,1431655.765,55555555,Temp,2184.5,5555,FP__,21.845,5555,V_AB,2184.5,5555,V_BC,2184.5,5555,V_CA,2184.5,5555,I__A,1431655.765,55555555,I__B,1431655.765,55555555,I__C,1431655.765,55555555,V__A,2184.5,5555,V__B,2184.5,5555,V__C,2184.5,5555,Freq,218.45,5555,
?>
