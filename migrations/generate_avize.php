<?php

	include "conexiune.php";
	$sql=mysql_query("DELETE FROM avize_soferi WHERE 1");
	if (!$sql) {
		die(mysql_error());
	} 

	$sql=mysql_query("SELECT * FROM soferi order by nume ASC");
	while ($row=mysql_fetch_array($sql)) {
		$indice = $row['indice'];
		$query="INSERT INTO  avize_soferi (
			id_sofer ,
			ci_serie ,
			ci_numar ,
			ci_exp ,
			permis_serie ,
			permis_categorii ,
			permis_exp ,
			psihologic_exp ,
			medicale_exp ,
			atestat_categorii ,
			atestat_exp ,
			tahograf_exp ,
			tahograf_desc ,
			legitimatie_numar ,
			legitimatie_exp
		)
		VALUES (
		'$indice',  '',  '',  '0',  '',  '',  '0',  '0',  '0',  '',  '0',  '0',  '0',  '',  '0'
		)";

		if (!mysql_query($query)) {
		die(mysql_error());
		} 

	}
	mysql_close($conexiune);

	echo "done."
?>