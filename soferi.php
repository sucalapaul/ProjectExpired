<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Soferi</title>


<script language="javascript">
function adaugare(){
        var gol=0; msg="Nu ati introdus ";
        if (document.getElementById("nume").value == ""){gol=1; msg=msg+"Numele ";
        if (document.getElementById("cnp").value == ""){msg=msg+"si CNP-ul";}
        } else {if (document.getElementById("cnp").value == ""){gol=1; msg=msg+"CNP-ul"}}
        if(gol==0){
				document.getElementById("OPERATIE").value="AD";
				document.getElementById("Form1").submit();
        } else {msg=msg+"!"; alert(msg);}
}

function stergere(){
		var gol=0; msg="Nu ati introdus ";
		if (document.getElementById("nume").value == ""){gol=1; msg=msg+"Numele ";
		if (document.getElementById("cnp").value == ""){msg=msg+"si CNP-ul";}
		} else {if (document.getElementById("cnp").value == ""){gol=1; msg=msg+"CNP-ul"}}
        if(gol==0){
				document.getElementById("OPERATIE").value="STRG";
				document.getElementById("Form1").submit();
        } else {msg=msg+"!"; alert(msg);}
}

function modificare(){
		var gol=0; msg="Nu ati introdus ";
		if (document.getElementById("nume").value == ""){gol=1; msg=msg+"Numele ";
		if (document.getElementById("cnp").value == ""){msg=msg+"si CNP-ul";}
		} else {if (document.getElementById("cnp").value == ""){gol=1; msg=msg+"CNP-ul"}}
		if(gol==0){
				document.getElementById("OPERATIE").value="MOD";
				document.getElementById("Form1").submit();
        } else {msg=msg+"!"; alert(msg);}
}

function line_click(val_i){
         document.getElementById("nume").value=document.getElementById("field_1_"+val_i).value;
         document.getElementById("cnp").value=document.getElementById("field_2_"+val_i).value;
         document.getElementById("nume_vechi").value=document.getElementById("field_1_"+val_i).value;
         document.getElementById("cnp_vechi").value=document.getElementById("field_2_"+val_i).value;
		 document.getElementById("indice").value=document.getElementById("field_0_"+val_i).value;
}

function line_sel(selectata, randuri){
   for(i=1; i<=randuri; i=i+1){
       if(i!=selectata){
	      document.getElementById("field_0_"+i).bgColor="#cfe4e9";
          document.getElementById("field_1_"+i).bgColor="#cfe4e9";
          document.getElementById("field_2_"+i).bgColor="#cfe4e9";
       }
       else{
          document.getElementById("field_0_"+i).bgColor="#33dddd";
		  document.getElementById("field_1_"+i).bgColor="#33dddd";
          document.getElementById("field_2_"+i).bgColor="#33dddd";
       }
   }
}

function line_unsel(randuri){
   for(i=1;i<=randuri;i=i+1){
		   document.getElementById("field_0_"+i).bgColor="#cfe4e9";
		   document.getElementById("field_1_"+i).bgColor="#cfe4e9";
		   document.getElementById("field_2_"+i).bgColor="#cfe4e9";
   }
}

</script>
<style type="text/css">
<!--
.style2 {font-size: 20px}
.style3 {font-family: "Times New Roman", Times, serif}
.style4 {color: #336666}
-->
</style>
</head>

<body bgcolor="#cfe4e9" >
<center>

<?php
/* asta scrii in fiecare php*/
if ($_SESSION['user']==1){

	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="AD"){
			include "conexiune.php";
			$nume=$_POST['nume'];
			$cnp=$_POST['cnp'];
			$indice=$_POST['indice'];
	
			$sql=mysql_query("DELETE FROM soferi WHERE indice='$indice' ");
			if (!$sql) {
					die(mysql_error());
			}
			$query="INSERT INTO soferi (nume, cnp) VALUES ('$nume','$cnp')";
			if (!mysql_query($query)) {
					die(mysql_error());
			} else {}
					mysql_close($conexiune);
			};
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="STRG"){
			include "conexiune.php";
			$nume=$_POST['nume'];
			$cnp=$_POST['cnp'];
			$indice=$_POST['indice'];
			
			$sql=mysql_query("DELETE FROM soferi WHERE indice='$indice' ");
			if (!$sql) {
					die(mysql_error());
			} else {}
					mysql_close($conexiune);
			};
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="MOD"){
			include "conexiune.php";
			$nume_vechi=$_POST['nume_vechi'];
			$cnp_vechi=$_POST['cnp_vechi'];
			$nume=$_POST['nume'];
			$cnp=$_POST['cnp'];
			$indice=$_POST['indice'];
	
			$query="UPDATE soferi SET nume='$nume', cnp='$cnp' WHERE indice='$indice'";
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
<a href="index.php" class="style2 style3"><font size="+1" color="#000000">&lt;&nbsp;</font><font size="+1"><span class="style4">Inapoi</span></font></a> 
<form action="" method="post" name="Form1" id="Form1">
<input type="hidden" id="OPERATIE" name="OPERATIE" value="">
<input type="hidden" id="nume_vechi" name="nume_vechi" value="">
<input type="hidden" id="cnp_vechi" name="cnp_vechi" value="">
<input type="hidden" id="indice" name="indice" value="">

<table>
	<tr>
		<td height=""><strong>Nume:</strong> </td>
		<td><input type="text" name="nume" size="30" id="nume" maxlength="30"></td>
	</tr>
	<tr>
		<td><strong>CNP: </strong></td>
		<td><input type="text" name="cnp" maxlength="13"></td>
	</tr>
</table>




<table>
	<tr>
		<td>
		<input type="button" value="Adaugare" onclick="adaugare();">                </td>
		<td>
		<input type="button" value="Stergere" onclick="stergere();">                </td>
		<td>
		<input type="button" value="Modificare" onclick="modificare();">            </td>
	</tr>
</table>
</form>
';
} ?>
<p>
  <?php
if ($_SESSION['user']==1){
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM soferi");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM soferi order by indice desc");
	echo "<table border=1>";
	echo "<tr><td>Indice</td><td>Nume</td><td>CNP</td></tr>";
	
	
	$i=1;
	while ($row=mysql_fetch_row($sql)) {
					echo '<tr style="cursor:pointer;" bgcolor="#cfe4e9" ';
					echo ' onclick="line_click('.$i.')" ';
					echo " id='linie$i' onmouseover='line_sel($i, $randuri)' ";
					echo " onmouseout='line_unsel($randuri)' >";
	
					echo '<td id="field_0_'.$i.'" align="left" ';
					echo ' value="'.$row[0].'" >'.$row[0].'</td>';
					echo '<td id="field_1_'.$i.'" align="left" ';
					echo ' value="'.$row[1].'" >'.$row[1].'</td>';
					echo '<td id="field_2_'.$i.'" align="left" ';
					echo ' value="'.$row[2].'" >'.$row[2].'</td>';
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