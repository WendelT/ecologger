<?php
//==========================================================================================
//==========================================================================================
//==========================================================================================
// PROCESSAMENTO DOS DADOS DO MODBUS   
//==========================================================================================
//==========================================================================================
//==========================================================================================
//==========================================================================================
  function Ascii_To_Bin($buf_ascii, &$buf_bin, $len)
  {
    for($i=0;$i<(2*$len);$i+=2){
       $lsb = ord($buf_ascii[$i]);
       $msb = ord($buf_ascii[$i+1]);
       $hex =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $buf_bin .= chr($hex);
    }
  }
//===========================================================
  function Ascii_To_UnsignedInt16($buf_ascii, $pos, &$valor)
  {
       $lsb = ord($buf_ascii[$pos]);
       $msb = ord($buf_ascii[$pos+1]);
       $ll =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $lsb = ord($buf_ascii[$pos+2]);
       $msb = ord($buf_ascii[$pos+3]);
       $hh =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $valor = ($hh*256) + $ll;
  }
//===========================================================
  function Ascii_To_SignedInt16($buf_ascii, $pos, &$valor)
  {
       $lsb = ord($buf_ascii[$pos]);
       $msb = ord($buf_ascii[$pos+1]);
       $ll =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $lsb = ord($buf_ascii[$pos+2]);
       $msb = ord($buf_ascii[$pos+3]);
       $hh =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $valor = ($hh*256) + $ll;
       
       if($valor&0x8000){
           $valor = 65536 - $valor;
           $valor = -$valor;
       }
  }
//===========================================================
  function Ascii_To_UnsignedInt32($buf_ascii, $pos, &$valor)
  {
       $lsb = ord($buf_ascii[$pos]);
       $msb = ord($buf_ascii[$pos+1]);
       $ll =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $lsb = ord($buf_ascii[$pos+2]);
       $msb = ord($buf_ascii[$pos+3]);
       $hh =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $val_high = ($hh*256) + $ll;

       $lsb = ord($buf_ascii[$pos+4]);
       $msb = ord($buf_ascii[$pos+5]);
       $ll =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $lsb = ord($buf_ascii[$pos+6]);
       $msb = ord($buf_ascii[$pos+7]);
       $hh =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $val_low = ($hh*256) + $ll;
       
       $valor = ($val_high*65536) + $val_low;
  }
  function Ascii_To_SignedInt32($buf_ascii, $pos, &$valor)
  {
       $lsb = ord($buf_ascii[$pos]);
       $msb = ord($buf_ascii[$pos+1]);
       $ll =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $lsb = ord($buf_ascii[$pos+2]);
       $msb = ord($buf_ascii[$pos+3]);
       $hh =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $val_high = ($hh*256) + $ll;

       $lsb = ord($buf_ascii[$pos+4]);
       $msb = ord($buf_ascii[$pos+5]);
       $ll =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $lsb = ord($buf_ascii[$pos+6]);
       $msb = ord($buf_ascii[$pos+7]);
       $hh =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $val_low = ($hh*256) + $ll;
       
       $valor = ($val_high*65536) + $val_low;
       
       if($valor&0x80000000){
           $valor = 0x100000000 - $valor;
           $valor = -$valor;
       }
  }
//===========================================================
  function Ascii_To_HEX($buf_ascii, $pos, $len, &$hex)
  {
     $hex="";
     for($i=0;$i<$len;$i++){  
       $dig = ord($buf_ascii[$pos+$i]); $dig =  ($dig&0x0f);
       if($dig<10)$hex .= chr($dig + 48);
       else       $hex .= chr($dig + 55);
     }
  }
//===========================================================
  function Ascii_To_UnsignedInt8($buf_ascii, $pos, &$valor)
  {
       $lsb = ord($buf_ascii[$pos]);
       $msb = ord($buf_ascii[$pos+1]);
       $valor =  ($lsb&0x0f) + (($msb&0x0f)<<4);
  }
//===========================================================
  function Ascii_To_Text($buf_ascii, $pos, $len, &$txtout)
  {
    $txtout = "";
    for($i=0;$i<(2*$len);$i+=2){
       $lsb = ord($buf_ascii[$i+$pos]);
       $msb = ord($buf_ascii[$i+$pos+1]);
       $hex =  ($lsb&0x0f) + (($msb&0x0f)<<4);
       $txtout .= chr($hex);
    }
  }
