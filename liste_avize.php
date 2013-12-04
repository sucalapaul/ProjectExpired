<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
	td {
		padding-left: 10px;
		padding-right: 10px;
	}
	td.expired {
		text-decoration: underline;
		font-weight: bold;
		color: red;
	}
	thead {display: table-header-group;}
	table {
		-fs-table-paginate: paginate;
	}

</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Situatie soferi</title>



</head>
<body>

 <?php
	$azi=date("Y-m-d"); 
	require "dataazi.php";

?>
<div align="center">
  <h3><span class="style5"><strong>Situatia avizelor pentru angajati  </strong></span><br></h3>
   <h3><font size="+1"><strong> <?php echo date("d/m/Y",$dataazi_sec).'<br />'; ?></strong><br></font></h3>
  <br />
</div>
  
<?php
if ($_SESSION['user']==1){

	// include "conexiune.php";
	// $sql=mysql_query("SELECT * FROM revizii");
	// $randuri=0;
	// while ($row=mysql_fetch_row($sql)){ 
	// 	$randuri=$randuri+1; 
	// }
	// mysql_close($conexiune);


	require "perioade_notificari.php";
	include "conexiune.php";
	$sql=mysql_query("SELECT *
						FROM avize_soferi
						INNER JOIN soferi on avize_soferi.id_sofer = soferi.indice
						WHERE 1");
	echo '<table border=1 cellpadding="1" cellspacing="0">';
	echo '<thead><tr>
		<td align="center"><b> Nr </b></td>
		<td align="center"><b> Nume </b></td>
		<td align="center"><b> CI </b></td>
		<td align="center"><b> CNP </b></td>

		<td align="center"><b> CI </b></td>
		<td align="center"><b> Permis de Conducere </b></td> 
		<td align="center"><b> Aviz Psihologic </b></td>
		<td align="center"><b> Analize medicale </b></td>
		<td align="center"><b> Atestat </b></td>
		<td align="center"><b> Tahograf - d. expirarii </b></td>
		<td align="center"><b> Tahograf - d. descarcarii </b></td>
		<td align="center"><b> Legitimatie </b></td>
	</tr></thead><tbody>';

	$i=1;
	while ($row=mysql_fetch_array($sql)) {

		    $id_sofer=$row["id_sofer"];
		    $nume=$row["nume"];
		    $cnp=$row["cnp"];
		    $ci_serie=$row["ci_serie"];
		    $ci_numar=$row["ci_numar"];
		    $ci_exp=$row["ci_exp"];
		    $permis_serie=$row["permis_serie"];
		    $permis_categorii=$row["permis_categorii"];
		    $permis_exp=$row["permis_exp"];
		    $psihologic_exp=$row["psihologic_exp"];
		    $medicale_exp=$row["medicale_exp"];
		    $atestat_categorii=$row["atestat_categorii"];
		    $atestat_exp=$row["atestat_exp"];
		    $tahograf_exp=$row["tahograf_exp"];
		    $tahograf_desc=$row["tahograf_desc"];
		    $legitimatie_numar=$row["legitimatie_numar"];
		    $legitimatie_exp=$row["legitimatie_exp"];
		    $exp=$row["exp"];
			
			$ci_exp_time		 = strtotime($ci_exp);
			$ci_exp				 = date("d/m/Y" ,$ci_exp_time);
			$permis_exp_time	 = strtotime($permis_exp);
			$permis_exp			 = date("d/m/Y" ,$permis_exp_time);
			$psihologic_exp_time = strtotime($psihologic_exp);
			$psihologic_exp		 = date("d/m/Y" ,$psihologic_exp_time);
			$medicale_exp_time	 = strtotime($medicale_exp);
			$medicale_exp		 = date("d/m/Y" ,$medicale_exp_time);
			$atestat_exp_time	 = strtotime($atestat_exp);
			$atestat_exp		 = date("d/m/Y" ,$atestat_exp_time);
			$tahograf_exp_time	 = strtotime($tahograf_exp);
			$tahograf_exp		 = date("d/m/Y" ,$tahograf_exp_time);	
			$tahograf_desc_time	 = strtotime($tahograf_desc);
			$tahograf_desc		 = date("d/m/Y" ,$tahograf_desc_time);				
			$legitimatie_exp_time	 = strtotime($legitimatie_exp);
			$legitimatie_exp		 = date("d/m/Y" ,$legitimatie_exp_time);

			if ($ci_exp_time<944000000){$ci_exp						= "neprecizat";};
			if ($permis_exp_time<944000000){$permis_exp				= "neprecizat";};
			if ($psihologic_exp_time<944000000){$psihologic_exp		= "neprecizat";};
			if ($medicale_exp_time<944000000){$medicale_exp			= "neprecizat";};
			if ($atestat_exp_time<944000000){$atestat_exp			= "neprecizat";};
			if ($tahograf_exp_time<944000000){$tahograf_exp			= "neprecizat";};
			if ($tahograf_desc_time<944000000){$tahograf_desc		= "neprecizat";};
			if ($legitimatie_exp_time<944000000){$legitimatie_exp	= "neprecizat";};

			if ($ci_exp_time>2100000000){$ci_exp					= "nu are";};
			if ($permis_exp_time>2100000000){$permis_exp			= "nu are";};
			if ($psihologic_exp_time>2100000000){$psihologic_exp	= "nu are";};
			if ($medicale_exp_time>2100000000){$medicale_exp		= "nu are";};
			if ($atestat_exp_time>2100000000){$atestat_exp			= "nu are";};
			if ($tahograf_exp_time>2100000000){$tahograf_exp		= "nu are";};
			if ($tahograf_desc_time>2100000000){$tahograf_exp		= "nu are";};
			if ($legitimatie_exp_time>2100000000){$legitimatie_exps	= "nu are";};

			$expira_ci 			= 0;
			$expira_permis 		= 0;
			$expira_psihologic	= 0;
			$expira_medicale	= 0;
			$expira_atestat		= 0;
			$expira_tahograf 	= 0;
			$expira_tahografd	= 0;
			$expira_legitimatie	= 0;

			if (( $ci_exp_time -			$dataazi_sec) <= $notificare_ci_exp )			{ $expira_ci 			= 1; }
			if (( $permis_exp_time -		$dataazi_sec) <= $notificare_permis_exp ) 		{ $expira_permis 		= 1; }
			if (( $psihologic_exp_time -	$dataazi_sec) <= $notificare_psihologic_exp ) 	{ $expira_psihologic	= 1; }
			if (( $medicale_exp_time -		$dataazi_sec) <= $notificare_medicale_exp ) 	{ $expira_medicale		= 1; }
			if (( $atestat_exp_time -		$dataazi_sec) <= $notificare_atestat_exp ) 		{ $expira_atestat		= 1; }
			if (( $tahograf_exp_time -		$dataazi_sec) <= $notificare_tahograf_exp ) 	{ $expira_tahograf 		= 1; }
			if (( $tahograf_desc_time -		$dataazi_sec) <= $notificare_tahograf_desc )	{ $expira_tahografd		= 1; }
			if (( $legitimatie_exp_time -	$dataazi_sec) <= $notificare_legitimatie_exp )	{ $expira_legitimatie	= 1; } 

						
			echo '<tr >';

			echo '<td align="left" class="'.( $exp ? 'expired':'' ).'" >';
			echo $i;
			echo '</td>';
	

			echo '<td align="left" class="'.( $exp ? 'expired':'' ).'" >';
			echo $nume;
			echo '</td>';


			echo '<td align="center" class="'.( $expira_ci ? 'expired':'' ).'" >';
			echo $ci_serie."".$ci_numar;
			echo '</td>';	


			echo '<td align="center" >';
			echo $cnp;
			echo '</td>';	


			echo '<td align="center" class="'.( $expira_ci ? 'expired':'' ).'" >';
			echo $ci_exp;
			echo '</td>';	


			echo '<td align="center" class="'.( $expira_permis ? 'expired':'' ).'" >';
			echo $permis_exp;
			echo '</td>';	
			echo '</td>';	

			// echo '<td align="center" class="'.( $expira_permis ? 'expired':'' ).'" >';
			// echo $permis_categorii;
			// echo '</td>';	

			echo '<td align="center" class="'.( $expira_psihologic ? 'expired':'' ).'" >';
			echo $psihologic_exp;
			echo '</td>';	

			echo '<td align="center" class="'.( $expira_medicale ? 'expired':'' ).'" >';
			echo $medicale_exp;
			echo '</td>';	

			echo '<td align="center" class="'.( $expira_atestat ? 'expired':'' ).'" >';
			echo $permis_exp;
			echo '</td>';	

			echo '<td align="center" class="'.( $expira_tahograf ? 'expired':'' ).'" >';
			echo $tahograf_exp;
			echo '</td>';	

			echo '<td align="center" class="'.( $expira_tahografd ? 'expired':'' ).'" >';
			echo $tahograf_desc;
			echo '</td>';	

			echo '<td align="center" class="'.( $expira_legitimatie ? 'expired':'' ).'" >';
			echo $legitimatie_exp;
			echo '</td>';	



			// echo '<td id="field_0_'.$i.'" align="center" value="'.$nr_inmatric.'" >';
			// echo $nr_inmatric;
			// echo '</td>';
			// echo '<td id="field_1_'.$i.'" align="center" value="'.$exp_itp.'" >';
			// 	if (($d1-$dataazi_sec)<=864000)
			// 	{$expira=1;
			// 	echo "<font color='#ff0000'>";
			// 	}	
			// echo $exp_itp;
			// if ($expira==1){echo '</font>';}
			// echo '</td>';
			// echo '<td id="field_2_'.$i.'" align="center" value="'.$exp_tah.'" >';
			// 	if (($d2-$dataazi_sec)<=864000)
			// 	{$expira=1;
			// 	echo "<font color='#ff0000'>";
			// 	}	
			// echo $exp_tah;
			// if ($expira==1){echo '</font>';}
			// echo '</td>';
			// echo '<td id="field_3_'.$i.'" align="center" value="'.$exp_cls.'" >';
			// 	if (($d3-$dataazi_sec)<=864000)
			// 	{$expira=1;
			// 	echo "<font color='#ff0000'>";
			// 	}	
			// echo $exp_cls;
			// if ($expira==1){echo '</font>';}
			// echo '</td>';
			// echo '<td id="field_4_'.$i.'" align="center" value="'.$exp_rca.'" >';
			// 	if (($d4-$dataazi_sec)<=864000)
			// 	{$expira=1;
			// 	echo "<font color='#ff0000'>";
			// 	}	
			// echo $exp_rca;
			// if ($expira==1){echo '</font>';}
			// echo '</td>';
			// echo '<td id="field_5_'.$i.'" align="center" value="'.$exp_cas.'" >';
			// 	if (($d5-$dataazi_sec)<=864000)
			// 	{$expira=1;
			// 	echo "<font color='#ff0000'>";
			// 	}	
			// echo $exp_cas;
			// if ($expira==1){echo '</font>';}
			// echo '</td>';
			// echo '<td id="field_6_'.$i.'" align="center" value="'.$exp_lic.'" >';
			// 	if (($d6-$dataazi_sec)<=864000)
			// 	{$expira=1;
			// 	echo "<font color='#ff0000'>";
			// 	}	
			// echo $exp_lic;
			// if ($expira==1){echo '</font>';}
			// echo '</td>';
			// echo '<td id="field_7_'.$i.'" align="center" value="'.$exp_itpi.'" >';
			// 	if (($d7-$dataazi_sec)<=864000)
			// 	{$expira=1;
			// 	echo "<font color='#ff0000'>";
			// 	}	
			// echo $exp_itpi;
			// if ($expira==1){echo '</font>';}
			// echo '</td>';
			// echo '<td id="field_8_'.$i.'" align="left" ';
			// echo ' value="'.$seria_casco.'" >'.$seria_casco.'</td>';
			// echo '<td id="field_9_'.$i.'" align="left" ';
			// echo ' value="'.$societatea.'" >'.$societatea.'</td>';
			
			// echo '<td id="field_10_'.$i.'" align="left" ';
			// echo ' value="'.$leasing.'" >'.$leasing.'</td>';			


			echo '
			';
			$i=$i+1;

	}
	echo "</tbody></table>";
	mysql_close($conexiune);
} else {
	echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
}			
?>

</div></center>
</body>
</html>
