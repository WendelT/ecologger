<?php
     try {
        $HOST = "ecologger_ver2.mysql.dbaas.com.br";
        $BANCO = "ecologger_ver2"; //nome do banco de dados
        $USUARIO = "ecologger_ver2"; // 
        $SENHA = "K#vsfcle@4wsTR";

        $PDO = new PDO("mysql:host=" . $HOST . ";dbname=" . $BANCO . ";charset=utf8", $USUARIO, $SENHA);
        
    } catch (PDOException $erro){
        echo "Erro de conexão, detalhes: " . $erro->getMessage();
        //echo "Erro de conexao";
    }
?>