//===========================================================
function Processa($nreg,  $Ascii_RAWDATA,$Ascii_ADDRS,$Ascii_RSIZES,
           $Ascii_RAWADDRS,$Ascii_FORMATS,$Ascii_GAINS,$Ascii_LABELS,
           &$r_addr, &$r_size, &$r_rawaddr, &$r_format, &$r_gain, &$r_label, &$r_valor, &$debug  )
  {
  $r_addr=22; $r_size=0;  $r_rawaddr=0; $r_format=0; $r_gain=0; $r_label="xxx"; $r_valor=9999;

  Ascii_To_UnsignedInt16($Ascii_ADDRS,4*$nreg,    $r_addr);
  Ascii_To_UnsignedInt8($Ascii_RSIZES,2*$nreg,    $r_size);
  Ascii_To_UnsignedInt8($Ascii_RAWADDRS,2*$nreg,  $r_rawaddr);
  Ascii_To_Text($Ascii_FORMATS, 8*$nreg, 3,       $r_format);
  Ascii_To_UnsignedInt16($Ascii_GAINS,4*$nreg,    $r_gain);
  Ascii_To_Text($Ascii_LABELS, 10*$nreg, 4,       $r_label);

  if((int)$r_size==1){
        if($r_format=="S16")Ascii_To_SignedInt16($Ascii_RAWDATA,4*$r_rawaddr,$r_valor);
        else                Ascii_To_UnsignedInt16($Ascii_RAWDATA,4*$r_rawaddr,$r_valor);
        Ascii_To_HEX($Ascii_RAWDATA,4*$r_rawaddr,4,$debug);
  }
  else
  if((int)$r_size==2){
        if($r_format=="S32")Ascii_To_SignedInt32($Ascii_RAWDATA,4*$r_rawaddr,$r_valor);
        else                Ascii_To_UnsignedInt32($Ascii_RAWDATA,4*$r_rawaddr,$r_valor);
        Ascii_To_HEX($Ascii_RAWDATA,4*$r_rawaddr,8,$debug);
  }
  else $r_valor=12345;

}
//===========================================================
  $INV_MODEL=$_REQUEST['Imodel'];             // modelo do inversor
  $NREGS=$_REQUEST['N_regs'];                 // número de registros (128 no máximo)
  $NDRAM=$_REQUEST['N_draw'];                 // No. bytes de dados (depende de Nregs e rsize)
  $Ascii_RAWDATA=$_REQUEST['Data_raw'];       // conjunto de dados (int16)
  $Ascii_ADDRS=$_REQUEST['Data_addrs'];         // endereços (int16)
  $Ascii_RSIZES=$_REQUEST['Data_rsizes'];     // no. de words (int8)
  $Ascii_RAWADDRS=$_REQUEST['Data_rawaddrs'];   // no. de words (int8)
  $Ascii_FORMATS=$_REQUEST['Data_Formatos'];  // formatos (4 bytes por registro) 
  $Ascii_GAINS=$_REQUEST['Data_gains'];       // ganhos (int16)    
  $Ascii_LABELS=$_REQUEST['Data_Labels'];     // descrições (5 bytes por registro)
//===========================================================

   
//============================================================================================
  $nome_arq = $dirbase . $d .$f;
  $arq = fopen("DATA_RAW.txt", "wb");
  if($arq==$false){
        echo "Falha ao criar o arquivo de saída";
        return;
  }

  fprintf($arq,"INV. MODEL = %s\n",$INV_MODEL);
  fprintf($arq,"NREGS = %d\n",$NREGS);
  fprintf($arq,"NDRAM = %d\n",$NDRAM);
  fprintf($arq,"---------------------------------------------------------------------------\n");

