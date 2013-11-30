<?
session_start();
?>
<%@LANGUAGE="JAVASCRIPT" CODEPAGE="1252"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Situatie revizii</title>

<script language="javascript">
function nuare(camy){
		document.getElementById("exp_"+camy).value="nu are";
		document.getElementById("an_"+camy).value="";
		document.getElementById("luna_"+camy).value="";
		document.getElementById("zi_"+camy).value="";
}
</script>

</head>
<body>

 <?
$azi=date("Y-m-d"); 
require "dataazi.php";

?>
<div align="center">
  <h3><span class="style5"><strong>Lista cu data expirarii revizii  </strong></span><br>
   <h3><span class="style5"><strong>azi</strong></span><font size="+1"><strong> <? echo date("d/m/Y",$dataazi_sec).'<br />'; ?></strong><br>
  <br />
  
<?
if ($_SESSION['user']==1){

	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM revizii");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)){ 
		$randuri=$randuri+1; 
	}
	mysql_close($conexiune);
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM revizii ");
	echo '<table border=1 cellpadding="1" cellspacing="0">';
	echo "<tr><td><b>Indice</b></td><td><b>Nr.inmatric.</b></td><td><b>Data expirarii ITP</b></td><td><b>Data expirarii tahograf</b></td><td><b>Data expirarii LARM</b></td><td><b>Data expirarii RCA</b></td><td><b>Data expirarii CASCO</b></td><td><b>Data expirarii licenta</b></td><td><b>Data expirarii ITPI</b></td><td><b>Seria CASCO</b></td><td><b>Exp A</b></td><td><b>Exp Rovi</b></td></tr>";

	$i=1;
	while ($row=mysql_fetch_array($sql)) {
					$id_masina=$row["id_masina"];
					$qnr_inm="select all * from masini where indice='$id_masina'";
					include "conexiune.php";
					$rqnr = mysql_query($qnr_inm);
					if ($rqnr) {
						  $rrqnr = mysql_fetch_array($rqnr,MYSQL_ASSOC );
						  $nr_inmatric=$rrqnr["nr_inmatric"];
						  $tip_masina=$rrqnr["id_tip_auto"];
								}
					$expira=0;
					$exp_itp=$row["exp_itp"];
					$exp_tah=$row["exp_tah"];
					$exp_larm=$row["exp_larm"];
					$exp_rca=$row["exp_rca"];
					$exp_cas=$row["exp_cas"];
					$exp_lic=$row["exp_lic"];
					$exp_itpi=$row["exp_itpi"];
					$exp_a=$row["exp_a"];
					$exp_rovi=$row["exp_rovi"];
					
					
					if  ($tip_masina==5 or $tip_masina==11)
					{
					
					
						$leasing = $row["leasing"];
						$seria_casco=$row["seria_casco"];
						$societatea=$row["societatea"];
						
						$d1= strtotime($exp_itp);
						$exp_itp = date("d/m/Y" ,$d1);
						if ($d1<944000000){$exp_itp="neprecizat";};
						if ($d1>2100000000){$exp_itp="nu are";};
						
						$d2= strtotime($exp_tah);
						$exp_tah = date("d/m/Y" ,$d2);
						if ($d2<944000000){$exp_tah="neprecizat";};
						if ($d2>2100000000){$exp_tah="nu are";};
						
						
						$d3= strtotime($exp_larm);
						$exp_cls = date("d/m/Y" ,$d3);
						if ($d3<944000000){$exp_larm="neprecizat";};
						if ($d3>2100000000){$exp_larm="nu are";};
						
						$d4= strtotime($exp_rca);
						$exp_rca = date("d/m/Y" ,$d4);
						if ($d4<944000000){$exp_rca="neprecizat";};
						if ($d4>2100000000){$exp_rca="nu are";};
						
						$d5= strtotime($exp_cas);
						$exp_cas = date("d/m/Y" ,$d5);
						if ($d5<944000000){$exp_cas="neprecizat";};
						if ($d5>2100000000){$exp_cas="nu are";};
						
						$d6= strtotime($exp_lic);
						$exp_lic = date("d/m/Y" ,$d6);
						if ($d6<944000000){$exp_lic="neprecizat";};
						if ($d6>2100000000){$exp_lic="nu are";};
						
						$d7= strtotime($exp_itpi);
						$exp_itpi = date("d/m/Y" ,$d7);					         
						if ($d7<944000000){$exp_itpi="neprecizat";};
						if ($d7>2100000000){$exp_itpi="nu are";};
						
						$d8= strtotime($leasing);
						$leasing = date("d/m/Y" ,$d8);					         
						if ($d8<944000000){$leasing="neprecizat";};
						if ($d8>2100000000){$leasing="nu are";};
						
						$d9= strtotime($exp_a);
						$exp_a = date("d/m/Y" ,$d9);					         
						if ($d9<944000000){$leasing="neprecizat";};
						if ($d9>2100000000){$leasing="nu are";};
						
						$d10= strtotime($exp_rovi);
						$exp_rovi = date("d/m/Y" ,$d10);					         
						if ($d10<944000000){$exp_rovi="neprecizat";};
						if ($d10>2100000000){$exp_rovi="nu are";};
						
						echo '<tr >';
						echo '<td id="field_8_'.$i.'" align="center" value="'.$id_masina.'" >';
						echo $id_masina;
						echo '</td>';				
						echo '<td id="field_0_'.$i.'" align="center" value="'.$nr_inmatric.'" >';
						echo $nr_inmatric;
						echo '</td>';
						echo '<td id="field_1_'.$i.'" align="center" value="'.$exp_itp.'" >';
							if (($d1-$dataazi_sec)<=864000)
							{$expira=1;
							echo "<font color='#ff0000'>";
							}	
						echo $exp_itp;
						if ($expira==1){echo '</font>';}
						echo '</td>';
						echo '<td id="field_2_'.$i.'" align="center" value="'.$exp_tah.'" >';
							if (($d2-$dataazi_sec)<=864000)
							{$expira=1;
							echo "<font color='#ff0000'>";
							}	
						echo $exp_tah;
						if ($expira==1){echo '</font>';}
						echo '</td>';
						
						echo '<td id="field_3_'.$i.'" align="center" value="'.$exp_larm.'" >';
							if (($d3-$dataazi_sec)<=864000)
							{$expira=1;
							echo "<font color='#ff0000'>";
							}	
						echo $exp_larm;
						if ($expira==1){echo '</font>';}
						echo '</td>';
						
						echo '<td id="field_4_'.$i.'" align="center" value="'.$exp_rca.'" >';
							if (($d4-$dataazi_sec)<=864000)
							{$expira=1;
							echo "<font color='#ff0000'>";
							}	
						echo $exp_rca;
						if ($expira==1){echo '</font>';}
						echo '</td>';
						echo '<td id="field_5_'.$i.'" align="center" value="'.$exp_cas.'" >';
							if (($d5-$dataazi_sec)<=864000)
							{$expira=1;
							echo "<font color='#ff0000'>";
							}	
						echo $exp_cas;
						if ($expira==1){echo '</font>';}
						echo '</td>';
						echo '<td id="field_6_'.$i.'" align="center" value="'.$exp_lic.'" >';
							if (($d6-$dataazi_sec)<=864000)
							{$expira=1;
							echo "<font color='#ff0000'>";
							}	
						echo $exp_lic;
						if ($expira==1){echo '</font>';}
						echo '</td>';
						echo '<td id="field_7_'.$i.'" align="center" value="'.$exp_itpi.'" >';
							if (($d7-$dataazi_sec)<=864000)
							{$expira=1;
							echo "<font color='#ff0000'>";
							}	
						echo $exp_itpi;
						if ($expira==1){echo '</font>';}
						echo '</td>';
						echo '<td id="field_8_'.$i.'" align="left" ';
						echo ' value="'.$seria_casco.'" >'.$seria_casco.'</td>';
						
						
					/*	echo '<td id="field_9_'.$i.'" align="left" ';
						echo ' value="'.$societatea.'" >'.$societatea.'</td>';
						
						echo '<td id="field_10_'.$i.'" align="left" ';
						echo ' value="'.$leasing.'" >'.$leasing.'</td>';	
						*/
						
						echo '<td id="field_3_'.$i.'" align="center" value="'.$exp_a.'" >';
							if (($d9-$dataazi_sec)<=864000)
							{$expira=1;
							echo "<font color='#ff0000'>";
							}	
						echo $exp_a;
						if ($expira==1){echo '</font>';}
						echo '</td>';
						
						
						echo '<td id="field_3_'.$i.'" align="center" value="'.$exp_rovi.'" >';
							if (($d10-$dataazi_sec)<=864000)
							{$expira=1;
							echo "<font color='#ff0000'>";
							}	
						echo $exp_rovi;
						if ($expira==1){echo '</font>';}
						echo '</td>';										
						
						
										
						echo '
						';
						$i=$i+1;
					}
	}
	echo "</table>";
	mysql_close($conexiune);
} else {echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
}			
?>
          </h3>
</div>
</div></center>
</body>
</html>
