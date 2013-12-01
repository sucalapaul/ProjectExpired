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
document.getElementById("exp_"+camy).value="nu are";
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

<center><a href="<?php if (isset($_GET['trim'])){echo $_GET['trim'];} else {echo 'masini.php?indice=0';} ?>" class="style2 style3 style1"><font size="+1" color="#000000">&lt;&nbsp;Inapoi</font></a>
</center>
<br />
<br />

<?php
if ($_SESSION['user']==1){

$indice=$_GET['indice'];

if ($indice!=0){
$qrev="select all * from revizii where id_masina='$indice'";
include "conexiune.php";
$rqt = mysql_query($qrev);
if ($rqt) {
$camy = mysql_fetch_array($rqt,MYSQL_ASSOC );
$id_masina=$camy["id_masina"];
$exp_itp=$camy["exp_itp"];
$exp_tah=$camy["exp_tah"];
$exp_larm=$camy["exp_larm"];
$exp_rca=$camy["exp_rca"];
$exp_cas=$camy["exp_cas"];
$exp_lic=$camy["exp_lic"];
$exp_itpi=$camy["exp_itpi"];
$exp_a=$camy["exp_a"];
$exp_rovi=$camy["exp_rovi"];
$seria_casco=$camy["seria_casco"];
$societatea=$camy["societatea"];
$leasing=$camy["leasing"];
/*	$clasi=$camy["clasificare"];*/
$d1= strtotime($exp_itp);
$exp_itp = date("d/m/Y" ,$d1);
$d2= strtotime($exp_tah);
$exp_tah = date("d/m/Y" ,$d2);
$d3= strtotime($exp_larm);
$exp_larm = date("d/m/Y" ,$d3);
$d4= strtotime($exp_rca);
$exp_rca = date("d/m/Y" ,$d4);
$d5=strtotime($exp_cas);
$exp_cas = date("d/m/Y" ,$d5);
$d6= strtotime($exp_lic);
$exp_lic = date("d/m/Y" ,$d6);
$d7= strtotime($exp_itpi);
$exp_itpi = date("d/m/Y" ,$d7);					
$d8= strtotime($leasing);
$leasing = date("d/m/Y" ,$d8);					
$d9= strtotime($exp_a);
$exp_a = date("d/m/Y" ,$d9);
$d10= strtotime($exp_rovi);
$exp_rovi= date("d/m/Y" ,$d10);										

if ($d1<944000000){$exp_itp="neprecizat";};
if ($d2<944000000){$exp_tah="neprecizat";};
if ($d3<944000000){$exp_larm="neprecizat";};
if ($d4<944000000){$exp_rca="neprecizat";};
if ($d5<944000000){$exp_cas="neprecizat";};
if ($d6<944000000){$exp_lic="neprecizat";};
if ($d7<944000000){$exp_itpi="neprecizat";};
if ($d8<944000000){$leasing="neprecizat";};
if ($d9<944000000){$exp_a="neprecizat";};
if ($d10<944000000){$exp_rovi="neprecizat";};

if ($d1>2100000000){$exp_itp="nu are";};
if ($d2>2100000000){$exp_tah="nu are";};
if ($d3>2100000000){$exp_larm="nu are";};
if ($d4>2100000000){$exp_rca="nu are";};
if ($d5>2100000000){$exp_cas="nu are";};
if ($d6>2100000000){$exp_lic="nu are";};
if ($d7>2100000000){$exp_itpi="nu are";};
if ($d8>2100000000){$leasing="nu are";};
if ($d9>2100000000){$exp_a="nu are";};
if ($d10>2100000000){$exp_rovi="nu are";};
if ($seria_casco==""){$seria_casco="neprecizat";};
if ($societatea==""){$societatea="neprecizat";};
}
} else {
$id_masina='';
$exp_itp='';
$exp_tah='';
$exp_larm='';
$exp_rca='';
$exp_cas='';
$exp_lic='';
$exp_itpi='';					
$exp_a='';
$exp_rovi='';					
$leasing='';
$seria_casco=''; 
$societatea='';  
} 

$qnr_inm="select all * from masini where indice='$indice'";
include "conexiune.php";
$rqnr = mysql_query($qnr_inm);
if ($rqnr) {
$rrqnr = mysql_fetch_array($rqnr,MYSQL_ASSOC );
$nr_inmatric=$rrqnr["nr_inmatric"];
};

if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="AD"){
include "conexiune.php";
$exp_itp1=$_POST['an_itp'].'-'.$_POST['luna_itp'].'-'.$_POST['zi_itp'];
$exp_tah1=$_POST['an_tah'].'-'.$_POST['luna_tah'].'-'.$_POST['zi_tah'];
$exp_larm1=$_POST['an_larm'].'-'.$_POST['luna_larm'].'-'.$_POST['zi_larm'];
$exp_rca1=$_POST['an_rca'].'-'.$_POST['luna_rca'].'-'.$_POST['zi_rca'];
$exp_cas1=$_POST['an_cas'].'-'.$_POST['luna_cas'].'-'.$_POST['zi_cas'];
$exp_lic1=$_POST['an_lic'].'-'.$_POST['luna_lic'].'-'.$_POST['zi_lic'];
$exp_itpi1=$_POST['an_itpi'].'-'.$_POST['luna_itpi'].'-'.$_POST['zi_itpi'];			
$exp_a1=$_POST['an_a'].'-'.$_POST['luna_a'].'-'.$_POST['zi_a'];
$exp_rovi1=$_POST['an_rovi'].'-'.$_POST['luna_rovi'].'-'.$_POST['zi_rovi'];			
$leasing1=$_POST['an_leasing'].'-'.$_POST['luna_leasing'].'-'.$_POST['zi_leasing'];
$seria_casco=$_POST['seria_casco'];
$societatea=$_POST['societatea'];
/*	$clasi=$_POST['clasi'];*/

if ($exp_itp1=="--"){$exp_itp1="2036-7-22";};
if ($exp_tah1=="--"){$exp_tah1="2036-7-22";};
if ($exp_larm1=="--"){$exp_larm1="2036-7-22";};
if ($exp_rca1=="--"){$exp_rca1="2036-7-22";};
if ($exp_cas1=="--"){$exp_cas1="2036-7-22";};
if ($exp_lic1=="--"){$exp_lic1="2036-7-22";};
if ($exp_itpi1=="--"){$exp_itpi1="2036-7-22";};			
if ($exp_a1=="--"){$exp_a1="2036-7-22";};
if ($exp_rovi1=="--"){$exp_rovi1="2036-7-22";};			
if ($leasing1=="--"){$leasing1="2036-7-22";};
if ($seria_casco==""){$seria_casco="neprecizat";};
if ($societatea==""){$societatea="neprecizat";};

$sql=mysql_query("DELETE FROM revizii WHERE id_masina='$indice'");
if (!$sql) {
die(mysql_error());
}
$query="INSERT INTO revizii (id_masina, exp_itp, exp_tah, exp_larm, exp_rca, exp_cas, exp_lic, exp_itpi, seria_casco, societatea, leasing, exp_a, exp_rovi) VALUES ('$indice', '$exp_itp1', '$exp_tah1', '$exp_larm1', '$exp_rca1', '$exp_cas1', '$exp_lic1', '$exp_itpi1', '$seria_casco', '$societatea', '$leasing1', '$exp_a1', '$exp_rovi1')";

if (!mysql_query($query)) {
die(mysql_error());
} else {/*echo 'a mers';*/}
mysql_close($conexiune); 
include "verifica_revizii.php";
echo '<center><font size="+5" color="#ff0000">ASTEAPTA!!!</font></center>';
echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=revizii_c.php?indice='.$indice.'"/>';
};
} else {echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
}			

