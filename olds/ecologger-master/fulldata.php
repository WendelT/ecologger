<?php



$host = "smartlogger.mysql.dbaas.com.br";		         // host = localhost because database hosted on the same server where PHP files are hosted
$dbname = "smartlogger";              // Database name
$username = "smartlogger";		// Database username
$password = "F@%KNcle#d0fUo";	        // Database password


// Establish connection to MySQL database
$conn = new mysqli($host, $username, $password, $dbname);


// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else { echo "Connected to mysql database. <br>"; }


// Select values from MySQL database table

$sql = "SELECT id, value1, value2, value3, value4, value5, value6, value7, value8, value9, value10, 
value11, value12, value13, value14, value15, value16, value17, value18, value19, value20, 
value21, value22, value23, value24, value25, value26, value27, value28, value29, value30, 
value31, value32, value33, value34, value35, value36, value37, value38, value39, value40, 
value41, value42, value43, value44, value45, value46, value47, value48, value49, value50, 
value51, value52, value53, value54, value55, value56, value57, value58, value59, value60, 
value61, value62, value63, value64, value65, value66, value67, value68, value69,value70, date, time FROM teste_tab1";  // Update your tablename here


$result = $conn->query($sql);


echo "
<html lang='pt'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Full Database</title>
    <style>
        body{
            background-color: rgb(232, 241, 241);
            //background-color: #BFACAA;
            
        }
        .button {
            background-color: #4E8ADF;
        // background-color: #40434E;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 60%;
        }
        
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #dddddd;
        }
        tr:nth-child(odd) {
            background-color: rgb(255, 255, 255);
        }

    </style>
</head>
<body>
";

if ($result->num_rows > 0) {

   // output data of each row
    while($row = $result->fetch_assoc()) {

          

echo "
<form>
<input class='button' type='submit' onClick='history.go(0)' value='Atualizar'>
<input class='button' type='submit' formaction='leitura.php' value='Mostrar últimos 100 dados'>
</form>
<meta http-equiv='refresh' content='120'>
<div id='container'>
    <table> 
    <tr>
        <th> Id: " . $row["id"]. "</th>
        <th> Cliente: " . $row["value1"]. "</th>
    </tr>
    <tr>
        <th> " . $row["value2"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value3"]. "</td>
        <td>" . $row["value4"]. "</td>
    <tr>
        <th> " . $row["value5"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value6"]. "</td>
        <td>" . $row["value7"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value8"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value9"]. "</td>
        <td>" . $row["value10"]. "</td>
    <tr>
        <th> " . $row["value11"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value12"]. "</td>
        <td>" . $row["value13"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value14"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value15"]. "</td>
        <td>" . $row["value16"]. "</td>
    </tr>
     <tr>
        <th> " . $row["value17"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value18"]. "</td>
        <td>" . $row["value19"]. "</td>
    </tr>
     <tr>
        <th> " . $row["value20"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value21"]. "</td>
        <td>" . $row["value22"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value23"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value24"]. "</td>
        <td>" . $row["value25"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value26"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value27"]. "</td>
        <td>" . $row["value28"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value29"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value30"]. "</td>
        <td>" . $row["value31"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value32"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value33"]. "</td>
        <td>" . $row["value34"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value35"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value36"]. "</td>
        <td>" . $row["value37"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value38"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value39"]. "</td>
        <td>" . $row["value40"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value41"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value42"]. "</td>
        <td>" . $row["value43"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value44"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value45"]. "</td>
        <td>" . $row["value46"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value47"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value48"]. "</td>
        <td>" . $row["value49"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value50"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value51"]. "</td>
        <td>" . $row["value52"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value53"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value54"]. "</td>
        <td>" . $row["value55"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value56"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value57"]. "</td>
        <td>" . $row["value58"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value59"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value60"]. "</td>
        <td>" . $row["value61"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value62"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value63"]. "</td>
        <td>" . $row["value64"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value65"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value66"]. "</td>
        <td>" . $row["value67"]. "</td>
    </tr>
    <tr>
        <th> " . $row["value68"]. " </th> 
        <th> Debug: </th>
    </tr>
    <tr>
        <td>" . $row["value69"]. "</td>
        <td>" . $row["value70"]. "</td>
    </tr>
    <tr>
        <th> Data </th> 
        <th> Hora </th>
    </tr>
    <tr>
        <td>" . $row["date"]. "</td>
        <td>" . $row["time"]. "</td>
    </tr>
  <br>
  <br>
    </table>
 </div>";
    }

    
} else {
    echo "0 results";
    
}

echo"
</body>

</html>";

$conn->close();

?>
