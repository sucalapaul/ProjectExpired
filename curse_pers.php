<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Completare Curse de persoane</title>

<script language="javascript">
function adaugare(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("id_pi").value == ""){gol=1; msg=msg+"Punct initial, ";}
          if (document.getElementById("id_pf").value == ""){gol=1; msg=msg+"Punct final,";}
          if (document.getElementById("tip_c").value == ""){gol=1; msg=msg+" Tip cursa ";}
		  if (document.getElementById("nr_cursa").value == ""){gol=1; msg=msg+" Numar cursa ";}
          if(gol==0){
          document.getElementById("OPERATIE").value="AD";
          document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function stergere(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("id_pi").value == ""){gol=1; msg=msg+"Punct initial, ";}
          if (document.getElementById("id_pf").value == ""){gol=1; msg=msg+"Punct final,";}
          if (document.getElementById("tip_c").value == ""){gol=1; msg=msg+" Tip cursa ";}
	      if (document.getElementById("nr_cursa").value == ""){gol=1; msg=msg+" Numar cursa ";}
          if(gol==0){
          document.getElementById("OPERATIE").value="STRG";
          document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function modificare(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("id_pi").value == ""){gol=1; msg=msg+"Punct initial, ";}
          if (document.getElementById("id_pf").value == ""){gol=1; msg=msg+"Punct final,";}
          if (document.getElementById("tip_c").value == ""){gol=1; msg=msg+" Tip cursa";}
	      if (document.getElementById("nr_cursa").value == ""){gol=1; msg=msg+" Numar cursa ";}

          if(gol==0){
          document.getElementById("OPERATIE").value="MOD";
          document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function line_click(val_i){
          document.getElementById("id_pi").value=document.getElementById("field_2_"+val_i).value;
          document.getElementById("id_pf").value=document.getElementById("field_3_"+val_i).value;
          document.getElementById("tip_c").value=document.getElementById("field_4_"+val_i).value;
          document.getElementById("nr_cursa").value=document.getElementById("field_5_"+val_i).value;
          document.getElementById("id_pi_vechi").value=document.getElementById("field_2_"+val_i).value;
          document.getElementById("id_pf_vechi").value=document.getElementById("field_3_"+val_i).value;
          document.getElementById("tip_c_vechi").value=document.getElementById("field_4_"+val_i).value;
	      document.getElementById("nr_cursa_vechi").value=document.getElementById("field_5_"+val_i).value;
		  document.getElementById("indice").value=document.getElementById("field_1_"+val_i).value;
}

function line_sel(selectata, randuri){
   for(i=1; i<=randuri; i=i+1){
       if(i!=selectata){
          document.getElementById("field_1_"+i).bgColor="#cfe4e9";
          document.getElementById("field_2_"+i).bgColor="#cfe4e9";
          document.getElementById("field_3_"+i).bgColor="#cfe4e9";
          document.getElementById("field_4_"+i).bgColor="#cfe4e9";
		  document.getElementById("field_5_"+i).bgColor="#cfe4e9";
		  document.getElementById("field_6_"+i).bgColor="#cfe4e9";
       }
       else{
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
   		  document.getElementById("field_1_"+i).bgColor="#cfe4e9";
 	      document.getElementById("field_2_"+i).bgColor="#cfe4e9";
      	  document.getElementById("field_3_"+i).bgColor="#cfe4e9";
      	  document.getElementById("field_4_"+i).bgColor="#cfe4e9";
		  document.getElementById("field_5_"+i).bgColor="#cfe4e9";
		  document.getElementById("field_6_"+i).bgColor="#cfe4e9";
   }
}
function slct_ctg(){
document.getElementById("tip_c").value=document.getElementById("slct_cat").value;
}
function slct_statiai(){
  document.getElementById("id_pi").value=document.getElementById("slct_stati").value;
}
function slct_statiaf(){
  document.getElementById("id_pf").value=document.getElementById("slct_statf").value;
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

	$tip_c='';
	$indice=$_GET['indice'];
	if ($indice!=0){
					$qstat="select all * from curse_pers where indice='$indice'";
					include "conexiune.php";
					$rqt = mysql_query($qstat);
					if ($rqt) {
							  $camy = mysql_fetch_array($rqt,MYSQL_ASSOC );
							  $id_pi=$camy["id_pi"];
							  $id_pf=$camy["id_pf"];
							  $tip_c=$camy["tip_c"];
							  $nr_cursa=$camy["nr_cursa"];
							 }
					
							 $qstati="select all * from denstatii where indice='$id_pi'";
							 include "conexiune.php";
							 $rqt = mysql_query($qstati);
							 if ($rqt) {
								  $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
								  $statie_deni=$rrqt["denumire"];
									 }
							 $qstatf="select all * from denstatii where indice='$id_pf'";
							 include "conexiune.php";
							 $rqt = mysql_query($qstatf);
							 if ($rqt) {
								 $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
								 $statie_denf=$rrqt["denumire"];
							}
	} else {
			$id_pi='';
			$id_pf='';
			$tip_cc='';
			$nr_cursa='';
	}
	
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="AD"){
			include "conexiune.php";
			$id_pi=$_POST['id_pi'];
			$id_pf=$_POST['id_pf'];
			$tip_c=$_POST['tip_c'];
			$nr_cursa=$_POST['nr_cursa'];
			$indice=$_POST['indice'];
			
			$sql=mysql_query("DELETE FROM curse_pers WHERE id_pi='$id_pi' && id_pf='$id_pf' && nr_cursa='$nr_cursa'");
			if (!$sql) {
			die(mysql_error());
					}
			$query="INSERT INTO curse_pers (id_pi, id_pf, tip_c, nr_cursa) VALUES ('$id_pi','$id_pf', '$tip_c', '$nr_cursa')";
			if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
	
	
		include "conexiune.php";
			$id_piv=$_POST['id_pf'];
			$id_pfv=$_POST['id_pi'];
			$tip_c=$_POST['tip_c'];
			$indice=$_POST['indice'];
			$nr_cursa=$_POST['nr_cursa'];
			 $sql=mysql_query("DELETE FROM curse_pers WHERE id_pi='$id_piv' && id_pf='$id_pfv' && nr_cursa='$nr_cursa' ");
			if (!$sql) {
			die(mysql_error());
					}
			$query="INSERT INTO curse_pers (id_pi, id_pf,  tip_c, nr_cursa) VALUES ('$id_piv','$id_pfv', '$tip_c', '$nr_cursa')";
			if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
			
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=curse_pers.php?indice=0"/>';
			
			};
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="STRG"){
			include "conexiune.php";
					$id_pi=$_POST['id_pi'];
					$id_pf=$_POST['id_pf'];
					$tip_c=$_POST['tip_c'];
					$nr_cursa=$_POST['nr_cursa'];
					$indice=$_POST['indice'];
	
			$sql=mysql_query("DELETE FROM curse_pers WHERE id_pi='$id_pi' && id_pf='$id_pf' && nr_cursa='$nr_cursa'");
			if (!$sql) {
			die(mysql_error());
					} else {}
			
			$sql=mysql_query("DELETE FROM curse_pers WHERE id_pi='$id_pf' && id_pf='$id_pi' && nr_cursa='$nr_cursa'");
					if (!$sql) {
					die(mysql_error());
							} else {}
					mysql_close($conexiune);
					};
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="MOD"){
			include "conexiune.php";
			$id_pi_vechi=$_POST['id_pi_vechi'];
			$id_pf_vechi=$_POST['id_pf_vechi'];
			$tip_c_vechi=$_POST['tip_c_vechi'];
			$nr_cursa_vechi=$_POST['nr_cursa_vechi'];
			$indice=$_POST['indice'];
			$id_pi=$_POST['id_pi'];
			$id_pf=$_POST['id_pf'];
			$tip_c=$_POST['tip_c'];
			$nr_cursa=$_POST['nr_cursa'];
		  
			$query="UPDATE curse_pers SET id_pi='$id_pi', id_pf='$id_pf', tip_c='$tip_c', nr_cursa='$nr_cursa' WHERE id_pi='$id_pi_vechi' && id_pf='$id_pf_vechi' && nr_cursa='$nr_cursa_vechi'";
			if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
			include "conexiune.php";
			$query="UPDATE curse_pers SET id_pi='$id_pf', id_pf='$id_pi', tip_c='$tip_c', nr_cursa='$nr_cursa' WHERE id_pf='$id_pi_vechi' && id_pi='$id_pf_vechi' && nr_cursa='$nr_cursa_vechi'";
			if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
	
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=curse_pers.php?indice=0"/>';
	
			};
} else {echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
}			
?>

<a href="index.php" class="style2 style3"><font size="+1" color="#000000">&lt;&nbsp;Inapoi</font></a> 

<br /><br />
<form action="" method="post" name="Form1" id="Form1">
<input type="hidden" id="OPERATIE" name="OPERATIE" value="">
<input type="hidden" id="indice_vechi" name="indice_vechi" value="">
<input type="hidden" id="id_pi_vechi" name="id_pi_vechi" value="<?php echo $id_pi; ?>">
<input type="hidden" id="id_pf_vechi" name="id_pf_vechi" value="<?php echo $id_pf; ?>">
<input type="hidden" id="tip_c_vechi" name="tip_c_vechi" value="">
<input type="hidden" id="nr_cursa_vechi" name="nr_cursa_vechi" value="<?php echo $nr_cursa;?>">
<input type="hidden" id="indice" name="indice" value="">
<table>
         <tr>
                <td ><strong>Punct initial:</strong>
<?php
if ($_SESSION['user']==1){

		require "array_statii.php";$nr_statii=$i-1;
		echo "<select name='slct_stati' id='slct_stati'";
		echo " onchange='slct_statiai();'>";
		echo "<option selected value='".$id_pi."'>".$statie_deni."</option>";
		for($i=1;$i<=$nr_statii;$i++){
				echo "<option value='$statia_i[$i]'>$statia_den[$i]</option>";
				echo "
				";
				}
				echo "</select>";
}
?>
               <input type="hidden" size="3" maxlength="3" name="id_pi" id="id_pi" value="<?php echo $id_pi; ?>" />  
		 </td>	  
        </tr>

        <tr>
                <td height=""><strong>Punct final:&nbsp;&nbsp;</strong> 
<?php
if ($_SESSION['user']==1){

		require "array_statii.php";$nr_statii=$i-1;
		echo "<select name='slct_statf' id='slct_statf'";
		echo " onchange='slct_statiaf();'>";
		echo "<option selected value='".$id_pf."'>".$statie_denf."</option>";
		for($i=1;$i<=$nr_statii;$i++){
				echo "<option value='$statia_i[$i]'>$statia_den[$i]</option>";
				echo "
				";
				}
				echo "</select>";
}
?>
               <input type="hidden" size="3" maxlength="3" name="id_pf" id="id_pf" value="<?php echo $id_pf; ?>"/>  
		  </td>
        </tr>
		<tr>
		  <td><strong>Tip cursa:</strong>
				<input type="hidden" name="tip_c"  size="1"maxlength="1" value="<?php echo $tip_c; ?>"/>
                        <select name='slct_cat' id='slct_cat' onchange='slct_ctg();'>
                                 <option selected value='<?php echo $tip_c; ?>'><?php if ($tip_c=='E'){echo 'Internationala';}; if ($tip_c=='I'){echo 'Interna';}; ?></option>
                                 <option value='I'>Interna</option> 
                                 <option value='E'>Internationala</option>
                        </select>
				</td>
		</tr> 
		<tr>
                <td height=""><strong>Numar cursa:</strong>
                <input type="text" size="2" name="nr_cursa" maxlength="2" value="<?php echo $nr_cursa;?>"></td>
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
<?php
if ($_SESSION['user']==1){

	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM curse_pers");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM curse_pers order by indice desc");
	echo "<table border=1>";
	echo "<tr><td><b>indice</b></td><td><b>punct initial</b></td><td><b>punct final</b></td><td><b>tip cursa</b></td><td><b>Nr.cursa</b></td><td><b>completare/vizualizare statii</b></td></tr>";
	
	$i=1;
	while ($row=mysql_fetch_array($sql)) {
					$indice=$row["indice"];
					$id_pi=$row["id_pi"];
						$qstatie="select all * from denstatii where indice='$id_pi'";
						include "conexiune.php";
						$rqt = mysql_query($qstatie);
							if ($rqt) {
								$rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
								$statie_deni=$rrqt["denumire"];
							}	
					$id_pf=$row["id_pf"];
						$qstatie="select all * from denstatii where indice='$id_pf'";
						include "conexiune.php";
						$rqt = mysql_query($qstatie);
							if ($rqt) {
								$rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
								$statie_denf=$rrqt["denumire"];
							}	
					$tip_c=$row["tip_c"];
					$nr_cursa=$row["nr_cursa"];
					
									echo '<tr bgcolor="#cfe4e9">';
									echo '<td id="field_1_'.$i.'" align="center" ';
									echo ' value="'.$indice.'" ><a href="curse_pers.php?indice='.$indice.'">'.$indice.'</a></td>';
									echo '<td id="field_2_'.$i.'" align="left" ';
									echo ' value="'.$statie_deni.'" >'.$statie_deni.'</td>';
									echo '<td id="field_3_'.$i.'" align="left" ';
									echo ' value="'.$statie_denf.'" >'.$statie_denf.'</td>';
									echo '<td id="field_4_'.$i.'" align="center" ';
									echo ' value="'.$tip_c.'" >'.$tip_c.'</td>';
									echo '<td id="field_5_'.$i.'" align="center" ';
									echo ' value="'.$nr_cursa.'" >'.$nr_cursa.'</center></td>';
									echo '<td id="field_6_'.$i.'" align="center">';
									echo '<a href="statii_pers.php?id_c='.$row[0].'"><font color="#0000ff">click aici</font></a>';
				   $i=$i+1;
	}
	echo "</table>";
	mysql_close($conexiune);
	
	echo '<a href ="statii_pers.php"</a>';
}
?>
</p>
<br /><br />
</center>
</body>
</html>