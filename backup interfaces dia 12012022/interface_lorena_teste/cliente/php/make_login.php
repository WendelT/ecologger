<?php
session_start();
require_once('conexao.php');
    if(empty($_POST['usuario']) || empty($_POST['senha'])){
        header("Location: ../login.php");
        exit();
    }
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $loginquery = "SELECT id, type_user FROM tab_clientes WHERE (login = '".$usuario."' OR email = '".$usuario."') AND senha = md5('".$senha."')";

    $result = mysqli_query($conn, $loginquery);
    $data = array();
        foreach($result as $clients){
            $data[] = $clients;
        }
    $resultadoId = $data[0]['id'];
    $resultadoType = $data[0]['type_user'];
    $row = mysqli_num_rows($result);
    if($row == 1){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['id'] = $resultadoId;
        $_SESSION['type_user'] = $resultadoType;
        if($resultadoType == 'suporte'){
            header("Location: ../gerenciamento.php");
        }
        else{
            header("Location: ../index.php");
        }
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header("Location: ../login.php");
        exit();
    }