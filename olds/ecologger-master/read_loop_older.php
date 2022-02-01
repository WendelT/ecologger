<html lang='pt'>
    <div id='app'>
<head>
  <meta charset='pt-BR'>
  <title> MySQL DataBase </title>
</head>

<div class='margem2'>
  <h1 class='titulo'> MySQL DataBase <br> SMART LOGGER</h1>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form name="myForm" method="post">
    <?php 
        $host = "smartlogger.mysql.dbaas.com.br";             // host = localhost because database hosted on the same server where PHP files are hosted
        $dbname = "smartlogger";              // Database name
        $username = "smartlogger";    // Database username
        $password = "F@%KNcle#d0fUo";          // Database password
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
        Escolher limite de dados de: <input type="text" name="limite" placeholder="id inferior"/>
        até: <input type="text" name="limite_inf" placeholder="id superior"/>
        <input type="submit" id="update" name="submit" value="Modificar"/>
    </form>

    <script type="text/javascript" src="teste2106/tables/js/jquery.dataTables.js"></script>

    <script type="text/javascript" src="teste2106/tables/js/dataTables.bootstrap4.js"></script>

<table class="table" id="table1" border='2%'>
<div id='container'> 
<thead  class ='cabecalho'>
    
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
                    url:'teste2106/request.php',
                    success:function(data) {
                        $("#myForm")[0].reset();
                        alert(data);
                    }
                    
                });
                e.preventDefault();
            });
        });
    </script> <br>
    <tr>
    <th> Id </th> 
    <th> Cliente </th>
    <th> Energia  <br>(kWh)</th>
    <th> Potência Ativa <br>(kW)</th>
    <th> Tensão Painel 1 <br>(V)</th>
    <th> Corrente Painel 1 <br>(A)</th>
    <th> Tensão Painel 2 <br>(V)</th>
    <th> Corrente Painel 2 <br>(A)</th>
    <th> Tensão Painel 3 <br>(V)</th>
    <th> Corrente Painel 3 <br>(A)</th>
    <th> Tensão Painel 4 <br>(V)</th>
    <th> Corrente Painel 4 <br>(A)</th>
    <th> Potência Reativa <br>(kVar)</th>
    <th> Temperatura <br>(C)</th>
    <th> Fator de Potência  <br>(N/A)</th>
    <th> Tensão Linha AB <br>(V)</th>
    <th> Tensão Linha BC <br>(V)</th>
    <th> Tensão Linha CA <br>(V)</th>
    <th> Corrente Fase A <br>(A)</th>
    <th> Corrente Fase B <br>(A)</th>
    <th> Corrente Fase C <br>(A)</th>
    <th> Tensão Fase A <br>(V)</th>
    <th> Tensão Fase B <br>(V)</th>
    <th> Tensão Fase C <br>(V)</th>
    <th> Frequência <br>(Hz)</th>
    <th> Data </th>
    <th> Hora </th>
    </thead>
    </tr>
    <tbody class = 'conteudo'> 
        <?php       
            include("teste2106/request.php");
    
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
</div>
</table>
</div>
</html>

<style>
#app{
    border-radius: 40px;
    width: 100%;
    height: 100%;
}

.margem2 {
   width: 100%;
   border-radius: 10px;
   text-align:center;
}
.titulo {
   color:blue;
   font-size: 50px;
   padding: 10px;
   font-weight: 500;
}

#container{
   padding: 40px;
}


.table {
   background-color:coral;
   width: 100%;
   height: 100%;
   border-radius: 40px;
   padding: 40px;
}

.cabecalho{
   background-color: #00BFFF;
   border-radius: 40px;
}

.conteudo {
   text-align: center;
   background-color: cornsilk;
}

#button {
   border-radius: 10px;
   text-align: center;
   padding: 40px;
   margin-left: 100px;

}

</style>

<script>
    $(document).ready(function() {
    $('#table1').DataTable();
} );
</script>