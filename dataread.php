<?php


    $host = "ecologger_ver2.mysql.dbaas.com.br";             // host 
    $dbname = "ecologger_ver2";              // Nome do banco de dados
    $username = "ecologger_ver2";    // Usuario
    $password = "K#vsfcle@4wsTR";          // senha


// Establish connection to MySQL database
$conn = new mysqli($host, $username, $password, $dbname);


// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else { echo "Connected to mysql database. <br>"; }


// Select values from MySQL database table

$sql = "SELECT id, value1, value60, value63, value66, value69, value9, value12, value6, value33, value39, value36, value3, value13, date, time FROM teste_tab1";  // Update your tablename here

$result = $conn->query($sql);

//echo "<center>";



if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<div> <strong> Id:</strong> " . $row["id"]. " <br> <strong>rand num:</strong> " . $row["value1"]. " <br> <strong>Van:</strong> " . $row["value2"]. " <br> <strong>Vbn:</strong> " . $row["value3"]. " <br> <strong>Vcn:</strong> " . $row["value4"]. " <br> <strong>Freq:</strong> " . $row["value5"]. " <br> <strong>Pv1:</strong> " . $row["value6"]. " <br> <strong>Ip1:</strong> " . $row["value7"]. " <br> <strong>Pa:</strong> " . $row["value8"]. " <br> <strong>Pr:</strong> " . $row["value9"]. " <br> <strong>FP:</strong> " . $row["value10"]. " <br> <strong>Ti:</strong> " . $row["value11"]. " <br> <strong>Ea:</strong> " . $row["value12"]. " <br> <strong>Pin:</strong> " . $row["value13"]. " <br> <strong>Date:</strong> " . $row["date"]. " <br> <strong>Time:</strong> " . $row["time"]. "<br><br><br><br></div>";

    }
} else {
    echo "0 results";
}

echo "</center>";

$conn->close();



?>
