<?
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Preturi curse internationale</title>

<script language="javascript">
function adaugare(){
          var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("tara").value == ""){gol=1; msg=msg+"tara";}
		  if (document.getElementById("dus_eur").value == ""){gol=1; msg=msg+" ,pretul dus";}
  		  if (document.getElementById("intors_eur_n").value == ""){gol=1; msg=msg+" ,pretul intors";}
		  if (document.getElementById("dus_int").value == ""){gol=1; msg=msg+" ,dus/intors";}
		  /* alert ("mesaj"); */
          if(gol==0){
          document.getElementById("OPERATIE").value="AD";
          document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function stergere(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("tara").value == ""){gol=1; msg=msg+"tara";}
		  if (document.getElementById("dus_eur").value == ""){gol=1; msg=msg+" ,pretul dus";}
  		  if (document.getElementById("intors_eur_n").value == ""){gol=1; msg=msg+" ,pretul intors";}
		  if (document.getElementById("dus_int").value == ""){gol=1; msg=msg+" ,dus/intors";}
          if(gol==0){
          document.getElementById("OPERATIE").value="STRG";
          document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function modificare(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("tara").value == ""){gol=1; msg=msg+"tara";}
		  if (document.getElementById("dus_eur").value == ""){gol=1; msg=msg+" ,pretul dus";}
  		  if (document.getElementById("intors_eur_n").value == ""){gol=1; msg=msg+" ,pretul intors";}
		  if (document.getElementById("dus_int").value == ""){gol=1; msg=msg+" ,dus/intors";}
          if(gol==0){
          document.getElementById("OPERATIE").value="MOD";
          document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function line_click(val_i){
  		  document.getElementById("indice").value=document.getElementById("field_0_"+val_i).value;
  		  document.getElementById("tara").value=document.getElementById("field_1_"+val_i).value;
          document.getElementById("dus_eur").value=document.getElementById("field_2_"+val_i).value;
          document.getElementById("intors_eur_n").value=document.getElementById("field_3_"+val_i).value;
		  document.getElementById("dus_int").value=document.getElementById("field_4_"+val_i).value;
		  document.getElementById("var").value=document.getElementById("field_5_"+val_i).value;
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
         }
       else{
	      document.getElementById("field_0_"+i).bgColor="#33dddd";
          document.getElementById("field_1_"+i).bgColor="#33dddd";
          document.getElementById("field_2_"+i).bgColor="#33dddd";
		  document.getElementById("field_3_"+i).bgColor="#33dddd";
  		  document.getElementById("field_4_"+i).bgColor="#33dddd";
		  document.getElementById("field_5_"+i).bgColor="#33dddd";
		  document.getElementById("field_6_"+i).bgColor="#33dddd";
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
   }
}
function slct_tara(){
document.getElementById("tara").value=document.getElementById("slct_tar").value;
}

</script>
<style type="text/css">
<!--
.style2 {font-size: 20px}
.style3 {font-weight: bold}
-->
</style>
</head> 
<body bgcolor="#cfe4e9" >
<center>

<?php
if ($_SESSION['user']==1){

	$tara='';
	$indice=$_GET['indice'];
	if ($indice!=0){
					$qstat="select all * from pret_cursa where indice='$indice'";
					include "conexiune.php";
					$rqt = mysql_query($qstat);
					if ($rqt) {
							  $camy = mysql_fetch_array($rqt,MYSQL_ASSOC );
							  $tara=$camy["tara"];
							  $dus_eur=$camy["dus_eur"];
							  $intors_eur_n=$camy["intors_eur_n"];
							  $intors_eur_v=$camy["intors_eur_v"];
							  $dus_int=$camy["dus_int"];
							  $var=$camy["var"];
							 }
					}else {
			$tara='';
			$dus_eur='';
			$intors_eur_n='';
			$intors_eur_v='';
			$dus_int='';
			$var='';
	}
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="AD"){
			include "conexiune.php";
			$tara=$_POST['tara'];
			$dus_eur=$_POST['dus_eur'];
			$intors_eur_n=$_POST['intors_eur_n'];
			$intors_eur_v=$_POST['intors_eur_v'];
			$dus_int=$_POST['dus_int'];
			$indice=$_POST['indice'];
			$var=$_POST['var'];
	
			$sql=mysql_query("DELETE FROM pret_cursa WHERE tara='$tara' && dus_eur='$dus_eur' && intors_eur_n='$intors_eur_n' && intors_eur_v='$intors_eur_v' && dus_int='$dus_int' && var='$var' ");
			if (!$sql) {
			die(mysql_error());
					}
			$query="INSERT INTO pret_cursa (tara, dus_eur, intors_eur_n, intors_eur_v, dus_int, var) VALUES ('$tara', '$dus_eur', '$intors_eur_n', '$intors_eur_v', '$dus_int', '$var')";
			if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=pret_cursa.php?indice=0"/>';
			};
			
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="STRG"){
			include "conexiune.php";
					$tara=$_POST['tara'];
					$dus_eur=$_POST['dus_eur'];
					$intors_eur_n=$_POST['intors_eur_n'];
					$intors_eur_v=$_POST['intors_eur_v'];
					$dus_int=$_POST['dus_int'];
					$indice=$_POST['indice'];
					$var=$_POST['var'];
					
			$sql=mysql_query("DELETE FROM pret_cursa WHERE tara='$tara' && dus_eur='$dus_eur' && intors_eur_n='$intors_eur_n' && intors_eur_v='$intors_eur_v' && dus_int='$dus_int' && var='$var'");
			if (!$sql) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=pret_cursa.php?indice=0"/>';
					};
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="MOD"){
			include "conexiune.php";
			$tara=$_POST['tara'];
			$dus_eur=$_POST['dus_eur'];
			$intors_eur_n=$_POST['intors_eur_n'];
			$intors_eur_v=$_POST['intors_eur_v'];
			$dus_int=$_POST['dus_int'];
			$tara_vechi=$_POST['tara_vechi'];
			$dus_eur_vechi=$_POST['dus_eur_vechi'];
			$intors_eur_n_vechi=$_POST['intors_eur_n_vechi'];
			$intors_eur_v_vechi=$_POST['intors_eur_v_vechi'];
			$dus_int_vechi=$_POST['dus_int_vechi'];
			$var=$_POST['var'];
			$var_vechi=$_POST['var_vechi'];
			$indice=$_POST['indice'];
		   $query="UPDATE pret_cursa SET tara='$tara', dus_eur='$dus_eur', intors_eur_n='$intors_eur_n', intors_eur_v='$intors_eur_v', dus_int='$dus_int', var='$var' WHERE indice='$indice'";
			if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=pret_cursa.php?indice=0"/>';
	
			};
} else {echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
}			

