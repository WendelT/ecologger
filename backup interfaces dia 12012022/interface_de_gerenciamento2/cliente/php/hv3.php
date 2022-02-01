<?php

function warningAnalizer($stringInfos, $stringIdInv)
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
    }

    $wrn1 = $dataArray[$pos[0]];
    $wrn2 = $dataArray[$pos[1]];
    $wrn3 = $dataArray[$pos[2]];

    $arrayOfStr = array();
    if ($wrn1 != 0) {
        if ($wrn1[0] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2001 - Alta tensão de entrada da string";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[1] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2002 - Falha de Arco CC";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[2] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2011 - Conexão Reversa de String";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[3] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2012 - Backfeed atual da corda";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[4] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2013 - Potência da String Anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[5] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2021 - Falha na autoverificação ";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[6] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2031 - Potência da String Anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[7] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2032 - Perda de rede ";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[8] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2033 - Subtensão da rede";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[9] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2034 - Sobretensão da rede";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[10] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2035 - Tensão da rede desbalanceada";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[11] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2036 - Sobrefrequência da rede";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[12] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2037 - Subfrequência da rede";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[13] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2038 - Frequência da rede instável";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[14] == '1') {
            $arrayOfStr[]['wrng'] = "ID:2039 - Sobrecorrente de saída";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn1[15] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2040 - Componente de saída DC sobreaquecido";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }


    if ($wrn2 != 0) {
        if ($wrn2[0] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2051 - Corrente residual anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[1] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2061 - Aterramento anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[2] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2062 - Baixa Resistência de Isolamento";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[3] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2063 - Sobretemperatura do inversor";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[4] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2064 - Falha do dispositivo";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[5] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2065 - Falha na atualização ou incompatibilidade de versão";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[6] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2066 - Licença Expirada";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[7] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 61440 - Defeito na unidade de monitoramento";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[8] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2067 - Defeito no coletor de energia";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[9] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2068 - Bateria anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[10] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2070 - Ilhamento ativo";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[11] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2071 - Ilhamento passivo";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[12] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2072 - Sobretensão";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[13] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2075 - Periférico em curto circuito";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[14] == '1') {
            $arrayOfStr[]['wrng'] = "ID:2077 - Sobrecarga de saída";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn2[15] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2080 - Configuração do módulo FV anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }

    if ($wrn3 != 0) {
        if ($wrn3[0] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2081 - Falha no otimizador";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[1] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2085 - Operação PID embutida anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[2] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2014 - Alta tensão da string de entrada para o aterramento";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[3] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2086 - Cooler externo anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[4] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2069 - Conexão reversa da bateria";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[5] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2082 - Controlador on-grid|off-grid anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[6] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2015 - Conexão String PV  perdida";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[7] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2087 - Cooler interno anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }

        if ($wrn3[8] == '1') {
            $arrayOfStr[]['wrng'] = "ID: 2088 - Unidade de porteção CC anormal";
            $arrayOfStr[]['inv_id'] = $stringIdInv;
        }
    }

    if($wrn1 == 0 && $wrn2 == 0 && $wrn3 == 0){
        $arrayOfStr[]['wrng'] = "Não há avisos.";
        $arrayOfStr[]['inv_id'] = $stringIdInv;
    }

    return $arrayOfStr;
}
?>

