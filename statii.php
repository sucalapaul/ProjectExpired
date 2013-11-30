<?
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Adaugare statii (curse din foi parcurs) </title>

<script language="javascript">

function adaugare(){
        var gol=0; msg="Nu ati selectat ";
        if (document.getElementById("id_cursa").value == ""){gol=1; msg=msg+"cursa ";}
                if(gol==0){
                    document.getElementById("OPERATIE").value="AD";
                    document.getElementById("Form1").submit();
        } else {msg=msg+"!"; alert(msg);}
}

function stergerePaul(){
          document.getElementById("OPERATIE").value="STG";
          document.getElementById("Form1").submit();
}

function stergere(){
           document.getElementById("OPERATIE").value="STG";
           document.getElementById("Form1").submit();
}

function line_sel(selectata, randuri){
        for(i=1; i<=randuri; i=i+1){
              if(i!=selectata){
                          document.getElementById("field_0_"+i).bgColor="#cfe4e9";
                            document.getElementById("field_1_"+i).bgColor="#cfe4e9";
                            document.getElementById("field_2_"+i).bgColor="#cfe4e9";
                            document.getElementById("field_3_"+i).bgColor="#cfe4e9";
         }
         else{
                          document.getElementById("field_0_"+i).bgColor="#33dddd";
                          document.getElementById("field_1_"+i).bgColor="#33dddd";
                          document.getElementById("field_2_"+i).bgColor="#33dddd";
                          document.getElementById("field_3_"+i).bgColor="#33dddd";
       }
   }
}

function line_unsel(randuri){
   for(i=1;i<=randuri;i=i+1){
       document.getElementById("field_0_"+i).bgColor="#cfe4e9";
       document.getElementById("field_1_"+i).bgColor="#cfe4e9";
       document.getElementById("field_2_"+i).bgColor="#cfe4e9";
       document.getElementById("field_3_"+i).bgColor="#cfe4e9";
   }
}

function line_clickpaul(val_i){
       document.getElementById("paul").value=document.getElementById("field_0_"+val_i).value;
       document.getElementById("statia").value=document.getElementById("field_1_"+val_i).value;
}

function line_click(val_i){
       document.getElementById("nrdoc").value=document.getElementById("field_0_"+val_i).value;
       document.getElementById("nrcursa").value=document.getElementById("field_1_"+val_i).value;
       document.getElementById("nrdoc_vechi").value=document.getElementById("field_0_"+val_i).value;
       document.getElementById("nrcursa_vechi").value=document.getElementById("field_1_"+val_i).value;
}

function slct_cursa(){
  document.getElementById("id_cursa").value=document.getElementById("slct_curs").value;
}

function slct_nr_curse(){
  document.getElementById("slct_nrcursa").value=document.getElementById("slct_nr_cursa").value;
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

<center><a href="foiparc.php?nr=0" class="style2 style3 style1"><font size="+1" color="#000000">&lt;&nbsp;Inapoi</font></a>
</center>

<?
if ($_SESSION['user']==1){

	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM foi_parc_pl");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
			mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM foi_parc_pl");
	while ($row=mysql_fetch_array($sql)) {$nrdoc=$row['nrdoc'];}
	mysql_close($conexiune);
	
	$nrdoc=$_GET['nrdoc'];
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM foi_parc_pl where nrdoc=$nrdoc");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	$nr_cursa=$randuri+1;
			
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="AD"){
			include "conexiune.php";
			$id_cursa=$_POST['id_cursa'];
			$slct_nrcursa=$_POST['slct_nrcursa'];
			$numar_cursa_ins=$slct_nrcursa;
			if ($slct_nrcursa!=0){
							include "conexiune.php";
							for($i=$randuri;$i>=$slct_nrcursa;$i--){
							$ii=$i+1;
							$query="UPDATE foi_parc_pl SET nrcursa='$ii' where nrdoc=$nrdoc && nrcursa=$i ;";
							if (!mysql_query($query)) {
									  die(mysql_error());
									  } else {}
						   }
						   
						   $query="INSERT INTO foi_parc_pl (nrdoc, nrcursa, id_cursa) VALUES ('$nrdoc', '$numar_cursa_ins', '$id_cursa')";
						   if (!mysql_query($query)) {
									die(mysql_error());
						   } else {}
									mysql_close($conexiune);
		   }  else {
					include "conexiune.php";
					$qcursa="select all * from curse where indice='$id_cursa'";
					$rqt = mysql_query($qcursa);
					if ($rqt) {
								$rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
								$dist_km=$rrqt["dist_km"];
					}
					$query="INSERT INTO foi_parc_pl (nrdoc, nrcursa, id_cursa) VALUES ('$nrdoc', '$nr_cursa', '$id_cursa')";
					if (!mysql_query($query)) {
						   die(mysql_error());
					} else {}
						  mysql_close($conexiune);
					}
	
					include "conexiune.php";
					$sql=mysql_query("SELECT * FROM foi_parc_pl where nrdoc=$nrdoc");
					$randuri=0;
					while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
													mysql_close($conexiune);
									$nr_cursa=$randuri+1;
									echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=statii.php?nrdoc='.$nrdoc.'"/>';
					};
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="STG"){
			include "conexiune.php";
					$nrdoc=$_POST['nrdoc'];
					$nrcursa=$_POST['nrcursa'];
					$query="DELETE FROM foi_parc_pl WHERE nrdoc='$nrdoc' && nrcursa='$nrcursa' ";
					if (!mysql_query($query)) {
							die(mysql_error());
					} else {}
							for($i=$nrcursa+1;$i<=$randuri;$i++){
									$ii=$i-1;
									$query="UPDATE foi_parc_pl SET nrcursa='$ii' where nrdoc=$nrdoc && nrcursa=$i ;";
									if (!mysql_query($query)) {
													  die(mysql_error());
									} else {}
							}
			mysql_close($conexiune);
					echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=statii.php?nrdoc='.$nrdoc.'"/>';
	};
} else {echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
}			

