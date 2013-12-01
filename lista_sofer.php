<?php
session_start();
?>
<style type="text/css">
<!--
.style6 {color: #000000; font-style: italic; font-size: 18px; }
.style7 {font-weight: bold; font-size: 18px;}
-->
</style>
<div align="center"><span class="style7">Informatii sofer</span>
<br> 
&nbsp;

<?php
if ($_SESSION['user']==1){

	include "conexiune.php";
	$id_sofer=$_POST['id_sofer'];
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
	
	$sql=mysql_query("SELECT * FROM soferi");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM soferi where indice=$id_sofer");
	while ($row=mysql_fetch_array($sql)) {$nume=$row['nume'];}
	mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM soferi where indice=$id_sofer");
	echo "<table border=1 cellspacing='0'>";
	echo "<tr><td>Indice</td><td>Nume</td><td>CNP</td></tr>";
	
	$i=1;
	while ($row=mysql_fetch_array($sql)) {
			echo "<tr id='linie$i'>";
			echo '<td id="field_0_'.$i.'" align="left" ';
			echo ' value="'.$row['indice'].'" >'.$row[0].'</td>';
			echo '<td id="field_1_'.$i.'" align="left" ';
			echo ' value="'.$row['nume'].'" >'.$row[1].'</td>';
			echo '<td id="field_2_'.$i.'" align="left" ';
			echo ' value="'.$row['cnp'].'" >'.$row[2].'</td>';
			echo '
			';
			$i=$i+1;
	}
	echo "</table>";
	
	mysql_close($conexiune);
} else {echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
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
<br />
&nbsp;
<strong><span class="style6">Curse efectuate de soferul</span></strong><font size="+2"><strong> <?php echo $nume;?> </strong></font><strong><span class="style6">in perioada : </span></strong><font size="+2"><strong> <?php echo $perioada; ?></strong></font>
 <center>
 
<?php
if ($_SESSION['user']==1){

	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM foi_parc_sof where id_sofer=$id_sofer order by nrdoc");
	echo "<table border=1  cellspacing='0'>";
	echo "<tr><td><strong>Nr.foaie parcurs</strong></td><td><strong>Masina</strong></td><td><strong>Traseul</strong></td><td><strong>Data emiterii</strong></td><td><strong>Klmtj.sos</strong></td><td><strong>Klmtj.plec</strong></td><td><strong>Dist. facturata</strong></td><td><strong>Dist. parcursa</strong></td><td><strong>Diurna masina  RON/Km</strong></td><td><strong>Diurna sofer  RON/Km</strong></td><td><strong>TOTAL DIURNA </strong></td></tr>";
	
	$i=1;
	$cant_cons_t=0;
	$dist_tot_t=0;
	$exista=0;
	$tdist_fact=0;
	$tdist_parc=0;
	$tdiurna_sof=0;
	$tdiurna_tot=0;
	while ($row=mysql_fetch_array($sql)) {
				$nrdoc=$row["nrdoc"];
				$qsel="select all * from foi_parcurs where nrdoc='$nrdoc'";
				include "conexiune.php";
				$rqt = mysql_query($qsel);
				if ($rqt) {
						$rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
						$ziua_e=$rrqt["zi_e"];
						$luna_e=$rrqt["luna_e"];
						$an_e=$rrqt["an_e"];
						$data_e=$ziua_e.'/'.$luna_e.'/'.$an_e;
	}
	
		
	
	require ("replun.php");
	$data_e=$ziua_e.' '.$LuniAne[$luna_e].' '.$an_e;
	if ( (strtotime($data_i)<=strtotime($data_e)) && (strtotime($data_e)<=strtotime($data_f)) ){
	
					$exista=1;
					$id_sofer=$row["id_sofer"];
					$qfoaie="select all * from foi_parcurs where nrdoc='$nrdoc'";
					include "conexiune.php";
					  $rqt = mysql_query($qfoaie);
					  if ($rqt) {
						  $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
							$id_masina=$rrqt["id_masina"];
							$zi_e=$rrqt["zi_e"];
							$luna_e=$rrqt["luna_e"];
							$an_e=$rrqt["an_e"];
							$traseul=$rrqt["traseul"];
							$diurna_sof=$rrqt["diurna_sof"];
							$luna_s=$rrqt["luna_s"];
							$ziua_s=$rrqt["ziua_s"];
							$ora_s=$rrqt["ora_s"];
							$klmtj_s=$rrqt["klmtj_s"];
							$luna_p=$rrqt["luna_p"];
							$ziua_p=$rrqt["ziua_p"];
							$ora_p=$rrqt["ora_p"];
							$klmtj_p=$rrqt["klmtj_p"];
	}
					  $qmasina="select all * from masini where indice='$id_masina'";
					  include "conexiune.php";
					  $rqt = mysql_query($qmasina);
					  if ($rqt) {
						  $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
						  $nr_inmatric=$rrqt["nr_inmatric"];
						  $val_diurna=$rrqt["val_diurna"];
					  }
					  $qluna="select all * from luni where indice='$luna_e'";
					  include "conexiune.php";
					  $rqt = mysql_query($qluna);
					  if ($rqt) {
						  $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
						  $nume_luna=$rrqt["denumire"];
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
					$data_e=$zi_e."-".$nume_luna."-".$an_e;   
					$dist_parc=$klmtj_s-$klmtj_p;
					if ($dist_fact<$dist_parc){$diurna_to=$val_diurna*$dist_fact;}
						else{$diurna_to=$val_diurna*$dist_parc;
						}
					$diurna_tot=$diurna_to+$diurna_sof;
					echo '<td id="field_0_'.$i.'" align="center" ';
					echo ' value="'.$nrdoc.'" >'.$nrdoc.'</td>';
					echo '<td id="field_1_'.$i.'" align="left" ';
					echo ' value="'.$nr_inmatric.'" >'.$nr_inmatric.'</td>';
					echo '<td id="field_2_'.$i.'" align="left" ';
					echo ' value="'.$traseul.'" >'.$traseul.'</td>';
					echo '<td id="field_3_'.$i.'" align="left" ';
					echo ' value="'.$data_e.'" >'.$data_e.'</td>';
					echo '<td id="field_4_'.$i.'" align="right" ';
					echo ' value="'.$klmtj_s.'" >'.$klmtj_s.'</td>';
					echo '<td id="field_5_'.$i.'" align="right" ';
					echo ' value="'.$klmtj_p.'" >'.$klmtj_p.'</td>';
					echo '<td id="field_6_'.$i.'" align="center" ';
					echo ' value="'.$dist_fact.'" >'.$dist_fact.'</td>';
					echo '<td id="field_7_'.$i.'" align="center" ';
					echo ' value="'.$dist_parc.'" >'.$dist_parc.'</td>';
					echo '<td id="field_8_'.$i.'" align="center" ';
					echo ' value="'.$val_diurna.'" >'.$val_diurna.'</td>';		
					echo '<td id="field_9_'.$i.'" align="center" ';
					echo ' value="'.$diurna_sof.'" >'.$diurna_sof.'</td>';
					echo '<td id="field_10_'.$i.'" align="right" ';
					echo ' value="'.$diurna_tot.'" >'.round($diurna_tot,2).' RON</td></tr>';	
					
	$i=$i+1;
	$tdist_fact=$tdist_fact+$dist_fact;
	$tdist_parc=$tdist_parc+$dist_parc;
	$tdiurna_sof=$tdiurna_sof+$diurna_sof;
	$tdiurna_tot=$tdiurna_tot+$diurna_tot;
	}
	}	
	
					echo '<td id="field_14" align="center" colspan ="6"><strong>TOTAL GENERAL </strong></td>';
					echo '<td id="field_6_'.$i.'" align="center" ';
					echo ' value="'.$tdist_fact.'" ><strong>'.$tdist_fact.'</strong></td>';
					echo '<td id="field_7_'.$i.'" align="center" ';
					echo ' value="'.$tdist_parc.'" ><strong>'.$tdist_parc.'</strong></td>';
					echo '<td></td>';
					echo '<td id="field_9_'.$i.'" align="center" ';
					echo ' value="'.$tdiurna_sof.'" ><strong>'.round($tdiurna_sof,2).'</strong></td>';
					echo '<td id="field_10_'.$i.'" align="right" ';
					echo ' value="'.$tdiurna_tot.'" ><strong>'.round($tdiurna_tot,2).' RON</strong></td></tr>';
				
	if ($exista!="1"){echo '<tr><td colspan="11"><center><font color="#ff0000" size="+1">Nu sunt curse efectuate de soferul '.$nume.' in perioada '.$perioada.'!</font><center></td></tr>';}			
				
	echo "</table>";
	mysql_close($conexiune);
}
?>
</div>
