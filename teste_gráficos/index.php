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
    ?> <br>
        <p1>Última quantidade de dados registrada:
            <?php echo $row1["id"]; ?>
        </p1>
        <?php endwhile; ?>

        <?php
                
            include("request.php");
            

            $result = mysqli_query($conn, $sql) or die("<p color=\"#f00\">Could not query database.</p>");
            while($row = mysqli_fetch_assoc($result)):
        ?>
<?php endwhile; ?>

<!DOCTYPE html>
<html lang="en">
<title>ECO - Soluções</title>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECO - Soluções em Energia</title>
    <script src="apexcharts.min.js"></script>
</head>

<body>
    <div id="grafico"></div>
    <script>
        let el = document.getElementById('grafico');
        let options = {
            chart: {
                type: 'bar',
                width: 700,
                height: 500
            },
            series: [
                {
                    name: 'Energia',
                    data: [10, 15]
                }
              
            ],
            
            xaxis: {
                categories: ['Homens', 'Mulheres']
            },
            title: {
                text: "Funcionários da minha empresa"
            }
        };
        let chart = new ApexCharts(el, options);
        chart.render();
        

</script>
</body>
</html>