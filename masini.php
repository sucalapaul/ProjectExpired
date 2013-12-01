<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actualizare tabela masini</title>

<script language="javascript">

function adaugare(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("nr_inmatric").value == ""){gol=1; msg=msg+"numar inmatriculare, ";}
          if (document.getElementById("categoria").value == ""){gol=1; msg=msg+"categoria, ";}
                  if (document.getElementById("id_tip_auto").value == ""){gol=1; msg=msg+"id_tip_auto, ";}
                  if (document.getElementById("tarif").value == ""){gol=1; msg=msg+"tarif, ";}
                  if (document.getElementById("val_diurna").value == ""){gol=1; msg=msg+"val_diurna, ";}
                  if (document.getElementById("klmtj_inreg").value == ""){gol=1; msg=msg+"kilometraj la inregistrare, ";}
                  if (document.getElementById("cons_spec").value == ""){gol=1; msg=msg+"consumul specific, ";}
              if(gol==0){
                       document.getElementById("OPERATIE").value="AD";
                    document.getElementById("Form1").submit();
        } else {msg=msg+"!"; alert(msg);}
}

function stergere(){
		document.getElementById("OPERATIE").value="STG";
		document.getElementById("Form1").submit();
}

function rifresh(){
		document.getElementById("OPERATIE").value="";
		document.getElementById("Form1").submit();
}

function modificare(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("nr_inmatric").value == ""){gol=1; msg=msg+"numar inmatriculare, ";}
                  if (document.getElementById("tarif").value == ""){gol=1; msg=msg+"tarif, ";}
                  if (document.getElementById("val_diurna").value == ""){gol=1; msg=msg+"val_diurna, ";}
                  if (document.getElementById("klmtj_inreg").value == ""){gol=1; msg=msg+"kilometraj la inregistrare, ";}
                  if (document.getElementById("cons_spec").value == ""){gol=1; msg=msg+"consumul specific, ";}
          if(gol==0){
        document.getElementById("OPERATIE").value="MOD";
            document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function slct_tip_auto(){
  document.getElementById("id_tip_auto").value=document.getElementById("slct_tipa").value;
}

function line_click(val_i){
         document.getElementById("nr_inmatric").value=document.getElementById("field_1_"+val_i).value;
         document.getElementById("categoria").value=document.getElementById("field_2_"+val_i).value;
         document.getElementById("id_tip_auto").value=document.getElementById("field_3_"+val_i).value;
         document.getElementById("tarif").value=document.getElementById("field_4_"+val_i).value;
         document.getElementById("val_diurna").value=document.getElementById("field_5_"+val_i).value;
         document.getElementById("klmtj_inreg").value=document.getElementById("field_6_"+val_i).value;
         document.getElementById("cons_spec").value=document.getElementById("field_7_"+val_i).value;
         document.getElementById("nr_inmatric_vechi").value=document.getElementById("field_1_"+val_i).value;
         document.getElementById("tarif_vechi").value=document.getElementById("field_4_"+val_i).value;
         document.getElementById("val_diurna_vechi").value=document.getElementById("field_5_"+val_i).value;
         document.getElementById("klmtj_inreg_vechi").value=document.getElementById("field_6_"+val_i).value;
         document.getElementById("cons_spec_vechi").value=document.getElementById("field_7_"+val_i).value;
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
   }
}

function slct_ctg(){
document.getElementById("categoria").value=document.getElementById("slct_cat").value;
}

function slct_firma(){
document.getElementById("firma").value=document.getElementById("slct_firm").value;
}

function err(){
alert ("SADFASDFAS");
}

function nimic(srt){
	document.getElementById("sortez").value=srt;
	document.getElementById("form1").submit();
}
function slct_clas(){
document.getElementById("clasi").value=document.getElementById("slct_cls").value;
}
</script>

<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {font-weight: bold}
.style3 {font-weight: bold}
-->

</style>
</head>

<body bgcolor="#cfe4e9">

