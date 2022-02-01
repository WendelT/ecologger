<?php
    session_start();
    include_once('php/verifica_login.php');
    if($_SESSION['type_user'] != "suporte"){
        header("Location: index.php");
    };
    if(isset($_GET)){
        unset($_GET);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="js/chart.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/gerenciamento.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta http-equiv="refresh" content="300">
        <title>Visão Geral Cliente</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!-- <link rel="stylesheet" href="css/menuStyle.css" content="width=device-width,initial-scale=1.0"> -->
    </head>
       <!-- <input type="checkbox" id="check">
        <label for="check">
            <i class ="material-icons" id="btn">menu</i>
            <i class ="material-icons" id="cancel">close<p>fechar</p></i>
        </label>
        <div class="sidebar">
            <header>Meu Menu</header>
            <a href="#" class="active">
                <i class ="material-icons">home</i>
                <span>Início</span>
            </a>
            <a href="pages/graficos.html">
                <i class ="material-icons">show_chart</i>
                <span>Gráfico</span>
            </a>
            <a href="#">
                <i class ="material-icons">settings</i>
                <span>Configurações</span>
            </a>
            <a href="php/logout.php">
                <i class ="material-icons">logout</i>
                <span>Sair</span>
            </a>
            
        </div> -->
    <body>
        <nav>
            <p>Gerenciamento</p>
            <ul>
               <!-- 
                <li>
                    <a href="graficos.php" class ="material-icons">show_chart</a>
                </li>
                -->
                <li>
                <button type="button"  data-toggle="modal" data-target="#addClienteModal">
                        <a class ="material-icons">settings</a>
                </button>
                </li>
                <li>
                    <a href="php/logout.php" class ="material-icons">logout</a>
                </li>
               
            </ul> 
        </nav>

        


        <section id="dados">
            <!-- <h2>Dados</h2> -->
            <div class="borda">
                <p class="titulo">Quantidade de Unidades</p>
                <img src="img/unidadeconsumidora.png" alt="Unidades Instaladas" width="50" height="50">
              <p class="infos"> <span id="nUnidade"></span> </p>
            </div>

            <div class="borda">
                <p class="titulo">Energia Gerada</p>
                <img src="img/energiatotal.png" alt="Energia Total" width="50" height="50">
               <p class="infos"><span id="ener"></span> kWh</p>
                
            </div >

            <div class="borda">
                <p class="titulo">Potência Gerada</p>
                <img src="img/potenciaca.png" alt="Potencia Instantanea ou Ativa" width="50" height="50">
                <p class="infos"><span id="wca"></span> kW</p>
            </div>

            <div class="borda">
                <p class="titulo">Potência Instalada</p>
                <img src="img/potenciainstalada.png" alt="Potencia Instalada" width="50" height="50">
                <p class="infos" id="potInstalada">(retornar a potência instalada aqui)</p>
            </div>

            
            

            <!--
            <div>
                <img src="img/aviso.png" alt="Alarmes" width="46" height="46">
                <h3>Status da Unidade</h3>
                <p>(retornar Status da Unidade)</span></p>
            </div> -->

            <div class="borda">
                <p  class="titulo">Economia Gerada</p>
                <img src="img/economia.png" alt="economia gerada" width="50" height="50">
                <p class="infos">(retornar economia gerada)</span></p>
            </div>

            <div>
                <p  class="titulo">Árvores Cultivadas</p>
                <img src="img/arvore.png" alt="árvores cultivadas" width="50" height="50">
                <p class="infos">(retornar arvores cultivadas)</span></p>
            </div>


        </section>
        <span id="msg"></span>
        <section id="centro">
        <div id="lista">
            
            <div id="tabela">
               
            </div>

        </div>


        <div id="grafico">
            <div class="cgrafico">
            <form name="myForm" method="post" onsubmit="return savedata()">
                <select style="width:auto" name="nome" id="url1">
                    <option value="Selecione um Cliente"></option>
                </select>
                <select id="variablePosition">
                    <option id="dailyEnergy" value="dailyTotalEnergy">Energia Total Diária</option>
                    <option id="weeklyEnergy" value="weeklyTotalEnergy">Energia Total Semanal</option>
                    <option id="monthlyEnergy" value="monthlyTotalEnergy">Energia Total Mensal</option>
                    <option id="annualEnergy" value="annualTotalEnergy">Energia Total Anual</option>
                    <option id="dailyPower" value="dailyTotalPower">Potêncial Total Diária</option>
                
                </select>
                <input type="submit" id="update" class="btn-warning" name="submit" value="Modificar" />
            </form>
              <div class="card border graph_final" style="border-radius: 20px;">
                <div id="chart-container">
                <canvas id="myChart"></canvas>
              </div>
            </div>
            </div>
            </div>
    </section>

    <!-- Modal -->
    <div id ="addClienteModal" class="modal fade" id="exampleModal" tabindex="-1" role ="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUnidadeModalLabel">Cadastrar Cliente</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="insert_form">
                            <div class="mb-3">
                                <label class="form-label">Nome do Cliente</label>
                                <input name ="nomeCliente" type="text" class="form-control" id="nomeUnidade" placeholder="Nome do cliente">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email do cliente</label>
                                <input name="emailCliente" type="email" class="form-control" id="emailCliente" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Login do Cliente</label>
                                <input name="loginCliente" type="text" class="form-control" id="loginCliente" placeholder="Login">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Senha</label>
                                <input name="senhaCliente" type="password" class="form-control" id="senhaCliente" placeholder="Senha">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-success">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim modal-->
        <!-- <footer>
        </footer> -->
    </body>
</html>