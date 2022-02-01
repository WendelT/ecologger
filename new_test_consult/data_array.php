<?php

header('Content-Type: application/json');
    $host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "smartlogger";              // Database name
    $username = "smartlogger";		// Database username
    $password = "F@%KNcle#d0fUo";	        // Database password

/*
    // Establish connection to MySQL database
    $conn = new mysqli($host, $username, $password, $dbname);
    //Numero de variaveis
    $n = 68;
    //Cria uma variavel em forma de array
    $data = array();
    //Nome de todas as variaveis dentro da string
    $str = "ener,wca,vps1,ips1,vps2,ips2,vps3,ips3,vps4,ips4,vps5,ips5,vps6,ips6,
    vps7,ips7,vps8,ips8,vps9,ips9,vps10,ips10,vps11,ips11,vps12,ips12,vps13,ips13,
    vps14,ips14,vps15,ips15,vps16,ips16,vps17,ips17,vps18,ips18,vps19,ips19,vps20,
    ips20,vps21,ips21,vps22,ips22,vps23,ips23,vps24,ips24,nps,pvar,wrn1,wrn2,wrn3,
    wcc,temp,fp,vab,vbc,vca,ia,ib,ic,va,vb,vc,freq";
    //Faz um vetor de strings separados pela vírgula
    $DADOS1 = explode(",", $str);
    //posição do vetor que inicia
    $pos = 2;
    //Loop que inicia no 0, vai até o numero de variaveis
    for($i=0;$i<$n;$i++){
        //Select em SQL que retorna o valor da string na posição do array selecionando a ultima linha
        $sql = "SELECT SUM(SPLIT_STRI(dados_list,',',$pos )) AS $DADOS1[$i] FROM tab_final WHERE id=(SELECT MAX(id) FROM tab_final)";
        //$sql = "SELECT id, dados_list FROM tab_final ORDER BY id DESC LIMIT 1";
        //$sql = "SELECT id, value1, value2, date FROM filter_test";
        $result = mysqli_query($conn,$sql);
        //$row = mysqli_fetch_assoc($result);
        foreach ($result as $row) {
            $data[$i] = $row;
        }
        $pos = $pos+3;
    }
*/
    $conn = new mysqli($host, $username, $password, $dbname);
    //Cria uma variavel em forma de array
    $data = array();
    //Nome de todas as variaveis dentro da string
    $str = "ener,wca,vps1,ips1,vps2,ips2,vps3,ips3,vps4,ips4,vps5,ips5,vps6,ips6,
    vps7,ips7,vps8,ips8,vps9,ips9,vps10,ips10,vps11,ips11,vps12,ips12,vps13,ips13,
    vps14,ips14,vps15,ips15,vps16,ips16,vps17,ips17,vps18,ips18,vps19,ips19,vps20,
    ips20,vps21,ips21,vps22,ips22,vps23,ips23,vps24,ips24,nps,pvar,wrn1,wrn2,wrn3,
    wcc,temp,fp,vab,vbc,vca,ia,ib,ic,va,vb,vc,freq";
    //Faz um vetor de strings separados pela vírgula
    $DADOS1 = explode(",", $str);
    $nColumn = count($DADOS1);

    //posição do vetor que inicia
    $pos = 2;
    //Loop que inicia no 0, vai até o numero de variaveis
    while($i=0 <= count($DADOS1)){
        //Select em SQL que retorna o valor da string na posição do array selecionando a ultima linha
        $sql = "SELECT SUM(SPLIT_STRI(dados_list,',',$pos )) AS $DADOS1[$i] FROM tab_final WHERE id=(SELECT MAX(id) FROM tab_final)";
        
        //$sql = "SELECT id, dados_list FROM tab_final ORDER BY id DESC LIMIT 1";
        //$sql = "SELECT id, value1, value2, date FROM filter_test";
        $result = mysqli_query($conn,$sql);
        //$row = mysqli_fetch_assoc($result);
        foreach ($result as $row) {
            $data[$i] = $row;
        }
        $pos = $pos+3;
        $i++;
    }
    
    
        //$sql = "SELECT SUM(SPLIT_STRI(dados_list,',', 2)) totalEner FROM tab_final_copy ORDER BY id DESC LIMIT 1";
    //$sql = "SELECT id, dados_list FROM tab_final ORDER BY id DESC LIMIT 1";
        //$sql = "SELECT id, value1, value2, date FROM filter_test";
        //$result = mysqli_query($conn,$sql);
        //$row = mysqli_fetch_assoc($result);
       
    
        /*$data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }*/
        
        //echo $data['totalEner'];
        
        //mysqli_close($conn);
        
        //echo json_encode($data);
    
        //$sql = "SELECT    DATE(date) as DATE, SUM(value2) totalEner FROM filter_test WHERE value1='lorena' GROUP BY DATE(date)";
        
    
    //$sql = "SELECT id, value1, value2, DISTINCT date FROM filter_test WHERE value1='lorena'";
    //$sql = "SELECT    DATE(date) as DATE, SUM(value2) totalEner FROM filter_test WHERE value1='lorena' GROUP BY DATE(date)";
    
   
    ?>
   