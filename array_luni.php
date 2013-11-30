<?php
  $i=1;
  $query="select all * from luni order by indice";
  include "conexiune.php";
  $rq = mysql_query($query);
  if ($rq) {
       while ($rrq = mysql_fetch_array($rq,MYSQL_ASSOC )){
          $luna_i[$i]=$rrq["indice"];
          $luna_den[$i]=$rrq["denumire"];
          $i=$i+1;
       }
  }
?>
