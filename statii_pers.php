<?
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Completare statii la curse de persoane</title>
<script language="javascript">

function adaugare(){
        var gol=0; msg="Nu ati introdus ";
        if (document.getElementById("id_statie").value == ""){gol=1; msg=msg+"statia ";}
		if (document.getElementById("ora_p").value == ""){gol=1; msg=msg+",ora plecare ";}
		if (document.getElementById("min_p").value == ""){gol=1; msg=msg+",minut plecare ";}
	/*alert ("mesaj"); */
		if(gol==0){
			document.getElementById("OPERATIE").value="AD";
			document.getElementById("Form1").submit();
		} else {msg=msg+"!"; alert(msg);}
}


function stergere(){
        var gol=0; msg="nu ati selectat nici o statie!";
        if (document.getElementById("nrstatie").value == ""){gol=1;}
		if(gol==0){
			document.getElementById("OPERATIE").value="STG";
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
							document.getElementById("field_10_"+i).bgColor="#cfe4e9";
							
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
						  document.getElementById("field_10_"+i).bgColor="#33dddd";
						  
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
	   document.getElementById("field_10_"+i).bgColor="#cfe4e9";
	   
   }
}

function line_click(val_i){
       document.getElementById("nrstatie").value=document.getElementById("field_1_"+val_i).value;
	   document.getElementById("id_c").value=document.getElementById("field_0_"+val_i).value;
}

/*
function line_click(val_i){
       document.getElementById("id_c").value=document.getElementById("field_1_"+val_i).value;
       document.getElementById("nrstatie").value=document.getElementById("field_0_"+val_i).value;
       document.getElementById("id_c_vechi").value=document.getElementById("field_1_"+val_i).value;
       document.getElementById("nrstatie_vechi").value=document.getElementById("field_0_"+val_i).value;
}
*/
function slct_zi1(){
document.getElementById("luni").value=document.getElementById("slct_ziua1").value;
}
function slct_zi2(){
document.getElementById("marti").value=document.getElementById("slct_ziua2").value;
}
function slct_zi3(){
document.getElementById("miercuri").value=document.getElementById("slct_ziua3").value;
}
function slct_zi4(){
document.getElementById("joi").value=document.getElementById("slct_ziua4").value;
}
function slct_zi5(){
document.getElementById("vineri").value=document.getElementById("slct_ziua5").value;
}
function slct_zi6(){
document.getElementById("simbata").value=document.getElementById("slct_ziua6").value;
}
function slct_zi7(){
document.getElementById("duminica").value=document.getElementById("slct_ziua7").value;
}

function slct_cursa(){
  document.getElementById("id_c").value=document.getElementById("slct_curs").value;
}