?>

<center>

<form action="" method="post" name="Form1" id="Form1">
<input type="hidden" id="OPERATIE" name="OPERATIE" value="">
<input type="hidden" id="exp_itp_vechi" name="exp_itp_vechi" value="">
<input type="hidden" id="exp_tah_vechi" name="exp_tah_vechi" value="">
<input type="hidden" id="exp_larm_vechi" name="exp_larm_vechi" value="">
<input type="hidden" id="exp_rca_vechi" name="exp_rca_vechi" value="">
<input type="hidden" id="exp_cas_vechi" name="exp_cas_vechi" value="">
<input type="hidden" id="exp_lic_vechi" name="exp_lic_vechi" value="">
<input type="hidden" id="exp_itpi_vechi" name="exp_itpi_vechi" value="">
<input type="hidden" id="exp_a_vechi" name="exp_a_vechi" value="">
<input type="hidden" id="exp_rovi_vechi" name="exp_rovi_vechi" value="">
<input type="hidden" id="seria_casco_vechi" name="seria_casco_vechi" value="">
<input type="hidden" id="societatea_vechi" name="societatea_vechi" value="">


<table width="600" border="1" cellpadding="0">
<tr><td  align="center" height="35"><strong><span class="style3"><em>Numar inmatriculare masina:</em></span> <?php echo $nr_inmatric; ?> </strong>
</td></tr>
<tr><td align="left" height="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Data expirarii ITP :</strong>
<input type="hidden" size="2" maxlength="2" name="zi_itp" id="zi_itp" value="<?php echo date("d" ,$d1); ?>" />
<input type="hidden" size="2" maxlength="2" name="luna_itp" id="luna_itp"  value="<?php echo date("m" ,$d1); ?>" />
<input type="hidden" size="4" maxlength="4" name="an_itp" id="an_itp"   value="<?php echo date("Y" ,$d1); ?>" />
<input type="text" size="10" maxlength="10" name="exp_itp" id="exp_itp" disabled value="<?php echo $exp_itp; ?>"/>
<!--<input type="text" size="10" maxlength="10" name="exp_itp" id="exp_itp" disabled /> -->

