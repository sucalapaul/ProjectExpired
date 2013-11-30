<?php
  $i=1;
  $query="select all * from denstatii where tara='R' order by denumire";
  include "conexiune.php";
  $rq = mysql_query($query);
  if ($rq) {
       while ($rrq = mysql_fetch_array($rq,MYSQL_ASSOC )){
          $statia_i[$i]=$rrq["indice"];
		  $statia_den[$i]=$rrq["denumire"];  
		  $i=$i+1;
		  
       }
  }
?>