function sel_statie(){
  document.getElementById("slct_nrstatie").value=document.getElementById("slct_nr_statie").value;
}
function slct_statia(){
  document.getElementById("id_statie").value=document.getElementById("slct_stat").value;
}
function slct_nr_statii(){
  document.getElementById("slct_nrstatie").value=document.getElementById("slct_nr_statie").value;
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
<center><a href="curse_pers.php?indice=0" class="style2 style3 style1"><font size="+1" color="#000000">&lt;&nbsp;Inapoi</font></a>
</center>

<?
if ($_SESSION['user']==1){

	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM statii_pers");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM statii_pers");
	while ($row=mysql_fetch_array($sql)) {$id_c=$row['id_c'];}
	mysql_close($conexiune);
			
	$id_c=$_GET['id_c'];
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM statii_pers where id_c=$id_c");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
			mysql_close($conexiune);
			$nrstatie=$randuri+1;
			
	include "conexiune.php";
	$qnr_inm="select all * from curse_pers where indice='$id_c'";
					include "conexiune.php";
					$rqnr = mysql_query($qnr_inm);
					if ($rqnr) {
						  $rrqnr = mysql_fetch_array($rqnr,MYSQL_ASSOC );
						  $id_pi=$rrqnr["id_pi"];
						  $id_pf=$rrqnr["id_pf"];
						  $nr_cursa=$rrqnr["nr_cursa"];
				  }	
	mysql_close($conexiune);
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="AD"){
			include "conexiune.php";
			$id_statie=$_POST['id_statie'];
			$ora_p=$_POST['ora_p'];
			$min_p=$_POST['min_p'];
			$luni=$_POST['luni'];
			$marti=$_POST['marti'];
			$miercuri=$_POST['miercuri'];
			$joi=$_POST['joi'];
			$vineri=$_POST['vineri'];
			$simbata=$_POST['simbata'];
			$duminica=$_POST['duminica'];
			
			$slct_nrstatie=$_POST['slct_nrstatie'];
			$numar_statie_ins=$slct_nrstatie;
			if ($slct_nrstatie!=0){
				   include "conexiune.php";
				   for($i=$randuri;$i>=$slct_nrstatie;$i--){
						 $ii=$i+1;
						 $query="UPDATE statii_pers SET nrstatie='$ii' where id_c=$id_c && nrstatie=$i ;";
						 if (!mysql_query($query)) {
									die(mysql_error());
									} else {}
						 }
		   
						$query="INSERT INTO statii_pers (id_c, id_statie, ora_p, min_p, luni, marti, miercuri, joi, vineri, simbata, duminica, nrstatie) VALUES ('$id_c', '$id_statie', '$ora_p', '$min_p', '$luni', '$marti', '$miercuri', '$joi', '$vineri', '$simbata', '$duminica', '$slct_nrstatie')";
						if (!mysql_query($query)) {
						die(mysql_error());
								} else {}
						 mysql_close($conexiune);
			}  else {
					include "conexiune.php";
					/*$qcursa="select all * from curse_pers where indice='$id_c'";
					$rqt = mysql_query($qcursa);
					if ($rqt) {
								$rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
								$dist_km=$rrqt["dist_km"];
					}*/
					$query="INSERT INTO statii_pers (id_c, id_statie, ora_p, min_p, luni, marti, miercuri, joi, vineri, simbata, duminica, nrstatie) VALUES ('$id_c', '$id_statie', '$ora_p', '$min_p', '$luni', '$marti', '$miercuri', '$joi', '$vineri', '$simbata', '$duminica', '$nrstatie')";
					if (!mysql_query($query)) {
					die(mysql_error());
						   } else {}
					mysql_close($conexiune);
					   }
	
			include "conexiune.php";
			$sql=mysql_query("SELECT * FROM statii_pers where id_c=$id_c");
			$randuri=0;
			while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
											mysql_close($conexiune);
							$nr_cursa=$randuri+1;
							echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=statii_pers.php?id_c='.$id_c.'"/>';
			};
	
	
			
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="STG"){
			include "conexiune.php";
					$nrstatie=$_POST['nrstatie'];
					$query="DELETE FROM statii_pers WHERE id_c='$id_c' && nrstatie='$nrstatie' ";
					if (!mysql_query($query)) {
							die(mysql_error());
					} else {}
							for($i=$nrstatie+1;$i<=$randuri;$i++){
									$ii=$i-1;
									$query="UPDATE statii_pers SET nrstatie='$ii' where id_c=$id_c && nrstatie=$i ;";
									if (!mysql_query($query)) {
													  die(mysql_error());
									} else {}
							}
			mysql_close($conexiune);
					echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=statii_pers.php?id_c='.$id_c.'"/>';
	};
	
			$qstatie="select all * from denstatii where indice='$id_pi'";
						include "conexiune.php";
						$rqt = mysql_query($qstatie);
							if ($rqt) {
								$rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
								$statie_deni=$rrqt["denumire"];
							}
					mysql_close($conexiune);		
			$qstatie="select all * from denstatii where indice='$id_pf'";
						include "conexiune.php";
						$rqt = mysql_query($qstatie);
							if ($rqt) {
								$rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
								$statie_denf=$rrqt["denumire"];
							}	
					mysql_close($conexiune);
} else {echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
}			
?>


<center>
<form action="" name="Form1" id="Form1" method="post">
<input type="hidden" id="OPERATIE" name="OPERATIE" value="" />
<table width="700" border="1" cellpadding="0">
	<tr>
		<td> 
			<table cellpadding="0">
				<tr>
            		<td align="center" height="35"><strong><span class="style3"><em>Indice cursa:</em></span> <? echo $id_c.' - traseul - '.$statie_deni.'-'.$statie_denf.' cursa cu nr.'.$nr_cursa;?> </strong>                    </td>
				</tr>
			</table>		</td>
	</tr>
	<tr>
		<td>
			<table cellpadding="0">
				<tr>
					<td align="center" height="35"><strong><span class="style3"><em>Urmeaza nr.statie: </em></span><? echo $nrstatie;?> </strong>        			</td>
				</tr>
			</table>		</td>
	</tr>
		
	<tr>
             <td align="center" height="35"><strong>Alege statia:</strong>
                 <!-- <input type="text"  size="35" name="statia" maxlength="35"></td>-->