<a onclick="ShowCal('exp_itp', 'zi_itp', 'luna_itp', 'an_itp', 'calend_itp'); return false;"><img style="border:none" src="images/calendar.gif" /></a><a onclick="nuare('itp')">&nbsp;&nbsp;<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
</td></tr>
<tr><td align="left" height="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Data expirarii tahograf :</strong>
<input type="hidden" size="2" maxlength="2" name="zi_tah" id="zi_tah" value="<?php echo date("d" ,$d2); ?>" />
<input type="hidden" size="2" maxlength="2" name="luna_tah" id="luna_tah" value="<?php echo date("m" ,$d2); ?>" />
<input type="hidden" size="4" maxlength="4" name="an_tah" id="an_tah" value="<?php echo date("Y" ,$d2); ?>" />
<!--  <input type="text" size="10" maxlength="10" name="exp_tah" id="exp_tah" disabled value="<?php echo $exp_tah; ?>"/>-->
<input type="text" size="10" maxlength="10" name="exp_tah" id="exp_tah" disabled value="<?php echo $exp_tah; ?>"/>
<a onclick="ShowCal('exp_tah', 'zi_tah', 'luna_tah', 'an_tah', 'calend_tah'); return false;"><img style="border:none" src="images/calendar.gif" /></a><a onclick="nuare('tah')">&nbsp;&nbsp;<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
</td></tr>


<tr><td align="left" height="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Data expirarii LARM :</strong>
<input type="hidden" size="2" maxlength="2" name="zi_larm" id="zi_larm" value="<?php echo date("d" ,$d3); ?>" />
<input type="hidden" size="2" maxlength="2" name="luna_larm" id="luna_larm" value="<?php echo date("m" ,$d3); ?>" />
<input type="hidden" size="4" maxlength="4" name="an_larm" id="an_larm" value="<?php echo date("Y" ,$d3); ?>" />
<!--  <input type="text" size="10" maxlength="10" name="exp_larm" id="exp_larm" disabled value="<?php echo $exp_larm; ?>"/>-->
<input type="text" size="10" maxlength="10" name="exp_larm" id="exp_larm" disabled value="<?php echo $exp_larm; ?>"/>
<a onclick="ShowCal('exp_larm', 'zi_larm', 'luna_larm', 'an_larm', 'calend_larm'); return false;"><img style="border:none" src="images/calendar.gif" /></a><a onclick="nuare('larm')">&nbsp;&nbsp;<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>  

