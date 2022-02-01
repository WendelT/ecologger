<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="css/styleInfo.css">
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/mostraInfo.js" defer></script>
        <script type="text/javascript" src="js/informacoes.js" defer></script>
        
        <title>Dados da unidade</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
       
    <body>
        <nav>
            <p>Dados</p>
            <ul>
                <li>
                    <a href="index.php" class ="material-icons">home</a>
                </li>
                <li>
                    <a href="#" class ="material-icons">timeline</a>
                </li>

                <li>
                    <a href="#" class ="material-icons">settings</a>
                </li>
                <li>
                    <a href="php/logout.php" class ="material-icons">logout</a>
                </li>
               
            </ul> 
        </nav>
    <div>
        <div class = "inversores">
            <div class="botaoArea" onclick="mostraInversor ()" >
                <div class="setor1">
            <p class="tituloBtn">Inversores</p>
        <span class="material-icons" id = "arrow">arrow_drop_down</span>
    </div>
    <div>
        <span id="esconde"></span>
        <span id="mais">
            
            <div class="divisoria1"></div>
                <div id="inversores_lista">
                    
                </div>
            </span>
            </div>
    </div>
    </div>

    <div class = "tarifas">
        <div class="botaoArea" onclick="mostraTarifa ()" >
            <div class="setor1">
        <p class="tituloBtn">Tarifas</p>
    <span class="material-icons" id = "arrowT">arrow_drop_down</span>
    </div>
    <div>
    <span id="escondeT"></span>
    <span id="maisT"> 
        <div class="divisoria1"></div>
        <div id="tarifas_lista">
        
        </div>
    </span>
                    
        </span>
        </div>
</div>
</div>

<div class = "medidores">
    <div class="botaoArea" onclick="mostraMedidores ()" >
        <div class="setor1">
    <p class="tituloBtn">Medidores</p>
<span class="material-icons" id = "arrowM">arrow_drop_down</span>
</div>
<div>
<span id="escondeM"></span>
<span id="maisM"> 
    <div class="divisoria1"></div>
    
    <table class="tabela"> 
    <thead>
        <tr class = "header">
                    <th>Nome</th>
                    <th>Número de Série</th>
                    <th>Circuito</th>
                    <th>Fabricante</th>
                    <th>Família/Série</th>
                    <th>Modelo</th>
                    <th>Status</th>
                    <th>Datalogger</th>
                    <th>Atualização</th>
                </tr>
    </thead>
    
    <tbody class="divisoria2">
        <tr class = "corpo">
            <td>
                Exemplo 1
            </td>
            <td>
                Exemplo 2
            </td>
            <td>
                Exemplo 3
            </td>
            <td>
                Exemplo 4
            </td>
            <td>
                Exemplo 5
            </td>
            <td>
                Exemplo 6
            </td>
            <td>
                Exemplo 7
            </td>
            <td>
                Exemplo 8
            </td>
            <td>
                Exemplo 9
            </td>
            </tr>
            <tr class = "corpo">
                <td>
                    Exemplo 1
                </td>
                <td>
                    Exemplo 2
                </td>
                <td>
                    Exemplo 3
                </td>
                <td>
                    Exemplo 4
                </td>
                <td>
                    Exemplo 5
                </td>
                <td>
                    Exemplo 6
                </td>
                <td>
                    Exemplo 7
                </td>
                <td>
                    Exemplo 8
                </td>
                <td>
                    Exemplo 9
                </td>
                </tr>
                
    </tbody>
        </table>
    </span>
    </div>
</div>
</div>

    <div class = "alarmes">
        <div class="botaoArea" onclick="mostraAlarmes ()" >
            <div class="setor1">
        <p class="tituloBtn">Alarmes</p>
    <span class="material-icons" id = "arrowA">arrow_drop_down</span>
    </div>
    <div>
    <span id="escondeA"></span>
    <span id="maisA"> 
        <div class="divisoria1"></div>
        
        <table class="tabela"> 
        <thead>
            <tr class = "header">
                        <th>Exemplo 1</th>
                        <th>Exemplo 2</th>
                        
                    </tr>
        </thead>
        
        <tbody class="divisoria2">
            <tr class = "corpo">
                <td>
                    Exemplo 1
                </td>
                <td>
                    Exemplo 2
                </td>
                </tr>
                <tr class = "corpo">
                    <td>
                        Exemplo 1
                    </td>
                    <td>
                        Exemplo 2
                    </td>
                    </tr>
                    
        </tbody>
            </table>
        </span>
        </div>
    </div>
    </div>
            
    </div>
        </body>
        
        </html>