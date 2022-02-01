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
    else { echo "Conectado ao MySQL. <br>"; }
    $sql1 = "SELECT id FROM teste_tab1 ORDER BY id DESC LIMIT 1";

    $result1 = mysqli_query($conn, $sql1) or die("<p color=\"#f00\">Could not query database.</p>");
    
    while($row1 = mysqli_fetch_assoc($result1)):
?>
<?php endwhile; ?>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie-edge">
<title>Video | Google Charts</title>



<?php            
                    
    //$st = $_REQUEST["limite"];
           
            
    include("request.php");
    
    
    //$sql =  "SELECT id, value1, value3, value6, value9, value12, value15, value18, 
    //value21, value24, value27, value30, value33, value36, value39, value42, value45, value48, value51, 
    //value54, value57, value60, value63, value66, value69,value70, date, time FROM teste_tab1 ORDER BY id DESC LIMIT $st";

    $result = mysqli_query($conn, $sql) or die("<p color=\"#f00\">Could not query database.</p>");
    while($row = mysqli_fetch_assoc($result)):
?>




<div id="chart"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { packages: ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        const container = document.querySelector('#chart')
        const data = new google.visualization.arrayToDataTable([
            ['Eco Logger', 'Energia Gerada'],
            ["$row['date']", $row['value3']],

        ])

        const options = {
            title: 'Eco Logger - Energia Gerada',
            height: 400,
            width: 720
        }

        const chart = new google.visualization.LineChart(container)
        chart.draw(data, options)
    }

</script>