<!--			  clasificare
<input type="hidden" id="clasi" name="clasi" value="">
<select name='slct_cls' id='slct_cls' onchange='slct_clas();'>
<option selected value= <?php echo $clasi.'>'.$clasi; ?> </option>
<option value='1 stea'>1 stea</option>
<option value='2 stele'>2 stele</option>
<option value='3 stele'>3 stele</option>
<option value='4 stele'>4 stele</option>
<option value='cat I'>cat I</option>
<option value='cat II'>cat II</option>
<option value='cat II'>cat III</option>
<option value='cat IV'>cat IV</option>
</select> -->
</td>
</tr>
<tr><td align="left" height="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Data expirarii rca :</strong>
<input type="hidden" size="2" maxlength="2" name="zi_rca" id="zi_rca" value="<?php echo date("d" ,$d4); ?>" />
<input type="hidden" size="2" maxlength="2" name="luna_rca" id="luna_rca" value="<?php echo date("m" ,$d4); ?>" />
<input type="hidden" size="4" maxlength="4" name="an_rca" id="an_rca" value="<?php echo date("Y" ,$d4); ?>" />
<!--   <input type="text" size="10" maxlength="10" name="exp_rca" id="exp_rca" disabled value="<?php echo $exp_rca; ?>"/>-->
<input type="text" size="10" maxlength="10" name="exp_rca" id="exp_rca" disabled value="<?php echo $exp_rca; ?>"/>
<a onclick="ShowCal('exp_rca', 'zi_rca', 'luna_rca', 'an_rca', 'calend_rca'); return false;"><img style="border:none" src="images/calendar.gif" /></a><a onclick="nuare('rca')">&nbsp;&nbsp;<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
</td></tr>

<tr><td align="left" height="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Data expirarii casco :</strong>
<input type="hidden" size="2" maxlength="2" name="zi_cas" id="zi_cas" value="<?php echo date("d" ,$d5); ?>" />
<input type="hidden" size="2" maxlength="2" name="luna_cas" id="luna_cas" value="<?php echo date("m" ,$d5); ?>" />
<input type="hidden" size="4" maxlength="4" name="an_cas" id="an_cas" value="<?php echo date("Y" ,$d5); ?>" />
<!--   <input type="text" size="10" maxlength="10" name="exp_cas" id="exp_cas" disabled value="<?php echo $exp_cas; ?>"/>-->
<input type="text" size="10" maxlength="10" name="exp_cas" id="exp_cas" disabled value="<?php echo $exp_cas; ?>"/>
<a onclick="ShowCal('exp_cas', 'zi_cas', 'luna_cas', 'an_cas', 'calend_cas'); return false;"><img style="border:none" src="images/calendar.gif" /></a><a onclick="nuare('cas')">&nbsp;&nbsp;<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
</td></tr>
<tr><td align="left" height="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Data expirarii licenta :</strong>
<input type="hidden" size="2" maxlength="2" name="zi_lic" id="zi_lic" value="<?php echo date("d" ,$d6); ?>" />
<input type="hidden" size="2" maxlength="2" name="luna_lic" id="luna_lic" value="<?php echo date("m" ,$d6); ?>" />
<input type="hidden" size="4" maxlength="4" name="an_lic" id="an_lic" value="<?php echo date("Y" ,$d6); ?>" />
<!--   <input type="text" size="10" maxlength="10" name="exp_lic" id="exp_lic" disabled value="<?php echo $exp_lic; ?>"/>-->
<input type="text" size="10" maxlength="10" name="exp_lic" id="exp_lic" disabled value="<?php echo $exp_lic; ?>"/>
<a onclick="ShowCal('exp_lic', 'zi_lic', 'luna_lic', 'an_lic', 'calend_lic'); return false;"><img style="border:none" src="images/calendar.gif" /></a><a onclick="nuare('lic')">&nbsp;&nbsp;<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
</td></tr>
<tr><td align="left" height="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Data expirarii ITPI :</strong>
<input type="hidden" size="2" maxlength="2" name="zi_itpi" id="zi_itpi" value="<?php echo date("d" ,$d7); ?>" />
<input type="hidden" size="2" maxlength="2" name="luna_itpi" id="luna_itpi"  value="<?php echo date("m" ,$d7); ?>" />
<input type="hidden" size="4" maxlength="4" name="an_itpi" id="an_itpi"   value="<?php echo date("Y" ,$d7); ?>" />
<input type="text" size="10" maxlength="10" name="exp_itpi" id="exp_itpi" disabled value="<?php echo $exp_itpi; ?>"/>
<!--<input type="text" size="10" maxlength="10" name="exp_itp" id="exp_itp" disabled /> -->

