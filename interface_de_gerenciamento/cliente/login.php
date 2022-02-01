<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/mostraInfo.js"></script>
    <title>Sistema de Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleLogin.css">
</head>

<body>
    <section>
        <div class="mainblock">
            <div>
                <img class="logo" src="img/LOGO OFICIAL COLORIDA.png" alt="Logo Eco Soluções">
            </div>
                <div >
                    <p>Para entrar, insira seu e-mail e sua senha</p>
                </div>
                    <div class="formLogin">
                        <form action="php/make_login.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <img id="userImg" src="img/vUser.png" >
                                    <input name="usuario" name="text" placeholder="Usuário" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <img id="senhaImg" src="img/vpSenha.png" >
                                    <input id="senha" name="senha" type="password" placeholder="Senha" src="">
                                    <img id="statusSenha" onclick="mostrarOcultarSenha()" src="img/esconderSenha.png" >
                                </div>
                                
                            </div>
                            <p class="forgetpassword">Esqueceu a senha?</p>
                            
                            <button type="submit"><p>Entrar</p></button>
                        </form>
                    </div>
        </div>
    </section>
    <footer>
        <div class="foot">
        <div class="imgs">
       <img class="img1" src="img/LOGO VERSAO PRETA.png">
        <img class="img2" src="img/Logo LIT.png">
        <img class="img3" src="img/Logo UFC.png">
        <img class="img4" src="img/Logo UFC virtual.png">
    </div>
    <p>Direitos Reservados | Eco Soluções em Energia | Laboratorio de Inovações Tecnológicas</p>
</div>
    
    </footer>
</body>

</html>