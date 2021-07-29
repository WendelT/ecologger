<?php

// http://www.deequiz.ufc.br/FLMA/teste.php?num=100

$num=$_REQUEST['num'];

$inum = (int)($num/2);
$inum = $inum*2;

if((int)$num==(int)$inum){
   $arq_s = fopen("teste.txt", "a+");
   if($arq_s==true){
      fprintf($arq_s,"%d\n",$num);
      fclose($arq_s);
      echo "0";
      return; 
    }
    else{
      echo "2";
      return;      
    }
   
}
else{
  echo "1";
  return; 
}


?>

