<?
session_start();
?>
<style type="text/css">
<!--
.style5 {font-size: 18px}
-->
</style>
<?
if ($_SESSION['user']==1){

	include "conexiune.php";
	$fact=$_POST['fact'];
	$nume=$_POST['nume'];
	$id_masina=$_POST['id_masina'];
	$ziua_i=$_POST['ziua_i'];
	$luna_i=$_POST['luna_i'];
	$an_i=$_POST['an_i'];
	$ziua_f=$_POST['ziua_f'];
	$luna_f=$_POST['luna_f'];
	$an_f=$_POST['an_f'];
	$perioada=$ziua_i.'.'.$luna_i.'.'.$an_i.' - '.$ziua_f.'.'.$luna_f.'.'.$an_f;
	require ("replun.php");
	$data_i=$ziua_i.' '.$LuniAne[$luna_i].' '.$an_i;
	$data_f=$ziua_f.' '.$LuniAne[$luna_f].' '.$an_f;
	
	$sql=mysql_query("SELECT * FROM masini");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)){ 
		$randuri=$randuri+1; 
	}
	mysql_close($conexiune);
} else {echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
}			

?>

<div align="center">
<span class="style5">Desfasuratorul prestatiilor efectuate in baza contractului incheiat intre SC Tur Cento Trans SRL si A.C.E. Cluj anexa 5 la factura Nr. <? echo $fact; ?> </span><br>
<div align="center">
<span class="style5">Transporturi de MARFURI efectuate in perioada</span><font size="+1"><strong> <? echo $perioada; ?></strong></font>

