<?php
include('connect.php');
            // modelo do inversor
//==============================================================================================



//$v = ["value1"];
//$v2 = ["value2"];
$val = array();

for($i = 0; $i <= 1; $i++)
{
   $val[$i] = $i + 1;
}
for($i = 0; $i<=1; $i++)
{
    echo $val[$i] . "<br/>";
}
date_default_timezone_set('America/Belem');  // for other timezones, refer:- https://www.php.net/manual/en/timezones.asia.php
    $d = date("Y-m-d");
    $t = date("H:i:s");

//echo implode(',', $foo);
$sql = "INSERT INTO tab_teste (value1, value2, date, time) VALUES ('".$val[1]."', '".$val[0]."', '".$d."', '".$t."')";

//$sql = "INSERT INTO tab_teste (value1, value2, date, time) VALUES ('".$val[0]."', '".$val[1]."','".$d."', '".$t."')";
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





