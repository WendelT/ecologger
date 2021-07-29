<?php

    include('connect.php');

    $value1 = $_GET['value1'];
    $value2 = $_GET['value2'];
    $value3 = $_GET['value3'];
    $value4 = $_GET['value4'];
    $value5 = $_GET['value5'];
    $value6 = $_GET['value6'];
    $value7 = $_GET['value7'];
    $value8 = $_GET['value8'];
    $value9 = $_GET['value9'];
    $value10 = $_GET['value10'];
    $value11 = $_GET['value11'];
    $value12 = $_GET['value12'];
    $value13 = $_GET['value13'];
    $value14 = $_GET['value14'];
    $value15 = $_GET['value15'];
    $value16 = $_GET['value16'];

    date_default_timezone_set('America/Belem');  // for other timezones, refer:- https://www.php.net/manual/en/timezones.asia.php
        $d = date("Y-m-d");
        $t = date("H:i:s");

    $sql = "INSERT INTO tabdados (value1, value2, value3, value4, value5, value6, value7, value8, value9, value10, value11, value12, value13, value14, value15, value16, date, time) VALUES (:value1, :value2, :value3, :value4, :value5, :value6, :value7, :value8, :value9, :value10, :value11, :value12, :value13, :value14, :value15, :value16, '".$d."', '".$t."')";
    //$sql = "INSERT INTO tabdados (value1, value2, value3) VALUES ('".$value1."','".$value2."', '".$value3."')"; 

    $stmt = $PDO->prepare($sql);

    $stmt->bindParam(':value1', $value1);
    $stmt->bindParam(':value2', $value2);
    $stmt->bindParam(':value3', $value3);
    $stmt->bindParam(':value4', $value4);
    $stmt->bindParam(':value5', $value5);
    $stmt->bindParam(':value6', $value6);
    $stmt->bindParam(':value7', $value7);
    $stmt->bindParam(':value8', $value8);
    $stmt->bindParam(':value9', $value9);
    $stmt->bindParam(':value10', $value10);
    $stmt->bindParam(':value11', $value11);
    $stmt->bindParam(':value12', $value12);
    $stmt->bindParam(':value13', $value13);
    $stmt->bindParam(':value14', $value14);
    $stmt->bindParam(':value15', $value15);
    $stmt->bindParam(':value16', $value16);
    //$stmt->bindParam(':date', $d);
    //$stmt->bindParam(':time', $t);


    if($stmt->execute()){
        echo "dados_salvos_com_sucesso";
    } else {
        echo "erro_ao_salvar";
    }
?>