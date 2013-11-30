<?
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Denumire statii persoane</title>

<script language="javascript">
function adaugare(){
          var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("denumire").value == ""){gol=1; msg=msg+"Denumirea statiei, ";}
		  if (document.getElementById("tara").value == ""){gol=1; msg=msg+"tara ";}
		 /* alert ("mesaj"); */
          if(gol==0){
          document.getElementById("OPERATIE").value="AD";
          document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function stergere(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("denumire").value == ""){gol=1; msg=msg+"Denumirea statiei ";}
		   if (document.getElementById("tara").value == ""){gol=1; msg=msg+"tara ";}
          if(gol==0){
          document.getElementById("OPERATIE").value="STRG";
          document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function modificare(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("denumire").value == ""){gol=1; msg=msg+"Denumirea statiei ";}
		   if (document.getElementById("tara").value == ""){gol=1; msg=msg+"tara ";}
          if(gol==0){
          document.getElementById("OPERATIE").value="MOD";
          document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function line_click(val_i){
  		  document.getElementById("indice").value=document.getElementById("field_1_"+val_i).value;
          document.getElementById("denumire").value=document.getElementById("field_2_"+val_i).value;
          document.getElementById("tara").value=document.getElementById("field_3_"+val_i).value;
}

function line_sel(selectata, randuri){
   for(i=1; i<=randuri; i=i+1){
       if(i!=selectata){
          document.getElementById("field_1_"+i).bgColor="#cfe4e9";
          document.getElementById("field_2_"+i).bgColor="#cfe4e9";
		  document.getElementById("field_3_"+i).bgColor="#cfe4e9";
         }
       else{
          document.getElementById("field_1_"+i).bgColor="#33dddd";
          document.getElementById("field_2_"+i).bgColor="#33dddd";
		  document.getElementById("field_3_"+i).bgColor="#33dddd";
      }
   }
}

function line_unsel(randuri){
   for(i=1;i<=randuri;i=i+1){
   		  document.getElementById("field_1_"+i).bgColor="#cfe4e9";
 	      document.getElementById("field_2_"+i).bgColor="#cfe4e9";
		  document.getElementById("field_3_"+i).bgColor="#cfe4e9";
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
					$qstat="select all * from denstatii where indice='$indice'";
					include "conexiune.php";
					$rqt = mysql_query($qstat);
					if ($rqt) {
							  $camy = mysql_fetch_array($rqt,MYSQL_ASSOC );
							  $tara=$camy["tara"];
							  $denumire=$camy["denumire"];
							 }
					}else {
			$tara='';
			$denumire='';
	}
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="AD"){
			include "conexiune.php";
			$denumire=$_POST['denumire'];
			$tara=$_POST['tara'];
			$indice=$_POST['indice'];
			
			$sql=mysql_query("DELETE FROM denstatii WHERE denumire='$denumire' ");
			if (!$sql) {
			die(mysql_error());
					}
			$query="INSERT INTO denstatii (denumire, tara) VALUES ('$denumire', '$tara')";
			if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=denstatii.php?indice=0"/>';
			};
			
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="STRG"){
			include "conexiune.php";
					$denumire=$_POST['denumire'];
					$indice=$_POST['indice'];
					$tara=$_POST['tara'];
	
			$sql=mysql_query("DELETE FROM denstatii WHERE denumire='$denumire'");
			if (!$sql) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
					};
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="MOD"){
			include "conexiune.php";
			$denumire_vechi=$_POST['denumire_vechi'];
			$denumire=$_POST['denumire'];
			$tara_vechi=$_POST['tara_vechi'];
			$tara=$_POST['tara'];
			$indice=$_POST['indice'];
				  
		 $query="UPDATE denstatii SET denumire='$denumire', tara='$tara' WHERE indice='$indice' ";
			if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
					mysql_close($conexiune);
					echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=denstatii.php?indice=0"/>';
			};
} else {echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
}			
?>
<a href="index.php" class="style2 style3"><font size="+1" color="#000000">&lt;&nbsp;Inapoi</font></a> 

<br /><br />
<form action="" method="post" name="Form1" id="Form1">
<input type="hidden" id="OPERATIE" name="OPERATIE" value="">
<input type="hidden" id="indice_vechi" name="indice_vechi" value="">
<input type="hidden" id="denumire_vechi" name="denumire_vechi" value="">
<input type="hidden" id="tara_vechi" name="tara_vechi" value="">
<input type="hidden" id="indice" name="indice" value="<? echo $indice; ?>">
<table>
         <tr>
                <td width="87"><strong>Nume statie:</strong> </td>
           <td width="241"><input type="text"  size="35" name="denumire" maxlength="35" value="<? echo $denumire; ?>"></td>
		  
			   
        </tr>
		 <tr>
	     <td width="140" align="left"><strong>Tara:</strong> 
             <input type="hidden" name="tara"  size="1"maxlength="1" value="<? echo $tara; ?>"/>
			 </td>
			 <td width="241" align="left">
				<select name='slct_tar' id='slct_tar' onchange='slct_tara();'>
						 <option selected value='<? echo $tara; ?>'><? if ($tara=='A'){echo 'Anglia';}; if ($tara=='S'){echo 'Spania';}; if ($tara=='I'){echo 'Italia';}; if ($tara=='R'){echo 'Romania';}; ?></option>
						 <option value='A'>Anglia</option> 
						 <option value='S'>Spania</option>
						 <option value='I'>Italia</option>
						 <option value='R'>Romania</option>
				</select>
			</td> 
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
	$sql=mysql_query("SELECT * FROM denstatii");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	 
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM denstatii order by denumire");
	echo "<table border=1>";
	echo "<tr><td><b>indice</b></td><td><b>denumire statie</b></td><td><b>tara</b></td></tr>";
	
	$i=1;
	while ($row=mysql_fetch_array($sql)) {
					$indice=$row["indice"];
					$denumire=$row["denumire"];
					$tara=$row["tara"];
									echo '<tr bgcolor="#cfe4e9"> ';
									echo '<td id="field_1_'.$i.'" align="center" ';
									echo ' value="'.$indice.'" ><a href="denstatii.php?indice='.$indice.'">'.$indice.'</a></td>';
									echo '<td id="field_2_'.$i.'" align="left" ';
									echo ' value="'.$denumire.'" >'.$denumire.'</td>';
									echo '<td id="field_3_'.$i.'" align="left" ';
									echo ' value="'.$tara.'" >'.$tara.'</td>';
									echo '
									';
									$i=$i+1;
	}
	echo "</table>";
	mysql_close($conexiune);
	echo '<a href ="denstatii.php"</a>';  
}  
?>

</p>
<br /><br />
</center>
</body>
</html>