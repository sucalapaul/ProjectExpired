<?php
  $i=1;
  $query="select all * from denstatii order by denumire";
  include "conexiune.php";
  $rq = mysql_query($query);
  if ($rq) {
       while ($rrq = mysql_fetch_array($rq,MYSQL_ASSOC )){
          $statia_i[$i]=$rrq["indice"];
		  $statia_den[$i]=$rrq["denumire"];  
		  $statia_tara[$i]=$rrq["tara"]; 
          $i=$i+1;
		  
       }
  }
?>
