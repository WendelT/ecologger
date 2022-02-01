<!DOCTYPE html>
<html>
    <head>
        <!-- <link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" /> -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" ></script>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <!-- <script type="text/javascript" src="js/dadosConsulta.js" defer></script> -->
        <script type="text/javascript" src="js/dadosAnalytics.js" defer></script>
        <script type="text/javascript" src="js/infosClient.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/styleAnalytics.css">
        <title>Analytics Cliente</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    </head>
        
    <body>
        <nav>
            <p>Analytics</p>
            <ul>
                <li>
                    <a href="index.php" class ="material-icons">home</a>
                </li>
                <li>
                    <a href="#" class ="material-icons">settings</a>
                </li>
                <li>
                    <a href="php/logout.php" class ="material-icons">logout</a>
                </li>
               
            </ul> 
        </nav>


        <section id="grafico">
            <div id="infos1">
                
                <div class="status">
                    <div class="dados">
                    <p>Status</p>
                    <span id="statusUnidade">(Retornar se online ou offline)</span>
                </div> 

                <img src="img/statusOn.png" width="50" height="50">
                </div>

                <div class="temperatura"> 
                    <div class="dados">
                    <p>Temperatura</p>
                    <span>(Retornar temperatura)</span>
                </div>
                <img src="img/temperatura.png" width="50" height="50">
                </div>
                <div class="economia">
                    <div class="dados"> 
                    <p>Economia (R$)</p>
                    <p><span id="econ">(retornar economia)</span> R$</p>
                </div>
                <img src="img/economia2.png "  width="50" height="50">
                </div>

                
                <div class="arvores"> 
                    <div class="dados">
                    <p>Árvores cultivadas</p>
                    <span id="CalcArvores">(retornar arvores cultivadas)</span>
                </div>
                <img src="img/arvore.png" width="50" height="50">
                </div>



            </div>

            <div id="infos2">

                <div class="cgrafico">
                    
                    <!--formulário de seleção (importante ver se não tem o mesmo id de outro formulário no código)-->
                    <form name="myForm" method="post" onsubmit="return savedata()">
                        <select name="nome" id="cl">

                        </select>
                        <!--Seleção de variáveis-->
                        <select id="variablePosition">
                            <option id="energia" value="5">Energia</option>
                            <option id="w_ca" value="2">Potência Ativa</option>
                            <option id="p_var" value="155">Potência Reativa</option>
                            <option id="v_ab" value="176">Tensão de Linha AB</option>
                            <option id="v_bc" value="179">Tensão de Linha BC</option>
                            <option id="v_ca" value="182">Tensão de Linha CA</option>
                            <option id="i_a" value="185">Corrente de Fase A</option>
                            <option id="i_b" value="188">Corrente de Fase B</option>
                            <option id="i_c" value="191">Corrente de Fase C</option>
                            <option id="v_a" value="194">Tensão de Fase A</option>
                            <option id="v_b" value="197">Tensão de Fase B</option>
                            <option id="v_c" value="200">Tensão de Fase C</option>
                        </select>
                
                        <!--Escolha de dias-->
                        <select id="selectDays" onchange="selectCheck(this);">
                          <option id="select" value="select">Selecionar Período</option>
                          <option id="today" value="today">Hoje</option>
                          <option id="yesterday" value="yesterday">Ontem</option>
                          <option id="last7Days" value="last7Days">últimos 7 dias</option>
                          <option id="last30Days" value="last30Days">Últimos 30 dias</option>
                          <option id="chooseRange" value="chooseRange">Escolher intervalo</option>
                        </select>
                
                        <!--Caso escolha a data de hoje-->
                        <div id="ifToday" style="display: none">
                          <input type="date" name="data_inicial" id="today1" onsubmit="return savedata()"/>
                        </div >
                
                        <!--Caso escolha a data de ontem-->
                        <div id="ifYesterday" style="display: none">
                          <input type="date" name="data_inicial" id="yesterday1" onsubmit="return savedata()"/>
                        </div >
                
                        <!--Caso escolha 7 dias atrás-->
                        <div id="if7Days" style="display: none">
                          <input type="date" name="data_inicial" id="last7" onsubmit="return savedata()"/>
                          <input type="date" name="data_final" id="nowToday" onsubmit="return savedata()"/>
                        </div>
                
                        <!--Caso escolha 30 dias atrás-->
                        <div id="if30Days" style="display: none">
                            <input type="date" name="data_inicial" id="last30" onsubmit="return savedata()"/>
                            <input type="date" name="data_final" id="nowToday2" onsubmit="return savedata()"/>
                          </div>
                        
                        <!--Caso prefira escolher um intervalo-->
                        <div id="ifRange" style="display: none">
                          <input type="date" name="data_inicial" id="dt1" onsubmit="return savedata()"/>
                          <input type="date" name="data_final" id="dt2" onsubmit="return savedata()"/>
                        </div>
                
                        <!--Pergunta por escolha de intervalo de tempo-->
                        <select id="selectTime" style="display: none" onchange="selectCheck2(this);">
                            <option id="no_choice" value="no_choice">Limitar por horário?</option>
                            <option id="time_yes" value="time_yes">Sim</option>
                            <option id="time_no" value="time_no">Não</option>
                        </select>
                        <!--Caso queira intervalo de tempo-->
                        <div id="ifTime" style="display: none">
                          <input type="time" name="time1" id="tm1" step="1" onsubmit="return savedata()"/>
                          <input type="time" name="time2" id="tm2" step="1" onsubmit="return savedata()"/>
                        </div>
                        
                        <input type="submit" id="update" name="submit" value="Modificar" />
                        
                    </form>

                    <div class="myChartDiv">
                      <canvas id="myChart" ></canvas> 
                    
                    
                    <p>Tipo :  <span id="ener"></span></p><!--linha não necessária-->
                </div>
              </div>


              <div class="potencias">
                  <p class = "tp">Potências</p>
                  <div class="usina">
                  <div class="dados">
                <p>Usina (kWp)</p>
                <span id="potUsina">(retornar Potência da Usina (kWp))</span>
            </div>
            <img src="img/usina.png " width="50" height="50">
            </div>

            <div class="borda"></div>
            
            <div class="producao">
                <div class="dados">
                <p>Produção (kWh)</p>
                <span id="enerGerada"> retornar Produção (kWh) </span>
            </div>
            <img src="img/energiatotal.png " width="50" height="50">
            </div>

            <div class="borda"></div>

            <div class="instantanea">
                <div class="dados">
                <p>Instantânea</p>
                <span id="potinsta">(retornar Potência Instantânea)</span>
            </div>
            <img src="img/potenciainsta.png" width="50" height="50">
            </div>

            </div>
        </div>
            
            </section>
        
    </body>
</html>