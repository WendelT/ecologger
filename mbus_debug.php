<?php
//==========================================================================================
//==========================================================================================
//==========================================================================================
// DEBUG   
//==========================================================================================
//==========================================================================================
//==========================================================================================
//==========================================================================================

   
//============================================================================================
  $nome_arq = $dirbase . $d .$f;
  $arq = fopen("DATA_RAW.txt", "wb");
  if($arq==$false){
        echo "Falha ao criar o arquivo de saída";
        return;
  }

  fprintf($arq,"CLIENTE = %s<br>\n",$INV_ID);
  fprintf($arq,"INV. MODEL = %s<br>\n",$INV_MODEL);
  fprintf($arq,"NREGS = %d<br>\n",$NREGS);
  fprintf($arq,"NDRAM = %d<br>\n",$NDRAM);
  fprintf($arq,"------------------------------------\n<br>");

for($i=0;$i<$NREGS;$i++){
  Processa($i,  $Ascii_RAWDATA,$Ascii_ADDRS,$Ascii_RSIZES,
           $Ascii_RAWADDRS,$Ascii_FORMATS,$Ascii_GAINS,$Ascii_LABELS,
           $r_addr, $r_size, $r_rawaddr, $r_format, $r_gain, $r_label, $r_valor, $debug  );
//  fprintf($arq,"addr = %d\n",$r_addr);
//  fprintf($arq,"size = %d\n",$r_size);
//  fprintf($arq,"rawaddr = %d\n",$r_rawaddr);
//  fprintf($arq,"format = %s\n",$r_format);
//  fprintf($arq,"gain = %d\n",$r_gain);
//  fprintf($arq,"label = %s\n",$r_label);
//  fprintf($arq,"valor = %f\n",$r_valor);
//  fprintf($arq,"debug = %s\n",$debug);
  fprintf($arq,"%s = %f [%s]<br>\n",$r_label,$r_valor,$debug);
// fprintf($arq,"valor = %f\n",$r_valor);
//  fprintf($arq,"debug = %s\n",$debug);
//  fprintf($arq,"------------------------------------\n");
}
 fprintf($arq,"------------------------------------<br>\n");


  fclose($arq);
  echo "OK DATA_RAW.txt";
  return;

?>

