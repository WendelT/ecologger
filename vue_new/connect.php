<?php
        $HOST = "smartlogger.mysql.dbaas.com.br";
        $BANCO = "smartlogger"; //nome do banco de dados
        $USUARIO = "smartlogger"; // 
        $SENHA = "F@%KNcle#d0fUo";

        $conn = new PDO("mysql:host=" . $HOST . ";dbname=" . $BANCO . ";charset=utf8", $USUARIO, $SENHA);
        
   

  
    $mysql_data = json_decode(file_get_contents("php://input"));
    $data = array();
    if($mysql_data->action == 'fetchall'){
        $sql = "SELECT id, value1, value2 FROM tab_teste ORDER BY id DESC";
        $stm = $conn->prepare($sql);
        $stm->execute();
    while($row = $stm->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
    }
    
    
?>
