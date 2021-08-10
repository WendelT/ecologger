<html>

<head>
    <meta charset="UTF-8">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>EcoLogger Módulo de Dados</title>
</head>

<body>
    <div id='app' class="float-sm-none">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

        <div class="cabeca">
            <img class="order1" src="ufcB.png" alt="Brasão da Universidade Federal do Ceará" width="200" height="132">
            <img class="order3" src="ImagEco.png" alt="Brasão da Universidade Federal do Ceará" width="200"
                height="132">
            <form class="order2" name="myForm" method="post">
                <?php 
         $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
         $dbname = "smartlogger";              // Database name
         $username = "smartlogger";		// Database username
         $password = "F@%KNcle#d0fUo";	        // Database password
         $conn = new mysqli($host, $username, $password, $dbname);
         
         // Check if connection established successfully
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
         else { echo "Módulo de coleta de dados<br>"; }
         $sql1 = "SELECT id, dados_list FROM tab_final ORDER BY id DESC LIMIT 1";
 
         $result1 = mysqli_query($conn, $sql1) or die("<p color=\"#f00\"></p>");
         
         while($row1 = mysqli_fetch_assoc($result1)):
         $D1 = $row1['dados_list'];
         $DADOS1 = explode(",", $D1);
     ?> <br>
                 <p1>Última quantidade de dados registrada:
                     <?php echo $row1["id"]; ?>
                 </p1>
                 <?php endwhile; ?>
        </div>

        <br>
        <br>


        <div class="limit">
            Escolher limite de dados de: <br> <br>
            <input type="text" class="campos" name="limite" placeholder="            id inferior" />
            até: <input type="text" class="campos" name="limite_inf" placeholder="           id superior" />
            <br>
            <br>
            <input type="submit" class="btn btn-warning" id="update" name="submit" value="Modificar" />
            </form>


        </div>
        <div class="table-responsive">
            <table class="table align-middle" id="table1">


                <thead>

                    <link rel="stylesheet" href="util/bootstrap.css" />

                    <script type="text/javascript" src="util/tables/js/jquery.dataTables.js"></script>

                    <script type="text/javascript" src="util/tables/js/dataTables.bootstrap4.js"></script>


                    <script>
                        $(document).ready(function () {
                            $("#myForm").on('click', function (e) {

                                var limite = $("#limite").val();
                                var limite_inf = $("#limite_inf").val();
                                var dataString = 'limite=' + limite + 'limite_inf=' + limite_inf;
                                $('.container').append(form);
                                $.ajax({
                                    type: 'POST',
                                    data: dataString.serialize(),
                                    url: 'request.php',
                                    success: function (data) {
                                        $("#myForm")[0].reset();
                                        alert(data);
                                    }

                                });
                                e.preventDefault();
                            });
                        });




                    </script>

                    <!--
        <th>ID</th>
        <th>CLIENTE</th>
        <th>Ener</th>
        <th>W_CA</th>
        <th>Vps1</th>
        <th>Ips1</th>
        <th>Vps2</th>
        <th>Ips2</th>
        <th>Vps3</th>
        <th>Ips3</th>
        <th>Vps4</th>
        <th>Ips4</th>
        <th>PVar</th>
        <th>Temp</th>
        <th>FP</th>
        <th>Vab</th>
        <th>Vbc</th>
        <th>Vca</th>
        <th>Ia</th>
        <th>Ib</th>
        <th>Ic</th>
        <th>Va</th>
        <th>Vb</th>
        <th>Vc</th>
        <th>Freq</th>
        <th>Data</th>
        <th>Hora</th>
-->