<center><a href="index.php" class="style2 style3 style1"><font size="+1" color="#000000">&lt;&nbsp;Inapoi</font></a>
</center>

<?php
if ($_SESSION['user']==1)
{
	$indice=(isset($_GET['indice']) ? $_GET['indice'] : "" );
	$categoria=(isset($_GET['catg']) ? $_GET['catg'] : "" );
	if ($categoria!='marfa')
		$categoria='persoane';
	
	$denumire = "";
	if ($indice!=0)
	{
		$qtip_au="select all * from masini where indice='$indice'";
		include "conexiune.php";
		$rqt = mysql_query($qtip_au);
		if ($rqt) 
		{
			$camy = mysql_fetch_array($rqt,MYSQL_ASSOC );
			$categoria=$camy["categoria"];
			$id_auto=$camy["id_tip_auto"];
			$nr_inmatric=$camy["nr_inmatric"];
			$tarif=$camy["tarif"];
			$val_diurna=$camy["val_diurna"];
			$klmtj_inreg=$camy["klmtj_inreg"];
			$cons_spec=$camy["cons_spec"];
			$firma=$camy['firma'];
			$an_fabr=$camy['an_fabr'];
			$clasi=$camy["clasificare"];
		}
		$qtip_au="select all * from tip_auto where indice='$id_auto'";
		include "conexiune.php";
		$rqt = mysql_query($qtip_au);
		if ($rqt) 
		{
			$rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
			$denumire=$rrqt["denumire"];
		}
	} else 
	{
		//$categoria='';
		$id_auto='';
		$nr_inmatric='';
		$tarif='';
		$val_diurna='';
		$klmtj_inreg='';
		$cons_spec='';
		$firma='';
		$an_fabr='';
		$clasi='';
	}

	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="AD")
	{
		include "conexiune.php";
		$nr_inmatric=$_POST['nr_inmatric'];
		$categoria=$_POST['categoria'];
		$id_tip_auto=$_POST['id_tip_auto'];
		$tarif=$_POST['tarif'];
		$val_diurna=$_POST['val_diurna'];
		$klmtj_inreg=$_POST['klmtj_inreg'];
		$cons_spec=$_POST['cons_spec'];
		$indice=$_POST['indice'];
		$firma=$_POST['firma'];
		$an_fabr=$_POST['an_fabr'];
		$clasi=$_POST['clasi'];

		include "conexiune.php";
		$sql=mysql_query("SELECT * FROM masini where nr_inmatric='$nr_inmatric'");
		$i=0;
		while ($row=mysql_fetch_array($sql)) {$i++;}
		if ($i>0)
		{
			echo '<script language="javascript">
			function err(){
			alert ("Masina a mai fost introdusa odata!");
			}
			err();
			</script>';
		} else 
		{  
			$query="INSERT INTO masini (nr_inmatric, categoria, id_tip_auto, tarif, val_diurna, klmtj_inreg, cons_spec, firma, an_fabr, clasificare) VALUES ('$nr_inmatric', '$categoria', '$id_tip_auto', '$tarif', '$val_diurna', '$klmtj_inreg', '$cons_spec', '$firma', '$an_fabr', '$clasi')";
			include "conexiune.php";
			if (!mysql_query($query)) 
			{
				die(mysql_error());
			} else {}
			mysql_close($conexiune);

			$query="select all * from masini where nr_inmatric='$nr_inmatric'";
			include "conexiune.php";
			$paul = mysql_query($query);
			if ($paul) 
			{
				$cami = mysql_fetch_array($paul,MYSQL_ASSOC );
				$indice=$cami["indice"];
			}

			$query="INSERT INTO revizii (id_masina, exp_itp, exp_tah, exp_cls, exp_rca, exp_cas, exp_lic, exp_itpi ) VALUES ('$indice', '0', '0', '0', '0', '0', '0', '0')";
			include "conexiune.php";
			if (!mysql_query($query)) 
			{
				die(mysql_error());
			} else {}
			mysql_close($conexiune);

		}
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=masini.php?indice=0"/>';
	};

	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="STG")
	{
		include "conexiune.php";
		$nr_inmatric=$_POST['nr_inmatric'];
		$ind2=$indice;
		$indice=$_POST['indice'];
		$query=("DELETE FROM masini WHERE indice='$ind2'");
		if (!mysql_query($query)) 
		{
			die(mysql_error());
		} else {}
		mysql_close($conexiune);
/*
		$query="select all * from masini where nr_inmatric='$nr_inmatric'";
		include "conexiune.php";
		$paul = mysql_query($query);
		if ($paul) 
		{
			$cami = mysql_fetch_array($paul,MYSQL_ASSOC );
			$indice=$cami["indice"];
		}
*/
		include "conexiune.php";
		$query=("DELETE FROM revizii WHERE id_masina='$ind2'");
		if (!mysql_query($query)) 
		{
			die(mysql_error());
		} else {}
		mysql_close($conexiune);

		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=masini.php?indice=0"/>';
	};

	/*if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="TR"){
	include "memorare.php";   };*/

	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="MOD")
	{
		include "conexiune.php";
		$nr_inmatric_vechi=$_POST['nr_inmatric_vechi'];
		$nr_inmatric=$_POST['nr_inmatric'];
		$categoria=$_POST['categoria'];
		$id_tip_auto=$_POST['id_tip_auto'];
		$tarif=$_POST['tarif'];
		$val_diurna=$_POST['val_diurna'];
		$klmtj_inreg=$_POST['klmtj_inreg'];
		$cons_spec=$_POST['cons_spec'];
		$firma=$_POST['firma'];
		$an_fabr=$_POST['an_fabr'];
		$clasi=$_POST['clasi'];

		$qmasina="select all * from masini where nr_inmatric='$nr_inmatric_vechi'";
		include "conexiune.php";
		$rqt = mysql_query($qmasina);
		if ($rqt) 
		{
			$rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
			$indice=$rrqt["indice"];
		}

		$query="UPDATE masini SET nr_inmatric='$nr_inmatric', categoria='$categoria', id_tip_auto='$id_tip_auto', tarif='$tarif', val_diurna='$val_diurna', klmtj_inreg='$klmtj_inreg', cons_spec='$cons_spec', firma='$firma', an_fabr='$an_fabr', clasificare='$clasi' WHERE indice='$indice'";
		if (!mysql_query($query)) 
		{
			die(mysql_error());
		} else 
		{
			/*echo 'o mers';
			echo $nr_inmatric.' '.$categoria.' '.$indice.'auygfu';*/
		}
		mysql_close($conexiune);
	};
} else 
	echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
			

