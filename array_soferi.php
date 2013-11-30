<?php
  $i=1;
  $query="select all * from soferi order by nume";
  include "conexiune.php";
  $rq = mysql_query($query);
  if ($rq) {
       while ($rrq = mysql_fetch_array($rq,MYSQL_ASSOC )){
          $sofer_i[$i]=$rrq["indice"];
          $sofer_den[$i]=$rrq["nume"];
          $i=$i+1;
       }
  }
?>
