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
                <img src="../img/LOGO OFICIAL COLORIDA.png" alt="Logo Eco Soluções">
            </div>
                <div >
                    <p>Para entrar, insira seu e-mail e sua senha</p>
                </div>
                    <div>
                        <form action="../php/make_login.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="usuario" name="text" placeholder="Seu usuário" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="senha" type="password" placeholder="Sua senha">
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
        <img src="../img/LOGO VERSAO BRANCA.png">
    </footer>
</body>

</html>