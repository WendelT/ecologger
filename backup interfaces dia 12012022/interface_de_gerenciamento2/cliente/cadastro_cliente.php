<?php
    session_start();
    include_once('php/verifica_login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head >
        <link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
    <h1>Cadastrar Cliente</h1>
    <?php if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }?>
    <form method="POST" action="php/CCliente.php">
        <label>Nome </label>
        <input type="text" name="nomeCliente" placeholder="Digite o nome do Usuário"><br><br>
        <label>Email</label>
        <input type="text" name="emailCliente" placeholder="Digite o email do Usuário"><br><br>
        <label>Login</label>
        <input type="text" name="loginCliente" placeholder="Digite o login do Usuário"><br><br>
        <label>Senha</label>
        <input type="text" name="senhaCliente" placeholder="Digite o senha do Usuário"><br><br>
        <input type="submit" value="Cadastrar Cliente">
    </form>
</body>

</html>