?>

<form action="" method="post" name="Form1" id="Form1">
<input type="hidden" id="OPERATIE" name="OPERATIE" value=""  />
<input type="hidden" id="nr_inmatric_vechi" name="nr_inmatric_vechi" value="<?php echo $nr_inmatric; ?>"/>
<input type="hidden" id="categoria_vechi" name="categoria_vechi" value=""/>
<input type="hidden" id="id_tip_auto_vechi" name="id_tip_auto_vechi" value=""/>
<input type="hidden" id="tarif_vechi" name="tarif_vechi" value=""/>
<input type="hidden" id="val_diurna_vechi" name="val_diurna_vechi" value=""/>
<input type="hidden" id="klmtj_inreg_vechi" name="klmtj_inreg_vechi" value=""/>
<input type="hidden" id="cons_spec_vechi" name="cons_spec_vechi" value=""/>
<input type="hidden" id="firma_vechi" name="firma_vechi" value=""/>
<input type="hidden" id="an_fabr_vechi" name="an_fabr_vechi" value=""/>
<input type="hidden" id="clasificare" name="clasificare_vechi" value=""/>
<input type="hidden" id="indice" name="indice" value=""/>
<input type="hidden" id="sort" name="sort" value=""/>

<script language="javascript">
function sortare(){
	if(document.getElementById("sort").value==""){document.getElementById("sort").value="nr_inmatric"}
}
sortare();
</script>

