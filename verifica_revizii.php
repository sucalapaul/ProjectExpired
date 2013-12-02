<?php
	include "conexiune.php";
	require "dataazi.php";
	require "perioade_notificari.php";

	$sql=mysql_query("SELECT * FROM revizii ");
	while ($row=mysql_fetch_array($sql)) {
		$id_masina=$row["id_masina"];
		$expira=0;
		$exp_itp=$row["exp_itp"];
		$exp_tah=$row["exp_tah"];
		$exp_cls=$row["exp_cls"];
		$exp_rca=$row["exp_rca"];
		$exp_cas=$row["exp_cas"];
		$exp_lic=$row["exp_lic"];
		$exp_itpi=$row["exp_itpi"];
		$exp_larm=$row["exp_larm"];
		$exp_traseu=$row["exp_traseu"];
		$exp_a=$row["exp_a"];
		$exp_rovi=$row["exp_rovi"];
		$expira_old=$row["exp"];
		$nr_inmatric="";

		$qtip_au="select all * from masini where indice='$id_masina'";
		include "conexiune.php";
		$rqt = mysql_query($qtip_au);
		if ($rqt) {
			$rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
			$id_tip_auto=$rrqt["id_tip_auto"];
			$nr_inmatric=$rrqt["nr_inmatric"];
		}



		if  ($id_tip_auto==5 or $id_tip_auto==11)
		{
			if ((strtotime($exp_itp)-$dataazi_sec)<=864000){$expira=1;}
			if ($expira==0){if ((strtotime($exp_tah)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_larm)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_rca)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_cas)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_lic)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_itpi)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_a)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_rovi)-$dataazi_sec)<=864000){$expira=1;}}
		}
		else
		{
			if ((strtotime($exp_itp)-$dataazi_sec)<=864000){$expira=1;}
			if ($expira==0){if ((strtotime($exp_tah)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_cls)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_rca)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_cas)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_lic)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_itpi)-$dataazi_sec)<=864000){$expira=1;}}
			if ($expira==0){if ((strtotime($exp_rovi)-$dataazi_sec)<=864000){$expira=1;}}

			if ($expira==0){if ((strtotime($exp_traseu)-$dataazi_sec)<=864000){$expira=1;}}
		}

		if ($expira != $expira_old)
		{
			$query = "UPDATE revizii SET exp='$expira' WHERE id_masina='$id_masina'";

			if (!mysql_query($query)) {
				die(mysql_error());
			}
		}

		

/*CURATA BAZA DE DATE!!
RULEAZA NUMA ODATA ASTA!

                    if ($nr_inmatric=="")
                    {
                        	$query="DELETE FROM revizii WHERE id_masina='$id_masina'";
                            if (!mysql_query($query)) {
                                    echo "asd";
                                    die(mysql_error());
                            } else {
                            echo "err ";
                            }
                    }
 */
	}






	$sql=mysql_query("SELECT * FROM avize_soferi ");
	while ($row=mysql_fetch_array($sql)) {

		$id_sofer=$row["id_sofer"];
		$ci_exp=$row["ci_exp"];
		$permis_exp=$row["permis_exp"];
		$psihologic_exp=$row["psihologic_exp"];
		$medicale_exp=$row["medicale_exp"];
		$atestat_exp=$row["atestat_exp"];
		$tahograf_exp=$row["tahograf_exp"];
		$tahograf_desc=$row["tahograf_desc"];
		$legitimatie_exp=$row["legitimatie_exp"];
		$expira_old=$row["exp"];

		$expira=0;


		if ((strtotime($ci_exp)-$dataazi_sec) <= $notificare_ci_exp )									{ $expira=1; }
		if ($expira==0) { if ((strtotime($permis_exp)-$dataazi_sec)		<= $notificare_permis_exp ) 	{ $expira=1; } }
		if ($expira==0) { if ((strtotime($psihologic_exp)-$dataazi_sec)	<= $notificare_psihologic_exp ) { $expira=1; } }
		if ($expira==0) { if ((strtotime($medicale_exp)-$dataazi_sec)	<= $notificare_medicale_exp ) 	{ $expira=1; } }
		if ($expira==0) { if ((strtotime($atestat_exp)-$dataazi_sec)	<= $notificare_atestat_exp ) 	{ $expira=1; } }
		if ($expira==0) { if ((strtotime($tahograf_exp)-$dataazi_sec)	<= $notificare_tahograf_exp ) 	{ $expira=1; } }
		if ($expira==0) { if ((strtotime($tahograf_desc)-$dataazi_sec)	<= $notificare_tahograf_desc ) 	{ $expira=1; } }
		if ($expira==0) { if ((strtotime($legitimatie_exp)-$dataazi_sec)<= $notificare_legitimatie_exp ){ $expira=1; } } 

		if ($expira != $expira_old)
		{
			$query = "UPDATE avize_soferi SET exp='$expira' WHERE id_sofer='$id_sofer'";

			if (!mysql_query($query)) {
				die(mysql_error());
			}
		}
	}
?>



