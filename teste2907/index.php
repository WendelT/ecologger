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
        $sql1 = "SELECT id FROM tab_final ORDER BY id DESC LIMIT 1";

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
     <?php
        
           
            

                
                    
        //$st = $_REQUEST["limite"];
               
                
        include("request1.php");
        
        
        //$sql =  "SELECT id, value1, value3, value6, value9, value12, value15, value18, 
        //value21, value24, value27, value30, value33, value36, value39, value42, value45, value48, value51, 
        //value54, value57, value60, value63, value66, value69,value70, date, time FROM teste_tab1 ORDER BY id DESC LIMIT $st";

        $result = mysqli_query($conn, $sql) or die("<p color=\"#f00\">Could not query database.</p>");
        while($row = mysqli_fetch_assoc($result)):
            $D = $row['dados_list'];
            $DADOS = explode(",", $D)
    ?>
        <th>ID</th>
        <th>CLIENTE</th>
        <th><?php echo $DADOS[0]; ?></th>
        <th><?php echo $DADOS[3]; ?></th>
        <th><?php echo $DADOS[6]; ?></th>
        <th><?php echo $DADOS[9]; ?></th>
        <th><?php echo $DADOS[12]; ?></th>
        <th><?php echo $DADOS[15]; ?></th>
        <th><?php echo $DADOS[18]; ?></th>
        <th><?php echo $DADOS[21]; ?></th>
        <th><?php echo $DADOS[24]; ?></th>
        <th><?php echo $DADOS[27];//last ?></th> 

        <th><?php echo $DADOS[30]; ?></th>
        <th><?php echo $DADOS[33]; ?></th>

        <th><?php echo $DADOS[36]; ?></th>
        <th><?php echo $DADOS[39]; ?></th>

        <th><?php echo $DADOS[42]; ?></th>
        <th><?php echo $DADOS[45]; ?></th>

        <th><?php echo $DADOS[48]; ?></th>
        <th><?php echo $DADOS[51]; ?></th>

        <th><?php echo $DADOS[54]; ?></th>
        <th><?php echo $DADOS[57]; ?></th>

        <th><?php echo $DADOS[60]; ?></th>
        <th><?php echo $DADOS[63]; ?></th>

        <th><?php echo $DADOS[66]; ?></th>
        <th><?php echo $DADOS[69]; ?></th>
        
        <th><?php echo $DADOS[72]; ?></th>
        <th><?php echo $DADOS[75]; ?></th>

        <th><?php echo $DADOS[78]; ?></th>
        <th><?php echo $DADOS[81]; ?></th>
        
        <th><?php echo $DADOS[84]; ?></th>
        <th><?php echo $DADOS[87]; ?></th>
        
        <th><?php echo $DADOS[90]; ?></th>
        <th><?php echo $DADOS[93]; ?></th>
        
        <th><?php echo $DADOS[96]; ?></th>
        <th><?php echo $DADOS[99]; ?></th>

        <th><?php echo $DADOS[102]; ?></th>
        <th><?php echo $DADOS[105]; ?></th>

        <th><?php echo $DADOS[108]; ?></th>
        <th><?php echo $DADOS[111]; ?></th>

        <th><?php echo $DADOS[114]; ?></th>
        <th><?php echo $DADOS[117]; ?></th>

        <th><?php echo $DADOS[120]; ?></th>
        <th><?php echo $DADOS[123]; ?></th>

        <th><?php echo $DADOS[126]; ?></th>
        <th><?php echo $DADOS[129]; ?></th>

        <th><?php echo $DADOS[132]; ?></th>
        <th><?php echo $DADOS[135]; ?></th>

        <th><?php echo $DADOS[138]; ?></th>
        <th><?php echo $DADOS[141]; ?></th>

        <th><?php echo $DADOS[144]; ?></th>
        <th><?php echo $DADOS[147]; ?></th>

        <th><?php echo $DADOS[150]; ?></th>
        <th><?php echo $DADOS[153]; ?></th>

        <th><?php echo $DADOS[156]; ?></th>
        <th><?php echo $DADOS[159]; ?></th>

        <th><?php echo $DADOS[162]; ?></th>
        <th><?php echo $DADOS[165]; ?></th>

        <th><?php echo $DADOS[168]; ?></th>
        <th><?php echo $DADOS[171]; ?></th>

        <th><?php echo $DADOS[174]; ?></th>
        <th><?php echo $DADOS[177]; ?></th>

        <th><?php echo $DADOS[180]; ?></th>
        <th><?php echo $DADOS[183]; ?></th>

        <th><?php echo $DADOS[186]; ?></th>
        <th><?php echo $DADOS[189]; ?></th>

        <th><?php echo $DADOS[192]; ?></th>
        <th><?php echo $DADOS[195]; ?></th>

        <th><?php echo $DADOS[198]; ?></th>
        <th><?php echo $DADOS[201]; ?></th>

        
        <th>Data Server</th>
        <th>Hora Server</th>
        <th>Data Log</th>
        <th>Hora Log</th>
    </thead>
    <tbody>
       
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row['id_cliente']; ?></td>
            <td><?php echo $DADOS[1]; ?></td>
            <td><?php echo $DADOS[4]; ?></td>
            <td><?php echo $DADOS[7]; ?></td>
            <td><?php echo $DADOS[10]; ?></td>
            <td><?php echo $DADOS[13]; ?></td>
            <td><?php echo $DADOS[16]; ?></td>
            <td><?php echo $DADOS[19]; ?></td>
            <td><?php echo $DADOS[22]; ?></td>
            <td><?php echo $DADOS[25]; ?></td>
            <td><?php echo $DADOS[28]; ?></td>
            <td><?php echo $DADOS[31]; ?></td>
            <td><?php echo $DADOS[34]; ?></td>
            <td><?php echo $DADOS[37]; ?></td>
            <td><?php echo $DADOS[40]; ?></td>
            <td><?php echo $DADOS[43]; ?></td>
            <td><?php echo $DADOS[46]; ?></td>
            <td><?php echo $DADOS[49]; ?></td>
            <td><?php echo $DADOS[52]; ?></td>
            <td><?php echo $DADOS[55]; ?></td>
            <td><?php echo $DADOS[58]; ?></td>
            <td><?php echo $DADOS[61]; ?></td>
            <td><?php echo $DADOS[64]; ?></td>
            <td><?php echo $DADOS[67]; ?></td>
            <td><?php echo $DADOS[70]; ?></td>

            <td><?php echo $DADOS[73]; ?></td>
            <td><?php echo $DADOS[76]; ?></td>

            <td><?php echo $DADOS[79]; ?></td>
            <td><?php echo $DADOS[82]; ?></td>

            <td><?php echo $DADOS[85]; ?></td>
            <td><?php echo $DADOS[88]; ?></td>

            <td><?php echo $DADOS[91]; ?></td>
            <td><?php echo $DADOS[94]; ?></td>

            <td><?php echo $DADOS[97]; ?></td>
            <td><?php echo $DADOS[100]; ?></td>

            <td><?php echo $DADOS[103]; ?></td>
            <td><?php echo $DADOS[106]; ?></td>

            <td><?php echo $DADOS[109]; ?></td>
            <td><?php echo $DADOS[112]; ?></td>

            <td><?php echo $DADOS[115]; ?></td>
            <td><?php echo $DADOS[118]; ?></td>

            <td><?php echo $DADOS[121]; ?></td>
            <td><?php echo $DADOS[124]; ?></td>

            <td><?php echo $DADOS[127]; ?></td>
            <td><?php echo $DADOS[130]; ?></td>

            <td><?php echo $DADOS[133]; ?></td>
            <td><?php echo $DADOS[136]; ?></td>

            <td><?php echo $DADOS[139]; ?></td>
            <td><?php echo $DADOS[142]; ?></td>

            <td><?php echo $DADOS[145]; ?></td>
            <td><?php echo $DADOS[148]; ?></td>

            <td><?php echo $DADOS[151]; ?></td>
            <td><?php echo $DADOS[154]; ?></td>

            <td><?php echo $DADOS[157]; ?></td>
            <td><?php echo $DADOS[160]; ?></td>

            <td><?php echo $DADOS[163]; ?></td>
            <td><?php echo $DADOS[166]; ?></td>

            <td><?php echo $DADOS[169]; ?></td>
            <td><?php echo $DADOS[172]; ?></td>

            <td><?php echo $DADOS[175]; ?></td>
            <td><?php echo $DADOS[178]; ?></td>

            <td><?php echo $DADOS[181]; ?></td>
            <td><?php echo $DADOS[184]; ?></td>

            <td><?php echo $DADOS[187]; ?></td>
            <td><?php echo $DADOS[190]; ?></td>

            <td><?php echo $DADOS[193]; ?></td>
            <td><?php echo $DADOS[196]; ?></td>

            <td><?php echo $DADOS[199]; ?></td>
            <td><?php echo $DADOS[202]; ?></td>

            <td><?php echo $row['dmy_server']; ?></td>
            <td><?php echo $row['hms_server']; ?></td>
            <td><?php echo $row['dmy_log']; ?></td>
            <td><?php echo $row['hms_log']; ?></td>
        </tr>
        <?php endwhile; ?>
        
    </tbody>
</table>

<script>
    $(document).ready(function() {
    $('#table1').DataTable();
} );
</script>