<a onclick="ShowCal('exp_itpi', 'zi_itpi', 'luna_itpi', 'an_itpi', 'calend_itpi'); return false;"><img style="border:none" src="images/calendar.gif" /></a><a onclick="nuare('itpi')">&nbsp;&nbsp;<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
</td></tr>	




<tr><td align="left" height="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Durata contract leasing:</strong>
<input type="hidden" size="2" maxlength="2" name="zi_leasing" id="zi_leasing" value="<?php echo date("d" ,$d8); ?>" />
<input type="hidden" size="2" maxlength="2" name="luna_leasing" id="luna_leasing"  value="<?php echo date("m" ,$d8); ?>" />
<input type="hidden" size="4" maxlength="4" name="an_leasing" id="an_leasing"   value="<?php echo date("Y" ,$d8); ?>" />
<input type="text" size="10" maxlength="10" name="exp_leasing" id="exp_leasing" disabled value="<?php echo $leasing; ?>"/>
<!--<input type="text" size="10" maxlength="10" name="exp_itp" id="exp_itp" disabled /> -->

<a onclick="ShowCal('exp_leasing', 'zi_leasing', 'luna_leasing', 'an_leasing', 'calend_leasing'); return false;"><img style="border:none" src="images/calendar.gif" /></a><a onclick="nuare('leasing')">&nbsp;&nbsp;<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
</td></tr>




<tr><td align="left" height="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Data expirarii "A" :</strong>
<input type="hidden" size="2" maxlength="2" name="zi_a" id="zi_a" value="<?php echo date("d" ,$d4); ?>" />
<input type="hidden" size="2" maxlength="2" name="luna_a" id="luna_a" value="<?php echo date("m" ,$d4); ?>" />
<input type="hidden" size="4" maxlength="4" name="an_a" id="an_a" value="<?php echo date("Y" ,$d4); ?>" />
<!--   <input type="text" size="10" maxlength="10" name="exp_a" id="exp_a" disabled value="<?php echo $exp_a; ?>"/>-->
<input type="text" size="10" maxlength="10" name="exp_a" id="exp_a" disabled value="<?php echo $exp_a; ?>"/>
<a onclick="ShowCal('exp_a', 'zi_a', 'luna_a', 'an_a', 'calend_a'); return false;"><img style="border:none" src="images/calendar.gif" /></a><a onclick="nuare('a')">&nbsp;&nbsp;<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
</td></tr>






<tr><td align="left" height="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Data expirarii rovigneta :</strong>
<input type="hidden" size="2" maxlength="2" name="zi_rovi" id="zi_rovi" value="<?php echo date("d" ,$d4); ?>" />
<input type="hidden" size="2" maxlength="2" name="luna_rovi" id="luna_rovi" value="<?php echo date("m" ,$d4); ?>" />
<input type="hidden" size="4" maxlength="4" name="an_rovi" id="an_rovi" value="<?php echo date("Y" ,$d4); ?>" />
<!--   <input type="text" size="10" maxlength="10" name="exp_rovi" id="exp_rovi" disabled value="<?php echo $exp_rovi; ?>"/>-->
<input type="text" size="10" maxlength="10" name="exp_rovi" id="exp_rovi" disabled value="<?php echo $exp_rovi; ?>"/>
<a onclick="ShowCal('exp_rovi', 'zi_rovi', 'luna_rovi', 'an_rovi', 'calend_rovi'); return false;"><img style="border:none" src="images/calendar.gif" /></a><a onclick="nuare('rovi')">&nbsp;&nbsp;<img src="images/buton_nu_are.jpg" style="cursor:pointer" /></a>
</td></tr>



<tr><td align="left" height="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Seria casco :</strong>
<input type="text" size="10" maxlength="10" name="seria_casco" id="seria_casco"  value="<?php echo $seria_casco; ?>"/>
</td></tr>	
<tr><td align="left" height="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Societatea de asigurari :</strong>
<input type="text" size="15" maxlength="15" name="societatea" id="societatea"  value="<?php echo $societatea; ?>"/>
</td></tr>	








