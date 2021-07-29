<meta name="viewport" content="width=device-width, initial-scale=1">
<?php header("Content-Type: text/html; charset=ISO-8859-1",true); ?>

<html><head><title>Untitled Document</title>
<meta http-equiv=content-type content=text/html; charset=windows-1252>
</head><body bgcolor=#FFFFFF>






<?php
 //    echo "@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br>"; 
 //    echo " <br>            AGENDA <br>"; 
 //    echo "@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br>"; 
?>


<?php
if (isset($_POST['B_AGENDA'])) {                   

     echo "@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br>"; 
     echo " <br>            AGENDAMENTO <br>"; 
     echo "@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br>"; 


}
else
if (isset($_POST['B_CANCEL'])) {                   

     echo "@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br>"; 
     echo " <br>            CANCELAMENTO <br>"; 
     echo "@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br>"; 


}
else{
     echo "@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br>"; 
     echo " <br>            TELA INICIAL AGENDA <br>"; 
     echo "@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br>"; 
}
?>

<form action=<?=$_SERVER['PHP_SELF']?> enctype="multipart/form-data" method="POST">
 <p>NOME: <input type="text" name="nome" value=""/></p>
 <p>SENHA: <input type="text" name="senha" value=""/></p>
 <p>HORÁRIO: <input type="text" name="horario" value=""/></p>
 <input  type="hidden" name="ttime0" value="<?php echo $Ttime_0 ?>" />  
 <p><input type="Submit" name="B_AGENDA"  value='AGENDAR'/></p>
 <p><input type="Submit" name="B_CANCEL"  value='CANCELAR AGENDAMENTO'/></p>
</form>




