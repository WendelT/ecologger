<?php 

$user = "ecologger_ver2"; 
$password = "K#vsfcle@4wsTR"; 
$host = "ecologger_ver2.mysql.dbaas.com.br"; 
$database= "ecologger_ver2";

$connection= mysqli_connect($host, $user, $password);
if (!$connection)
{
die ('Could not connect:' . mysqli_error());
}
mysqli_select_db($connection,$database);


$truncatetable= mysqli_query($connection,"TRUNCATE TABLE tbdados");

if($truncatetable !== FALSE)
{
   echo("All rows have been deleted.");
}
else
{
   echo("No rows have been deleted.");
}

?>
