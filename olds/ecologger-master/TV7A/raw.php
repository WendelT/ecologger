<?php
include "connect.php";

include "mbus.php";
include "mbus_debug.php";

$INV_ID = $_REQUEST['Id_inv'];             // modelo do inversor
echo "INV: " . $INV_ID . "<br/>";




//$v = ["value1"];
//$v2 = ["value2"];
$val = array();
$lab = array();
$db = array();
//$INV_ID = array();

//for($i=0;$i<23;$i++){
    
    //$INV_ID[$i]=$i;
        //$val[$i] = $i+1;
       // $lab[$i] = $i+2;
       //$db [$i] = $i+3;
//}
// do something with them

for($i=0;$i<$NREGS;$i++){
    Processa($i,  $Ascii_RAWDATA,$Ascii_ADDRS,$Ascii_RSIZES,
        $Ascii_RAWADDRS,$Ascii_FORMATS,$Ascii_GAINS,$Ascii_LABELS,
        $r_addr, $r_size, $r_rawaddr, $r_format, $r_gain, $r_label, $r_valor, $debug  );
        $val[$i] = $r_valor;
        $lab[$i] = $r_label;
        $db[$i] = $debug;
}

for($i = 0; $i<23; $i++)
{
    echo  $val[$i] . "<br/>";
}

date_default_timezone_set('America/Belem');  // for other timezones, refer:- https://www.php.net/manual/en/timezones.asia.php
    $d = date("Y-m-d");
    $t = date("H:i:s");

    $sql = "INSERT INTO teste_tab1 (value1, value2, value3, value4, value5, value6, value7, value8, value9, value10, 
    value11, value12, value13, value14, value15, value16, value17, value18, value19, value20, 
    value21, value22, value23, value24, value25, value26, value27, value28, value29, value30, 
    value31, value32, value33, value34, value35, value36, value37, value38, value39, value40, 
    value41, value42, value43, value44, value45, value46, value47, value48, value49, value50, 
    value51, value52, value53, value54, value55, value56, value57, value58, value59, value60, 
    value61, value62, value63, value64, value65, value66, value67, value68, value69,value70, date, time) VALUES ('".$INV_ID."', 
    '".$lab[0]."', '".$val[0]."', '".$db[0]."',
    '".$lab[1]."', '".$val[1]."','".$db[1]."',
    '".$lab[2]."', '".$val[2]."','".$db[2]."',
    '".$lab[3]."', '".$val[3]."','".$db[3]."',
    '".$lab[4]."', '".$val[4]."','".$db[4]."',
    '".$lab[5]."', '".$val[5]."','".$db[5]."',
    '".$lab[6]."', '".$val[6]."','".$db[6]."',
    '".$lab[7]."', '".$val[7]."','".$db[7]."',
    '".$lab[8]."', '".$val[8]."','".$db[8]."',
    '".$lab[9]."', '".$val[9]."','".$db[9]."',
    '".$lab[10]."', '".$val[10]."','".$db[10]."',
    '".$lab[11]."', '".$val[11]."','".$db[11]."',
    '".$lab[12]."', '".$val[12]."','".$db[12]."',
    '".$lab[13]."', '".$val[13]."','".$db[13]."',
    '".$lab[14]."', '".$val[14]."','".$db[14]."',
    '".$lab[15]."', '".$val[15]."','".$db[15]."',
    '".$lab[16]."', '".$val[16]."','".$db[16]."',
    '".$lab[17]."', '".$val[17]."','".$db[17]."',
    '".$lab[18]."', '".$val[18]."','".$db[18]."',
    '".$lab[19]."', '".$val[19]."','".$db[19]."',
    '".$lab[20]."', '".$val[20]."','".$db[20]."',
    '".$lab[21]."', '".$val[21]."','".$db[21]."',
    '".$lab[22]."', '".$val[22]."','".$db[22]."','".$d."', '".$t."')";

//$sql = "INSERT INTO tab_teste (value2, value1, date, time) VALUES (,'".$val[1]."', '".$val[0]."', '".$d."', '".$t."')";
//$sql = "INSERT INTO tab_teste ($v., $v2,, date, time) VALUES ('".$val[0]."', '".$val[1]."','".$d."', '".$t."')";
//$sql = "INSERT INTO tabdados (value1, value2, value3) VALUES ('".$value1."','".$value2."', '".$value3."')"; 
//    
//    $INV_ID   (string)
//    $r_label  (string)
//    $r_valor  (float)
//    $debug    (string)
$stmt = $PDO->prepare($sql);
if($stmt->execute()){
    echo "dados_salvos_com_sucesso";
} else {
    echo "erro_ao_salvar";
}

     // $var .= $INV_ID . $r_label ....;


?>





