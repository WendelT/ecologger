<?php


$INV_ID = "LCF_UFC_FORTALEZA_01";

  
$r_label = array('Vpv1','Vpv2','Vpv3');
$r_valor = array('400,0','380.0','385.0');


$tudo_junto = "";

  for($i=0;$i<3;$i++){
      echo $r_label[$i] . " ==> " . $r_valor[$i] . "<br>";
      $tudo_junto .= $r_label[$i] . " ==> " . $r_valor[$i] . " ...  ";
      
  } 

echo "<br><br> " . $INV_ID . "<br>";

echo $tudo_junto;



?>





