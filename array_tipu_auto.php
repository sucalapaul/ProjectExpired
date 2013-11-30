<?php
  $i=1;
  $query="select all * from tip_auto order by denumire";
  include "conexiune.php";
  $rq = mysql_query($query);
  if ($rq) {
       while ($rrq = mysql_fetch_array($rq,MYSQL_ASSOC )){
          $tip_auto_i[$i]=$rrq["indice"];
          $tip_auto_den[$i]=$rrq["denumire"];
          $i=$i+1;
       }
  }
?>
