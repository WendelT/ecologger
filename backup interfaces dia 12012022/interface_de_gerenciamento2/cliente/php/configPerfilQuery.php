<?php
session_start();
require_once('conexao.php');
    if(empty($_POST['usuario']) || empty($_POST['senha'])){
        header("Location: ../login.php");
        exit();
    }
    $nCliente = mysqli_real_escape_string($conn, $_POST['nomeCliente']);
    $emailCliente = mysqli_real_escape_string($conn, $_POST['emailCliente']);
    $Celular = mysqli_real_escape_string($conn, $_POST['Celular']);
    $Telefone = mysqli_real_escape_string($conn, $_POST['Telefone']);
    $novaSenha = mysqli_real_escape_string($conn, $_POST['novaSenha']);
    $novaSenhaConf = mysqli_real_escape_string($conn, $_POST['novaSenhaConf']);
    $usuario = $_SESSION['usuario'];
    $id = $_SESSION['id'];

    if($nCliente != null){
        $queryWithoutPass = "UPDATE tab_clientes SET nome = '".$nCliente."' WHERE id = '".$id."'";
        mysqli_query($conn, $queryWithoutPass);
    }
    if($emailCliente != null){
        $queryWithoutPass = "UPDATE tab_clientes SET email = '".$emailCliente."' WHERE id = '".$id."'";
        mysqli_query($conn, $queryWithoutPass);
    }
    if($Celular != null){
        $queryWithoutPass = "UPDATE tab_clientes SET celular = '".$Celular."' WHERE id = '".$id."'";
        mysqli_query($conn, $queryWithoutPass);
    }
    if($Telefone != null){
        $queryWithoutPass = "UPDATE tab_clientes SET telefone = '".$Telefone."' WHERE id = '".$id."'";
        mysqli_query($conn, $queryWithoutPass);
    }

    if($novaSenha != null && $novaSenhaConf != null && $novaSenha === $novaSenhaConf){
        $queryWithoutPass = "UPDATE tab_clientes SET senha = md5('".$novaSenha."') WHERE id = '".$id."'";
        mysqli_query($conn, $queryWithoutPass);
    }
    
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