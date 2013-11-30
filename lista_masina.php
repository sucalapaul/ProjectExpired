<?
session_start();
?>
<style type="text/css">
<!--
.style1 {font-size: 14px}
-->
</style>
<div align="center"><span class="style1">Informatii masina</span>
 &nbsp;

<?
if ($_SESSION['user']==1){

	include "conexiune.php";
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
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM masini where indice=$id_masina");
	while ($row=mysql_fetch_array($sql)) {$nr_inmatric=$row["nr_inmatric"];}
	echo '<strong>'.$nr_inmatric.'</strong><br>';

	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM masini where indice=$id_masina");
	echo "<table border=1 cellspacing='0'>";
	echo "<tr><td><strong>Indice</strong></td><td><strong>Nr.inmatric</strong></td><td><strong>Categoria</strong></td><td><strong>Tipul</strong></td><td><strong>Tarif</strong></td><td><strong>Val. diurna</strong></td><td><strong>Kilometraj la inreg.</strong></td><td><strong>Consumul specific</strong></td></tr>";
	
	$i=1;
	while ($row=mysql_fetch_array($sql)) {
									$indice=$row["indice"];
									$nr_inmatric=$row["nr_inmatric"];
									$categoria=$row["categoria"];
									$id_tip_auto=$row["id_tip_auto"];
									$tarif=$row["tarif"];
									$val_diurna=$row["val_diurna"];
									$klmtj_inreg=$row['klmtj_inreg'];
									$cons_spec=$row['cons_spec'];
									$qtip_au="select all * from tip_auto where indice='$id_tip_auto'";
									include "conexiune.php";
									  $rqt = mysql_query($qtip_au);
									  if ($rqt) {
											  $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
											  $denumire=$rrqt["denumire"];
												}
					echo "<tr id='linie$i' >";
					echo '<td id="field_0_'.$i.'" align="left" ';
					echo ' value="'.$indice.'" >'.$indice.'</td>';
					echo '<td id="field_1_'.$i.'" align="left" ';
					echo ' value="'.$nr_inmatric.'" >'.$nr_inmatric.'</td>';
					echo '<td id="field_2_'.$i.'" align="left" ';
					echo ' value="'.$categoria.'" >'.$categoria.'</td>';
					echo '<td id="field_3_'.$i.'" align="right" ';
					echo ' value="'.$denumire.'" >'.$denumire.'</td>';
					echo '<td id="field_4_'.$i.'" align="right" ';
					echo ' value="'.$tarif.'" >'.$tarif.' RON </td>';
					echo '<td id="field_5_'.$i.'" align="right" ';
					echo ' value="'.$val_diurna.'" >'.$val_diurna.'</td>';
					echo '<td id="field_6_'.$i.'" align="center" ';
					echo ' value="'.$klmtj_inreg.'" >'.$klmtj_inreg.'</td>';
					echo '<td id="field_7_'.$i.'" align="center" ';
					echo ' value="'.$cons_spec.'" >'.$cons_spec.' L/100 Km</td>';
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
<br />&nbsp;
<strong><span class="style6">Curse efectuate de masina</span></strong><font size="+1"><strong> <? echo $nr_inmatric;?> </strong></font><strong><span class="style6">in perioada </span></strong><font size="+1"><strong> <? echo $perioada; ?></strong></font>
 <center>

<?
if ($_SESSION['user']==1){

	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM foi_parcurs where id_masina=$id_masina");
	echo "<table border=1 cellspacing='0'>";
	echo "<tr><td>Nr.foaie parcurs</td><td>Masina</td><td>Traseul</td><td>Data emiterii</td><td>Klmtj.sos</td><td>Klmtj.plec</td><td>Dist. facturata</td><td>Dist. parcursa</td><td>Numar alimentari</td><td>Cant. totala </td><td>Valoare totala</td></tr>";
	$i=1;
	$cant_cons_t=0;
	$dist_tot_t=0;
	$dist_fact_t=0;
	$exista=0;
	$valoare_tot_t=0;
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
									$id_masina=$row["id_masina"];
									$zi_e=$row["zi_e"];
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
									$qmasina="select all * from masini where indice='$id_masina'";
									include "conexiune.php";
									  $rqt = mysql_query($qmasina);
									  if ($rqt) {
											  $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
											  $nr_inmatric=$rrqt["nr_inmatric"];
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
					echo "<tr id='linie$i' >";
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
					echo '<td id="field_7_'.$i.'" align="right" ';
					echo ' value="'.$dist_parc.'" >'.$dist_parc.'</td>';
					echo '<td id="field_8_'.$i.'" align="center" ';
					echo ' value="'.$nralim.'" >'.$nralim.'</td>';
					echo '<td id="field_9_'.$i.'" align="right" ';
					echo ' value="'.$cant_tot.'" >'.$cant_tot.' litri</td>';
					echo '<td id="field_10_'.$i.'" align="right" ';
					echo ' value="'.$valoare_tot.'" >'.$valoare_tot.' lei</td></tr>';
	
				$i=$i+1;
				$cant_cons_t=$cant_cons_t+$cant_tot;
				$dist_tot_t=$dist_tot_t+$dist_parc;
				$dist_fact_t=$dist_fact_t+$dist_fact;
				$valoare_tot_t=$valoare_tot_t+$valoare_tot;
	}
	}
	   echo '<tr><td id="field_14" align="center" colspan ="6"><strong>TOTAL GENERAL </strong></td>';
					echo '<td id="field_6_'.$i.'" align="center" ';
					echo ' value="'.$dist_fact_t.'" >'.$dist_fact_t.'</td>';
					echo '<td id="field_7_'.$i.'" align="right" ';
					echo ' value="'.$dist_tot_t.'" >'.$dist_tot_t.'</td>';
					echo '<td></td>';
					echo '<td id="field_9_'.$i.'" align="right" ';
					echo ' value="'.$cant_cons_t.'" >'.$cant_cons_t.' litri</td>';
					echo '<td id="field_10_'.$i.'" align="right" ';
					echo ' value="'.$valoare_tot_t.'" >'.$valoare_tot_t.' lei</td></tr>';
									if ($cant_cons_t>0){
									$cons_proc_efectuat=($cant_cons_t/$dist_tot_t)*100;} else{
									$cons_proc_efectuat=0;}
	echo '<tr ';
					echo ' onclick="line_click('.$i.')" ';
					echo " id='linie$i' onmouseover='line_sel($i, $randuri)' ";
					echo " onmouseout='line_unsel($randuri)' >";
									echo '<td id="field_14" align="center"><strong>Consumul calculat</strong></td>';
									echo '<td id="field_15" align="center" colspan="10"';
									echo ' value="'.$cant_cons_t.'" >Consum efectiv: <strong>'.round($cons_proc_efectuat,2);
									$cons_spec=1.05*$cons_spec;
									$cons_proc_efectuat=round($cons_proc_efectuat,2);
									echo '</strong> L/100 km &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>'.$cons_spec.' </strong>cons specific+5%/100 km';
							if ($cons_proc_efectuat<$cons_spec){ echo '<font color="#00aa00"size="+2"><strong>  Se incadreaza in consum!</strong></font>';}
																													 else { echo '<font color="#ff0000" size="+2">   Consum depasit !!!</font>';}
	
									echo ' </td></tr>';
	echo "</table>";
	mysql_close($conexiune);
}
?>
</div>