<center>
<table border="1" cellpadding="0">
        <tr><td><table cellpadding="0"><tr><td height="35"><strong>Nr.inmatriculare </strong>&nbsp;&nbsp;&nbsp;
                          <input type="text" size="9" maxlength="9" name="nr_inmatric" id="nr_inmatric" value='<?php echo $nr_inmatric; ?>'/>&nbsp;
                                 
                                 <?php
                                 echo '<strong>Cat: '.$categoria.'&nbsp;&nbsp;</strong> ';
                                 if ($categoria=='marfa')
									echo '<a href="masini.php?indice=0&catg=persoane"><font size="-1">-schimba-</font></a>';
                                 else 
									echo '<a href="masini.php?indice=0&catg=marfa"><font size="-1">-schimba-</font></a>';
                                 ?>
                                 
                    <input type="hidden" size="10" maxlength="10" name="categoria" id="categoria" value="<?php echo $categoria; ?>" />
                        <!--select name='slct_cat' id='slct_cat' onchange='slct_ctg();'>
                                 <option selected value= <?php echo $categoria.'>'.$categoria; ?> </option>                                 
                                 <?/*
									if ($categoria=='marfa')
										echo "<option value='persoane'>persoane</option>";
									else
										echo "<option value='marfa'>marfa</option>";     
									*/                           
                                 ?>
                        </select-->
						
						<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma:</strong>
                    <input type="hidden" size="10" maxlength="10" name="firma" id="firma" value="<?php echo $firma; ?>" />
                    <select name='slct_firm' id='slct_firm' onchange='slct_firma();'>
                      <option selected value= <?php echo $firma.'>'.$firma; ?> </option>
                      <option value='CentoTrans'>CentoTrans</option>
                      <option value='CentoConstruct'>CentoConstruct</option>
                    </select>
                    <strong>&nbsp;&nbsp;&nbsp;An fabricatie: </strong>&nbsp;
                          <input type="text" size="4" maxlength="4" name="an_fabr" id="an_fabr" value='<?php echo $an_fabr; ?>'/>&nbsp;
						  
        </td></tr></table></td></tr>
        <tr><td align="left"><table cellpadding="0" >
         <tr> <td height="35" width="252" align="left"> <strong>Tipul:</strong>

 <?php
if ($_SESSION['user']==1){

include "verifica_revizii.php";
require "array_tipu_auto.php";$id_tip_auto=$i-1;
echo "<select name='slct_tipa' id='slct_tipa'";
echo " onchange='slct_tip_auto();'>";
echo $id_tip_auto;
echo "<option selected value='".$id_auto."'>".$denumire."</option>";
for($i=1;$i<=$id_tip_auto;$i++){
         echo "<option value='$tip_auto_i[$i]'>$tip_auto_den[$i]</option>";
         echo "
         ";
         }
         echo "</select>";
}
?>