<?
if ($_SESSION['user']==1){

		require "array_statii.php";$nr_statii=$i-1;
		echo "<select name='slct_stat' id='slct_stat'";
		echo " onchange='slct_statia();'>";
		echo "<option selected value='0'></option>";
		for($i=1;$i<=$nr_statii;$i++){
				echo "<option value='$statia_i[$i]'>$statia_den[$i]</option>";
				echo "
				";
				}
				echo "</select>";
}
?>
               <input type="hidden" size="3" maxlength="3" name="id_statie" id="id_statie" />  
               
           </td>    
      </tr>
	<tr>
             <td align="center" height="35"><strong>Ora plecare:</strong> 
             <input type="text"  size="2" name="ora_p" maxlength="2">  
			  <strong>Min:</strong> 
             <input type="text"  size="2" name="min_p" maxlength="2"></td>
    </tr>
	<tr>
			<td height="35"><strong>Luni:</strong>
           		<input type="hidden" name="luni"  size="1"maxlength="1" value="D"/>
            		<select name='slct_ziua1' id='slct_ziua1' onchange='slct_zi1();'>
            			<option selected value='D'>Da</option>
                        <option value='N'>Nu</option>
   			  </select>
				<strong>Marti:</strong>
         	    <input type="hidden" name="marti"  size="1"maxlength="1" value="D"/>
		  			<select name='slct_ziua2' id='slct_ziua2' onchange='slct_zi2();'>
           				<option selected value='D'>Da</option>
            			<option value='N'>Nu</option>
            		</select>
				<strong>Mierc:</strong>
         	    <input type="hidden" name="miercuri"  size="1"maxlength="1" value="D"/>
		  			<select name='slct_ziua3' id='slct_ziua3' onchange='slct_zi3();'>
           				<option selected value='D'>Da</option>
            			<option value='N'>Nu</option>
            		</select>
				<strong>Joi:</strong>
         	    <input type="hidden" name="joi"  size="1"maxlength="1" value="D"/>
		  			<select name='slct_ziua4' id='slct_ziua4' onchange='slct_zi4();'>
           				<option selected value='D'>Da</option>
            			<option value='N'>Nu</option>
            		</select>
				<strong>Vineri:</strong>
         	    <input type="hidden" name="vineri"  size="1"maxlength="1" value="D"/>
		  			<select name='slct_ziua5' id='slct_ziua5' onchange='slct_zi5();'>
           				<option selected value='D'>Da</option>
            			<option value='N'>Nu</option>
            		</select>
				<strong>Sim:</strong>
         	    <input type="hidden" name="simbata"  size="1"maxlength="1" value="D"/>
		  			<select name='slct_ziua6' id='slct_ziua6' onchange='slct_zi6();'>
           				<option selected value='D'>Da</option>
            			<option value='N'>Nu</option>
            		</select>
				<strong>Dum:</strong>
         	    <input type="hidden" name="duminica"  size="1"maxlength="1" value="D"/>
		  			<select name='slct_ziua7' id='slct_ziua7' onchange='slct_zi7();'>
           				<option selected value='D'>Da</option>
            			<option value='N'>Nu</option>
            		</select>			</td>
    </tr>
	<tr><td height="35">
                <strong>Inserare</strong><em><strong> (daca e cazul!)</strong></em>

<?
if ($_SESSION['user']==1){

		echo "<select name='slct_nr_statie' id='slct_nr_statie'";
		echo " onchange='sel_statie();'>";
		echo "<option selected value='0'>la sfarsitul tabelului</option>";
		for($i=1;$i<=$randuri;$i++){
				echo "<option value='$i'>inainte de cursa ".$i."</option>";
				echo "
				";
				}
				echo "</select>";
}
?>

        <input type="hidden" id="slct_nrstatie" name="slct_nrstatie" value="0" />
