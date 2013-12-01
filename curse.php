<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Completare Curse</title>

<script language="javascript">
function adaugare(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("punct_i").value == ""){gol=1; msg=msg+"Punct initial, ";}
          if (document.getElementById("punct_f").value == ""){gol=1; msg=msg+"Punct final,";}
          if (document.getElementById("dist_km").value == ""){gol=1; msg=msg+" Distanta";}

          if(gol==0){
          document.getElementById("OPERATIE").value="AD";
          document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function stergere(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("punct_i").value == ""){gol=1; msg=msg+"Punct initial, ";}
          if (document.getElementById("punct_f").value == ""){gol=1; msg=msg+"Punct final,";}
          if (document.getElementById("dist_km").value == ""){gol=1; msg=msg+" Distanta";}

          if(gol==0){
          document.getElementById("OPERATIE").value="STRG";
          document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function modificare(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("punct_i").value == ""){gol=1; msg=msg+"Punct initial, ";}
          if (document.getElementById("punct_f").value == ""){gol=1; msg=msg+"Punct final,";}
          if (document.getElementById("dist_km").value == ""){gol=1; msg=msg+" Distanta";}

          if(gol==0){
          document.getElementById("OPERATIE").value="MOD";
          document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}

function line_click(val_i){
          document.getElementById("punct_i").value=document.getElementById("field_2_"+val_i).value;
          document.getElementById("punct_f").value=document.getElementById("field_3_"+val_i).value;
          document.getElementById("dist_km").value=document.getElementById("field_4_"+val_i).value;
          document.getElementById("punct_i_vechi").value=document.getElementById("field_2_"+val_i).value;
          document.getElementById("punct_f_vechi").value=document.getElementById("field_3_"+val_i).value;
          document.getElementById("dist_km_vechi").value=document.getElementById("field_4_"+val_i).value;
		  document.getElementById("indice").value=document.getElementById("field_1_"+val_i).value;
}

function line_sel(selectata, randuri){
   for(i=1; i<=randuri; i=i+1){
       if(i!=selectata){
          document.getElementById("field_1_"+i).bgColor="#cfe4e9";
          document.getElementById("field_2_"+i).bgColor="#cfe4e9";
          document.getElementById("field_3_"+i).bgColor="#cfe4e9";
          document.getElementById("field_4_"+i).bgColor="#cfe4e9";
       }
       else{
          document.getElementById("field_1_"+i).bgColor="#33dddd";
          document.getElementById("field_2_"+i).bgColor="#33dddd";
          document.getElementById("field_3_"+i).bgColor="#33dddd";
          document.getElementById("field_4_"+i).bgColor="#33dddd";
       }
   }
}

function line_unsel(randuri){
   for(i=1;i<=randuri;i=i+1){
   		  document.getElementById("field_1_"+i).bgColor="#cfe4e9";
 	      document.getElementById("field_2_"+i).bgColor="#cfe4e9";
      	  document.getElementById("field_3_"+i).bgColor="#cfe4e9";
      	  document.getElementById("field_4_"+i).bgColor="#cfe4e9";
   }
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

	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="AD"){
			include "conexiune.php";
			$punct_i=$_POST['punct_i'];
			$punct_f=$_POST['punct_f'];
			$dist_km=$_POST['dist_km'];
			$indice=$_POST['indice'];
			
			$punct_iv=$_POST['punct_f'];
			$punct_fv=$_POST['punct_i'];
			$dist_kmv=$_POST['dist_km'];
			$indice=$_POST['indice'];
					
			$sql=mysql_query("DELETE FROM curse WHERE punct_i='$punct_i' && punct_f='$punct_f' && dist_km='$dist_km'");
			if (!$sql) {
			die(mysql_error());
					}
			$query="INSERT INTO curse (punct_i, punct_f, dist_km) VALUES ('$punct_i','$punct_f','$dist_km')";
			if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
		  
	
		include "conexiune.php";
			$punct_iv=$_POST['punct_f'];
			$punct_fv=$_POST['punct_i'];
			$dist_kmv=$_POST['dist_km'];
			$indice=$_POST['indice'];
					
			$sql=mysql_query("DELETE FROM curse WHERE punct_i='$punct_iv' && punct_f='$punct_fv' && dist_km='$dist_km'");
			if (!$sql) {
			die(mysql_error());
					}
			$query="INSERT INTO curse (punct_i, punct_f, dist_km) VALUES ('$punct_iv','$punct_fv','$dist_km')";
			if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
			};
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="STRG"){
			include "conexiune.php";
					$punct_i=$_POST['punct_i'];
					$punct_f=$_POST['punct_f'];
					$dist_km=$_POST['dist_km'];
					$indice=$_POST['indice'];
	
			$sql=mysql_query("DELETE FROM curse WHERE punct_i='$punct_i' && punct_f='$punct_f' && dist_km='$dist_km' ");
			if (!$sql) {
			die(mysql_error());
					} else {}
			
			$sql=mysql_query("DELETE FROM curse WHERE punct_i='$punct_f' && punct_f='$punct_i' && dist_km='$dist_km' ");
					if (!$sql) {
					die(mysql_error());
							} else {}
					mysql_close($conexiune);
					};
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="MOD"){
			include "conexiune.php";
			$punct_i_vechi=$_POST['punct_i_vechi'];
			$punct_f_vechi=$_POST['punct_f_vechi'];
			$dist_km_vechi=$_POST['dist_km_vechi'];
			$indice=$_POST['indice'];
			$punct_i=$_POST['punct_i'];
			$punct_f=$_POST['punct_f'];
			$dist_km=$_POST['dist_km'];
		  
			$query="UPDATE curse SET punct_i='$punct_i', punct_f='$punct_f', dist_km='$dist_km' WHERE punct_i='$punct_i_vechi' && punct_f='$punct_f_vechi' ";
			if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
	
			$query="UPDATE curse SET punct_i='$punct_f', punct_f='$punct_i', dist_km='$dist_km' WHERE punct_f='$punct_i_vechi' && punct_i='$punct_f_vechi' ";
			if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
	};
} else {
echo '<font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font>';
}
	
