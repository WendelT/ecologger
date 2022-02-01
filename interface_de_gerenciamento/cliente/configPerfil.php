<?php
    session_start();
    include_once('php/verifica_login.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="css/stylePerfil.css">
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" ></script>
        <script type="text/javascript" src="js/configPerfil.js" defer></script>
        <title>Configurações de Perfil do Usuário</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
       
    <body>
        <nav>
            <p>Configurações de Perfil</p>
            <ul>
                <li>
                    <a href="index.php" class ="material-icons">home</a>
                </li>

                <li>
                    <a href="php/logout.php" class ="material-icons">logout</a>
                </li>
            </ul>
        </nav>

        <form action="php/configPerfilQuery.php" method="POST">

            <div class="cardPerfil">
                <div class="infosTotais">
                    <p class ="titulo"> Informações Básicas</p>
                <!--  <div> // local para adicionar foto do cliente futuramente </div> -->

                <div class="dados">
                    <p class="infos">Nome</p>
                    <input class="campo" name="nome" type="text" placeholder="Nome do Cliente" id="nomeCliente">
                </div>

                </div>

                <div class="contatoSeguranca">
                    <div class="infosTotais">
                        <p class ="titulo"> Informações de contato</p>
                <!--  <div> // local para adicionar foto do cliente futuramente </div> -->
                    
                <div class="dados">
                    <p class="infos">E-mail</p>
                    <input class="campo" name="nome" type="text" placeholder="E-mail do Cliente" id="emailCliente">
                </div>

                <div class="dados">
                    <p class="infos">Celular</p>
                    <input class="campo" name="nome" type="text" placeholder="Celular do Cliente" id="Celular">
                </div>

                <div class="dados">
                    <p class="infos">Telefone fixo</p>
                    <input class="campo" name="nome" type="text" placeholder="Fixo do Cliente" id="Telefone">
                </div>

                </div>

                <div class="infosTotais">
                    <p class ="titulo"> Redefinição de Senha</p>
                <!--  <div> // local para adicionar foto do cliente futuramente </div> -->

                <div class="dados">
                    <p class="infos">Nova senha</p>
                    <input class="campo" name="nome" type="password" placeholder="*************" id="novaSenha">
                </div>

                <div class="dados">
                    <p class="infos">Confirmação de senha</p>
                    <input class="campo" name="nome" type="text" placeholder="*************" id="novaSenhaConf">
                </div>

                </div>

            </div>  
            
            <div class="botoes">
                <button href="index.php" class="voltarBtn" >Voltar</button>
                <button class="salvarBtn" type="submit">Salvar alterações</button>
            </div>

                
            </div>
        </form>



        </body>
        
        </html>