</td></tr>
<tr><td height="35">
                <strong><em>Pt. </em>Stergere<em> ati selectat</em></strong>
                <input type="hidden" size="10" maxlength="10" name="id_c" id="id_c" />
                nr.statie:
                <input type="text" size="3" maxlength="3" name="nrstatie" id="nrstatie" readonly />
</td>
</tr> 
</table>

<table>
        <tr>
                <td>
                <input type="button" class="style1" onclick="adaugare();" value="Adaugare">                </td>
                <td>
                <input type="button" class="style1" onclick="stergere();" value="Stergere">                </td>
        </tr>
</table>
</form>

<?
if ($_SESSION['user']==1){

	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM statii_pers where id_c=$id_c");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	
	include "conexiune.php";
	$ics="SELECT * FROM statii_pers where id_c=$id_c order by nrstatie";
	$sql=mysql_query($ics);
	echo '<table border=1 cellpadding="1" cellspacing="0">';
	echo "<tr><td>Indice cursa</td><td>Nr.statie</td><td>Statia</td><td>Ora plecare</td><td>Luni</td><td>Marti</td><td>Miercuri</td><td>Joi</td><td>Vineri</td><td>Simbata</td><td>Duminica</td></tr>";
	
	$i=1;
	while ($row=mysql_fetch_array($sql)) {
					$id_c=$row["id_c"];
					$nrstatie=$row["nrstatie"];
				/*	$statia=$row["statia"];*/
					$id_statie=$row["id_statie"];
						$qstatie="select all * from denstatii where indice='$id_statie'";
						include "conexiune.php";
						$rqt = mysql_query($qstatie);
							if ($rqt) {
								$rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
								$statie_den=$rrqt["denumire"];
							}	
					$ora_p=$row["ora_p"];
					$min_p=$row["min_p"];
					$luni=$row["luni"];
					$marti=$row["marti"];
					$miercuri=$row["miercuri"];
					$joi=$row["joi"];
					$vineri=$row["vineri"];
					$simbata=$row["simbata"];
					$duminica=$row["duminica"];
				/*	if ($min_p<9) {$min_p='0'.$min_p;};   */
					
									/*echo 'onmouseover="line_sel('.$i.', '.$randuri.');"<tr style="cursor:pointer;" bgcolor="#cfe4e9" ';*/
									echo '<tr style="cursor:pointer;" bgcolor="#cfe4e9" ';
									echo ' onclick="line_click('.$i.')" ';
									echo ' id="linie_'.$i.'" onmouseover="line_sel('.$i.', '.$randuri.');"';
									echo ' onmouseout="line_unsel('.$randuri.')" >';
									echo '<td id="field_0_'.$i.'" align="center" ';
									echo ' value="'.$id_c.'" >'.$id_c.'</td>';
									echo '<td id="field_1_'.$i.'" align="center" ';
									echo ' value="'.$nrstatie.'" >'.$nrstatie.'</td>';
									echo '<td id="field_2_'.$i.'" align="left" ';
									echo ' value="'.$statie_den.'" >'.$statie_den.'</td>';
									echo '<td id="field_3_'.$i.'" align="left" ';
									echo ' value="'.$ora_p.'" >'.$ora_p.':'.$min_p.'</td>';
									echo '<td id="field_4_'.$i.'" align="left" ';
									echo ' value="'.$luni.'" >'.$luni.'</td>';
									echo '<td id="field_5_'.$i.'" align="left" ';
									echo ' value="'.$marti.'" >'.$marti.'</td>';
									echo '<td id="field_6_'.$i.'" align="left" ';
									echo ' value="'.$miercuri.'" >'.$miercuri.'</td>';
									echo '<td id="field_7_'.$i.'" align="left" ';
									echo ' value="'.$joi.'" >'.$joi.'</td>';
									echo '<td id="field_8_'.$i.'" align="left" ';
									echo ' value="'.$vineri.'" >'.$vineri.'</td>';
									echo '<td id="field_9_'.$i.'" align="left" ';
									echo ' value="'.$simbata.'" >'.$simbata.'</td>';
									echo '<td id="field_10_'.$i.'" align="left" ';
									echo ' value="'.$duminica.'" ><center>'.$duminica.'</center></td>';
									echo '
									';
									$i=$i+1;
	}
	echo "</table>";
	mysql_close($conexiune);
}
?>

</center>        
</body>
</html>
