<?php
  $i=1;
  $query="select all * from curse order by punct_i, punct_f";
  include "conexiune.php";
  $rq = mysql_query($query);
  if ($rq) {
       while ($rrq = mysql_fetch_array($rq,MYSQL_ASSOC )){
          $cursa_i[$i]=$rrq["indice"];
		  $punct_ini[$i]=$rrq["punct_i"];
		  $punct_fin[$i]=$rrq["punct_f"];
          $cursa_den[$i]=$punct_ini[$i]."-".$punct_fin[$i];
		  $distanta[$i]=$rrq["dist_km"]; 
		 
          $i=$i+1;
		  
       }
  }
?>