?>
<?php if ($_SESSION['user']==1){
echo '
	<a href="index.php" class="style2 style3"><font size="+1" color="#000000">&lt;&nbsp;Inapoi</font></a> 
	<!--<p class="style1"><a href="index.html" class="style2">Inapoi</a></p>-->
	
	<br /><br />
	<form action="" method="post" name="Form1" id="Form1">
	<input type="hidden" id="OPERATIE" name="OPERATIE" value="">
	<input type="hidden" id="indice_vechi" name="indice_vechi" value="">
	<input type="hidden" id="punct_i_vechi" name="punct_i_vechi" value="">
	<input type="hidden" id="punct_f_vechi" name="punct_f_vechi" value="">
	<input type="hidden" id="dist_km_vechi" name="dist_km_vechi" value="">
	<input type="hidden" id="indice" name="indice" value="">
	
	
	<table>
			 <tr>
					<td><strong>Punct initial:</strong> </td>
					<td><input type="text" name="punct_i" maxlength="20"></td>
			</tr>
	
			<tr>
					<td height=""><strong>Punct final:</strong> </td>
					<td><input type="text" name="punct_f" maxlength="20"></td>
			</tr>
			<tr>
					<td><strong>Distanta(km):</strong> </td>
					<td><input type="text" name="dist_km" maxlength="10"></td>
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
';
} ?>
<p>
<?php
if ($_SESSION['user']==1){
  
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM curse");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM curse order by indice desc");
	echo "<table border=1>";
	echo "<tr><td>indice</td><td>punct initial</td><td>punct final</td><td>distanta(km)</td></tr>";
	
	$i=1;
	while ($row=mysql_fetch_row($sql)) {
	
									echo '<tr style="cursor:pointer;" bgcolor="#cfe4e9" ';
									echo ' onclick="line_click('.$i.')" ';
									echo " id='linie$i' onmouseover='line_sel($i, $randuri)' ";
									echo " onmouseout='line_unsel($randuri)' >";
									echo '<td id="field_1_'.$i.'" align="center" ';
									echo ' value="'.$row[0].'" >'.$row[0].'</td>';
									echo '<td id="field_2_'.$i.'" align="left" ';
									echo ' value="'.$row[1].'" >'.$row[1].'</td>';
									echo '<td id="field_3_'.$i.'" align="left" ';
									echo ' value="'.$row[2].'" >'.$row[2].'</td>';
									echo '<td id="field_4_'.$i.'" align="left" ';
									echo ' value="'.$row[3].'" >'.$row[3].'</td>';
									echo '
									';
					$i=$i+1;
	}
	echo "</table>";
	mysql_close($conexiune);
}
?>
</p>
<br /><br />
</center>
</body>
</html>