?>
<a href="index.php" class="style2 style3"><font size="+1" color="#000000">&lt;&nbsp;Inapoi</font></a> 

<br /><br />
<form action="" method="post" name="Form1" id="Form1">
<input type="hidden" id="OPERATIE" name="OPERATIE" value="">
<!--<input type="hidden" id="indice_vechi" name="indice_vechi" value="">-->
<input type="hidden" id="tara_vechi" name="tara_vechi" value="">
<input type="hidden" id="dus_eur_vechi" name="dus_eur_vechi" value="">
<input type="hidden" id="intors_eur_n_vechi" name="intors_eur_n_vechi" value="">
<input type="hidden" id="intors_eur_v_vechi" name="intors_eur_v_vechi" value="">
<input type="hidden" id="dus_int_vechi" name="dus_int_vechi" value="">
<input type="hidden" id="var" name="var" value="">
<input type="hidden" id="var_vechi" name="var_vechi" value="">
<input type="hidden" id="indice" name="indice" value="<? echo $indice; ?>">

<table>
		<tr>
             <td width="140" align="left"><strong>Tara:</strong> 
             <input type="hidden" name="tara"  size="1"maxlength="1" value="<? echo $tara; ?>"/>
			 </td>
			 <td width="241" align="left">
				<select name='slct_tar' id='slct_tar' onchange='slct_tara();'>
						 <option selected value='<? echo $tara; ?>'><? if ($tara=='A'){echo 'Anglia';}; if ($tara=='S'){echo 'Spania';}; if ($tara=='I'){echo 'Italia';}; ?></option>
						 <option value='A'>Anglia</option> 
						 <option value='S'>Spania</option>
						 <option value='I'>Italia</option>
				</select>
			</td> 
			   
        </tr>
         <tr>
                <td width="140" align="left"><strong>Dus (euro):</strong> </td>
           <td width="241" align="left"><input type="text"  size="8" name="dus_eur" maxlength="8" value="<? echo $dus_eur; ?>"></td>
        </tr>
		<tr>
                <td width="140" align="left"><strong>Intors client nou:</strong> </td>
           <td width="241" align="left"><input type="text"  size="8" name="intors_eur_n" maxlength="8" value="<? echo $intors_eur_n; ?>" ></td>
        </tr>
		<tr>
                <td width="140" align="left"><strong>Intors client vechi:</strong> </td>
           <td width="241" align="left"><input type="text"  size="8" name="intors_eur_v" maxlength="8" value="<? echo $intors_eur_v; ?>" ></td>
        </tr>
         <tr>
                <td width="140" align="left"><strong>Dus/intors (euro):</strong> </td>
           <td width="241" align="left"><input type="text"  size="8" name="dus_int" maxlength="8" value="<? echo $dus_int; ?>"></td>
        </tr>
		  <tr>
                <td width="140" align="left"><strong>Varianta pret (euro):</strong> </td>
           <td width="241" align="left"><input type="text"  size="8" name="var" maxlength="8" value="<? echo $var; ?>"></td>
        </tr>
