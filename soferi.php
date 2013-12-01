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

// function line_click(val_i){
//          document.getElementById("nume").value=document.getElementById("field_1_"+val_i).value;
//          document.getElementById("cnp").value=document.getElementById("field_2_"+val_i).value;
//          document.getElementById("nume_vechi").value=document.getElementById("field_1_"+val_i).value;
//          document.getElementById("cnp_vechi").value=document.getElementById("field_2_"+val_i).value;
// 		 document.getElementById("indice").value=document.getElementById("field_0_"+val_i).value;
// }

// function line_sel(selectata, randuri){
//    for(i=1; i<=randuri; i=i+1){
//        if(i!=selectata){
// 	      document.getElementById("field_0_"+i).bgColor="#cfe4e9";
//           document.getElementById("field_1_"+i).bgColor="#cfe4e9";
//           document.getElementById("field_2_"+i).bgColor="#cfe4e9";
//        }
//        else{
//           document.getElementById("field_0_"+i).bgColor="#33dddd";
// 		  document.getElementById("field_1_"+i).bgColor="#33dddd";
//           document.getElementById("field_2_"+i).bgColor="#33dddd";
//        }
//    }
// }

// function line_unsel(randuri){
//    for(i=1;i<=randuri;i=i+1){
// 		   document.getElementById("field_0_"+i).bgColor="#cfe4e9";
// 		   document.getElementById("field_1_"+i).bgColor="#cfe4e9";
// 		   document.getElementById("field_2_"+i).bgColor="#cfe4e9";
//    }
// }

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

			$query="INSERT INTO soferi (nume, cnp) VALUES ('$nume','$cnp')";
			$result = mysql_query($query);
			if (!$result) {
					die(mysql_error());
			} else {}
			
			$indice = mysql_insert_id();
			mysql_close($conexiune);


			include "conexiune.php";
			// $nume=$_POST['nume'];
			// $cnp=$_POST['cnp'];

			 $query="INSERT INTO  avize_soferi (
					id_sofer ,
					ci_serie ,
					ci_numar ,
					ci_exp ,
					permis_serie ,
					permis_categorii ,
					permis_exp ,
					psihologic_exp ,
					medicale_exp ,
					atestat_categorii ,
					atestat_exp ,
					tahograf_exp ,
					tahograf_desc ,
					legitimatie_numar ,
					legitimatie_exp
					)
					VALUES (
					'$indice',  '',  '',  '0',  '',  '',  '0',  '0',  '0',  '',  '0',  '0',  '0',  '',  '0'
					)";

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
			}

			$sql=mysql_query("DELETE FROM avize_soferi WHERE id_sofer='$indice' ");
			if (!$sql) {
				die(mysql_error());
			}
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





	$indice=(isset($_GET['indice']) ? $_GET['indice'] : "" );

	if ($indice!=0 && $indice != "")
	{
		$qu="select all * from soferi where indice='$indice'";
		include "conexiune.php";
		$rqt = mysql_query($qu);
		if ($rqt) 
		{
			$row = mysql_fetch_array($rqt, MYSQL_ASSOC );
			$indice = $row['indice'];
			$nume = $row['nume'];
			$cnp = $row['cnp'];
		}
	} else 
	{
		$indice = "";
		$nume = "";
		$cnp = "";
	}

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
<input type="hidden" id="indice" name="indice" value="'.$indice.'">

<table>
	<tr>
		<td height=""><strong>Nume:</strong> </td>
		<td><input type="text" name="nume" size="30" id="nume" value="'.$nume.'" maxlength="30"></td>
	</tr>
	<tr>
		<td><strong>CNP: </strong></td>
		<td><input type="text" name="cnp"  size="30" id="cnp" value="'.$cnp.'" maxlength="13"></td>
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

	// WTF??
	// include "conexiune.php";
	// $sql=mysql_query("SELECT * FROM soferi");
	// $randuri=0;
	// while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	// mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM soferi order by indice desc");

	echo "<table border=1>";
	echo "<tr><td>Indice</td><td>Nume</td><td>CNP</td><td>Completare avize</td></tr>";
	
	
	$i=1;
	while ($row=mysql_fetch_array($sql)) {

					$indice = $row['indice'];
					$nume = $row['nume'];
					$cnp = $row['cnp'];

					$exp = 0;

					echo '<tr bgcolor="#cfe4e9" ';
					echo " id='linie$i'  >";
	
					echo '<td id="field_0_'.$i.'" align="left" ';
					echo ' value="'.$indice.'" ><a href="soferi.php?indice='.$indice.'">'.$indice.'</a></td>';
					echo '<td id="field_1_'.$i.'" align="left" ';
					echo ' value="'.$nume.'" >'.$nume.'</td>';
					echo '<td id="field_2_'.$i.'" align="left" ';
					echo ' value="'.$cnp.'" >'.$cnp.'</td>';
					echo '<td align="center"><a href = "avize_soferi.php?indice='.$indice.'">';

					if ($exp==1){
						echo '<font color="#ff0000">click aici</font>';
					} else {
						echo '<font color="#0000ff">click aici</font>';
					}

					echo '</a></td>';
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