<?php
session_start();
?>
<!--%@LANGUAGE="JAVASCRIPT" CODEPAGE="1252"%-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--<head>-->
<head><link href="calendar.css" rel="stylesheet"></link>
<script language="javascript" src="calendar.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Completare date revizii</title>

<script language="javascript">

function adaugare(){
document.getElementById("OPERATIE").value="AD";
document.getElementById("Form1").submit();
}

function stergere(){
document.getElementById("OPERATIE").value="STG";
document.getElementById("Form1").submit();
}

function modificare(){
var gol=0; msg="Nu ati introdus ";
if (document.getElementById("exp_itp").value == ""){gol=1; msg=msg+"data expirarii ITP, ";}
if (document.getElementById("exp_tah").value == ""){gol=1; msg=msg+"data expirarii tahograf, ";}		  
if (document.getElementById("exp_cls").value == ""){gol=1; msg=msg+"data expirarii clasificare, ";}
if (document.getElementById("exp_rca").value == ""){gol=1; msg=msg+"data expirarii RCA, ";}
if (document.getElementById("exp_cas").value == ""){gol=1; msg=msg+"data expirarii casco, ";}
if (document.getElementById("exp_lic").value == ""){gol=1; msg=msg+"data expirarii licenta, ";}
if (document.getElementById("exp_itpi").value == ""){gol=1; msg=msg+"data expirarii itpi, ";}
if (document.getElementById("seria_casco").value == ""){gol=1; msg=msg+"seria casco, ";}
if (document.getElementById("societatea").value == ""){gol=1; msg=msg+"societatea de asigurari ";}

if(gol==0){
document.getElementById("OPERATIE").value="MOD";
document.getElementById("Form1").submit();
} else {msg=msg+"!"; alert(msg);}
}

function line_sel(selectata, randuri){
for(i=1; i<=randuri; i=i+1){
if(i!=selectata){
document.getElementById("field_0_"+i).bgColor="#cfe4e9";
document.getElementById("field_1_"+i).bgColor="#cfe4e9";
document.getElementById("field_2_"+i).bgColor="#cfe4e9";
document.getElementById("field_3_"+i).bgColor="#cfe4e9";
document.getElementById("field_4_"+i).bgColor="#cfe4e9";
document.getElementById("field_5_"+i).bgColor="#cfe4e9";
document.getElementById("field_6_"+i).bgColor="#cfe4e9";
document.getElementById("field_7_"+i).bgColor="#cfe4e9";
document.getElementById("field_8_"+i).bgColor="#cfe4e9";
document.getElementById("field_9_"+i).bgColor="#cfe4e9";

}
else{
document.getElementById("field_0_"+i).bgColor="#33dddd";
document.getElementById("field_1_"+i).bgColor="#33dddd";
document.getElementById("field_2_"+i).bgColor="#33dddd";
document.getElementById("field_3_"+i).bgColor="#33dddd";
document.getElementById("field_4_"+i).bgColor="#33dddd";
document.getElementById("field_5_"+i).bgColor="#33dddd";
document.getElementById("field_6_"+i).bgColor="#33dddd";
document.getElementById("field_7_"+i).bgColor="#33dddd";
document.getElementById("field_8_"+i).bgColor="#33dddd";
document.getElementById("field_9_"+i).bgColor="#33dddd";

}
}
}

function line_unsel(randuri){
for(i=1;i<=randuri;i=i+1){
document.getElementById("field_0_"+i).bgColor="#cfe4e9";
document.getElementById("field_1_"+i).bgColor="#cfe4e9";
document.getElementById("field_2_"+i).bgColor="#cfe4e9";
document.getElementById("field_3_"+i).bgColor="#cfe4e9";
document.getElementById("field_4_"+i).bgColor="#cfe4e9";
document.getElementById("field_5_"+i).bgColor="#cfe4e9";
document.getElementById("field_6_"+i).bgColor="#cfe4e9";
document.getElementById("field_7_"+i).bgColor="#cfe4e9";
document.getElementById("field_8_"+i).bgColor="#cfe4e9";
document.getElementById("field_9_"+i).bgColor="#cfe4e9";

}
}

