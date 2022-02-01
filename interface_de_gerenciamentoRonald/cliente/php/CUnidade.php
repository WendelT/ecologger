<?php
    session_start();
    include_once('verifica_login.php');
    include_once('conexao.php');
    if($_SESSION['type_user'] =='suporte')
    {
        $nome = filter_input(INPUT_POST, 'nomeUnidade', FILTER_SANITIZE_STRING);
        $potencia = filter_input(INPUT_POST, 'potenciaUnidade', FILTER_SANITIZE_NUMBER_INT);
        $cep = filter_input(INPUT_POST, 'CEPUnidade', FILTER_SANITIZE_NUMBER_INT);
        $pais = filter_input(INPUT_POST, 'paisUnidade', FILTER_SANITIZE_STRING);
        $estado = filter_input(INPUT_POST, 'estadoUnidade', FILTER_SANITIZE_STRING);
        $cidade = filter_input(INPUT_POST, 'cidadeUnidade', FILTER_SANITIZE_STRING);
        $logradouro = filter_input(INPUT_POST, 'logradouroUnidade', FILTER_SANITIZE_STRING);
        $numero = filter_input(INPUT_POST, 'numeroUnidade', FILTER_SANITIZE_STRING);
        $complemento = filter_input(INPUT_POST, 'complementoUnidade', FILTER_SANITIZE_STRING);
        $usuario = $_GET['client'];
        $date_now = date('Y-m-d');

        $insert_unidade  = "INSERT INTO clientes_unidade(id_cliente,id_unidade,potencia_unidade,instalacao_unidade,cep,pais,estado,cidade,bairro,logradouro,numero,complemento) VALUES ('".$usuario."','".$nome."',".$potencia.",'".$date_now."',".$cep.",'".$pais."','".$estado."','".$cidade."','".$bairro."','".$logradouro."','".$numero."','".$complemento."',NULL)";
        mysqli_query($conn, $insert_unidade);

        if(mysqli_insert_id($conn)){
            echo true;
        }
        else{
            echo false;
        }
    }
    else {header("Location: ../index.php");}
?>