?>

<center>
<form action="" name="Form1" id="Form1" method="post">
<input type="hidden" id="OPERATIE" name="OPERATIE" value="">
<input type="hidden" id="doc" name="doc" value="">

<table width="600" border="1" cellpadding="0">
        <tr><td> <table cellpadding="0"><tr>
            <td height="35"><strong><span class="style3"><em>Nr.foaie parcurs:</em></span> <? echo $nrdoc; ?> </strong>&nbsp;&nbsp;&nbsp;
            <!--input type="text" size="10" maxlength="10" name="nrdoc" id="nrdoc"/-->
                        </td></tr>
</table></td></tr>
<tr><td align="center"><br/>
                <strong><span class="style3"><em>Urmeaza nr. cursa: </em></span><? echo $nr_cursa;?> </strong>
                &nbsp;&nbsp;&nbsp;<strong>Alege cursa:</strong>
<?
if ($_SESSION['user']==1){

		require "array_curse.php";$nr_curse=$i-1;
		echo "<select name='slct_curs' id='slct_curs'";
		echo " onchange='slct_cursa();'>";
		echo "<option selected value='0'></option>";
		for($i=1;$i<=$nr_curse;$i++){
				echo "<option value='$cursa_i[$i]'>$cursa_den[$i]</option>";
				echo "
				";
				}
				echo "</select>";
}
?>

		<input type="hidden" size="3" maxlength="3" name="id_cursa" id="id_cursa" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<br />
		<br/>
</td></tr>
<tr><td>
                <strong>Inserare</strong><em><strong> (daca e cazul!)</strong></em>

<?
if ($_SESSION['user']==1){

		echo "<select name='slct_nr_cursa' id='slct_nr_cursa'";
		echo " onchange='slct_nr_curse();'>";
		echo "<option selected value='0'>la sfarsitul tabelului</option>";
		for($i=1;$i<=$randuri;$i++){
				echo "<option value='$i'>inainte de cursa ".$i."</option>";
				echo "
				";
				}
				echo "</select>";
}
?>

        <input type="hidden" id="slct_nrcursa" name="slct_nrcursa" value="0" />
</td></tr>
<tr><td>
                <strong><em>Pt. </em>Stergere<em> ati selectat</em></strong>
                <input type="hidden" size="10" maxlength="10" name="nrdoc" id="nrdoc" />
                nr.cursa:
                <input type="text" size="3" maxlength="3" name="nrcursa" id="nrcursa" readonly />
</td></tr>
</table>

<table>
        <tr>
                <td>
                <input type="button" class="style1" onclick="adaugare();" value="Adaugare">                </td>
                <td>
                <input type="button" class="style1" onclick="stergere();" value="Stergere">                </td>
        </tr>
</table>


<center>
</form>

<?
if ($_SESSION['user']==1){

	include "conexiune.php";
	$ics="SELECT * FROM foi_parc_pl where nrdoc=".$nrdoc;
	$sql=mysql_query($ics);
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM foi_parc_pl where nrdoc=$nrdoc order by nrcursa");
	echo '<table border=1 cellpadding="1" cellspacing="0">';
	echo "<tr><td>Nr.foaie parcurs</td><td>Nr.cursa</td><td>Cursa</td><td>Dist_km</td></tr>";
	
	$dist_tot=0;
	$i=1;
	while ($row=mysql_fetch_array($sql)) {
					$nrdoc=$row["nrdoc"];
					$nrcursa=$row["nrcursa"];
					$id_cursa=$row["id_cursa"];
	
					$qcursa="select all * from curse where indice='$id_cursa'";
					include "conexiune.php";
					$rqt = mysql_query($qcursa);
					if ($rqt) {
							$rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
							$punct_ini=$rrqt["punct_i"];
							$punct_fin=$rrqt["punct_f"];
							$cursa_den=$punct_ini."-".$punct_fin;
							$dist_km=$rrqt["dist_km"];
				   }
									echo '<tr style="cursor:pointer;" bgcolor="#cfe4e9" ';
									echo ' onclick="line_click('.$i.')" ';
									echo ' id="linie_'.$i.'" onmouseover="line_sel('.$i.', '.$randuri.');"';
									echo " onmouseout='line_unsel($randuri)' >";
									echo '<td id="field_0_'.$i.'" align="center" ';
									echo ' value="'.$nrdoc.'" >'.$nrdoc.'</td>';
									echo '<td id="field_1_'.$i.'" align="center" ';
									echo ' value="'.$nrcursa.'" >'.$nrcursa.'</td>';
									echo '<td id="field_2_'.$i.'" align="left" ';
									echo ' value="'.$cursa_den.'" >'.$cursa_den.'</td>';
									echo '<td id="field_3_'.$i.'" align="left" ';
									echo ' value="'.$dist_km.'" ><center>'.$dist_km.'</center></td></tr>';
									echo '
									';
									$dist_tot=$dist_tot+$dist_km;
									$i=$i+1;
	}
	
	echo '<tr';
	echo " id='linie$i'";
	echo ">";
	echo '<td id="field_4" align="center" colspan="3"><strong>Total</strong></td>';
	echo '<td id="field_5" align="center"';
	echo ' value= "'.$dist_tot.'"><strong>'.$dist_tot.' </strong>   km </td></tr>';
	echo "</table>";
	mysql_close($conexiune);
}
?>

</center>
</body>
</html>