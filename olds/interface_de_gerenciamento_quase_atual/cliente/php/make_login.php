<?php
session_start();
require_once('conexao.php');
    if(empty($_POST['usuario']) || empty($_POST['senha'])){
        header("Location: ../login.php");
        exit();
    }
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $loginquery = "SELECT id FROM tab_clientes WHERE (login = '".$usuario."' OR email = '".$usuario."') AND senha = md5('".$senha."')";

    $result = mysqli_query($conn, $loginquery);
    $data = array();
        foreach($result as $clients){
            $data[] = $clients;
        }
    $resultadoId = $data[0]['id'];
    $row = mysqli_num_rows($result);
    if($row == 1){
        
        $_SESSION['usuario'] = $usuario;
        $_SESSION['id'] = $resultadoId;
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header("Location: ../login.php");
        exit();
    }
