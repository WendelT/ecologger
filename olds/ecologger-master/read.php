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
}

else { echo "Connected to mysql database. <br>"; }


// Select values from MySQL database table

$sql = "SELECT id, value1, value2, value3, value4, value5, value6, value7, value8, value9, value10, value11, value12, value13, value14, value15, value16, date, time FROM tabdados";  // Update your tablename here

$result = $conn->query($sql);

//echo "<center>";



if ($result->num_rows > 0) {


   // output data of each row
    //while($row = $result->fetch_assoc()) {
        //echo "<strong> Id:</strong> " . $row["id"]. " &nbsp <strong>rand num:</strong> " . $row["value1"]. " &nbsp <strong>Van:</strong> " . $row["value2"]. " &nbsp <strong>Vbn:</strong> " . $row["value3"]. " &nbsp <strong>Vcn:</strong> " . $row["value4"]. " &nbsp <strong>Freq:</strong> " . $row["value5"]. " &nbsp <strong>Pv1:</strong> " . $row["value6"]. " &nbsp <strong>Pc1:</strong> " . $row["value7"]. " &nbsp <strong>Pv2:</strong> " . $row["value8"]. " &nbsp <strong>Vc2:</strong> " . $row["value9"]. " &nbsp <strong>Pv3:</strong> " . $row["value10"]. " &nbsp <strong>Pc3:</strong> " . $row["value11"]. " &nbsp <strong>Pv4:</strong> " . $row["value12"]. " &nbsp <strong>Pc4:</strong> " . $row["value13"]. " &nbsp <strong>Acp:</strong> " . $row["value14"]. " &nbsp <strong>Rcp:</strong> " . $row["value15"]. " &nbsp <strong>Pwf:</strong> " . $row["value16"]. " &nbsp <strong>Date:</strong> " . $row["date"]. " &nbsp <strong>Time:</strong> " . $row["time"]. "<p>";

    //}
    while($row = $result->fetch_assoc()) {
        echo "<div> <strong> Id:</strong> " . $row["id"]. " <br> <strong>rand num:</strong> " . $row["value1"]. " <br> <strong>Van:</strong> " . $row["value2"]. " <br> <strong>Vbn:</strong> " . $row["value3"]. " <br> <strong>Vcn:</strong> " . $row["value4"]. " <br> <strong>Freq:</strong> " . $row["value5"]. " <br> <strong>Pv1:</strong> " . $row["value6"]. " <br> <strong>Pc1:</strong> " . $row["value7"]. " <br> <strong>Pv2:</strong> " . $row["value8"]. " <br> <strong>Vc2:</strong> " . $row["value9"]. " <br> <strong>Pv3:</strong> " . $row["value10"]. " <br> <strong>Pc3:</strong> " . $row["value11"]. " <br> <strong>Pv4:</strong> " . $row["value12"]. " <br> <strong>Pc4:</strong> " . $row["value13"]. " <br> <strong>Acp:</strong> " . $row["value14"]. " <br> <strong>Rcp:</strong> " . $row["value15"]. " <br> <strong>Pwf:</strong> " . $row["value16"]. " <br> <strong>Date:</strong> " . $row["date"]. " <br> <strong>Time:</strong> " . $row["time"]. "<br><br><br><br><br></div>";

    }
} else {
    echo "0 results";
}

echo "</center>";

$conn->close();



?>