<span class="style5">de masina</span>
<?
if ($_SESSION['user']==1){

	include "conexiune.php";
	$id_masina=$_POST['id_masina'];
	$sql=mysql_query("SELECT * FROM masini");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM masini where indice=$id_masina");
	while ($row=mysql_fetch_array($sql)) {$nr_inmatric=$row["nr_inmatric"];}
	echo '<strong>'.$nr_inmatric.'</strong><br>';
}
?>
<br>
<?
if ($_SESSION['user']==1){

	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM masini where indice=$id_masina");
	echo "<table border=1 cellspacing='0'>";
	
	$i=1;
	while ($row=mysql_fetch_array($sql)) {
									$nr_inmatric=$row["nr_inmatric"];
									$categoria=$row["categoria"];
									$id_tip_auto=$row["id_tip_auto"];
									$tarif=$row["tarif"];
									
									$qtip_au="select all * from tip_auto where indice='$id_tip_auto'";
									include "conexiune.php";
									  $rqt = mysql_query($qtip_au);
									  if ($rqt) {
											  $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
											  $denumire=$rrqt["denumire"];
									  }
					echo '<tr ';
					echo ' onclick="line_click('.$i.')" ';
					echo " id='linie$i' onmouseover='line_sel($i, $randuri)' ";
					echo " onmouseout='line_unsel($randuri)' >";
	
					echo '<td id="field_1_'.$i.'" align="left" ';
					echo ' value="'.$denumire.'" > Auto&nbsp;&nbsp;&nbsp;<strong>'.$denumire.'</strong></td>';
					echo '<td id="field_2_'.$i.'" align="left" ';
					echo ' value="'.$nr_inmatric.'" >Nr.&nbsp;&nbsp;&nbsp;<strong>'.$nr_inmatric.'</strong></td>';
					echo '<td id="field_3_'.$i.'" align="right" ';
					echo ' value="'.$categoria.'" >categoria&nbsp;&nbsp;<strong>'.$categoria.'</strong></td>';
					echo '<td id="field_4_'.$i.'" align="right" ';
					echo ' value="'.$tarif.'" >Pret / Km&nbsp;&nbsp;&nbsp;<strong>'.$tarif.' RON </strong></td>';
	
					echo '
					';
	
					$i=$i+1;
	}
	echo "</table>";
	
	mysql_close($conexiune);
}
?>
<style type="text/css">
<!--
.style1 {
        font-size: 24px;
        font-weight: bold;
}
-->
</style>
<br>
<?
if ($_SESSION['user']==1){

	echo "<table border=1 cellspacing='0'>";
	echo "<tr><td><strong><center>No</center></strong></td><td><strong>Data</strong></td><td><strong>Tip auto</strong></td><td><strong>Km/Zi</strong></td><td><strong>Pret contr./Km</strong></td><td><strong>Total fara TVA</strong></td><td><strong>Val. TVA</strong></td><td><strong>Total inclusiv TVA /Zi</strong></td></tr>";
	$no=1;
	$i=1;
	$valftva=0;
	$valtva=0;
	$valcutva=0;
	$tvalftva=0;
	$tvaltva=0;
	$tvalcutva=0;
	$tdist_fact=0;
	$cant_cons_t=0;
	$dist_tot_t=0;
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM foi_parcurs where id_masina=$id_masina ");
	while ($row=mysql_fetch_array($sql)) {
			$nrdoc=$row["nrdoc"];
			$id_masina=$row["id_masina"];
			$ziua_e=$row["zi_e"];
			$luna_e=$row["luna_e"];
			$an_e=$row["an_e"];
			$traseul=$row["traseul"];
			$luna_s=$row["luna_s"];
			$ziua_s=$row["ziua_s"];
			$ora_s=$row["ora_s"];
			$klmtj_s=$row["klmtj_s"];
			$luna_p=$row["luna_p"];
			$ziua_p=$row["ziua_p"];
			$ora_p=$row["ora_p"];
			$klmtj_p=$row["klmtj_p"];
			$data_e=$ziua_e.' '.$LuniAne[$luna_e].' '.$an_e;
				
			if ( (strtotime($data_i)<=strtotime($data_e)) && (strtotime($data_e)<=strtotime($data_f)) ){
	
				$qmasina="select all * from masini where indice='$id_masina'";
				include "conexiune.php";
				  $rqt = mysql_query($qmasina);
				  if ($rqt) {
						  $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
						  $nr_inmatric=$rrqt["nr_inmatric"];
				  }
		
				
				include "conexiune.php";
				$sqlcmy=mysql_query("SELECT * FROM foi_parc_pl where nrdoc=$nrdoc");
				$dist_fact=0;
				while ($rowpaul=mysql_fetch_array($sqlcmy)) {
						$nrdoc=$rowpaul["nrdoc"];
						$nrcursa=$rowpaul["nrcursa"];
						$id_cursa=$rowpaul["id_cursa"];
						$qcursa="select all * from curse where indice='$id_cursa'";
						include "conexiune.php";
						$rqt = mysql_query($qcursa);
						if ($rqt) {
							  $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
							  $dist_km=$rrqt["dist_km"];
						}
						$dist_fact=$dist_fact+$dist_km;
				}
				include "conexiune.php";
				$alim=mysql_query("SELECT * FROM alimentari where nrfparc='$nrdoc'");
				$randuria=0;
				$cant_tot=0;
				$valoare_tot=0;
				while ($rowal=mysql_fetch_array($alim)) {
						$randuria=$randuria+1;
						$cant=0;
						$cant=$rowal["cant"];
						$cant_tot=$cant_tot+$cant;
						$pret_u=$rowal["pret"];
						$valoare_lin=$cant*$pret_u;
						$valoare_tot=$valoare_tot+$valoare_lin;
				}
				$nralim=$randuria;
				$dist_parc=$klmtj_s-$klmtj_p;
				$valftva=round(($dist_fact*$tarif),2);
				$valcutva=round(($valftva*119/100),2);
				$valtva=round(($valcutva-$valftva),2);
				echo '<tr ';
				echo ' onclick="line_click('.$i.')" ';
				echo " id='linie$i' onmouseover='line_sel($i, $randuri)' ";
				echo " onmouseout='line_unsel($randuri)' >";
				echo '<td id="field_0_'.$i.'" align="center" ';
				echo ' value="'.$no.'" >'.$no.'</td>';
				echo '<td id="field_1_'.$i.'" align="left" ';
				echo ' value="'.$data_e.'" >'.$data_e.'</td>';
				echo '<td id="field_2_'.$i.'" align="left" ';
				echo ' value="'.$nr_inmatric.'" >'.$nr_inmatric.'</td>';
				echo '<td id="field_3_'.$i.'" align="right" ';
				echo ' value="'.$dist_fact.'" >'.$dist_fact.'</td>';
				echo '<td id="field_4_'.$i.'" align="center" ';
				echo ' value="'.$tarif.'" >'.$tarif.'</td>';
				echo '<td id="field_5_'.$i.'" align="center" ';
				echo ' value="'.$valftva.'" >'.round($valftva,2).'</td>';
				echo '<td id="field_6_'.$i.'" align="center" ';
				echo ' value="'.$valtva.'" >'.$valtva.'</td>';
				echo '<td id="field_7_'.$i.'" align="center" ';
				echo ' value="'.$valcutva.'" >'.$valcutva.'</td>';
						
				$cant_cons_t=$cant_cons_t+$cant_tot;
				$dist_tot_t=$dist_tot_t+$dist_parc;
				$no=$no+1;								
				$i=$i+1;
				$tvalftva=$tvalftva+$valftva;
				$tvaltva=$tvaltva+$valtva;
				$tvalcutva=$tvalcutva+$valcutva;
				$tdist_fact=$tdist_fact+$dist_fact;
			}
	}
	if ($no=="1"){
		echo '<tr><td colspan="8"><center><font color="#ff0000" size="+1">Nu sunt prestatii in perioada '.$perioada.'!</font><center></td></tr>';
	} 	else {
	
		echo '<tr';
		echo ' onclick="line_click('.$i.')" ';
		echo " id='linie$i' onmouseover='line_sel($i, $randuri)' ";
		echo " onmouseout='line_unsel($randuri)' >";
		echo '<td id="field_14" align="center" colspan ="3"><strong>TOTAL GENERAL</strong></td>';
		
		echo '<td id="field_3_'.$i.'" align="right" ';
		echo ' value="'.$tdist_fact.'" ><strong>'.$tdist_fact.'</strong></td>';
		echo '<td id="field_4_'.$i.'" align="center" ';
		echo ' value="'.$tarif.'" ><strong>'.$tarif.'</strong></td>';
		echo '<td id="field_5_'.$i.'" align="center" ';
		echo ' value="'.$tvalftva.'" ><strong>'.round($tvalftva,2).'</strong></td>';
		echo '<td id="field_6_'.$i.'" align="center" ';
		echo ' value="'.$tvaltva.'" ><strong>'.$tvaltva.'</strong></td>';
		echo '<td id="field_7_'.$i.'" align="center" ';
		echo ' value="'.$tvalcutva.'" ><strong>'.$tvalcutva.'</strong></td>';
		}
					
	echo "</table>";
	mysql_close($conexiune);
}
?>
</div>
</div></center>
<BR>
&nbsp;&nbsp;&nbsp;&nbsp;<strong>SC Tur Cento Trans SRL <br>
</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Intocmit de : <? echo $nume; ?> </strong>