function line_click(val_i){
document.getElementById("exp_itp").value=document.getElementById("field_1_"+val_i).value;
document.getElementById("exp_tah").value=document.getElementById("field_2_"+val_i).value;
document.getElementById("exp_cls").value=document.getElementById("field_3_"+val_i).value;
document.getElementById("exp_rca").value=document.getElementById("field_4_"+val_i).value;
document.getElementById("exp_cas").value=document.getElementById("field_5_"+val_i).value;
document.getElementById("exp_lic").value=document.getElementById("field_6_"+val_i).value;
document.getElementById("exp_itpi").value=document.getElementById("field_7_"+val_i).value;
document.getElementById("seria_casco").value=document.getElementById("field_8_"+val_i).value;
document.getElementById("societatea").value=document.getElementById("field_9_"+val_i).value;

document.getElementById("exp_itp_vechi").value=document.getElementById("field_1_"+val_i).value;
document.getElementById("exp_tah_vechi").value=document.getElementById("field_2_"+val_i).value;
document.getElementById("exp_cls_vechi").value=document.getElementById("field_3_"+val_i).value;
document.getElementById("exp_rca_vechi").value=document.getElementById("field_4_"+val_i).value;
document.getElementById("exp_cas_vechi").value=document.getElementById("field_5_"+val_i).value;
document.getElementById("exp_lic_vechi").value=document.getElementById("field_6_"+val_i).value;
document.getElementById("exp_itpi_vechi").value=document.getElementById("field_7_"+val_i).value;
document.getElementById("seria_casco").value=document.getElementById("field_8_"+val_i).value;
document.getElementById("societatea").value=document.getElementById("field_9_"+val_i).value;

}

function nuare(camy){
	document.getElementById(camy).value="nu are";
	document.getElementById("an_"+camy).value="";
	document.getElementById("luna_"+camy).value="";
	document.getElementById("zi_"+camy).value="";
}

function slct_clas(){
document.getElementById("clasi").value=document.getElementById("slct_cls").value;
}
</script>