for($i=0;$i<$NREGS;$i++){
  Processa($i,  $Ascii_RAWDATA,$Ascii_ADDRS,$Ascii_RSIZES,
           $Ascii_RAWADDRS,$Ascii_FORMATS,$Ascii_GAINS,$Ascii_LABELS,
           $r_addr, $r_size, $r_rawaddr, $r_format, $r_gain, $r_label, $r_valor, $debug  );
  fprintf($arq,"addr = %d\n",$r_addr);
  fprintf($arq,"size = %d\n",$r_size);
  fprintf($arq,"rawaddr = %d\n",$r_rawaddr);
  fprintf($arq,"format = %s\n",$r_format);
  fprintf($arq,"gain = %d\n",$r_gain);
  fprintf($arq,"label = %s\n",$r_label);
  fprintf($arq,"valor = %d\n",$r_valor);
  fprintf($arq,"debug = %s\n",$debug);
  fprintf($arq,"-----------------------------\n");
}


  fclose($arq);
  echo "OK DATA_RAW.txt";
  return;

?>





<?php


/*
  fprintf($arq,"---------------------------------------------------------------------------\n");
  fprintf($arq,"REG_FORMATOS ==> ");
  fwrite($arq,$REG_FORMATS); 
  fprintf($arq,"\n-------------------------------------------------------------------------\n");
  fprintf($arq,"REG_LABELS ==> ");
  fwrite($arq,$REG_LABELS); 
  fprintf($arq,"\n-------------------------------------------------------------------------\n");
*/




/*
  fprintf($arq,"RAW DATA:\n");    fwrite($arq,$Ascii_RAWDATA); fprintf($arq,"\n");
  fprintf($arq,"RAW_ADR:\n");     fwrite($arq,$Ascii_ADDRS);   fprintf($arq,"\n");
  fprintf($arq,"RAW_RSIZE:\n");   fwrite($arq,$Ascii_RSIZES);  fprintf($arq,"\n");
  fprintf($arq,"RAW_RAWadrs:\n"); fwrite($arq,$Ascii_RAWADDRS); fprintf($arq,"\n");
  fprintf($arq,"RAW_GAIN:\n");    fwrite($arq,$Ascii_GAINS);   fprintf($arq,"\n");
  fprintf($arq,"RAW_FORMAT:\n");  fwrite($arq,$Ascii_FORMATS); fprintf($arq,"\n");
  fprintf($arq,"RAW_LABELS:\n");  fwrite($arq,$Ascii_LABELS);  fprintf($arq,"\n");
*/




/*
//==================================  PRIMEIRO PROCESSAMENTO... DECODIFICA OS DADOS....
  $REG_RAWDATA="";     Ascii_To_Bin($Ascii_RAWDATA, $REG_RAWDATA,  $NDRAM*2);
  $REG_ADDRS="";       Ascii_To_Bin($Ascii_ADDRS,   $REG_ADDRS,    $NREGS*2);
  $REG_SIZES="";       Ascii_To_Bin($Ascii_RSIZES,  $REG_SIZES,    $NREGS*2);
  $REG_RAWADRS="";     Ascii_To_Bin($Ascii_RAWADDRS, $REG_RAWADRS,  $NREGS*2);
  $REG_FORMATS="";     Ascii_To_Bin($Ascii_FORMATS, $REG_FORMATS,  $NREGS*4);
  $REG_GAINS="";       Ascii_To_Bin($Ascii_GAINS,   $REG_GAINS,    $NREGS*2);
  $REG_LABELS="";      Ascii_To_Bin($Ascii_LABELS,  $REG_LABELS,   $NREGS*5);
//================================== SEGUNDO PROCESSAMENTO... TRANSFORMA EM ARRAYS COMUMNS....
*/

/* 
  $nreg = 0;
  Ascii_To_UnsignedInt16($Ascii_ADDRS,4*$nreg,    $r_addr);
  Ascii_To_UnsignedInt8($Ascii_RSIZES,2*$nreg,    $r_size);
  Ascii_To_UnsignedInt8($Ascii_RAWADDRS,2*$nreg,  $r_rawaddr);
  Ascii_To_Text($Ascii_FORMATS, 8*$nreg, 3,      $r_format);
  Ascii_To_UnsignedInt16($Ascii_GAINS,4*$nreg,    $r_gain);
  Ascii_To_Text($Ascii_LABELS, 10*$nreg, 4,      $r_label);

  if((int)$r_size==1){
        Ascii_To_UnsignedInt16($Ascii_RAWDATA,4*$nreg,$r_valor);
  }
  else
  if((int)$r_size==2){
        Ascii_To_UnsignedInt16($Ascii_RAWDATA,4*$nreg,$r_valor);
  }
  else $r_valor=12345;
*/

?>





