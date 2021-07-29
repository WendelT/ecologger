<?php
  $st = $_POST['limite'] -1;
  $st_i = $_POST['limite_inf'] - $st;
  $sql =  "SELECT id, value1, value3, value6, value9, value12, value15, value18, 
  value21, value24, value27, value30, value33, value36, value39, value42, value45, value48, value51, 
  value54, value57, value60, value63, value66, value69,value70, date, time FROM teste_tab1 ORDER BY id LIMIT $st, $st_i";// Do Your Insert Query
  
?>