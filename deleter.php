<?php 

$user = "smartlogger"; 
$password = "F@%KNcle#d0fUo"; 
$host = "smartlogger.mysql.dbaas.com.br"; 
$database= "smartlogger";

$connection= mysqli_connect($host, $user, $password);
if (!$connection)
{
die ('Could not connect:' . mysqli_error());
}
mysqli_select_db($connection,$database);


$truncatetable= mysqli_query($connection,"TRUNCATE TABLE teste_tab1");

if($truncatetable !== FALSE)
{
   echo("All rows have been deleted.");
}
else
{
   echo("No rows have been deleted.");
}

?>
