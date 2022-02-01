<?php
//==========================================================================================
//==========================================================================================
//==========================================================================================
// DEBUG   
//==========================================================================================
//==========================================================================================
//==========================================================================================
//==========================================================================================
?>


<meta name="viewport" content="width=device-width, initial-scale=1">
<?php header("Content-Type: text/html; charset=ISO-8859-1",true); ?>

<html><head><title>Untitled Document</title>
<meta http-equiv=content-type content=text/html; charset=windows-1252>
</head><body bgcolor=#FFFFFF>

<?php
$page = $_SERVER['PHP_SELF'];
$sec = "2";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">

    </head>
    <body>
      
    <?php
 				//echo require('teste.txt');
				echo require('DATA_RAW.txt');
    ?>
    </body>
</html>