<input type="hidden" id="id_tip_auto" name="id_tip_auto" value="<?php echo $id_auto; ?>"/>
        </td>
                 <td>
                  <strong>Tarif:<em>(pret de facturare) </em></strong>&nbsp;
                   <input type="text" size="10" maxlength="10" name="tarif" id="tarif" value="<?php echo $tarif;?>" />
                   <strong>Valoare diurna:<em>(val.plata sof/km)</em> </strong>&nbsp;
                   <input type="text" size="10" maxlength="10" name="val_diurna" id="val_diurna" value="<?php echo $val_diurna; ?>" />
    </td></tr></table></td></tr>
        <tr><td>
                <table><tr><td width="286" height="35" align="left"><strong>Kilometraj la inregistrare:</strong>
                  <input type="text" size="8" maxlength="8" name="klmtj_inreg" id="klmtj_inreg" value="<?php echo $klmtj_inreg; ?>" />
                  <em><strong> km</strong></em></td>
                <td width="487" align="left"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Consumul specific masinii:</strong>
                      <input type="text" size="5" maxlength="5" name="cons_spec" id="cons_spec" value="<?php echo $cons_spec; ?>" />
                 <em><strong>L/100 Km </strong></em> 
				  &nbsp;&nbsp;&nbsp; <strong>Clasificare</strong>
				  <input type="hidden" id="clasi" name="clasi" value="">
                    <select name='slct_cls' id='slct_cls' onchange='slct_clas();'>
                      <option selected value= <?php echo $clasi.'>'.$clasi; ?> </option>
                      <option value='1 stea'>1 stea</option>
                      <option value='2 stele'>2 stele</option>
                      <option value='3 stele'>3 stele</option>
                      <option value='4 stele'>4 stele</option>
                      <option value='cat I'>cat I</option>
                      <option value='cat II'>cat II</option>
                      <option value='cat III'>cat III</option>
                      <option value='cat IV'>cat IV</option>
                    </select> 
				 			 			 
				 
				 </td>
        </tr></table> </td></tr></table>

 <table>
        <tr>
                <td height="28">
          <input type="button" value="Adaugare" onclick="adaugare();">                </td>
                <td>
                <input type="button" value="Stergere" onclick="stergere();">                </td>
                <td>
                <input type="button" value="Modificare" onclick="modificare();">                </td>
        </tr>
</table>

<?php
if ($_SESSION['user']==1){

include "conexiune.php";
$sql=mysql_query("SELECT * FROM masini");
$randuri=0;
while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
        mysql_close($conexiune);
}
?>
<input type="hidden" id="sortez" name="sortez" />
 <?php