<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {font-style: italic}
.style3 {color: #0000CC}
-->
</style>
</head>

<body bgcolor="#cfe4e9">

<center><a href="<?php if (isset($_GET['trim'])){echo $_GET['trim'];} else {echo 'soferi.php';} ?>" class="style2 style3 style1"><font size="+1" color="#000000">&lt;&nbsp;Inapoi</font></a>
</center>
<br />
<br />

<?php
if ($_SESSION['user']==1){

	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="AD")
	{
		include "conexiune.php";


		$ci_exp1=$_POST['an_ci_exp'].'-'.$_POST['luna_ci_exp'].'-'.$_POST['zi_ci_exp'];
		$permis_exp1=$_POST['an_permis_exp'].'-'.$_POST['luna_permis_exp'].'-'.$_POST['zi_permis_exp'];
		$psihologic_exp1=$_POST['an_psihologic_exp'].'-'.$_POST['luna_psihologic_exp'].'-'.$_POST['zi_psihologic_exp'];
		$medicale_exp1=$_POST['an_medicale_exp'].'-'.$_POST['luna_medicale_exp'].'-'.$_POST['zi_medicale_exp'];
		$atestat_exp1=$_POST['an_atestat_exp'].'-'.$_POST['luna_atestat_exp'].'-'.$_POST['zi_atestat_exp'];
		$tahograf_exp1=$_POST['an_tahograf_exp'].'-'.$_POST['luna_tahograf_exp'].'-'.$_POST['zi_tahograf_exp'];
		$tahograf_desc1=$_POST['an_tahograf_desc'].'-'.$_POST['luna_tahograf_desc'].'-'.$_POST['zi_tahograf_desc'];
		$legitimatie_exp1=$_POST['an_legitimatie_exp'].'-'.$_POST['luna_legitimatie_exp'].'-'.$_POST['zi_legitimatie_exp'];
		
		$id_sofer1=$_GET['indice'];
		$ci_serie1=strtoupper($_POST['ci_serie']);
		$ci_numar1=strtoupper($_POST['ci_numar']);
		$permis_serie1=strtoupper($_POST['permis_serie']);
		$permis_categorii1=strtoupper($_POST['permis_categorii']);
		$atestat_categorii1=strtoupper($_POST['atestat_categorii']);
		$legitimatie_numar1=strtoupper($_POST['legitimatie_numar']);

		if ($ci_exp1=="--"){$ci_exp1="2036-7-22";};
		if ($permis_exp1=="--"){$permis_exp1="2036-7-22";};
		if ($psihologic_exp1=="--"){$psihologic_exp1="2036-7-22";};
		if ($medicale_exp1=="--"){$medicale_exp1="2036-7-22";};
		if ($atestat_exp1=="--"){$atestat_exp1="2036-7-22";};
		if ($tahograf_exp1=="--"){$tahograf_exp1="2036-7-22";};
		if ($tahograf_desc1=="--"){$tahograf_desc1="2036-7-22";};
		if ($legitimatie_exp1=="--"){$legitimatie_exp1="2036-7-22";};
		

		$sql=mysql_query("DELETE FROM avize_soferi WHERE id_sofer='$id_sofer1'");
		if (!$sql) 
		{
			die(mysql_error());
		}
		
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
					'$id_sofer1',  
					'$ci_serie1' ,
					'$ci_numar1' ,
					'$ci_exp1',
					'$permis_serie1' ,
					'$permis_categorii1' ,
					'$permis_exp1' ,
					'$psihologic_exp1' ,
					'$medicale_exp1' ,
					'$atestat_categorii1' ,
					'$atestat_exp1' ,
					'$tahograf_exp1' ,
					'$tahograf_desc1' ,
					'$legitimatie_numar1' ,
					'$legitimatie_exp1'
					)";

		if (!mysql_query($query)) 
		{
			die(mysql_error());
		} else 
		mysql_close($conexiune); 
		include "verifica_revizii.php";
		//echo '<center><font size="+5" color="#ff0000">ASTEAPTA!!!</font></center>';
		//echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=revizii.php?indice='.$indice.'"/>';
	};

	$indice=$_GET['indice'];

	if ($indice!=0){
		$qrev="select all * from avize_soferi where id_sofer='$indice'";
		include "conexiune.php";
		$rqt = mysql_query($qrev);
		if ($rqt) {
			$camy = mysql_fetch_array($rqt,MYSQL_ASSOC );
		    $id_sofer=$camy["id_sofer"];
		    $ci_serie=$camy["ci_serie"];
		    $ci_numar=$camy["ci_numar"];
		    $ci_exp=$camy["ci_exp"];
		    $permis_serie=$camy["permis_serie"];
		    $permis_categorii=$camy["permis_categorii"];
		    $permis_exp=$camy["permis_exp"];
		    $psihologic_exp=$camy["psihologic_exp"];
		    $medicale_exp=$camy["medicale_exp"];
		    $atestat_categorii=$camy["atestat_categorii"];
		    $atestat_exp=$camy["atestat_exp"];
		    $tahograf_exp=$camy["tahograf_exp"];
		    $tahograf_desc=$camy["tahograf_desc"];
		    $legitimatie_numar=$camy["legitimatie_numar"];
		    $legitimatie_exp=$camy["legitimatie_exp"];
			
			$d1= strtotime($ci_exp);
			$ci_exp = date("d/m/Y" ,$d1);
			$d2= strtotime($permis_exp);
			$permis_exp = date("d/m/Y" ,$d2);
			$d3= strtotime($psihologic_exp);
			$psihologic_exp = date("d/m/Y" ,$d3);
			$d4= strtotime($medicale_exp);
			$medicale_exp = date("d/m/Y" ,$d4);
			$d5=strtotime($atestat_exp);
			$atestat_exp = date("d/m/Y" ,$d5);
			$d6= strtotime($tahograf_exp);
			$tahograf_exp = date("d/m/Y" ,$d6);	
			$d7= strtotime($tahograf_desc);
			$tahograf_desc = date("d/m/Y" ,$d7);				
			$d8= strtotime($legitimatie_exp);
			$legitimatie_exp = date("d/m/Y" ,$d8);

			if ($d1<944000000){$ci_exp="neprecizat";};
			if ($d2<944000000){$permis_exp="neprecizat";};
			if ($d3<944000000){$psihologic_exp="neprecizat";};
			if ($d4<944000000){$medicale_exp="neprecizat";};
			if ($d5<944000000){$atestat_exp="neprecizat";};
			if ($d6<944000000){$tahograf_exp="neprecizat";};
			if ($d7<944000000){$tahograf_desc="neprecizat";};
			if ($d8<944000000){$legitimatie_exp="neprecizat";};

			if ($d1>2100000000){$ci_exp="nu are";};
			if ($d2>2100000000){$permis_exp="nu are";};
			if ($d3>2100000000){$psihologic_exp="nu are";};
			if ($d4>2100000000){$medicale_exp="nu are";};
			if ($d5>2100000000){$atestat_exp="nu are";};
			if ($d6>2100000000){$tahograf_exp="nu are";};
			if ($d7>2100000000){$tahograf_exp="nu are";};
			if ($d8>2100000000){$legitimatie_exp="nu are";};
		}
		
	} else 
	{
		$id_sofer="";
		$ci_serie="";
		$ci_numar="";
		$ci_exp="";
		$permis_serie="";
		$permis_categorii="";
		$permis_exp="";
		$psihologic_exp="";
		$medicale_exp="";
		$atestat_categorii="";
		$atestat_exp="";
		$tahograf_exp="";
		$tahograf_desc="";
		$legitimatie_numar="";
		$legitimatie_exp="";
	} 

	$q="select all * from soferi where indice='$indice'";
	include "conexiune.php";
	$rq = mysql_query($q);
	if ($rq) 
	{
		$row = mysql_fetch_array($rq,MYSQL_ASSOC );
		$nume=$row["nume"];
	};	
} 
else 
{
	echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
}			

