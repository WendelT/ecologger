<?php

function warningAnalizerHv2($stringInfos, $stringIdInv)
{
    $pos = array();
    $dataArray = explode(',', $stringInfos);
    $sizeOfDataArray = sizeof($dataArray);
    for ($c = 0; $c < $sizeOfDataArray; $c++) {
        if ($dataArray[$c] == "Wrn1") {
            $pos[0] = $c + 1;
        }
        if ($dataArray[$c] == "Wrn2") {
            $pos[1] = $c + 1;
        }
        if ($dataArray[$c] == "Wrn3") {
            $pos[2] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn4") {
            $pos[3] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn5") {
            $pos[4] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn6") {
            $pos[5] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn7") {
            $pos[6] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn8") {
            $pos[7] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn9") {
            $pos[8] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn10") {
            $pos[9] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn11") {
            $pos[10] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn12") {
            $pos[11] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn13") {
            $pos[12] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn14") {
            $pos[13] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn15") {
            $pos[14] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn16") {
            $pos[15] = $c + 1;
        }

        if ($dataArray[$c] == "Wrn17") {
            $pos[16] = $c + 1;
        }
    }

    $wrn1 = $dataArray[$pos[0]];
    $wrn2 = $dataArray[$pos[1]];
    $wrn3 = $dataArray[$pos[2]];
    $wrn4 = $dataArray[$pos[3]];
    $wrn5 = $dataArray[$pos[4]];
    $wrn6 = $dataArray[$pos[5]];
    $wrn7 = $dataArray[$pos[6]];
    $wrn8 = $dataArray[$pos[7]];
    $wrn9 = $dataArray[$pos[8]];
    $wrn10 = $dataArray[$pos[9]];
    $wrn11 = $dataArray[$pos[10]];
    $wrn12 = $dataArray[$pos[11]];
    $wrn13 = $dataArray[$pos[12]];
    $wrn14 = $dataArray[$pos[13]];
    $wrn15 = $dataArray[$pos[14]];
    $wrn16 = $dataArray[$pos[15]];
    $wrn17 = $dataArray[$pos[16]];

    $arrayOfStr = array();
    if ($wrn1 != 0) {
        
        if ($wrn1[1] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 106 - String 1 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[2] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 107 - String 2 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[3] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 108 - String 3 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[4] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 109 - String 4 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[5] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 110 - String 5 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[6] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 111 - String 6 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[10] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 504 - Versão do Software incompatível";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[12] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 505 - Falha no upgrade";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[13] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 61440 - Falha no módulo de memória Flashl";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[14] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 506 - Licença expirada";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }


    if ($wrn2 != 0) {
        
        if ($wrn2[1] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 504 - Versão do Software incompatível";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[2] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 504 - Versão do Software incompatível";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[3] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 400 - Falha no sistema";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[4] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 400 - Falha no sistema";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[5] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 200 - Circuito CC anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[6] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 202 - Circuito do inversor anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[7] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 318 - Corrente Residual anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[8] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 321 - Superaquecido";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[10] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 400 - Falha no sistema";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[11] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 320 - Falha no cooler";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[12] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 322 - Comunicação SPI anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[14] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 400 - Falha no sistema";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

    }

    if ($wrn3 != 0) {
        if ($wrn3[0] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 313 - Baixa resistência de isolamento";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[1] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 411 - Falha na autoverificação AFCI ";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[2] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 412 - Falha no arco CC";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[3] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 411 - Falha na autoverificação AFCI ";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[4] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 411 - Falha na autoverificação AFCI ";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[5] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 202 - Circuito do inversor anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[7] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 400 - Falha no sistema";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[8] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 400 - Falha no sistema";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[9] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 122 - String 3 Reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[12] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 412 - Falha no Arco CC";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[13] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 412 - Falha no Arco CC";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[14] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 412 - Falha no Arco CC";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[15] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 400 - Falha no sistema";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }

    if ($wrn4 != 0) {
        
        if ($wrn4[1] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 120 - String 1 Reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn4[2] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 121 - String 2 Reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn4[3] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 200 - Circuito CC anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn4[6] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 123 - String 4 Reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn4[7] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 124 - String 5 Reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn4[8] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 125 - String 6 Reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn4[9] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 103 - Alta tensão na entrada CC";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn4[10] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 103 - Alta tensão na entrada CC";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn4[11] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 103 - Alta tensão na entrada CC";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn4[12] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 103 - Alta tensão na entrada CC";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn4[15] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 200 - Circuito CC anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }

    if ($wrn5 != 0) {
        
        if ($wrn5[2] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 120 - String 1 reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[3] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 121 - String 2 reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[4] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 126 - String 7 reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[5] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 126 - String 7 reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[6] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 127 - String 8 reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[7] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 127 - String 8 reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[8] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 413 - Conexão da String anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[9] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 413 - Conexão da String anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[10] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 413 - Conexão da String anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[11] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 413 - Conexão da String anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[12] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 122 - String 3 reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[13] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 123 - String 4 reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[14] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 124 - String 5 reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn5[15] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 125 - String 6 reversa";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }

    if ($wrn6 != 0) {
        
        if ($wrn6[1] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 200 - Circuito CC anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn6[2] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 410 - Potência auxiliar anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn6[4] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 200 - Circuito CC anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn6[5] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 200 - Circuito CC anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn6[6] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 200 - Circuito CC anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn6[7] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 414 - Conexão anormal do Cabo Indutor BST";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn6[8] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 414 - Conexão anormal do Cabo Indutor BST";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn6[9] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 414 - Conexão anormal do Cabo Indutor BST";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn6[10] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 414 - Conexão anormal do Cabo Indutor BST";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }

    if ($wrn7 != 0) {
        
        if ($wrn7[6] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 400 - Falha no sistema";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn7[10] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 202 - Circuito do inversor anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn7[12] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 202 - Circuito do inversor anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }

    if ($wrn8 != 0) {
        
        if ($wrn8[1] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 202 - Circuito do inversor anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn8[5] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 400 - Falha no sistema";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }

    if ($wrn9 != 0) {
        
        if ($wrn9[0] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 301 - Tensão da rede anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn9[3] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 301 - Tensão da rede anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn9[6] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 305 - Frequência da rede anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn9[7] == '1') {
            $arrayOfStr[]['wrng'] = "305 - Frequência da rede anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn9[8] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 301 - Tensão da rede anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn9[9] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 301 - Tensão da rede anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn9[10] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 326 - Aterramento anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn9[11] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 301 - Tensão da rede anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn9[12] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 305 - Frequência da rede anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }

    if ($wrn10 != 0) {
        
        if ($wrn10[0] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 301 - Tensão da rede anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn10[1] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 301 - Tensão da rede anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn10[2] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 301 - Tensão da rede anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn10[8] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 301 - Tensão da rede anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }

    if ($wrn17 != 0) {
        
        if ($wrn17[0] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 106 - String 1 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn17[1] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 107 - String 2 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn17[2] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 108 - String 3 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn17[3] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 109 - String 4 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn17[4] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 110 - String 5 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn17[5] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 111 - String 6 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn17[6] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 112 - String 7 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn17[7] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 113 - String 8 anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }


    if($wrn1 == 0 && $wrn2 == 0 && $wrn3 == 0 && $wrn4 == 0 && $wrn5 == 0 && $wrn6 == 0 && $wrn7 == 0 && $wrn8 == 0 && $wrn9 == 0 && $wrn10 == 0 && $wrn17 == 0){
        $arrayOfStr[]['wrng'] = "Não há avisos.";
        $arrayOfStr[]['inv_id'] = $stringIdInv;
    }

    return $arrayOfStr;
}
?>

