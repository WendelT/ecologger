<?php
    session_start();
    include_once('verifica_login.php');
    include_once('conexao.php');
    if($_SESSION['type_user'] =='suporte')
    {
        $nome = filter_input(INPUT_POST, 'nomeCliente', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'emailCliente', FILTER_SANITIZE_EMAIL);
        $login = filter_input(INPUT_POST, 'loginCliente', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senhaCliente', FILTER_SANITIZE_STRING);

        $teste_cadastro = "SELECT id FROM tab_clientes WHERE (login = '".$login."' OR email = '".$email."')";

        $result = mysqli_query($conn, $teste_cadastro);

        $data = array();
        foreach($result as $clients){
            $data[] = $clients;
        }

        if($data != null)
        {
            echo false;
        }

        $insert_usuario  = "INSERT INTO tab_clientes(type_user,login,email,nome,senha,created,modified) VALUES ('user','".$login."','".$email."','".$nome."',md5('".$senha."'),NOW(),NOW())";
        mysqli_query($conn, $insert_usuario);

        if(mysqli_insert_id($conn)){
            echo true;
        }
        else{
            echo false;
        }
    }
    else {header("Location: ../index.php");}
    
?>