?>

<center>

<form action="" method="post" name="Form1" id="Form1">
	<input type="hidden" id="OPERATIE" name="OPERATIE" value="">

	<table width="600" border="1" cellpadding="0">
		<tr><td  align="center" height="35"><strong><span class="style3"><em>Nume:</em></span> <?php echo $nume; ?> </strong>
		</td></tr>

		<tr><td align="left" height="35">
			<div style="float:left; margin-left:25px"> 
				<strong>Carte identitate: </strong>
				<input type="text" size="2" placeholder="serie" maxlength="2" name="ci_serie" id="ci_serie" value="<?php echo $ci_serie; ?>"/>
				<input type="text" size="6" placeholder="numar" maxlength="6" name="ci_numar" id="ci_numar" value="<?php echo $ci_numar; ?>"/>
			</div>
			<div style="float:right; margin-right:70px">
				<input type="hidden" size="2" maxlength="2" name="zi_ci_exp" id="zi_ci_exp" value="<?php echo date("d" ,$d1); ?>" />
				<input type="hidden" size="2" maxlength="2" name="luna_ci_exp" id="luna_ci_exp" value="<?php echo date("m" ,$d1); ?>" />
				<input type="hidden" size="4" maxlength="4" name="an_ci_exp" id="an_ci_exp" value="<?php echo date("Y" ,$d1); ?>" />
				<input type="text" size="10" maxlength="10" name="ci_exp" id="ci_exp" disabled value="<?php echo $ci_exp; ?>"/>

				<a onclick="ShowCal('ci_exp', 'zi_ci_exp', 'luna_ci_exp', 'an_ci_exp', 'calend_ci_exp'); return false;">
					<img style="border:none" src="images/calendar.gif" /></a>
				<a onclick="nuare('ci_exp')">&nbsp;&nbsp;
					<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
			</div>
		</td></tr>




		<tr><td align="left" height="35">
			<div style="float:left; margin-left:25px"> 
				<strong>Permis conducere: </strong>
				<input type="text" size="6" placeholder="serie" maxlength="25" name="permis_serie" id="permis_serie" value="<?php echo $permis_serie; ?>"/>
				<input type="text" size="10" placeholder="categorii" maxlength="10" name="permis_categorii" id="permis_categorii" value="<?php echo $permis_categorii; ?>"/>
			</div>
			<div style="float:right; margin-right:70px">
				<input type="hidden" size="2" maxlength="2" name="zi_permis_exp" id="zi_permis_exp" value="<?php echo date("d" ,$d2); ?>" />
				<input type="hidden" size="2" maxlength="2" name="luna_permis_exp" id="luna_permis_exp" value="<?php echo date("m" ,$d2); ?>" />
				<input type="hidden" size="4" maxlength="4" name="an_permis_exp" id="an_permis_exp" value="<?php echo date("Y" ,$d2); ?>" />
				<input type="text" size="10" maxlength="10" name="permis_exp" id="permis_exp" disabled value="<?php echo $permis_exp; ?>"/>

				<a onclick="ShowCal('permis_exp', 'zi_permis_exp', 'luna_permis_exp', 'an_permis_exp', 'calend_permis_exp'); return false;">
					<img style="border:none" src="images/calendar.gif" /></a>
				<a onclick="nuare('permis_exp')">&nbsp;&nbsp;
					<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
			</div>
		</td></tr>




		<tr><td align="left" height="35">
			<div style="float:left; margin-left:25px"> 
				<strong>Aviz psihologic: </strong>
			</div>
			<div style="float:right; margin-right:70px">
				<input type="hidden" size="2" maxlength="2" name="zi_psihologic_exp" id="zi_psihologic_exp" value="<?php echo date("d" ,$d3); ?>" />
				<input type="hidden" size="2" maxlength="2" name="luna_psihologic_exp" id="luna_psihologic_exp" value="<?php echo date("m" ,$d3); ?>" />
				<input type="hidden" size="4" maxlength="4" name="an_psihologic_exp" id="an_psihologic_exp" value="<?php echo date("Y" ,$d3); ?>" />
				<input type="text" size="10" maxlength="10" name="psihologic_exp" id="psihologic_exp" disabled value="<?php echo $psihologic_exp; ?>"/>

				<a onclick="ShowCal('psihologic_exp', 'zi_psihologic_exp', 'luna_psihologic_exp', 'an_psihologic_exp', 'calend_psihologic_exp'); return false;">
					<img style="border:none" src="images/calendar.gif" /></a>
				<a onclick="nuare('psihologic_exp')">&nbsp;&nbsp;
					<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
			</div>
		</td></tr>




		<tr><td align="left" height="35">
			<div style="float:left; margin-left:25px"> 
				<strong>Analize medicale: </strong>
			</div>
			<div style="float:right; margin-right:70px">
				<input type="hidden" size="2" maxlength="2" name="zi_medicale_exp" id="zi_medicale_exp" value="<?php echo date("d" ,$d4); ?>" />
				<input type="hidden" size="2" maxlength="2" name="luna_medicale_exp" id="luna_medicale_exp" value="<?php echo date("m" ,$d4); ?>" />
				<input type="hidden" size="4" maxlength="4" name="an_medicale_exp" id="an_medicale_exp" value="<?php echo date("Y" ,$d4); ?>" />
				<input type="text" size="10" maxlength="10" name="medicale_exp" id="medicale_exp" disabled value="<?php echo $medicale_exp; ?>"/>

				<a onclick="ShowCal('medicale_exp', 'zi_medicale_exp', 'luna_medicale_exp', 'an_medicale_exp', 'calend_medicale_exp'); return false;">
					<img style="border:none" src="images/calendar.gif" /></a>
				<a onclick="nuare('medicale_exp')">&nbsp;&nbsp;
					<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
			</div>
		</td></tr>



		<tr><td align="left" height="35">
			<div style="float:left; margin-left:25px"> 
				<strong>Atestat: </strong>
				<input type="text" size="10" placeholder="categorii" maxlength="15" name="atestat_categorii" id="atestat_categorii" value="<?php echo $atestat_categorii; ?>"/>
			</div>
			<div style="float:right; margin-right:70px">
				<input type="hidden" size="2" maxlength="2" name="zi_atestat_exp" id="zi_atestat_exp" value="<?php echo date("d" ,$d5); ?>" />
				<input type="hidden" size="2" maxlength="2" name="luna_atestat_exp" id="luna_atestat_exp" value="<?php echo date("m" ,$d5); ?>" />
				<input type="hidden" size="4" maxlength="4" name="an_atestat_exp" id="an_atestat_exp" value="<?php echo date("Y" ,$d5); ?>" />
				<input type="text" size="10" maxlength="10" name="atestat_exp" id="atestat_exp" disabled value="<?php echo $atestat_exp; ?>"/>

				<a onclick="ShowCal('atestat_exp', 'zi_atestat_exp', 'luna_atestat_exp', 'an_atestat_exp', 'calend_atestat_exp'); return false;">
					<img style="border:none" src="images/calendar.gif" /></a>
				<a onclick="nuare('atestat_exp')">&nbsp;&nbsp;
					<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
			</div>
		</td></tr>




		<tr><td align="left" height="35">
			<div style="float:left; margin-left:25px"> 
				<strong>Card tahograf: </strong>
			</div>
			<div style="float:right; margin-right:70px">
				data expirarii: &nbsp;&nbsp;&nbsp;
				<input type="hidden" size="2" maxlength="2" name="zi_tahograf_exp" id="zi_tahograf_exp" value="<?php echo date("d" ,$d6); ?>" />
				<input type="hidden" size="2" maxlength="2" name="luna_tahograf_exp" id="luna_tahograf_exp" value="<?php echo date("m" ,$d6); ?>" />
				<input type="hidden" size="4" maxlength="4" name="an_tahograf_exp" id="an_tahograf_exp" value="<?php echo date("Y" ,$d6); ?>" />
				<input type="text" size="10" maxlength="10" name="tahograf_exp" id="tahograf_exp" disabled value="<?php echo $tahograf_exp; ?>"/>

				<a onclick="ShowCal('tahograf_exp', 'zi_tahograf_exp', 'luna_tahograf_exp', 'an_tahograf_exp', 'calend_tahograf_exp'); return false;">
					<img style="border:none" src="images/calendar.gif" /></a>
				<a onclick="nuare('tahograf_exp')">&nbsp;&nbsp;
					<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>

				<br />
				data descarcarii: 
				<input type="hidden" size="2" maxlength="2" name="zi_tahograf_desc" id="zi_tahograf_desc" value="<?php echo date("d" ,$d7); ?>" />
				<input type="hidden" size="2" maxlength="2" name="luna_tahograf_desc" id="luna_tahograf_desc" value="<?php echo date("m" ,$d7); ?>" />
				<input type="hidden" size="4" maxlength="4" name="an_tahograf_desc" id="an_tahograf_desc" value="<?php echo date("Y" ,$d7); ?>" />
				<input type="text" size="10" maxlength="10" name="tahograf_desc" id="tahograf_desc" disabled value="<?php echo $tahograf_desc; ?>"/>

				<a onclick="ShowCal('tahograf_desc', 'zi_tahograf_desc', 'luna_tahograf_desc', 'an_tahograf_desc', 'calend_tahograf_desc'); return false;">
					<img style="border:none" src="images/calendar.gif" /></a>
				<a onclick="nuare('tahograf_desc')">&nbsp;&nbsp;
					<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
			</div>
		</td></tr>




		<tr><td align="left" height="35">
			<div style="float:left; margin-left:25px"> 
				<strong>Legitimatie: </strong>
				<input type="text" size="10" placeholder="numar" maxlength="15" name="legitimatie_numar" id="legitimatie_numar" value="<?php echo $legitimatie_numar; ?>"/>
			</div>
			<div style="float:right; margin-right:70px">
				<input type="hidden" size="2" maxlength="2" name="zi_legitimatie_exp" id="zi_legitimatie_exp" value="<?php echo date("d" ,$d8); ?>" />
				<input type="hidden" size="2" maxlength="2" name="luna_legitimatie_exp" id="luna_legitimatie_exp" value="<?php echo date("m" ,$d8); ?>" />
				<input type="hidden" size="4" maxlength="4" name="an_legitimatie_exp" id="an_legitimatie_exp" value="<?php echo date("Y" ,$d8); ?>" />
				<input type="text" size="10" maxlength="10" name="legitimatie_exp" id="legitimatie_exp" disabled value="<?php echo $legitimatie_exp; ?>"/>

				<a onclick="ShowCal('legitimatie_exp', 'zi_legitimatie_exp', 'luna_legitimatie_exp', 'an_legitimatie_exp', 'calend_legitimatie_exp'); return false;">
					<img style="border:none" src="images/calendar.gif" /></a>
				<a onclick="nuare('legitimatie_exp')">&nbsp;&nbsp;
					<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
			</div>
		</td></tr>
	</table>

	<table>
		<tr>
			<td>
				<input type="button" class="style1" onclick="adaugare();" value="Salvare">                
			</td>
		</tr>
	</table>