</table>

<table>
<tr>
<td>
<input type="button" class="style1" onclick="adaugare();" value="Salvare">                </td>
</tr>
</table>

</form>
</center>

<center>

<?php
if ($_SESSION['user']==1){

/*echo $indice;*/
include "conexiune.php";
$sql=mysql_query("SELECT * FROM revizii");
$randuri=0;
while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
mysql_close($conexiune);

include "conexiune.php";
$sql=mysql_query("SELECT * FROM revizii WHERE id_masina='$indice'");
echo '<table border=1 cellpadding="1" cellspacing="0">';
echo "<tr><td>Nr.inmatric.</td><td>Data exp. ITP</td><td>Data exp. tahograf</td><td>Data exp. LARM</td><td>Data exp. RCA</td><td>Data exp. casco</td><td>Data exp. licenta</td><td>Data exp. ITPI</td><td>Exp A</td><td>Exp rovigneta</td><td>Seria casco</td><td>Societatea de asigurari</td><td>Durata contr. leasing</td></tr>";
require "dataazi.php";
$expira=0;
$i=1;
echo '<tr bgcolor="#cfe4e9" >';
echo '<td id="field_0_'.$i.'" align="center" ';
echo ' value="'.$nr_inmatric.'" >'.$nr_inmatric.'</td>';
echo '<td align="center">';
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

/*		echo '<td align="center">'.$clasi.'</td>';*/


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



echo '<td id="field_17_'.$i.'" align="center" value="'.$exp_a.'" >';
if (($d9-$dataazi_sec)<=864000)
{$expira=1;
echo "<font color='#ff0000'>";
}	
echo $exp_a;
if ($expira==1){echo '</font>';}
echo '</td>';

echo '<td id="field_27_'.$i.'" align="center" value="'.$exp_rovi.'" >';
if (($d10-$dataazi_sec)<=864000)
{$expira=1;
echo "<font color='#ff0000'>";
}	
echo $exp_rovi;
if ($expira==1){echo '</font>';}
echo '</td>';



echo '<td id="field_8_'.$i.'" align="left" ';
echo ' value="'.$seria_casco.'" >'.$seria_casco.'</td>';
echo '<td id="field_9_'.$i.'" align="left" ';
echo ' value="'.$societatea.'" >'.$societatea.'</td>';

echo '<td id="field_10_'.$i.'" align="left" ';
echo ' value="'.$leasing.'" >'.$leasing.'</td>';

echo '
';
$i=$i+1;/*
}*/
echo "</table>";
mysql_close($conexiune);
}
?>
</center>
<iframe scrolling="no" frameborder="0" id="calend_itp1"
style="position:absolute;  top:12%; left:52%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_itp" style="display:none; position:absolute; top:12%; left:52% ;z-index:100"></div>
<iframe scrolling="no" frameborder="0" id="calend_tah1"

style="position:absolute;  top:17%; left:52%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_tah" style="display:none; position:absolute; top:17%; left:52% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_larm1"
style="position:absolute;  top:22%; left:52%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_larm" style="display:none; position:absolute; top:22%; left:52% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_rca1"
style="position:absolute;  top:25%; left:52%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_rca" style="display:none; position:absolute; top:25%; left:52% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_cas1"
style="position:absolute;  top:30%; left:52%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_cas" style="display:none; position:absolute; top:30%; left:52% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_lic1"
style="position:absolute;  top:35%; left:52%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_lic" style="display:none; position:absolute; top:35%; left:52% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_itpi1"
style="position:absolute;  top:40%; left:52%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_itpi" style="display:none; position:absolute; top:40%; left:52% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_a1"
style="position:absolute;  top:40%; left:52%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_a" style="display:none; position:absolute; top:40%; left:52% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_rovi1"
style="position:absolute;  top:40%; left:52%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_rovi" style="display:none; position:absolute; top:40%; left:52% ;z-index:100"></div>


<iframe scrolling="no" frameborder="0" id="calend_leasing1"
style="position:absolute;  top:40%; left:52%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_leasing" style="display:none; position:absolute; top:40%; left:52% ;z-index:100"></div>
</body>
</html>
