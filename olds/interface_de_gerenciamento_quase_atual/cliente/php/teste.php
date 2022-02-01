<?php
session_start();
require_once('conexao.php');

$loginquery = "SELECT id FROM tab_clientes WHERE (login = 'tester' OR email = '".$usuario."') AND senha = md5('senha1234')";

$result = mysqli_query($conn, $loginquery);
$data = array();
    foreach($result as $clientsid){
        $data[] = $clientsid;
    }

$resultado = $data[0]['id'];

var_dump($resultado);
echo "<br>";
echo "$resultado";
echo "<br> Resultado data = ".$data[0]['id'];