</form>
</center>

<center>

<?php
if ($_SESSION['user']==1){

	/*echo $indice;*/
	// include "conexiune.php";
	// $sql=mysql_query("SELECT * FROM revizii");
	// $randuri=0;
	// while ($row=mysql_fetch_row($sql)) 
	// { 
	// 	$randuri=$randuri+1; 
	// }
	
	// mysql_close($conexiune);

	include "perioade_notificari.php";
	include "conexiune.php";

	$sql=mysql_query("SELECT * FROM avize_soferi WHERE id_sofer='$indice'");
	echo '<table border=1 cellpadding="5" cellspacing="0">';
	echo "<tr>
		<td> Nume </td>
		<td> CI </td>
		<td> Permis de Conducere </td>
		<td> Aviz Psihologic </td>
		<td> Analize medicale </td>
		<td> Atestat </td>
		<td> Tahograf - d. expirarii </td>
		<td> Tahograf - d. descarcarii </td>
		<td> Legitimatie </td>
	</tr>";

	require "dataazi.php";
	$expira=0;
	$i=1;

	echo '<tr bgcolor="#cfe4e9" >';
	
	echo '<td id="field_0_'.$i.'" align="center" ';
	echo ' value="'.$nume.'" >'.$nume.'</td>';


	echo '<td align="center">';
	if (($d1-$dataazi_sec) <= $notificare_ci_exp)
	{
		$expira=1;
		echo "<font color='#ff0000'>";
	}	
	echo $ci_exp;
	if ($expira==1){ echo '</font>'; }	
	echo '</td>';



	echo '<td align="center">';
	if (($d2-$dataazi_sec) <= $notificare_permis_exp)
	{
		$expira=1;
		echo "<font color='#ff0000'>";
	}	
	echo $permis_exp;
	if ($expira==1){ echo '</font>'; }	
	echo '</td>';



	echo '<td align="center">';
	if (($d3-$dataazi_sec) <= $notificare_psihologic_exp)
	{
		$expira=1;
		echo "<font color='#ff0000'>";
	}	
	echo $psihologic_exp;
	if ($expira==1){ echo '</font>'; }	
	echo '</td>';



	echo '<td align="center">';
	if (($d4-$dataazi_sec) <= $notificare_medicale_exp)
	{
		$expira=1;
		echo "<font color='#ff0000'>";
	}	
	echo $medicale_exp;
	if ($expira==1){ echo '</font>'; }	
	echo '</td>';



	echo '<td align="center">';
	if (($d5-$dataazi_sec) <= $notificare_atestat_exp)
	{
		$expira=1;
		echo "<font color='#ff0000'>";
	}	
	echo $atestat_exp;
	if ($expira==1){ echo '</font>'; }	
	echo '</td>';



	echo '<td align="center">';
	if (($d6-$dataazi_sec) <= $notificare_tahograf_exp)
	{
		$expira=1;
		echo "<font color='#ff0000'>";
	}	
	echo $tahograf_exp;
	if ($expira==1){ echo '</font>'; }	
	echo '</td>';



	echo '<td align="center">';
	if (($d7-$dataazi_sec) <= $notificare_tahograf_desc)
	{
		$expira=1;
		echo "<font color='#ff0000'>";
	}	
	echo $tahograf_desc;
	if ($expira==1){ echo '</font>'; }	
	echo '</td>';



	echo '<td align="center">';
	if (($d8-$dataazi_sec) <= $notificare_legitimatie_exp)
	{
		$expira=1;
		echo "<font color='#ff0000'>";
	}	
	echo $legitimatie_exp;
	if ($expira==1){ echo '</font>'; }	
	echo '</td>';

	echo '
	';

	echo "</table>";
	echo "<br><br>";
	

	$i=$i+1;
	mysql_close($conexiune);
}
?>
</center>

