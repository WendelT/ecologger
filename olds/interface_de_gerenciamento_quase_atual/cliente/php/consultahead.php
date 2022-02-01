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
            case 'countUnidades':
                $queryunidades = "SELECT COUNT(DISTINCT id_unico) AS clients FROM tab_final ";
                $consulta = mysqli_query($conn, $queryunidades);
                $aResult['result'] = mysqli_fetch_assoc($consulta)['clients'];
               break;
            case 'countUnidadesClient':
                $queryunidades = "SELECT COUNT(DISTINCT id_unico) AS units FROM cliente_unidade WHERE id_cliente = '".$_SESSION['id']."'";
                $consulta = mysqli_query($conn, $queryunidades);
                $aResult['result'] = mysqli_fetch_assoc($consulta)['units'];
               break;
            case 'listUnidades':
                $queryListunidades = "SELECT DISTINCT id_unico AS unitsName FROM tab_final";
                $consulta = mysqli_query($conn, $queryListunidades);
                $data = array();
                foreach($consulta as $clients){
                    $data[] = $clients;
                }
                $aResult['result'] = $data;
                break;
            case 'listUnidadesClient':
                $queryListunidades = "SELECT id_unidade AS unitsName FROM cliente_unidade WHERE id_cliente = '".$_SESSION['id']."'";
                $consulta = mysqli_query($conn, $queryListunidades);
                $data = array();
                foreach($consulta as $clients){
                    $data[] = $clients;
                }
                $aResult['result'] = $data;
                break;

            case 'listLoggerUnidades':
                $queryListLogger = "SELECT id_unico AS loggersname FROM unidade_logger WHERE id_unidade = '".$_POST['arguments']."'";
                $consulta = mysqli_query($conn, $queryListunidades);
                $data = array();
                foreach($consulta as $loggers){
                    $data[] = $loggers;
                }
                $aResult['result'] = $data;
                break;

            case 'potUnidade':
                $queryPotUnidade = "SELECT potencia_unidade AS potUnidade FROM cliente_unidade WHERE id_unidade = '".$_POST['arguments']."'";
                $consulta = mysqli_query($conn, $queryPotUnidade);
                $data = array();
                $aResult['result'] = mysqli_fetch_assoc($consulta)['potUnidade'];
                break;

            case 'producaoUnidades':
                $queryListunidades = "SELECT sum(z.w) AS y FROM (SELECT DISTINCT t1.id_inv, t1.hms_log, t1.date AS x, 
                POWER((SPLIT_STRI(dados_list,',', 5)),1) AS w FROM tab_teste t1 
                INNER JOIN 
                (SELECT DISTINCT id_inv, date AS trade_date, MAX(hms_log) AS max_trade_time 
                FROM tab_teste WHERE date = DATE(DATE_SUB(NOW(), INTERVAL 5 MINUTE)) and hms_log = time(DATE_SUB(NOW(), INTERVAL 5 MINUTE)) AND id_unico IN (SELECT id_unico FROM unidade_logger WHERE id_unidade=1) GROUP BY date, id_inv) t2 
                ON t2.trade_date = date AND t2.max_trade_time = t1.hms_log AND t1.id_inv = t2.id_inv AND id_unico IN (SELECT id_unico FROM unidade_logger) ) z GROUP BY z.x";
                $consulta = mysqli_query($conn, $queryListunidades);
                $aResult['result'] = mysqli_fetch_assoc($consulta)['y'];
                break;
            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }
    }
    mysqli_close($conn);
    echo json_encode($aResult);
    /*function countUnidades()
        {
            $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
            $dbname = "smartlogger";              // Database name
            $username = "smartlogger";		// Database username
            $password = "F@%KNcle#d0fUo";
            
        /*
            Retorna o número de id client únicos
        
            $queryunidades = "SELECT COUNT (DISTINCT id_cliente) AS Number FROM tab_final_copy";
            $result = mysqli_query($conn,$queryunidades);
            echo($result);
        }*/


        $listaErros = 
        [
            "0202" => "ERRO ALEATORIO",
        ]
?>