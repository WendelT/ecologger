<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form name="myForm" method="post">
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
        <p1>Última quantidade de dados registrada: <?php echo $row1["id"]; ?></p1>
        <?php endwhile; ?>
        <br>
        Escolher limite de dados de: <input type="text" name="limite" placeholder="id inferior"/>
        até: <input type="text" name="limite_inf" placeholder="id superior"/>
        <input type="submit" id="update" name="submit" value="Modificar"/>
    </form>
<table class="table" id="table1">
    <thead>
    
    <link rel="stylesheet" href="bootstrap.css"/>
    
    <script type="text/javascript" src="tables/js/jquery.dataTables.js"></script>
    
    <script type="text/javascript" src="tables/js/dataTables.bootstrap4.js"></script>
    
    
    <script>
        $(document).ready(function(){
            $("#myForm").on('click',function(e) {
                
                var limite = $("#limite").val();
                var limite_inf = $("#limite_inf").val(); 
                var dataString = 'limite='+limite+'limite_inf='+limite_inf;
                $('.container').append(form);
                $.ajax({
                    type:'POST',
                    data:dataString.serialize(),
                    url:'request.php',
                    success:function(data) {
                        $("#myForm")[0].reset();
                        alert(data);
                    }
                    
                });
                e.preventDefault();
            });
        });

         
 
        
    </script>
    
        <th>ID</th>
        <th>CLIENTE</th>
        <th>Ener</th>
        <th>W_CA</th>
        <th>Vps1</th>
        <th>Ips1</th>
        <th>Vps2</th>
        <th>Ips2</th>
        <th>Vps3</th>
        <th>Ips3</th>
        <th>Vps4</th>
        <th>Ips4</th>
        <th>PVar</th>
        <th>Temp</th>
        <th>FP</th>
        <th>Vab</th>
        <th>Vbc</th>
        <th>Vca</th>
        <th>Ia</th>
        <th>Ib</th>
        <th>Ic</th>
        <th>Va</th>
        <th>Vb</th>
        <th>Vc</th>
        <th>Freq</th>
        <th>Data</th>
        <th>Hora</th>
    </thead>
    <tbody>
        <?php
        
           
            

                
                    
            //$st = $_REQUEST["limite"];
                   
                    
            include("request.php");
            
            
            //$sql =  "SELECT id, value1, value3, value6, value9, value12, value15, value18, 
            //value21, value24, value27, value30, value33, value36, value39, value42, value45, value48, value51, 
            //value54, value57, value60, value63, value66, value69,value70, date, time FROM teste_tab1 ORDER BY id DESC LIMIT $st";

            $result = mysqli_query($conn, $sql) or die("<p color=\"#f00\">Could not query database.</p>");
            while($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row['value1']; ?></td>
            <td><?php echo $row['value3']; ?></td>
            <td><?php echo $row['value6']; ?></td>
            <td><?php echo $row['value9']; ?></td>
            <td><?php echo $row['value12']; ?></td>
            <td><?php echo $row['value15']; ?></td>
            <td><?php echo $row['value18']; ?></td>
            <td><?php echo $row['value21']; ?></td>
            <td><?php echo $row['value24']; ?></td>
            <td><?php echo $row['value27']; ?></td>
            <td><?php echo $row['value30']; ?></td>
            <td><?php echo $row['value33']; ?></td>
            <td><?php echo $row['value36']; ?></td>
            <td><?php echo $row['value39']; ?></td>
            <td><?php echo $row['value42']; ?></td>
            <td><?php echo $row['value45']; ?></td>
            <td><?php echo $row['value48']; ?></td>
            <td><?php echo $row['value51']; ?></td>
            <td><?php echo $row['value54']; ?></td>
            <td><?php echo $row['value57']; ?></td>
            <td><?php echo $row['value60']; ?></td>
            <td><?php echo $row['value63']; ?></td>
            <td><?php echo $row['value66']; ?></td>
            <td><?php echo $row['value69']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['time']; ?></td>
        </tr>
        <?php endwhile; ?>
        
    </tbody>
</table>

<script>
    $(document).ready(function() {
    $('#table1').DataTable();
} );
</script>