<iframe scrolling="no" frameborder="0" id="calend_ci_exp1"
style="position:absolute;  top:12%; left:68%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_ci_exp" style="display:none; position:absolute; top:12%; left:68% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_permis_exp1"
style="position:absolute;  top:12%; left:68%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_permis_exp" style="display:none; position:absolute; top:12%; left:68% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_psihologic_exp1"
style="position:absolute;  top:12%; left:68%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_psihologic_exp" style="display:none; position:absolute; top:12%; left:68% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_medicale_exp1"
style="position:absolute;  top:12%; left:68%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_medicale_exp" style="display:none; position:absolute; top:12%; left:68% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_atestat_exp1"
style="position:absolute;  top:12%; left:68%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_atestat_exp" style="display:none; position:absolute; top:12%; left:68% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_tahograf_exp1"
style="position:absolute;  top:12%; left:68%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_tahograf_exp" style="display:none; position:absolute; top:12%; left:68% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_tahograf_desc1"
style="position:absolute;  top:12%; left:68%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_tahograf_desc" style="display:none; position:absolute; top:12%; left:68% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_legitimatie_exp1"
style="position:absolute;  top:12%; left:68%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_legitimatie_exp" style="display:none; position:absolute; top:12%; left:68% ;z-index:100"></div>

</body>
</html>
