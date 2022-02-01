<?php

$nome_arq = $dirbase . $d .$f;
  $arq = fopen("tsql_read.txt", "wb");
  if($arq==$false){
        echo "Falha ao criar o arquivo de sa�da";
        return;
  }
  
  echo "
  <html lang='pt'>
  <head>
      <meta charset='UTF-8'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Teste</title>
      <style>
          body{
              background-color: rgb(232, 241, 241);
              //background-color: #BFACAA;
              
          }
          .button {
              background-color: #4E8ADF;
          // background-color: #40434E;
              border: none;
              color: white;
              padding: 15px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
          }
  
      </style>
  </head>
  <body>
    <form>
        <input class='button' type='submit' onClick='history.go(0)' value='Atualizar'>
    </form>
    <meta http-equiv='refresh' content='30'>
  </body>
  
  </html>";

  fprintf($arq,"CLIENTE = %s\n",$ID_CLIENTE);
  fprintf($arq,"INV. MODEL = %s\n",$INV_MODEL);
  fprintf($arq,"NREGS = %d\n",$NREGS);
  fprintf($arq,"DADOS = %s\n",$DADOS);
  fprintf($arq,"INFO = %s\n",$INFO);
  fprintf($arq,"DATE1 = %s\n",$d1);
  fprintf($arq,"TIME1 = %s\n",$t1);
  fprintf($arq,"DATE2 = %s\n",$d2);
  fprintf($arq,"TIME2 = %s\n",$t2);
  fprintf($arq,"---------------------------------------------------------------------------\n");

  fclose($arq);
  echo "OK tsql_read.txt";
  return;


?>
