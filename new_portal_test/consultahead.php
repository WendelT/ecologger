<?php

header('Content-Type: application/json');

    $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "smartlogger";              // Database name
    $username = "smartlogger";		// Database username
    $password = "F@%KNcle#d0fUo";	        // Database password

    $conn = new mysqli($host, $username, $password, $dbname);
    // Establish connection to MySQL database
    
    $aResult = array();
    //Se 
    //if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    //if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {
        switch($_POST['functionname']) {
            case 'countUnidades':
                $queryunidades = "SELECT COUNT(DISTINCT id_cliente) AS clients FROM tab_final";
                $consulta = mysqli_query($conn, $queryunidades);
                $aResult['result'] = mysqli_fetch_assoc($consulta)['clients'];
               break;
            case 'listUnidades':
                $queryListunidades = "SELECT DISTINCT id_cliente AS clientsName FROM tab_final";
                $consulta = mysqli_query($conn, $queryListunidades);
                $data = array();
                foreach($consulta as $clients){
                    $data[] = $clients;
                }
                $aResult['result'] = $data;
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
?>