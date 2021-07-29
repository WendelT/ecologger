<?php

if($_POST['submit']) {
  $st = $_POST['limite'] -1;
  $st_i = $_POST['limite_inf'] - $st;
} else {
  $st= 0;
  //$st_i= 212;
  $st_i= 3;
}

  //$st = $_POST['limite'] -1;
  //$st_i = $_POST['limite_inf'] - $st;

 
  $sql = "SELECT id, id_cliente, ndados, dados_list, ninfos, infos_list,dmy_log, dmy_server, hms_log, hms_server FROM tab_final ORDER BY id LIMIT $st, $st_i";
  
?>