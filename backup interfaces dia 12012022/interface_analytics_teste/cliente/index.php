<?php
    session_start();
    include_once('php/verifica_login.php');
    if($_SESSION['type_user'] == "suporte"){
        header("Location: gerenciamento.php");
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
        <script type="text/javascript" src="js/dadosConsulta.js" defer></script>
        <script type="text/javascript" src="js/dadosGraficos.js" defer></script>
        <script type="text/javascript" src="js/lista.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta http-equiv="refresh" content="300">
        <title>Visão Gerenciamento</title>
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
                    <a href="#" class ="material-icons">settings</a>
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

            <div class="borda">
                <p  class="titulo">Árvores Cultivadas</p>
                <img src="img/arvore.png" alt="árvores cultivadas" width="50" height="50">
                <p class="infos" ><span id="quantArvores">0</span></p>
            </div>


        </section>

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
        <!-- <footer>
        </footer> -->
    </body>
</html>