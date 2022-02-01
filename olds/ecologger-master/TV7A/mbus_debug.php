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
        echo "Falha ao criar o arquivo de sa�da";
        return;
  }

  fprintf($arq,"CLIENTE = %s\n",$INV_ID);
  fprintf($arq,"INV. MODEL = %s\n",$INV_MODEL);
  fprintf($arq,"NREGS = %d\n",$NREGS);
  fprintf($arq,"NDRAM = %d\n",$NDRAM);
  fprintf($arq,"------------------------------------\n");

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
  fprintf($arq,"%s = %f [%s]\n",$r_label,$r_valor,$debug);
// fprintf($arq,"valor = %f\n",$r_valor);
//  fprintf($arq,"debug = %s\n",$debug);
  fprintf($arq,"------------------------------------\n");
}


  fclose($arq);
  echo "OK DATA_RAW.txt";
  return;

?>