if ($_SESSION['user']==1){
	
include "conexiune.php";
if (isset($_GET['sort'])){
	$sort=$_GET['sort'];
	if (isset($_GET['ord'])){
		$ord=$_GET['ord'];
	} else {$ord='asc';}
} else {
	$sort="nr_inmatric";
	$ord='asc';
}

if ($sort=='indice'){
	if ($ord=='asc'){$img1='<img src="images/sageata_jos.jpg">'; $img2='';
	} else {$img1='<img src="images/sageata_sus.jpg">'; $img2='';
	}
}
if ($sort=='nr_inmatric'){
	if ($ord=='asc'){$img2='<img src="images/sageata_jos.jpg">'; $img1='';
	} else {$img2='<img src="images/sageata_sus.jpg">'; $img1='';
	}
}
if (isset($_POST['sortez'])){
	$sortez=$_POST['sortez'];
	if ($sortez=='indice'){
		if ($sort=='indice'){
			if ($ord=='asc'){$ord='desc';
			} 
			else {$ord='asc'; 
			}
		} 
		else {
		$sort='indice';
		$ord='asc';
		}
	}
	if ($sortez=='nr_inmatric'){
		if ($sort=='nr_inmatric'){
			if ($ord=='asc'){$ord='desc';
			} 
			else {$ord='asc'; 
			}
		} 
		else {
		$sort='nr_inmatric';
		$ord='asc';
		}
	}
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=masini.php?indice='.$indice.'&sort='.$sort.'&ord='.$ord.'"/>';
}

$fontu='<font color="#cf1616" style="cursor:pointer">';
$qu="SELECT * FROM masini WHERE categoria='".$categoria."' order by ".$sort.' '.$ord;
$sql=mysql_query($qu);

echo "<table border=1>";
echo "<tr><td>Nr.crt.</td><td><a onclick=\"nimic('indice')\">".$fontu."Indice ".$img1."</font></a></td><td><a onclick=\"nimic('nr_inmatric')\">".$fontu."Nr.inmatric ".$img2."</font></a></td><td>Firma</td><td>An fabr.</td><td>Clasificare</td><td>Categoria</td><td>Tipul</td><td>Tarif</td><td>Val. diurna</td><td>Kilometraj la inreg.</td><td>Consumul specific</td><td>Completare revizii</td></tr>";

$i=1;
$nrcrt=1;
while ($row=mysql_fetch_array($sql)) {
                                $indice=$row["indice"];
                                $nr_inmatric=$row["nr_inmatric"];
                                $categoria=$row["categoria"];
                                $id_tip_auto=$row["id_tip_auto"];
                                $tarif=$row["tarif"];
                                $val_diurna=$row["val_diurna"];
                                $klmtj_inreg=$row['klmtj_inreg'];
                                $cons_spec=$row['cons_spec'];
								$firma=$row['firma'];
								$an_fabr=$row['an_fabr'];
								$clasi=$row['clasificare'];

                                $qtip_au="select all * from tip_auto where indice='$id_tip_auto'";
                                include "conexiune.php";
                                $rqt = mysql_query($qtip_au);
                                if ($rqt) {
                                          $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
                                          $denumire=$rrqt["denumire"];
                                  }

                echo '<tr bgcolor="#cfe4e9">';

				echo '</td><td id="field_9_'.$i.'" align="left" ';
                echo ' value="'.$nrcrt.'" >'.$nrcrt.'</td>';
				
                echo '<td id="field_0_'.$i.'" align="left" ';
                echo ' value="'.$indice.'" ><a href="masini.php?indice='.$indice.'">'.$indice.'</a></td>';
                echo '<td id="field_1_'.$i.'" align="left" value="'.$nr_inmatric.'" >';

                                $expir="select * from revizii where id_masina='$indice'";
                                include "conexiune.php";
                                $rqt = mysql_query($expir);
                                if ($rqt) {
                                        $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
                                        $exp=$rrqt["exp"];
                                }


                echo $nr_inmatric;


                echo '</td><td id="field_22_'.$i.'" align="left" ';
                echo ' value="'.$firma.'" >'.$firma.'</td>';
				echo '</td><td id="field_23_'.$i.'" align="center" ';
                echo ' value="'.$an_fabr.'" >'.$an_fabr.'</td>';
				echo '</td><td id="field_24_'.$i.'" align="center" ';
                echo ' value="'.$clasi.'" >'.$clasi.'</td>';

                echo '</td><td id="field_2_'.$i.'" align="left" ';
                echo ' value="'.$categoria.'" >'.$categoria.'</td>';
                echo '<td id="field_3_'.$i.'" align="left" ';
                echo ' value="'.$id_tip_auto.'" >'.$denumire.'</td>';
                            echo '<td id="field_4_'.$i.'" align="left" ';
                echo ' value="'.$tarif.'" >'.$tarif.'</td>';
                                 echo '<td id="field_5_'.$i.'" align="right" ';
                echo ' value="'.$val_diurna.'" >'.$val_diurna.'</td>';
                                echo '<td id="field_6_'.$i.'" align="right" ';
                echo ' value="'.$klmtj_inreg.'" >'.$klmtj_inreg.'</td>';
                                echo '<td id="field_7_'.$i.'" align="right" ';
                echo ' value="'.$cons_spec.'" >'.$cons_spec.'</td>';
                                echo '<td id="field_8_'.$i.'" align="center">';	
					
					
				if  ($id_tip_auto==5 or $id_tip_auto==11)
				{
					echo '<a href = "revizii_c.php?indice='.$indice.'">';
				}
				else 
				{
					echo '<a href = "revizii.php?indice='.$indice.'">';
				}
					
				
				
                                if ($exp==1){echo '<font color="#ff0000">click aici</font>';}
                                        else {echo '<font color="#0000ff">click aici</font>';}
										
										
										
                echo '</a></td></tr>';

                $i=$i+1;
				$nrcrt=$nrcrt+1;
}
echo "</table>";
mysql_close($conexiune);
}
?>
</form>

</p>
<br /><br />
</body>
</html>
