<?php



$host = "ecologger_ver2.mysql.dbaas.com.br";		         // host 
$dbname = "ecologger_ver2";              // Nome do banco de dados
$username = "ecologger_ver2";		// Usuario
$password = "K#vsfcle@4wsTR";	        // senha


// Establish connection to MySQL database
$conn = new mysqli($host, $username, $password, $dbname);


// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else { echo "Connected to mysql database. <br>"; }


// Select values from MySQL database table

$sql = "SELECT id, value1, value2, value3, value4, value5, value6, value7, value8, value9, value10, value11, value12, value13, date, time FROM tbdados";  // Update your tablename here

$result = $conn->query($sql);


echo "
<html lang='pt'>
<div id='app'>
<head>
	<meta charset='pt-BR'>
	<title> MySQL DataBase </title>
</head>

<div class='margem2'>
	<h1 class='titulo'> MySQL DataBase <br> SMART LOGGER</h1>
</div>

";

if ($result->num_rows > 0) {

   // output data of each row
    while($row = $result->fetch_assoc()) {

        echo " 
        <button id = 'button'>
    Botao EXEMPLO detalhes linha
  </button>

 <div id='container'> 
    <table class='table' border='2%' > 
    <thead  class ='cabecalho'>
    <tr>
    <th> Id </th> 
    <th> Rand Numb </th>
</thead>
    </tr>
    <tbody class = 'conteudo'>
        <tr>
		<td>" . $row["id"]. "</td>
        <td>". $row["value1"]. "</td>
        </tr>
    </tbody>
</table>
<br>

<table class='table' border='2%' > 
    <thead  class ='cabecalho'>
        <tr>
            <th> Tensao Fase A <br>(V)</th>
            <th> Tensao Fase B <br>(V)</th>
            <th> Tensao Fase C <br>(V)</th>
            <th> Frequencia de Rede <br>(Hz)</th>
            
    </thead>
        </tr>
        <tbody class = 'conteudo'> 
            <tr>
                <td>". $row["value2"]. "</td>
                <td>". $row["value3"]. "</td>
                <td>". $row["value4"]. "</td>
                <td>". $row["value5"]. "</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class='table' border='2%' > 
        <thead  class ='cabecalho'>
            <tr>
                <th> Tensao Painel 1 <br>(V)</th>
                <th> Corrente Painel 1 <br>(A)</th>
                <th> Potencia Ativa <br>(kW)</th>
                <th> Potencia Reativa <br>(kVar)</th>
                <th> Fator de Potencia <br>(N/A)</th>
                <th> Temperatura Interna <br>(C)</th>
                <th> Energia Acumulada <br>(kWh)</th>
                <th> Potencia de entrada <br>(kW)</th>
        </thead>
            </tr>
            <tbody class = 'conteudo'> 
                <tr>
                    <td>". $row["value6"]. "</td>
                    <td>". $row["value7"]. "</td>
                    <td>". $row["value8"]. "</td>
                    <td>". $row["value9"]. "</td>
                    <td>". $row["value10"]. "</td>
                    <td>". $row["value11"]. "</td>
                    <td>". $row["value12"]. "</td>
                    <td>". $row["value13"]. "</td>
                </tr>
            </tbody>
        </table>

        <br>
    <table class='table' border='2%' > 
        <thead  class ='cabecalho'>
            <tr>
                <th> Data </th>
                <th> Hora </th>
        </thead>
            </tr>
            <tbody class = 'conteudo'> 
                <tr>
                    <td>". $row["date"]. "</td>
                    <td>". $row["time"]. "</td>
                </tr>
            </tbody>
        </table>
 </div>";
    }

    
} else {
    echo "0 results";
}

echo "</div>";

echo "<style>
#app{
    border-radius: 20px;
    width: 100%;
    height: 100%;
    background: rgb(39,40,39);
background: linear-gradient(90deg, rgba(39,40,39,1) 0%, rgba(47,98,172,1) 39%, rgba(205,133,8,1) 64%, rgba(25,25,25,1) 100%);
}

.margem2 {
   width: 100%;
   text-align:center;
}
.titulo {
   color:powderblue;
   font-size: 50px;
   padding: 10px;
   font-weight: 500;
}

#container{
   padding: 20px;
}


.table {
   background-color:coral;
   width: 100%;
   height: 11.5%;
   border-radius: 10px;
   padding: 5px;
   
}

.cabecalho{
   background-color: #00BFFF;
   border-radius: 10px;
}

.conteudo {
   text-align: center;
   background-color: cornsilk;
}

#button {
   border-radius: 10px;
   text-align: center;
   padding: 10px;
   margin-left: 100px;

}

</style>

<script>

var button = document.getElementById('button'); // Assumes element with id='button'

button.onclick = function() {
var div = document.getElementById('container');
if (div.style.display !== 'none') {
   div.style.display = 'none';
}
else {
   div.style.display = 'block';
}
};

</script>

</html>";

$conn->close();



?>
