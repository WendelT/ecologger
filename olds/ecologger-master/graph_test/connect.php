<?php
     try {
        $HOST = "smartlogger.mysql.dbaas.com.br";
        $BANCO = "smartlogger"; //nome do banco de dados
        $USUARIO = "smartlogger"; // 
        $SENHA = "F@%KNcle#d0fUo";

        $PDO = new PDO("mysql:host=" . $HOST . ";dbname=" . $BANCO . ";charset=utf8", $USUARIO, $SENHA);
        
    } catch (PDOException $erro){
        echo "Erro de conexão, detalhes: " . $erro->getMessage();
        //echo "Erro de conexao";
    }
?>
