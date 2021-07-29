<?php
  $st = $_POST['limite'] -1;
  $st_i = $_POST['limite_inf'] - $st;
  //$sql =  "SELECT id, value1, value2, value3, value5, value6, value8, value9, value11, value12, value14, value15, value17, value18, 
  //value20, value21, value23, value24, value26, value27, value29, value30, value32, value33, value35, value36, value38, value39, value41,
  //value42, value44, value45, value47, value48, value50, value51, value53, value54, value56, value57, value59, value60, value62, value63,
  //value65, value66, value68, value69, date, time FROM teste_tab1 ORDER BY id LIMIT $st, $st_i";// Do Your Insert Query
  $sql = "SELECT id, id_cliente, ndados, dados_list, ninfos, infos_list,dmy_log, dmy_server, hms_log, hms_server FROM tab_final ORDER BY id LIMIT $st, $st_i";
  
?>