<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                                    <input name="senha" type="password" placeholder="Senha" src="">
                                    <img id="teste" src="img/esconderSenha.png" >
                                </div>
                                
                            </div>
                            <p class="forgetpassword">Esqueceu a senha?</p>
                            
                            <button type="submit"><p>Entrar</p></button>
                        </form>
                    </div>
        </div>
    </section>
    <footer>
        <div></div>
        <img src="img/LOGO VERSAO BRANCA.png">
    </footer>
</body>

</html>