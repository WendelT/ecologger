<?php
session_start();
include_once('verifica_login.php');
header('Content-Type: application/json');

    $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "smartlogger";              // Database name
    $username = "smartlogger";		// Database username
    $password = "F@%KNcle#d0fUo";	        // Database password

    $conn = new mysqli($host, $username, $password, $dbname);
    // Establish connection to MySQL database
    
    $aResult = array();
    $id_cliente = $_SESSION['id'];
    //Se 
    //if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    //if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {
        switch($_POST['functionname']) {

            //Conta a quantidade de unidades no geral
            case 'countUnidades':
                $queryunidades = "SELECT COUNT(DISTINCT id_unico) AS clients FROM tab_final ";
                $consulta = mysqli_query($conn, $queryunidades);
                $aResult['result'] = mysqli_fetch_assoc($consulta)['clients'];
               break;
            //Conta a quantidade de unidades por cliente   
            case 'countUnidadesClient':
                $queryunidades = "SELECT COUNT(DISTINCT id_unico) AS units FROM cliente_unidade WHERE id_cliente = '".$_SESSION['id']."'";
                $consulta = mysqli_query($conn, $queryunidades);
                $aResult['result'] = mysqli_fetch_assoc($consulta)['units'];
               break;
            //Lista todas as unidades independente do cliente   
            case 'listUnidades':
                $queryListunidades = "SELECT DISTINCT id_unico AS unitsName FROM tab_final";
                $consulta = mysqli_query($conn, $queryListunidades);
                $data = array();
                foreach($consulta as $clients){
                    $data[] = $clients;
                }
                $aResult['result'] = $data;
                break;
            //Informações da unidade    
            case 'infosUnidade':
                $queryinfoUnidade = "SELECT * FROM cliente_unidade WHERE id_unidade = '".$_POST['arguments']."'";
                $consulta = mysqli_query($conn, $queryinfoUnidade);
                $data = array();
                $aResult['result'] = mysqli_fetch_assoc($consulta);
                break;
            //Retorna a lista de clientes    
            case 'listClients':
                $queryListClients = "SELECT login AS clientsName FROM tab_clientes WHERE type_user = 'user'";
                $consulta = mysqli_query($conn, $queryListClients);
                $data = array();
                foreach($consulta as $clients){
                    $data[] = $clients;
                }
                $aResult['result'] = $data;
                break;

            //Retorna a lista de unidades e retorna se ela está online ou offline    
            case 'listUnidadesClient':
                $queryListunidades = "SELECT id_unidade AS unitsName FROM cliente_unidade WHERE id_cliente = '".$_SESSION['id']."'";
                $consulta = mysqli_query($conn, $queryListunidades);
                $data = array();
                    foreach($consulta as $clients)
                    {
                        $querystatusUnidade = "SELECT id, id_inv, date, hms_server, infos_list as infos from tab_final t1 WHERE id IN (SELECT MAX(id) FROM tab_final WHERE id_inv IN(SELECT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='".$clients['unitsName']."') AND date = DATE(DATE_SUB(NOW(), INTERVAL 5 MINUTE)) AND hms_server BETWEEN time(DATE_SUB(NOW(), INTERVAL 5 MINUTE)) AND NOW()) GROUP BY id_inv)"; 
                         //obtém o status da unidade $i
                        $consulta = mysqli_query($conn, $querystatusUnidade);
                        $ultimo = mysqli_fetch_assoc($consulta);
                        if($ultimo == null){
                            $status = "Offline";
                        }
                        else {
                            $status = "Online";
                        }
                        
                        $data[] = 
                        [ 
                            $clients,
                            $status
                        ];
                    }
                $aResult['result'] = $data;
                break;

            case 'listUnidadesClientSuper':
                //
                $queryidClient = "SELECT id AS idclient FROM tab_clientes WHERE login = '".$_POST['arguments']."'";
                $consulta = mysqli_query($conn, $queryidClient);
                $idcliente = mysqli_fetch_assoc($consulta)['idclient'];

                $queryListunidades = "SELECT id_unidade AS unitsName FROM cliente_unidade WHERE id_cliente = '".$idcliente."'";
                $consulta = mysqli_query($conn, $queryListunidades);
                $data = array();
                    foreach($consulta as $clients)
                    {
                        $querystatusUnidade = "SELECT MAX(id) FROM tab_final WHERE hms_server BETWEEN DATE(DATE_SUB(NOW(), INTERVAL 5 MINUTE)) AND DATE(NOW()) AND date = DATE(NOW()) AND id_unico IN (SELECT id_unico from unidade_logger WHERE id_unidade = '".$clients["unitsName"]."')"; 
                         //obtém o status da unidade $i
                        $consulta = mysqli_query($conn, $querystatusUnidade);
                        $ultimo = mysqli_fetch_assoc($consulta);
                        if($ultimo === null){
                            $ultimo = "Offline";
                        }
                        else {
                            $ultimo = "Online";
                        }
                        
                        $data[] = 
                        [ 
                            $clients,
                            $ultimo
                        ];
                    }
                $aResult['result'] = $data;
                break;


            //Pega o nome de todos os loggers baseado na unidade        
            case 'listLoggerUnidades':
                $queryListLogger = "SELECT id_unico AS loggersname FROM unidade_logger WHERE id_unidade = '".$_POST['arguments']."'";
                $consulta = mysqli_query($conn, $queryListLogger);
                $data = array();
                foreach($consulta as $loggers){
                    $data[] = $loggers;
                }
                $aResult['result'] = $data;
                break;

            //Pega o nome de todos os inversores baseado na unidade        
            case 'listInversoresUnidade':
                $cleaner = "UPDATE tab_final SET id_inv=TRIM(TRAILING char(0) FROM id_inv)";
                $result1 = mysqli_query($conn, $cleaner);

                $sql = "SELECT DISTINCT id_inv as Name_Inversor, id_unico as Name_Logger FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='".$_POST['arguments']."')";

                $result = mysqli_query($conn, $sql);
                $data1 = array();
                foreach ($result as $row) {
                    if ($row['Name_Inversor'] != "????????????????????" && $row['Name_Inversor'] != 'DDDDDDDDwwwwwwwwwwww') {
                        if(ctype_alnum($row['Name_Inversor'])){
                            $data[]=$row;
                        }
                    }
                }
                $aResult['result'] = $data;
                break;
            case 'tarifas':
                $tarifasQuery = "SELECT valor, data_inicio, data_fim FROM tarifa WHERE UF IN (SELECT estado FROM cliente_unidade WHERE id_unidade='".$_POST['arguments']."')";
                $consulta = mysqli_query($conn,$tarifasQuery);
                $data = array();
                foreach($consulta as $row){
                    $data[] = $row;
                }
                $aResult['result'] = $data;
            break;
            //Retorna a unidade cadastrada no banco    
            case 'potUnidade':
                $queryPotUnidade = "SELECT potencia_unidade AS potUnidade FROM cliente_unidade WHERE id_unidade = '".$_POST['arguments']."'";
                $consulta = mysqli_query($conn, $queryPotUnidade);
                $data = array();
                $aResult['result'] = mysqli_fetch_assoc($consulta)['potUnidade'];
                break;
            //Soma a potencia cadastrada no banco das unidades totais    
            case 'sumPotUnidade':
                $queryPotUnidades = "SELECT SUM(potUnidades) as potTotal FROM (SELECT potencia_unidade AS potUnidades FROM cliente_unidade WHERE id_cliente = '".$_SESSION['id']."') As potUnidades";
                $consulta = mysqli_query($conn, $queryPotUnidades);
                $data = array();
                $aResult['result'] = mysqli_fetch_assoc($consulta)['potTotal'];
                break;

            // Retorna a produção de energia de uma unidade    
            case 'producaoUnidades':

                $positionQuery = "SELECT id, date as x, id_inv, dados_list as dados, infos_list as infos from tab_final WHERE id IN (SELECT MAX(id) FROM tab_final WHERE id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='".$_POST['arguments']."') ) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv)";
                                    $consulta = mysqli_query($conn,$positionQuery);
                                    $data1 = array();
                                    foreach ($consulta as $row) {
                                        if($row['id_inv'] != '????????????????????' && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww'){
                                            $data1[] = $row;
                                        }
                                    
                                    }
                                    $n = sizeof($data1);
                                    $pos = array();

                                    //ACHA A POSIÇÃO DA VARIÁVEL NA STRING
                                    $sum = 0;

                                    for($i=0;$i<$n; $i++){
                                        //echo "n= " . $i. " ";
                                        $array = explode(',', $data1[$i]['dados']);
                                        $size = sizeof($array);
                                        for($j=0; $j<$size; $j++){
                                            if($array[$j] == 'Ener'){
                                                $pos = $j + 1;
                                            }
                                        }
                                    // echo "pos: " . $pos[$i]. " ";
                                    $data2['y'] = $sum + $array[$pos];
                                    $sum = $data2['y'];
                                    $data2['y'] . " ";
                                    }

                $aResult['result'] = $data2['y'];                    

                $potenciaQuery = "SELECT id, date as x, id_inv, dados_list as dados, infos_list as infos from tab_final WHERE id IN (SELECT MAX(id) FROM tab_final WHERE id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='".$_POST['arguments']."') ) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv)";
                                    $consulta = mysqli_query($conn,$positionQuery);
                                    $data1 = array();
                                    foreach ($consulta as $row) {
                                        if($row['id_inv'] != '????????????????????' && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww'){
                                            $data1[] = $row;
                                        }
                                    
                                    }
                                    $n = sizeof($data1);
                                    $pos = array();

                                    //ACHA A POSIÇÃO DA VARIÁVEL NA STRING
                                    $sum = 0;

                                    for($i=0;$i<$n; $i++){
                                        //echo "n= " . $i. " ";
                                        $array = explode(',', $data1[$i]['dados']);
                                        $size = sizeof($array);
                                        for($j=0; $j<$size; $j++){
                                            if($array[$j] == 'W_CA'){
                                                $pos = $j + 1;
                                            }
                                        }
                                    // echo "pos: " . $pos[$i]. " ";
                                    $data3['y'] = $sum + $array[$pos];
                                    $sum = $data3['y'];
                                    $data3['y'] . " ";
                                    }
                                    
                                
                $querystatusUnidade = "SELECT id, id_inv, date, hms_server, infos_list as infos from tab_final t1 WHERE id IN (SELECT MAX(id) FROM tab_final WHERE id_inv IN(SELECT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade='".$_POST['arguments']."') AND date = DATE(DATE_SUB(NOW(), INTERVAL 5 MINUTE)) AND hms_server BETWEEN time(DATE_SUB(NOW(), INTERVAL 5 MINUTE)) AND NOW()) GROUP BY id_inv)"; 
                //obtém o status da unidade $i
                $consulta = mysqli_query($conn, $querystatusUnidade);
                $ultimo = mysqli_fetch_assoc($consulta);
                if($ultimo === null)
                {
                    $ultimo = "Offline";
                }
                else 
                {
                    $ultimo = "Online";
                }
                $tarifaQuery = "SELECT valor FROM tarifa WHERE id = (SELECT MAX(id) FROM tarifa)";
                $consultaTarifa = mysqli_query($conn,$tarifaQuery);
                $valTarifa = mysqli_fetch_assoc($consultaTarifa)['valor'];

                $aResult['result5'] = number_format(($aResult['result'] * $valTarifa),2,'.','');
                $aResult['result'] = number_format($aResult['result'],2, '.', ''); 
                $valArvores = ($aResult['result'] * 5.04) * (10 ** (-4));
                $aResult['result2'] = number_format($valArvores, 2, '.', '');
                $aResult['result3'] = $ultimo;
                $aResult['result4'] = $data3['y'];     
                break;

            //Retorna a soma da energia de todas as unidades
            case 'energiaSomaUnidades':
                $positionQuery = "SELECT id, date as x, id_inv, dados_list as dados, infos_list as infos from tab_final WHERE id IN (SELECT MAX(id) FROM tab_final WHERE id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade IN (SELECT id_unidade FROM cliente_unidade WHERE id_cliente='".$_SESSION['id']."')) ) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv)";
                    $consulta = mysqli_query($conn,$positionQuery);
                    $data1 = array();
                    foreach ($consulta as $row) {
                        if($row['id_inv'] != '????????????????????' && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww'){
                            $data1[] = $row;
                        }
                    }
                    $n = sizeof($data1);
                    $pos = array();
                //ACHA A POSIÇÃO DA VARIÁVEL NA STRING
                    $sum = 0;
                    for($i=0;$i<$n; $i++){
                        $array = explode(',', $data1[$i]['dados']);
                        $size = sizeof($array);
                        for($j=0; $j<$size; $j++){
                            if($array[$j] == 'Ener'){
                                $pos = $j + 1;
                            }
                        }
                    // echo "pos: " . $pos[$i]. " ";
                    $data['y'] = $sum + $array[$pos];
                    $sum = $data['y'];
                    }
                    $querystatusUnidade = "SELECT MAX(id) FROM tab_final WHERE hms_server BETWEEN DATE(DATE_SUB(NOW(), INTERVAL 5 MINUTE)) AND DATE(NOW()) AND date = DATE(NOW()) AND id_unico IN (SELECT id_unico from unidade_logger WHERE id_unidade = '".$clients["unitsName"]."')"; 
                    //obtém o status da unidade $i
                $consulta = mysqli_query($conn, $querystatusUnidade);
                $ultimo = mysqli_fetch_assoc($consulta);
                if($ultimo === null){
                    $ultimo = "Offline";
                }
                else {
                    $ultimo = "Online";
                }
                $tarifaQuery = "SELECT valor FROM tarifa WHERE id = (SELECT MAX(id) FROM tarifa)";
                $consultaTarifa = mysqli_query($conn,$tarifaQuery);
                $valTarifa = mysqli_fetch_assoc($consultaTarifa)['valor'];
                $aResult['result'] = number_format($data['y'],2,'.','');
                $valArvores = ($aResult['result'] * 5.04) * (10 ** (-4));
                $aResult['result2'] = number_format($valArvores, 2, '.', '');
                $aResult['result3'] = number_format(($aResult['result'] * $valTarifa),2,'.','');
                break;

            //Retorna a soma da potencia de todas as unidades
            case 'potenciaGeradasUnidades':
                $positionQuery = "SELECT id, date as x, id_inv, dados_list as dados, infos_list as infos from tab_final WHERE id IN (SELECT MAX(id) FROM tab_final WHERE id_inv IN (SELECT DISTINCT t1.id_inversor FROM logger_inversor t1 INNER JOIN (SELECT DISTINCT id_inv FROM tab_final WHERE id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade IN (SELECT id_unidade FROM cliente_unidade WHERE id_cliente='".$_SESSION['id']."')) ) t2 ON t1.id_inversor=t2.id_inv) GROUP BY id_inv)";
                                    $consulta = mysqli_query($conn,$positionQuery);
                                    $data1 = array();
                                    foreach ($consulta as $row) {
                                        if($row['id_inv'] != '????????????????????' && $row['id_inv'] != 'DDDDDDDDwwwwwwwwwwww'){
                                            $data1[] = $row;
                                        }
                                    }
                                    $n = sizeof($data1);
                                    $pos = array();
                                    //ACHA A POSIÇÃO DA VARIÁVEL NA STRING
                                    $sum = 0;

                                    for($i=0;$i<$n; $i++){
                                        $array = explode(',', $data1[$i]['dados']);
                                        $size = sizeof($array);
                                        for($j=0; $j<$size; $j++){
                                            if($array[$j] == 'W_CA'){
                                                $pos = $j + 1;
                                            }
                                        }
                                    $data3['y'] = $sum + $array[$pos];
                                    $sum = $data3['y'];
                                    }
                                    number_format($data3['y'], 2, '.', '');
                $aResult['result'] = number_format($data3['y'], 2, '.', '');
                break;
                
            case 'consultUserInfos':
                $infosQuery = "SELECT nome, email, telefone, celular FROM tab_clientes WHERE id = '".$_SESSION['id']."'";
                $consulta = mysqli_query($conn, $infosQuery);

                $aResult['result'] = mysqli_fetch_assoc($consulta);
                break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }
    }
    mysqli_close($conn);
    echo json_encode($aResult);
    $listaErros = 
    [
        "0202" => "ERRO ALEATORIO",
    ]
?>