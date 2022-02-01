<?php
      include "connect.php";

  
    //Cria conjunto de dados para teste
        $ID_CLIENTE = "CLIENTE_FOR_1";
        $INV_MODEL = "HUAWEI";
        $NREGS = "23";
        $DADOS = "445.01 0.467 213 2.34 213 0.001 0 0.499 54 1 380.6 379.1 382.5 0.725 0.761 0.734 220.7 218.9";
        $INFO = "0000ADD5 000001D3 0852 00EA 0852 00000001 0000 000001F3 021C 03E8 0EDE 0ECF 0EF1 000002D5 000002F9 000002DE 089F 088D";
        

        date_default_timezone_set('America/Belem');  // for other timezones, refer:- https://www.php.net/manual/en/timezones.asia.php
            $d1 = date("Y-m-d");
            $t1 = date("H:i:s");

       date_default_timezone_set('America/Belem');  // for other timezones, refer:- https://www.php.net/manual/en/timezones.asia.php
            $d2 = date("Y-m-d");
            $t2 = date("H:i:s");



       $sql = "INSERT INTO new_teste (value1, value2, value3, value4, value5, date, time, date2, time2) VALUES ('".$ID_CLIENTE."','".$INV_MODEL."', '".$NREGS."', '".$DADOS."', '".$INFO."', '".$d1."', '".$t1."', '".$d2."', '".$t2."')";


        $stmt = $PDO->prepare($sql);
        if($stmt->execute()){
            echo "dados_salvos_com_sucesso";
        }
        else {
            echo "Erro ao salvar, detalhes: " . $stmt->error;
        }

?>





