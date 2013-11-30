<?
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Fisa de Activitate Zilnica</title>
<style type="text/css">

.style1 {
        font-family: "Times New Roman", Times, serif;
        font-weight: bold;
        font-size: 24px;
}
.style3 {font-family: "Times New Roman", Times, serif; font-weight: bold; font-size: 24px; color: #0033FF; }
.style5 {
        font-size: 40px;
        font-weight: bold;
        color: #003300;
}

</style>
<style type="text/css">
/* BODY{
	FONT-FAMILY:verdana;
	font-size:12px;
	background-color:#FFFFFF;
} */

.backG {
	FONT-FAMILY:verdana;
	background-color:#93c39b;
	color:#ffffff;
	border-bottom:#538c4d 2px solid;
	font-size:12px;
}
td.form1
{
	FONT-FAMILY:verdana;
	background:#eaeaea;
	font-size:12px;
}

</style>
<script language="javascript">
function setFocus()
{
document.getElementById('parola').focus()
}
</script>
</head>

<body bgcolor="#cfe4e9"   <? if (!isset($_POST['parola'])){echo 'onload="setFocus()"';}?>>
<?

if (!isset($_SESSION['user'])){$_SESSION['user']=0;}
if (isset($_POST['parola'])){
	if ($_POST['parola']=='tripleti'){
		$_SESSION['user']=1;
		$_SESSION['paul']='home';
	}
	else
	{echo "<script language='javascript'> alert('Nu e buna parola!!! Mai incearca!'); document.getElementById('parola').focus(); </script>";
	}
}

if (isset($_POST['actiune'])){
	if ($_POST['actiune']=='signout'){$_SESSION['user']=0;}
		else {if ($_POST['actiune']!=""){$_SESSION['paul']=$_POST['actiune'];}}


}
?>
<?
if ($_SESSION['user']==1){
echo '
<script type="text/javascript" src="milonic_src.js"></script>
<script type="text/javascript" src="mmenudom.js"></script>
<script type="text/javascript" src="menu_data.js"></script>
';
}
?>

<form method="POST" name="Form1" id="Form1" action="">
<input type="hidden" id="actiune" name="actiune" value="">

<a href="http://www.milonic.com/"></a>
<center>
<table border="0" cellpadding="0" cellspacing="0">
        <tr> <td height="60" width="1000" valign="top"><img src="images/sigla.png" width="300" height="60" align="left" ></td> </tr>
        <tr> <td height="116" valign="center" bordercolor="#ECE9D8"><div align="center"><span class="style5">Fi&#351;&#259; de Activitate Zilnic&#259; </span></div></td>
        </tr>
        <tr> <td height="<? if ($_SESSION['user']==1){echo '300';}else{echo '50';} ?>" valign="baseline">&nbsp;
          </td>
        </tr>
</table>

<?
if ($_SESSION['user']==1){


	include "verifica_revizii.php";
	$expirate=0;
	$msg='<table border="0"><tr><td width="200"><marquee behavior=alternate><font size="+2">ATENTIE !!!</font></marquee></td></tr></table><br /> Va rugam sa actualizati reviziile la urmatoarele masini: ';

	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM revizii ");
	while ($row=mysql_fetch_array($sql)) {
					$id_masina=$row["id_masina"];
					$qnr_inm="";
					$qnr_inm="select all * from masini where indice='$id_masina'";
					$rqnr = mysql_query($qnr_inm);
					if ($rqnr) {
						  $rrqnr = mysql_fetch_array($rqnr,MYSQL_ASSOC );
						  $nr_inmatric=$rrqnr["nr_inmatric"];
								}
					if ($nr_inmatric=="")
                    {
                        $nr_inmatric=$id_masina;
                    }

					$exp=$row["exp"];
					if ($exp==1)
						{if ($expirate==1){$msg=$msg.', ';}
						$msg=$msg.'<a href="revizii.php?indice='.$id_masina.'&trim=index.php"><font color="#0000ff">'.$nr_inmatric.'</font></a>';
						$expirate=1;
						}
					}
	if ($expirate==1)
		{echo '<table border="1" cellspacing="0" cellpadding="1"><tr><td>';
		echo '<font color="#ff0000" size="+1">'.$msg.'.</font>';
		echo '</td></tr></table>';
		}
}
 else {
	echo 'Nu sunteti logat!<br>';
	echo '<table><tr><td>Va rugam introduceti parola: ';
	echo'<input type="password" name="parola" id="parola" maxlength="30" value=""/>
	<input type="submit" value="OK"></td></tr></table>';
}



?>

</center>
</form>
</body>
</html>