</table>
<table>
        <tr>
                <td>
                <input type="button" value="Adaugare" onclick="adaugare();">                </td>
                <td>
                <input type="button" value="Stergere" onclick="stergere();">                </td>
                <td>
                <input type="button" value="Modificare" onclick="modificare();">                </td>
        </tr>
</table>
</form>
<p>

<?
if ($_SESSION['user']==1){

	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM pret_cursa");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	 
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM pret_cursa order by indice");
	echo "<table border=1>";
	echo "<tr><td><b>indice</b></td><td><b>tara</b></td><td><b>DUS (EUR)</b></td><td><b>INTORS client nou (EUR)</b></td><td><b>INTORS client vechi (EUR)</b></td><td><b> D/I(6 luni)(EUR)</b></td><td><b>Varianta pret</b></td></tr>";
	
	$i=1;
	while ($row=mysql_fetch_array($sql)) {
					$indice=$row["indice"];
					$tara=$row["tara"];
					$dus_eur=$row["dus_eur"];
					$intors_eur_n=$row["intors_eur_n"];
					$intors_eur_v=$row["intors_eur_v"];
					$dus_int=$row["dus_int"];
					$var=$row["var"];
							echo '<tr bgcolor="#cfe4e9"> ';
							echo '<td id="field_0_'.$i.'" align="center" ';
							echo ' value="'.$indice.'" ><a href="pret_cursa.php?indice='.$indice.'">'.$indice.'</a></td>';
							echo '<td id="field_1_'.$i.'" align="center" ';
							echo ' value="'.$tara.'" >'.$tara.'</td>';
							echo '<td id="field_2_'.$i.'" align="center" ';
							echo ' value="'.$dus_eur.'" >'.$dus_eur.'</td>';
							echo '<td id="field_3_'.$i.'" align="center" ';
							echo ' value="'.$intors_eur_n.'" >'.$intors_eur_n.'</td>';
							echo '<td id="field_4_'.$i.'" align="center" ';
							echo ' value="'.$intors_eur_v.'" >'.$intors_eur_v.'</td>';
							echo '<td id="field_5_'.$i.'" align="center" ';
							echo ' value="'.$dus_int.'" >'.$dus_int.'</td>';
							echo '<td id="field_5_'.$i.'" align="center" ';
							echo ' value="'.$var.'" >'.$var.'</td>';
							echo '
							';
							$i=$i+1;
	}
	echo "</table>";
	mysql_close($conexiune);
	echo '<a href ="pret_cursa.php"</a>'; 
}  
?>

</p>
<br /><br />
</center>
</body>
</html>