<th class="header">ID</th>
                    <th>CLIENTE</th>
                    <th>
                        Energia <br> (kWh)
                    </th>
                    <th>
                        Potência Ativa <br>(kW)
                    </th>
                    <th>
                        Tensão Painel 1 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 1 <br>(A)
                    </th>
                    <th>
                        Tensão Painel 2 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 2 <br>(A)
                    </th>
                    <th>
                        Tensão Painel 3 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 3 <br>(A)
                    </th>
                    <th>
                        Tensão Painel 4 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 4 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 5 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 5 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 6 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 6 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 7 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 7 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 8 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 8 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 9 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 9 <br>(A)
                    </th>
                    <th>
                        Tensão Painel 10 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 10 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 11 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 11 <br>(A)
                    </th>
                    <th>
                        Tensão Painel 12 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 12 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 13 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 13 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 14 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 14 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 15 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 15 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 16 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 16 <br>(A)
                    </th>
                    <th>
                        Tensão Painel 17 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 17 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 18 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 18 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 19 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 19 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 20 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 20 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 21 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 21 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 22 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 22 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 23 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 23 <br>(A)
                    </th>

                    <th>
                        Tensão Painel 24 <br>(V)
                    </th>
                    <th>
                        Corrente Painel 24 <br>(A)
                    </th>
                    <th>
                        N_ps
                    </th>
                    <th>
                        Potência Reativa <br>(kVar)
                    </th>

                    <th>
                        Alerta 1
                    </th>
                    <th>
                        Alerta 2
                    </th>

                    <th>
                        Alerta 3
                    </th>
                    <th>
                        Potência Corrente Contínua
                    </th>

                    <th>
                        Temperatura <br>(C)
                    </th>
                    <th>
                        Fator de Potência <br>(N/A)
                    </th>

                    <th>
                        Tensão Linha AB <br>(V)
                    </th>
                    <th>
                        Tensão Linha BC <br>(V)
                    </th>
                    <th>
                        Tensão Linha CA <br>(V)
                    </th>
                    <th>
                        Corrente Fase A <br>(A)
                    </th>

                    <th>
                        Corrente Fase B <br>(A)
                    </th>
                    <th>
                        Corrente Fase C <br>(A)
                    </th>

                    <th>
                        Tensão Fase A <br>(V)
                    </th>
                    <th>
                        Tensão Fase B <br>(V)
                    </th>

                    <th>
                        Tensão Fase C <br>(V)
                    </th>
                    <th>
                        Frequência <br>(Hz)
                    </th>
                    <th>Data Server</th>
                    <th>Hora Server</th>
                    <th>Data Log</th>
                    <th>Hora Log</th>
                    
                    
                </thead>
                <tbody>
                    <?php
        
           
            

                
                    
            //$st = $_REQUEST["limite"];
                   
                    
            include("request.php");


//$sql =  "SELECT id, value1, value3, value6, value9, value12, value15, value18, 
//value21, value24, value27, value30, value33, value36, value39, value42, value45, value48, value51, 
//value54, value57, value60, value63, value66, value69,value70, date, time FROM teste_tab1 ORDER BY id DESC LIMIT $st";

$result = mysqli_query($conn, $sql) or die("<p color=\"#f00\"></p>");
while($row = mysqli_fetch_assoc($result)):
    $D = $row['dados_list'];
    $DADOS = explode(",", $D)

        ?>
                    <tr>
                        <td>
                            <?php echo $row["id"]; ?>
                        </td>
                        <td>
                            <?php echo $row['id_cliente']; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[1]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[4]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[7]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[10]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[13]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[16]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[19]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[22]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[25]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[28]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[31]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[34]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[37]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[40]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[43]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[46]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[49]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[52]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[55]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[58]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[61]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[64]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[67]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[70]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[73]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[76]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[79]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[82]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[85]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[88]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[91]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[94]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[97]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[100]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[103]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[106]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[109]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[112]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[115]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[118]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[121]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[124]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[127]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[130]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[133]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[136]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[139]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[142]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[145]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[148]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[151]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[154]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[157]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[160]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[163]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[166]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[169]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[172]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[175]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[178]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[181]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[184]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[187]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[190]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[193]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[196]; ?>
                        </td>

                        <td>
                            <?php echo $DADOS[199]; ?>
                        </td>
                        <td>
                            <?php echo $DADOS[202]; ?>
                        </td>
                        
                        <td>
                            <?php echo $row['dmy_server']; ?>
                        </td>
                        <td>
                            <?php echo $row['hms_server']; ?>
                        </td>
                        <td>
                            <?php echo $row['dmy_log']; ?>
                        </td>
                        <td>
                            <?php echo $row['hms_log']; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function () {
        $('#table1').DataTable();
    });
</script>

<style>
    html {
        overflow-y: auto;
        overflow-x: auto;
    }

    #app {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        text-align: center;
        color: #2b9720;
    }

    .cabeca {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        align-self: center;
        width: 100%;

    }

    .order1 {
        order: 1;
        margin-top: 20px;

    }

    .order2 {
        order: 2;
    }

    .order3 {
        order: 3;


    }

    form {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 25px;
    }

    .limit {
        text-align: center;
        font-weight: bold;
    }

    .campos {
        border-radius: 16px;
    }


    th {
        text-align: center;
        font-size: 11px;

        color: white;
        background-color: #38ae3b;
    }

    tr {
        text-align: center;
        font-size: 10px;
        background-color: #38ae3b;

    }

    .header {
        padding-bottom: 10px;
    }
</style>