<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tip auto</title>


<script language="javascript">
function adaugare(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("denumire").value == ""){gol=1; msg=msg+"Denumirea ";}
          if(gol==0){
       		document.getElementById("OPERATIE").value="AD";
    		document.getElementById("Form1").submit();
        } else {msg=msg+"!"; alert(msg);}
}

function stergere(){
       var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("denumire").value == ""){gol=1; msg=msg+"Denumirea ";}
          if(gol==0){
        document.getElementById("OPERATIE").value="STRG";
    document.getElementById("Form1").submit();
        } else {msg=msg+"!"; alert(msg);}
}

function modificare(){
        var gol=0; msg="Nu ati introdus ";
          if (document.getElementById("denumire").value == ""){gol=1; msg=msg+"Denumirea ";}
          if(gol==0){
        document.getElementById("OPERATIE").value="MOD";
    document.getElementById("Form1").submit();
        } else {msg=msg+"!"; alert(msg);}
}

function line_click(val_i){

         document.getElementById("denumire").value=document.getElementById("field_1_"+val_i).value;
         document.getElementById("indice").value=document.getElementById("field_0_"+val_i).value;
}

function line_sel(selectata, randuri){
   for(i=1; i<=randuri; i=i+1){
       if(i!=selectata){
	      document.getElementById("field_0_"+i).bgColor="#cfe4e9";
          document.getElementById("field_1_"+i).bgColor="#cfe4e9";
         }
       else{
          document.getElementById("field_0_"+i).bgColor="#33dddd";
		  document.getElementById("field_1_"+i).bgColor="#33dddd";
       }
   }
}

function line_unsel(randuri){
   for(i=1;i<=randuri;i=i+1){
       document.getElementById("field_0_"+i).bgColor="#cfe4e9";
       document.getElementById("field_1_"+i).bgColor="#cfe4e9";
   }
}

</script>
<style type="text/css">
<!--
.style2 {font-size: 20px}
.style3 {font-family: "Times New Roman", Times, serif}
-->
</style>
</head>

<body bgcolor="#cfe4e9" >
<center>

<?php
if ($_SESSION['user']==1){

	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="AD"){
			include "conexiune.php";
			$denumire=$_POST['denumire'];
			$indice=$_POST['indice'];
	
			$query="INSERT INTO tip_auto (denumire) VALUES ('$denumire')";
			if (!mysql_query($query)) {
				die(mysql_error());
					} else {}
				mysql_close($conexiune);
			};
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="STRG"){
			include "conexiune.php";
			$denumire=$_POST['denumire'];
			$indice=$_POST['indice'];
			
			$sql=mysql_query("DELETE FROM tip_auto WHERE indice='$indice' ");
			if (!$sql) {
				die(mysql_error());
					} else {}
				mysql_close($conexiune);
			};
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="MOD"){
			include "conexiune.php";
			$den_vechi=$_POST['den_vechi'];
			$denumire=$_POST['denumire'];
			$indice=$_POST['indice'];
	
			$query="UPDATE tip_auto SET denumire='$denumire' WHERE indice='$indice';";
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
	<form action="" method="post" name="Form1" id="Form1">
	<input type="hidden" id="OPERATIE" name="OPERATIE" value="">
	<input type="hidden" id="den_vechi" name="den_vechi" value="">
	<input type="hidden" id="indice" name="indice" value="">
	
	<table>
		<tr>
			<td height=""><strong>Nume tip auto:</strong> </td>
			<td><input type="text" name="denumire" id="denumire" maxlength="30"></td>
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
	$sql=mysql_query("SELECT * FROM tip_auto");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM tip_auto order by indice");
	echo "<table border=1>";
	echo "<tr><td>Indice</td><td>Nume tip auto</td></tr>";
	
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