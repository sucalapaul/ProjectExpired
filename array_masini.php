<?php
  $i=1;
  $query="select all * from masini order by nr_inmatric";
  include "conexiune.php";
  $rq = mysql_query($query);
  if ($rq) {
       while ($rrq = mysql_fetch_array($rq,MYSQL_ASSOC )){
          $masina_i[$i]=$rrq["indice"];
          $masina_den[$i]=$rrq["nr_inmatric"];
          $i=$i+1;
       }
  }
?>
