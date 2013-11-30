<?
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--<head>-->
<head><link href="calendar.css" rel="stylesheet"></link>
<script language="javascript" src="calendar.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Introducere foi parcurs</title>


<script language="javascript">
function adaugare(){
        var gol=0; msg="Nu ati introdus ";
                if (document.getElementById("nrdoc").value == ""){gol=1; msg=msg+"numar document, ";}
                if (document.getElementById("id_masina").value == ""){gol=1; msg=msg+"nr.inmatriculare, ";}
                if (document.getElementById("zi_e").value == ""){gol=1; msg=msg+"zi emitere, ";}
                if (document.getElementById("luna_e").value == ""){gol=1; msg=msg+"luna emitere, ";}
                if (document.getElementById("an_e").value == ""){gol=1; msg=msg+"an emitere, ";}
                if (document.getElementById("id_sofer_1").value == ""){gol=1; msg=msg+"nici un sofer, ";}
                if (document.getElementById("luna_s").value == ""){gol=1; msg=msg+"luna sos, ";}
                if (document.getElementById("ziua_s").value == ""){gol=1; msg=msg+"ziua sos, ";}
                if (document.getElementById("ora_s").value == ""){gol=1; msg=msg+"ora sos, ";}
                if (document.getElementById("klmtj_s").value == ""){gol=1; msg=msg+"kilometraj sos, ";}
                if (document.getElementById("luna_p").value == ""){gol=1; msg=msg+"luna plec, ";}
                if (document.getElementById("ziua_p").value == ""){gol=1; msg=msg+"ziua plec, ";}
                if (document.getElementById("ora_p").value == ""){gol=1; msg=msg+"ora sos, ";}
                if (document.getElementById("klmtj_p").value == ""){gol=1; msg=msg+"kilometraj plec ";}
                if (document.getElementById("nrdoc_a1").value >0){
                                if (document.getElementById("luna_a1").value == ""){gol=1; msg=msg+"luna alimentare 1, ";}
                                if (document.getElementById("zi_a1").value == ""){gol=1; msg=msg+"zi alimentare 1, ";}
                                if (document.getElementById("klmtj_a1").value == ""){gol=1; msg=msg+"kilometraj alimentare 1, ";}
                                if (document.getElementById("cant1").value == ""){gol=1; msg=msg+"cantitatea 1, ";}
                                if (document.getElementById("pret1").value == ""){gol=1; msg=msg+"pretul 1, ";}
                }
        if (document.getElementById("nrdoc_a2").value >0){
                                if (document.getElementById("luna_a2").value == ""){gol=1; msg=msg+"luna alimentare 2, ";}
                                if (document.getElementById("zi_a2").value == ""){gol=1; msg=msg+"zi alimentare 2, ";}
                                if (document.getElementById("klmtj_a2").value == ""){gol=1; msg=msg+"kilometraj alimentare 2, ";}
                                if (document.getElementById("cant2").value == ""){gol=1; msg=msg+"cantitatea 2, ";}
                                if (document.getElementById("pret2").value == ""){gol=1; msg=msg+"pretul 2, ";}
                }
        if (document.getElementById("nrdoc_a3").value >0){
                                if (document.getElementById("luna_a3").value == ""){gol=1; msg=msg+"luna alimentare 3, ";}
                                if (document.getElementById("zi_a3").value == ""){gol=1; msg=msg+"zi alimentare 3, ";}
                                if (document.getElementById("klmtj_a3").value == ""){gol=1; msg=msg+"kilometraj alimentare 3, ";}
                                if (document.getElementById("cant3").value == ""){gol=1; msg=msg+"cantitatea 3, ";}
                                if (document.getElementById("pret3").value == ""){gol=1; msg=msg+"pretul 3, ";}
                }
        if (document.getElementById("nrdoc_a4").value >0){
                                if (document.getElementById("luna_a4").value == ""){gol=1; msg=msg+"luna alimentare 4, ";}
                                if (document.getElementById("zi_a4").value == ""){gol=1; msg=msg+"zi alimentare 4, ";}
                                if (document.getElementById("klmtj_a4").value == ""){gol=1; msg=msg+"kilometraj alimentare 4, ";}
                                if (document.getElementById("cant4").value == ""){gol=1; msg=msg+"cantitatea 4, ";}
                                if (document.getElementById("pret4").value == ""){gol=1; msg=msg+"pretul4, ";}
                }
        if (document.getElementById("nrdoc_a5").value >0){
                                if (document.getElementById("luna_a5").value == ""){gol=1; msg=msg+"luna alimentare 5, ";}
                                if (document.getElementById("zi_a5").value == ""){gol=1; msg=msg+"zi alimentare 5, ";}
                                if (document.getElementById("klmtj_a5").value == ""){gol=1; msg=msg+"kilometraj alimentare 5, ";}
                                if (document.getElementById("cant5").value == ""){gol=1; msg=msg+"cantitatea 5 ";}
                                if (document.getElementById("pret5").value == ""){gol=1; msg=msg+"pretul5, ";}
                }
        if(gol==0){
                                document.getElementById("OPERATIE").value="AD";
                                document.getElementById("Form1").submit();
        } else {msg=msg+"!"; alert(msg);}
}
function modificare(){
        var gol=0; msg="Nu ati introdus ";
       if(gol==0){
        document.getElementById("OPERATIE").value="MOD";
            document.getElementById("Form1").submit();
          } else {msg=msg+"!"; alert(msg);}
}
function stergere(){
                                document.getElementById("OPERATIE").value="STG";
                                document.getElementById("Form1").submit();
}
function trimite(){
                document.getElementById("nrdoc1").value=document.getElementById("nrdoc").value;
                document.getElementById("OPERATIE").value="TR";
}
function slct_nr_inmatric(){

  document.getElementById("id_masina").value=document.getElementById("slct_mas").value;
}
function slct_nume_sofer_1(){
  document.getElementById("id_sofer_1").value=document.getElementById("slct_sof_1").value;
}
function slct_nume_sofer_2(){
  document.getElementById("id_sofer_2").value=document.getElementById("slct_sof_2").value;
}
function slct_nume_sofer_3(){
  document.getElementById("id_sofer_3").value=document.getElementById("slct_sof_3").value;
}
function slct_nume_sofer_4(){
  document.getElementById("id_sofer_4").value=document.getElementById("slct_sof_4").value;
}
function slct_luna_e(){
  document.getElementById("luna_e").value=document.getElementById("slct_lun_e").value;
}
function slct_luna_s(){
  document.getElementById("luna_s").value=document.getElementById("slct_lun_s").value;
}
function slct_luna_p(){
  document.getElementById("luna_p").value=document.getElementById("slct_lun_p").value;
}
function slct_luna_a1(){
  document.getElementById("luna_a1").value=document.getElementById("slct_lun_a1").value;
}
function slct_luna_a2(){
  document.getElementById("luna_a2").value=document.getElementById("slct_lun_a2").value;
}
function slct_luna_a3(){
  document.getElementById("luna_a3").value=document.getElementById("slct_lun_a3").value;
}
function slct_luna_a4(){
  document.getElementById("luna_a4").value=document.getElementById("slct_lun_a4").value;
}
function slct_luna_a5(){
  document.getElementById("luna_a5").value=document.getElementById("slct_lun_a5").value;
}
function slct_ora_s(){
document.getElementById("ora_s").value=document.getElementById("slct_oras").value;
}
function slct_ora_p(){
document.getElementById("ora_p").value=document.getElementById("slct_orap").value;
}
function slct_ora_a1(){
document.getElementById("ora_a1").value=document.getElementById("slct_oraa1").value;
}
function slct_ora_a2(){
document.getElementById("ora_a2").value=document.getElementById("slct_oraa2").value;
}
function slct_ora_a3(){
document.getElementById("ora_a3").value=document.getElementById("slct_oraa3").value;
}
function slct_ora_a4(){
document.getElementById("ora_a4").value=document.getElementById("slct_oraa4").value;
}
function slct_ora_a5(){
document.getElementById("ora_a5").value=document.getElementById("slct_oraa5").value;
}
function slct_cursa(){
  document.getElementById("").value=document.getElementById("slct_curs").value;
}
function slct_an_e(){
document.getElementById("an_e").value=document.getElementById("slct_ane").value;
}
function slct_zi_e(){
document.getElementById("zi_e").value=document.getElementById("slct_zie").value;
}
function slct_ziua_s(){
document.getElementById("ziua_s").value=document.getElementById("slct_ziuas").value;
}
function slct_ziua_p(){
document.getElementById("ziua_p").value=document.getElementById("slct_ziuap").value;
}
function slct_zi_a1(){
document.getElementById("zi_a1").value=document.getElementById("slct_zia1").value;
}
function slct_zi_a2(){
document.getElementById("zi_a2").value=document.getElementById("slct_zia2").value;
}
function slct_zi_a3(){
document.getElementById("zi_a3").value=document.getElementById("slct_zia3").value;
}
function slct_zi_a4(){
document.getElementById("zi_a4").value=document.getElementById("slct_zia4").value;
}
function slct_zi_a5(){
document.getElementById("zi_a5").value=document.getElementById("slct_zia5").value;
}
function sof_intr(){
        alert("merge");
        document.getElementById("nume").value=document.getElementById("id_sofer_"+val_i).value;
}
function line_click(val_i){
		document.getElementById("nrdoc").value=document.getElementById("field_0_"+val_i).value;
		document.getElementById("nrdoc1").value=document.getElementById("field_0_"+val_i).value;
		document.getElementById("klmtj_s").value=document.getElementById("field_12_"+val_i).value;
}
function line_sel(selectata, randuri){
   for(i=1; i<=randuri; i=i+1){
       if(i!=selectata){
                        document.getElementById("field_0_"+i).bgColor="#cfe4e9";
                        document.getElementById("field_1_"+i).bgColor="#cfe4e9";
                        document.getElementById("field_3_"+i).bgColor="#cfe4e9";
                        document.getElementById("field_4_"+i).bgColor="#cfe4e9";
                        document.getElementById("field_5_"+i).bgColor="#cfe4e9";
                        document.getElementById("field_7_"+i).bgColor="#cfe4e9";
                        document.getElementById("field_8_"+i).bgColor="#cfe4e9";
                        document.getElementById("field_9_"+i).bgColor="#cfe4e9";
                        document.getElementById("field_10_"+i).bgColor="#cfe4e9";
       }
       else{
          document.getElementById("field_0_"+i).bgColor="#33dddd";
          document.getElementById("field_1_"+i).bgColor="#33dddd";
                  document.getElementById("field_3_"+i).bgColor="#33dddd";
                  document.getElementById("field_4_"+i).bgColor="#33dddd";
                  document.getElementById("field_5_"+i).bgColor="#33dddd";
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
           document.getElementById("field_3_"+i).bgColor="#cfe4e9";
           document.getElementById("field_4_"+i).bgColor="#cfe4e9";
           document.getElementById("field_5_"+i).bgColor="#cfe4e9";
           document.getElementById("field_7_"+i).bgColor="#cfe4e9";
           document.getElementById("field_8_"+i).bgColor="#cfe4e9";
           document.getElementById("field_9_"+i).bgColor="#cfe4e9";
           document.getElementById("field_10_"+i).bgColor="#cfe4e9";
   }
}

function salut(nimic){
document.getElementById("nrdoc").value=document.getElementById("field_0_"+nimic).value;
alert("DGFHDGFH");
document.getElementById("Form1").submit();
document.getElementById("form_curse_"+nimic).submit();
}

</script>

<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {font-weight: bold}
.style3 {font-weight: bold}
.style8 {color: #000099; font-size: 18px; font-style: italic; }
.style9 {
        color: #9933FF;
        font-style: italic;
}
.style11 {color: #000099; font-size: 18px; font-style: italic; font-weight: bold; }
.style12 {
        color: #0000CC;
        font-weight: bold;
        font-style: italic;
}
-->
</style>
</head>

<body bgcolor="#cfe4e9">
<center><a href="index.php" class="style2 style3 style1"><font size="+1" color="#000000">&lt;&nbsp;Inapoi</font></a>
</center>

<?php
if ($_SESSION['user']==1){

	$nrdoc=$_GET['nr'];
	if ($nrdoc!=0){
			$qtip_au="select all * from foi_parcurs where nrdoc='$nrdoc'";
			include "conexiune.php";
			$rqt = mysql_query($qtip_au);
			if ($rqt) {
					  $camy = mysql_fetch_array($rqt,MYSQL_ASSOC );
					  $id_masina=$camy["id_masina"];
					  $zi_e=$camy["zi_e"];
					  $luna_e=$camy["luna_e"];
					  $an_e=$camy["an_e"];
					  $data_e=$zi_e.'/'.$luna_e.'/'.$an_e;
					  $traseul=$camy["traseul"];
					  $diurna_sof=$camy["diurna_sof"];
					  $luna_s=$camy["luna_s"];
					  $ziua_s=$camy["ziua_s"];
					  $data_s=$ziua_s.'/'.$luna_s.'/'.$an_e;
					  $ora_s=$camy["ora_s"];
					  $klmtj_s=$camy["klmtj_s"];
					  $luna_p=$camy["luna_p"];
					  $ziua_p=$camy["ziua_p"];
					  $data_p=$ziua_p.'/'.$luna_p.'/'.$an_e;
					  $ora_p=$camy["ora_p"];
					  $klmtj_p=$camy["klmtj_p"];
			}
			$qmasina="select all * from masini where indice='$id_masina'";
			include "conexiune.php";
			$rqt = mysql_query($qmasina);
			if ($rqt) {
									  $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
									  $nr_inmatric=$rrqt["nr_inmatric"];
			}
			/* aduce inapoi la selecturile cu soferii inregistrarile din baza de date */
			$sql=mysql_query("SELECT * FROM foi_parc_sof where nrdoc=$nrdoc");
			$p=0;
			while ($row=mysql_fetch_array($sql)) {
					$p++;
					$var='id_sofer_'.$p;
					$nvar='nume_sofer_'.$p;
					$$var=$row["id_sofer"];
					$in=$$var;
					$qsof="select all * from soferi where indice='$in'";
					include "conexiune.php";
					$rqtc = mysql_query($qsof);
					if ($rqtc) {
							  $rqtp = mysql_fetch_array($rqtc,MYSQL_ASSOC );
							  $$nvar=$rqtp["nume"];
					}
			}
			/* aduce inapoi la selecturile cu alimentarile inregistrarile din baza de date */
			$sqlu=mysql_query("SELECT * FROM alimentari where nrfparc=$nrdoc");
			for ($u=1; $u<=5; $u++){
					$var1='nrdoc_a'.$u;
					$$var1='';
					$var2='ora_a'.$u;
					$$var2='';
					$var3='klmtj_a'.$u;
					$$var3='';
					$var4='cant'.$u;
					$$var4='';
					$var5='pret'.$u;
					$$var5='';
					$var22='data_a'.$u;
					$$var22='';
			}
	
			$u=0;
			while ($row=mysql_fetch_array($sqlu)) {
					$u++;
					$var1='nrdoc_a'.$u;
					$var2='id_masina'.$u;
					$var3='luna_a'.$u;
					$var4='zi_a'.$u;
					$var5='ora_a'.$u;
					$var6='klmtj_a'.$u;
					$var7='cant'.$u;
					$var8='pret'.$u;
					$var9='data_a'.$u;
					$$var1=$row["nrdoc_a"];
					$$var2=$row["id_masina"];
					$$var3=$row["luna_a"];
					$$var4=$row["zi_a"];
					$$var5=$row["ora_a"];
					$$var6=$row["klmtj_a"];
					$$var7=$row["cant"];
					$$var8=$row["pret"];
					$$var9=$$var4.'/'.$$var3.'/'.$an_e;
			}
	} else {
					$id_masina='';
					$zi_e='';
					$luna_e='';
					$an_e='';
					$data_e='';
					$traseul='';
					$diurna_sof='';
					$luna_s='';
					$ziua_s='';
					$ora_s='';
					$ora_p='';
					$data_s='';
					$data_p='';
					$klmtj_p='';
					$klmtj_s='';
					for ($u=1; $u<=5; $u++){
									$var1='nrdoc_a'.$u;
									$$var1='';
									$var2='ora_a'.$u;
									$$var2='';
									$var3='klmtj_a'.$u;
									$$var3='';
									$var4='cant'.$u;
									$$var4='';
									$var5='pret'.$u;
									$$var5='';
									$var22='data_a'.$u;
									$$var22='';
					}
	}
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="AD"){
			include "conexiune.php";
	
					$nrdoc=$_POST['nrdoc'];
					$id_masina=$_POST['id_masina'];
					$zi_e=$_POST['zi_e'];
					$luna_e=$_POST['luna_e'];
					$an_e=$_POST['an_e'];
					$traseul=$_POST['traseul'];
					$diurna_sof=$_POST['diurna_sof'];
					$luna_s=$_POST['luna_s'];
					$ziua_s=$_POST['ziua_s'];
					$ora_s=$_POST['ora_s'];
					$klmtj_s=$_POST['klmtj_s'];
					$luna_p=$_POST['luna_p'];
					$ziua_p=$_POST['ziua_p'];
					$ora_p=$_POST['ora_p'];
					$klmtj_p=$_POST['klmtj_p'];
	
					$id_sofer_1=$_POST['id_sofer_1'];
					$id_sofer_2=$_POST['id_sofer_2'];
					$id_sofer_3=$_POST['id_sofer_3'];
					$id_sofer_4=$_POST['id_sofer_4'];
	
					$nrdoc_a1=$_POST['nrdoc_a1'];
					$luna_a1=$_POST['luna_a1'];
					$zi_a1=$_POST['zi_a1'];
					$ora_a1=$_POST['ora_a1'];
					$klmtj_a1=$_POST['klmtj_a1'];
					$cant1=$_POST['cant1'];
					$pret1=$_POST['pret1'];
	
					$nrdoc_a2=$_POST['nrdoc_a2'];
					$luna_a2=$_POST['luna_a2'];
					$zi_a2=$_POST['zi_a2'];
					$ora_a2=$_POST['ora_a2'];
					$klmtj_a2=$_POST['klmtj_a2'];
					$cant2=$_POST['cant2'];
					$pret2=$_POST['pret2'];
	
					$nrdoc_a3=$_POST['nrdoc_a3'];
					$luna_a3=$_POST['luna_a3'];
					$zi_a3=$_POST['zi_a3'];
					$ora_a3=$_POST['ora_a3'];
					$klmtj_a3=$_POST['klmtj_a3'];
					$cant3=$_POST['cant3'];
					$pret3=$_POST['pret3'];
	
					$nrdoc_a4=$_POST['nrdoc_a4'];
					$luna_a4=$_POST['luna_a4'];
					$zi_a4=$_POST['zi_a4'];
					$ora_a4=$_POST['ora_a4'];
					$klmtj_a4=$_POST['klmtj_a4'];
					$cant4=$_POST['cant4'];
					$pret4=$_POST['pret4'];
	
					$nrdoc_a5=$_POST['nrdoc_a5'];
					$luna_a5=$_POST['luna_a5'];
					$zi_a5=$_POST['zi_a5'];
					$ora_a5=$_POST['ora_a5'];
					$klmtj_a5=$_POST['klmtj_a5'];
					$cant5=$_POST['cant5'];
					$pret5=$_POST['pret5'];
	
	
			$query="INSERT INTO foi_parcurs (nrdoc, id_masina, zi_e, luna_e, an_e, traseul ,diurna_sof, luna_s, ziua_s, ora_s, klmtj_s, luna_p, ziua_p, ora_p, klmtj_p) VALUES ('$nrdoc','$id_masina','$zi_e','$luna_e','$an_e','$traseul','$diurna_sof','$luna_s','$ziua_s','$ora_s','$klmtj_s','$luna_p','$ziua_p','$ora_p','$klmtj_p')";
			if (!mysql_query($query)) {
							die(mysql_error());
			} else {}
								   mysql_close($conexiune);
	
			include "conexiune.php";
					$query="INSERT INTO foi_parc_sof (nrdoc, id_sofer) VALUES ('$nrdoc','$id_sofer_1')";
					if (!mysql_query($query)) {
							die(mysql_error());
			} else {}
							mysql_close($conexiune);
	
			if ($id_sofer_2 > 0) {
									include "conexiune.php";
									$query="INSERT INTO foi_parc_sof (nrdoc, id_sofer) VALUES ('$nrdoc','$id_sofer_2')";
					if (!mysql_query($query)) {
							die(mysql_error());
			} else {}
							mysql_close($conexiune);
			}
	
			if ($id_sofer_3 > 0) {
					include "conexiune.php";
					$query="INSERT INTO foi_parc_sof (nrdoc, id_sofer) VALUES ('$nrdoc','$id_sofer_3')";
			if (!mysql_query($query)) {
							die(mysql_error());
			} else {}
			mysql_close($conexiune);
			}
	
			if ($id_sofer_4 > 0) {
					include "conexiune.php";
					$query="INSERT INTO foi_parc_sof (nrdoc, id_sofer) VALUES ('$nrdoc','$id_sofer_4')";
			if (!mysql_query($query)) {
							die(mysql_error());
			} else {}
							mysql_close($conexiune);
			}
			if ($nrdoc_a1 > 0) {
					include "conexiune.php";
					$query="INSERT INTO alimentari (nrdoc_a, nrfparc, id_masina, luna_a, zi_a, ora_a, klmtj_a, cant, pret) VALUES ('$nrdoc_a1','$nrdoc','$id_masina','$luna_a1','$zi_a1','$ora_a1','$klmtj_a1','$cant1','$pret1')";
			if (!mysql_query($query)) {
							die(mysql_error());
			} else {}
							mysql_close($conexiune);
			};
			if ($nrdoc_a2 > 0) {
							include "conexiune.php";
							$query="INSERT INTO alimentari (nrdoc_a, nrfparc, id_masina, luna_a, zi_a, ora_a, klmtj_a, cant, pret) VALUES ('$nrdoc_a2','$nrdoc','$id_masina','$luna_a2','$zi_a2','$ora_a2','$klmtj_a2','$cant2','$pret2')";
			if (!mysql_query($query)) {
							die(mysql_error());
			} else {}
							mysql_close($conexiune);
					};
	
					if ($nrdoc_a3 > 0) {
									include "conexiune.php";
									$query="INSERT INTO alimentari (nrdoc_a, nrfparc, id_masina, luna_a, zi_a, ora_a, klmtj_a, cant, pret) VALUES ('$nrdoc_a3','$nrdoc','$id_masina','$luna_a3','$zi_a3','$ora_a3','$klmtj_a3','$cant3','$pret3')";
			if (!mysql_query($query)) {
							die(mysql_error());
			} else {}
							mysql_close($conexiune);
					};
	
			if ($nrdoc_a4 > 0) {
							include "conexiune.php";
							$query="INSERT INTO alimentari (nrdoc_a, nrfparc, id_masina, luna_a, zi_a, ora_a, klmtj_a, cant, pret) VALUES ('$nrdoc_a4','$nrdoc','$id_masina','$luna_a4','$zi_a4','$ora_a4','$klmtj_a4','$cant4','$pret4')";
			if (!mysql_query($query)) {
							die(mysql_error());
			} else {}
							mysql_close($conexiune);
					};
	
			if ($nrdoc_a5 > 0) {
							include "conexiune.php";
								   $query="INSERT INTO alimentari (nrdoc_a, nrfparc, id_masina, luna_a, zi_a, ora_a, klmtj_a, cant, pret) VALUES ('$nrdoc_a5','$nrdoc','$id_masina','$luna_a5','$zi_a5','$ora_a5','$klmtj_a5','$cant5','$pret5')";
			if (!mysql_query($query)) {
							die(mysql_error());
			} else {}
							mysql_close($conexiune);
					};
					$nrdoc='';
					$traseul='';
					$diurna_sof='';
					$ora_s='';
					$klmtj_s='';
					$ora_p='';
					$klmtj_p='';
					$nrdoc_a1='';
					$ora_a1='';
					$klmtj_a1='';
					$cant1='';
					$pret1='';
					$nrdoc_a2='';
					$ora_a2='';
					$klmtj_a2='';
					$cant2='';
					$pret2='';
	};
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="STG"){
			include "conexiune.php";
					$nrdoc=$_POST['nrdoc'];
					$query="DELETE FROM foi_parcurs WHERE nrdoc=$nrdoc";
					if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
	
					include "conexiune.php";
					$nrdoc=$_POST['nrdoc'];
					$query="DELETE FROM foi_parc_sof WHERE nrdoc=$nrdoc";
					if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
	
					include "conexiune.php";
					$nrdoc=$_POST['nrdoc'];
					$query="DELETE FROM alimentari WHERE nrfparc=$nrdoc";
					if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
	
					include "conexiune.php";
					$nrdoc=$_POST['nrdoc'];
					$query="DELETE FROM foi_parc_pl WHERE nrdoc=$nrdoc";
					if (!mysql_query($query)) {
			die(mysql_error());
					} else {}
			mysql_close($conexiune);
	};
	
	
	if(isset($_POST["OPERATIE"]) && $_POST["OPERATIE"]=="MOD"){
							$nrdoc=$_POST['nrdoc'];
							$id_masina=$_POST['id_masina'];
							$zi_e=$_POST['zi_e'];
							$luna_e=$_POST['luna_e'];
							$an_e=$_POST['an_e'];
							$traseul=$_POST['traseul'];
							$diurna_sof=$_POST['diurna_sof'];
							$luna_s=$_POST['luna_s'];
							$ziua_s=$_POST['ziua_s'];
							$ora_s=$_POST['ora_s'];
							$klmtj_s=$_POST['klmtj_s'];
							$luna_p=$_POST['luna_p'];
							$ziua_p=$_POST['ziua_p'];
							$ora_p=$_POST['ora_p'];
							$klmtj_p=$_POST['klmtj_p'];
	
							for ($pa=1; $pa<=4; $pa++){
											$var='id_sofer_'.$pa;
											$$var=$_POST[$var];
							}
							for ($pa=1; $pa<=5; $pa++){
											$var1='nrdoc_a'.$pa;
											$var2='luna_a'.$pa;
											$var3='zi_a'.$pa;
											$var4='ora_a'.$pa;
											$var5='klmtj_a'.$pa;
											$var6='cant'.$pa;
											$var7='pret'.$pa;
											$$var1=$_POST[$var1];
											$$var2=$_POST[$var2];
											$$var3=$_POST[$var3];
											$$var4=$_POST[$var4];
											$$var5=$_POST[$var5];
											$$var6=$_POST[$var6];
											$$var7=$_POST[$var7];
							}
	
							include "conexiune.php";
							$query="DELETE FROM foi_parc_sof WHERE nrdoc=$nrdoc";
							if (!mysql_query($query)) {
											die(mysql_error());
							} else {}
											mysql_close($conexiune);
	
							for ($pa=1; $pa<=4; $pa++){
											$var='id_sofer_'.$pa;
											$tlc=$$var;
											if ($tlc > 0 ){
												   include "conexiune.php";
												   $query="INSERT INTO foi_parc_sof (nrdoc, id_sofer) VALUES ('$nrdoc', '$tlc')";
												   if (!mysql_query($query)) {
															die (mysql_error());
												   } else {}
															mysql_close($conexiune);
											}
							}
	
							include "conexiune.php";
							$query="DELETE FROM alimentari WHERE nrfparc=$nrdoc";
							if (!mysql_query($query)) {
										   die(mysql_error());
							} else {}
							mysql_close($conexiune);
	
							for ($pa=1; $pa<=5; $pa++){
											$var1='nrdoc_a'.$pa;
											$var2='luna_a'.$pa;
											$var3='zi_a'.$pa;
											$var4='ora_a'.$pa;
											$var5='klmtj_a'.$pa;
											$var6='cant'.$pa;
											$var7='pret'.$pa;
											$$var1=$_POST[$var1];
											$$var2=$_POST[$var2];
											$$var3=$_POST[$var3];
											$$var4=$_POST[$var4];
											$$var5=$_POST[$var5];
											$$var6=$_POST[$var6];
											$$var7=$_POST[$var7];
	
											$bbt1=$$var1;
											$bbt2=$$var2;
											$bbt3=$$var3;
											$bbt4=$$var4;
											$bbt5=$$var5;
											$bbt6=$$var6;
											$bbt7=$$var7;
	
											if ($bbt1 > 0 ){
							   include "conexiune.php";
							   $query="INSERT INTO alimentari (nrdoc_a, luna_a, zi_a, ora_a, klmtj_a, cant, pret, nrfparc, id_masina) VALUES ('$bbt1', '$bbt2', '$bbt3', '$bbt4', '$bbt5', '$bbt6', '$bbt7', $nrdoc, $id_masina)";
											if (!mysql_query($query)) {
															die (mysql_error());
											} else {}
													mysql_close($conexiune);
											}
							}
	
							include "conexiune.php";
							$query="DELETE FROM foi_parcurs WHERE nrdoc=$nrdoc";
							if (!mysql_query($query)) {
											die(mysql_error());
							} else {}
									  mysql_close($conexiune);
									  include "conexiune.php";
				 $query="INSERT INTO foi_parcurs (nrdoc, id_masina, zi_e, luna_e, an_e, traseul ,diurna_sof, luna_s, ziua_s, ora_s, klmtj_s, luna_p, ziua_p, ora_p, klmtj_p) VALUES         ('$nrdoc','$id_masina','$zi_e','$luna_e','$an_e','$traseul','$diurna_sof','$luna_s','$ziua_s','$ora_s','$klmtj_s','$luna_p','$ziua_p','$ora_p','$klmtj_p')";
					if (!mysql_query($query)) {
							die(mysql_error());
					} else {}
							mysql_close($conexiune);
	
	};
} else {echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
}			

?>

<form action="" method="post" name="Form1" id="Form1">
<!-- asta memoreaza nr. de inmatriculare, cand dau click pe o optiune -->

<input type="hidden" id="OPERATIE" name="OPERATIE" value="">

<input type="hidden" id="id_masina" name="id_masina" value="<? echo $id_masina; ?>">
<input type="hidden" id="id_sofer_1" name="id_sofer_1" value="<? echo $id_sofer_1; ?>">
<input type="hidden" id="id_sofer_2" name="id_sofer_2" value="<? echo $id_sofer_2; ?>">
<input type="hidden" id="id_sofer_4" name="id_sofer_4" value="<? echo $id_sofer_4; ?>">
<input type="hidden" id="" name="" value="">
<input type="hidden" id="nume" name="nume" value="">
<center>
<table width="1100" border="1" cellpadding="0">
        <tr><td> <input type="hidden" id="id_sofer_3" name="id_sofer_3" value="<? echo $id_sofer_3; ?>" />
          <table cellpadding="0"><tr><td height="35"><strong>Nr. foaie parcurs: </strong>&nbsp;
          <input type="text" size="10" maxlength="10" name="nrdoc" id="nrdoc" value="<? if ($nrdoc=='0'){echo '';} else {echo $nrdoc;}; ?>" />
&nbsp;&nbsp;&nbsp; <strong>Nr.de inmatriculare:</strong>
<?
if ($_SESSION['user']==1){

                   require "array_masini.php";$nr_masini=$i-1;
                   echo "<select name='slct_mas' id='slct_mas'";
                   echo " onchange='slct_nr_inmatric();'>";
                   echo "<option selected value='".$id_masina."'>".$nr_inmatric."</option>";
                        for($i=1;$i<=$nr_masini;$i++){

                         echo "<option value='$masina_i[$i]'>$masina_den[$i]</option>";
                                 echo "
                                 ";
                   }
                   echo "</select>";
                /* 'zi_e', 'luna_e', 'an_e',  */
}
?>
&nbsp; <strong>Data emiterii: </strong>
                  <input type="hidden" size="2" maxlength="2" name="zi_e" id="zi_e" value="<? echo $zi_e; ?>"/>

                  <input type="hidden" size="2" maxlength="2" name="luna_e" id="luna_e" value="<? echo $luna_e; ?>"/>

                   <input type="hidden" size="4" maxlength="4" name="an_e" id="an_e" value="<? echo $an_e;?>" />
                   <input type="text" size="10" maxlength="10" name="data_e" id="data_e" disabled value="<? echo $data_e; ?>"/>
                   <a onclick="ShowCal('data_e', 'zi_e', 'luna_e', 'an_e', 'calend_em'); return false;"><img style="border:none" src="images/calendar.gif" /></a></td>
        </tr></table></td></tr>

  <tr><td> <div align="left"><span class="style11">D e t a l i i &nbsp;&nbsp;&nbsp;c u r s a:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style12">Optional:</span>&nbsp;&nbsp;<strong>Traseul:</strong>
        <input type="text" size="20" maxlength="20" name="traseul" id="traseul" value="<? echo $traseul; ?>" />
        <span class="style12">Optional:</span><strong>&nbsp;&nbspDiurna sofer:</strong>
                <input type="text" size="10" maxlength="10" name="diurna_sof" id="diurna_sof" value="<? echo $diurna_sof; ?>" />
        </div>
    <table><tr>
                <td>
                </td>

                <td height="35"><strong>Nume soferi:</strong></td>
        <td><strong>1:</strong>
<?
if ($_SESSION['user']==1){

                   require "array_soferi.php";$nr_soferi=$i-1;
                   echo "<select name='slct_sof_1' id='slct_sof_1'";
                   echo " onchange='slct_nume_sofer_1();'>";
                   echo "<option selected value='".$id_sofer_1."'>".$nume_sofer_1."</option>";
                        for($i=1;$i<=$nr_soferi;$i++){

                         echo "<option value='$sofer_i[$i]'>$sofer_den[$i]</option>";
                                 echo "
                                 ";
                   }
                   echo "</select>";
}
?>
                   &nbsp;&nbsp;<strong>2:
                   </strong>
<?
if ($_SESSION['user']==1){

                   require "array_soferi.php";$nr_soferi=$i-1;
                   echo "<select name='slct_sof_2' id='slct_sof_2'";
                   echo " onchange='slct_nume_sofer_2();'>";
                   echo "<option selected value='".$id_sofer_2."'>".$nume_sofer_2."</option>";
                   if ($id_sofer_2!=''){echo "<option value='0'></option>";};
                        for($i=1;$i<=$nr_soferi;$i++){
                         echo "<option value='$sofer_i[$i]'>$sofer_den[$i]</option>";
                                 echo "
                                 ";
                   }
                   echo "</select>";
}
?>

                   &nbsp;&nbsp;<strong>3:</strong>
<?
if ($_SESSION['user']==1){

                   require "array_soferi.php";$nr_soferi=$i-1;
                   echo "<select name='slct_sof_3' id='slct_sof_2'";
                   echo " onchange='slct_nume_sofer_3();'>";
                   echo "<option selected value='".$id_sofer_3."'>".$nume_sofer_3."</option>";
                   if ($id_sofer_3!=''){echo "<option value='0'></option>";};
                        for($i=1;$i<=$nr_soferi;$i++){
                         echo "<option value='$sofer_i[$i]'>$sofer_den[$i]</option>";
                                 echo "
                                 ";
                   }
                   echo "</select>";
}
?>

                   &nbsp;&nbsp;<strong>4:</strong>
<?
if ($_SESSION['user']==1){

                   require "array_soferi.php";$nr_soferi=$i-1;
                   echo "<select name='slct_sof_4' id='slct_sof_4'";
                   echo " onchange='slct_nume_sofer_4();'>";
                   echo "<option selected value='".$id_sofer_4."'>".$nume_sofer_4."</option>";
                   if ($id_sofer_4!=''){echo "<option value='0'></option>";};
                        for($i=1;$i<=$nr_soferi;$i++){
                         echo "<option value='$sofer_i[$i]'>$sofer_den[$i]</option>";
                                 echo "
                                 ";
                   }
                   echo "</select>";
}
?>
</td></tr></table>
        <strong>Data sosire<em>:</em></strong>

         <input type="text" size="10" maxlength="10" name="data_s" id="data_s" disabled value="<? echo $data_s; ?>"/>
          <a onclick="ShowCal('data_s', 'ziua_s', 'luna_s', 'an_s', 'calend_s'); return false;"><img style="border:none" src="images/calendar.gif" /></a>
          <input type="hidden" size="4" maxlength="4" name="an_s" id="an_s" value="<? echo $an_e; ?>" />
          <input type="hidden" size="2" maxlength="2" name="luna_s" id="luna_s" value="<? echo $luna_s; ?>" />
          <input type="hidden" size="2" maxlength="2" name="ziua_s" id="ziua_s" value="<? echo $ziua_s; ?>" />


                                                  <strong>ora:</strong>  </strong>&nbsp;
          <select name='slct_oras' id='slct_oras' onchange='slct_ora_s();'><option selected value=<? echo "'".$ora_s."'>".$ora_s; ?></option>
                                 <option value='1'>1</option>
                                 <option value='2'>2</option>
                                 <option value='3'>3</option>
                                 <option value='4'>4</option>
                                 <option value='5'>5</option>
                                 <option value='6'>6</option>
                                 <option value='7'>7</option>
                                 <option value='8'>8</option>
                                 <option value='9'>9</option>
                                 <option value='10'>10</option>
                                 <option value='11'>11</option>
                                 <option value='12'>12</option>
                                 <option value='13'>13</option>
                                 <option value='14'>14</option>
                                 <option value='15'>15</option>
                                 <option value='16'>16</option>
                                 <option value='17'>17</option>
                                 <option value='18'>18</option>
                                 <option value='19'>19</option>
                                 <option value='20'>20</option>
                                 <option value='21'>21</option>
                                 <option value='22'>22</option>
                                 <option value='23'>23</option>
                                 <option value='24'>24</option></select>

                <input type="hidden" size="2" maxlength="2" name="ora_s" id="ora_s" value="0" />
                                                                  <strong>kilometraj sos:</strong>
          <input type="text" size="8" maxlength="8" name="klmtj_s" id="klmtj_s" value="<? echo $klmtj_s; ?>" />&nbsp;<em>


    </em><strong>Data plecare</strong><em><strong>:</strong></em>
        <input type="text" size="10" maxlength="10" name="data_p" id="data_p" disabled value="<? echo $data_p; ?>"/>
        <a onclick="ShowCal('data_p', 'ziua_p', 'luna_p', 'an_p', 'calend_p'); return false;"><img style="border:none" src="images/calendar.gif" /></a>
        <input type="hidden" size="2" maxlength="2" name="luna_p" id="luna_p" value="<? echo $luna_p; ?>" />&nbsp;
        <input type="hidden" size="2" maxlength="2" name="ziua_p" id="ziua_p" value="<? echo $ziua_p; ?>"/>
        <input type="hidden" size="2" maxlength="2" name="an_p" id="an_p" value="<? echo $an_e; ?>"/>
           <!--  <input type="text" size="2" maxlength="2" name="ziua_p" id="ziua_p" />  -->
                <strong>&nbsp;ora:</strong>
                 <select name='slct_orap' id='slct_orap' onchange='slct_ora_p();'><option selected value=<? echo "'".$ora_p."'>".$ora_p; ?></option>
                                 <option value='1'>1</option>
                                 <option value='2'>2</option>
                                 <option value='3'>3</option>
                                 <option value='4'>4</option>
                                 <option value='5'>5</option>
                                 <option value='6'>6</option>
                                 <option value='7'>7</option>
                                 <option value='8'>8</option>
                                 <option value='9'>9</option>
                                 <option value='10'>10</option>
                                 <option value='11'>11</option>
                                 <option value='12'>12</option>
                                 <option value='13'>13</option>
                                 <option value='14'>14</option>
                                 <option value='15'>15</option>
                                 <option value='16'>16</option>
                                 <option value='17'>17</option>
                                 <option value='18'>18</option>
                                 <option value='19'>19</option>
                                 <option value='20'>20</option>
                                 <option value='21'>21</option>
                                 <option value='22'>22</option>
                                 <option value='23'>23</option>
                                 <option value='24'>24</option></select>
                 <input type="hidden" size="2" maxlength="2" name="ora_p" id="ora_p" value="0" />
          &nbsp;
                                                  <strong>kilometraj plec:
                  <input type="text" size="8" maxlength="8" name="klmtj_p" id="klmtj_p" value="<? echo $klmtj_p; ?>" />
                                  </strong>&nbsp;

        </td>
        </tr>
        <tr><td><table width="1091">
          <tr>
                <td>           <div align="left"><strong> <span class="style8">D e t a l i i &nbsp;&nbsp;&nbsp;a l i m e n t a r e:</span></strong>&nbsp;&nbsp;&nbsp;</strong></div></td></tr>
                  <td> <strong><span class="style9">1</span> Nr.doc.alim 1:</strong>&nbsp;
                      <input type="text" size="10" maxlength="10" name="nrdoc_a1" id="nrdoc_a1" value="<? echo $nrdoc_a1; ?>" />&nbsp;
                <strong>Data alim.:</strong>
                 <input type="hidden" size="4" maxlength="4" name="an_a1" id="an_a1" value="<? echo $an_e;?>" />
                 <input type="text" size="10" maxlength="10" name="data_a1" id="data_a1" disabled  value="<? echo $data_a1;?>" />
                 <a onclick="ShowCal('data_a1', 'zi_a1', 'luna_a1', 'an_a1', 'calend_a1'); return false;"><img style="border:none" src="images/calendar.gif" /></a>
                 <input type="hidden" size="2" maxlength="2" name="luna_a1" id="luna_a1" value="<? echo $luna_a1;?>"  />
                                   &nbsp;
                                   <input type="hidden" size="2" maxlength="2" name="zi_a1" id="zi_a1" value="<? echo $zi_a1 ;?>" />

                                 <!--<input type="text" size="2" maxlength="2" name="zi_a1" id="zi_a1" /> -->
                                 &nbsp; <strong>Ora: </strong>
                     <select name='slct_oraa1' id='slct_oraa1' onchange='slct_ora_a1();'><option selected value=<? echo "'".$ora_a1."'>".$ora_a1; ?></option>
                                 <option value='1'>1</option>
                                 <option value='2'>2</option>
                                 <option value='3'>3</option>
                                 <option value='4'>4</option>
                                 <option value='5'>5</option>
                                 <option value='6'>6</option>
                                 <option value='7'>7</option>
                                 <option value='8'>8</option>
                                 <option value='9'>9</option>
                                 <option value='10'>10</option>
                                 <option value='11'>11</option>
                                 <option value='12'>12</option>
                                 <option value='13'>13</option>
                                 <option value='14'>14</option>
                                 <option value='15'>15</option>
                                 <option value='16'>16</option>
                                 <option value='17'>17</option>
                                 <option value='18'>18</option>
                                 <option value='19'>19</option>
                                 <option value='20'>20</option>
                                 <option value='21'>21</option>
                                 <option value='22'>22</option>
                                 <option value='23'>23</option>
                                 <option value='24'>24</option></select>

                <input type="hidden" size="2" maxlength="2" name="ora_a1" id="ora_a1" value="<? echo $ora_a1;?>" />
                <strong>Kilomtj. aliment.</strong>
                                <input type="text" size="8" maxlength="8" name="klmtj_a1" id="klmtj_a1" value="<? echo $klmtj_a1; ?>" />
                                <strong>Cantit.</strong>
                                <input type="text" size="10" maxlength="10" name="cant1" id="cant1" value="<? echo $cant1; ?>" />
                           <strong>Pret/litru</strong>
                         <input type="text" size="10" maxlength="10" name="pret1" id="pret1" value="<? echo $pret1; ?>" />        </tr></table></td></tr>



        <tr><td><table><tr>
                <td> <strong><span class="style9">2</span> Nr.doc.alim 2:</strong>&nbsp;
                  <input type="text" size="10" maxlength="10" name="nrdoc_a2" id="nrdoc_a2" value="<? echo $nrdoc_a2; ?>"  />                  &nbsp;
                <strong>Data alim.:</strong>
                <input type="hidden" size="4" maxlength="4" name="an_a2" id="an_a2"  value="<? echo $an_e;?>" />
                 <input type="text" size="10" maxlength="10" name="data_a2" id="data_a2" disabled  value="<? echo $data_a2; ?>" />
                 <a onclick="ShowCal('data_a2', 'zi_a2', 'luna_a2', 'an_a2', 'calend_a2'); return false;"><img style="border:none" src="images/calendar.gif" /></a>

                <input type="hidden" size="2" maxlength="2" name="luna_a2" id="luna_a2" value="<? echo $luna_a2;?>"  />
                                   &nbsp;
                                   <input type="hidden" size="2" maxlength="2" name="zi_a2" id="zi_a2" value="<? echo $zi_a2;?>"  />
                &nbsp; <strong>Ora: </strong>

                                <select name='slct_oraa2' id='slct_oraa2' onchange='slct_ora_a2();'><option selected value=<? echo "'".$ora_a2."'>".$ora_a2; ?></option>
                                 <option value='1'>1</option>
                                 <option value='2'>2</option>
                                 <option value='3'>3</option>
                                 <option value='4'>4</option>
                                 <option value='5'>5</option>
                                 <option value='6'>6</option>
                                 <option value='7'>7</option>
                                 <option value='8'>8</option>
                                 <option value='9'>9</option>
                                 <option value='10'>10</option>
                                 <option value='11'>11</option>
                                 <option value='12'>12</option>
                                 <option value='13'>13</option>
                                 <option value='14'>14</option>
                                 <option value='15'>15</option>
                                 <option value='16'>16</option>
                                 <option value='17'>17</option>
                                 <option value='18'>18</option>
                                 <option value='19'>19</option>
                                 <option value='20'>20</option>
                                 <option value='21'>21</option>
                                 <option value='22'>22</option>
                                 <option value='23'>23</option>
                                 <option value='24'>24</option></select>
                        <input type="hidden" size="2" maxlength="2" name="ora_a2" id="ora_a2"  value="<? echo $ora_a2;?>"   />
                                <strong>Kilomtj. aliment.</strong>
                                <input type="text" size="8" maxlength="8" name="klmtj_a2" id="klmtj_a2" value="<? echo $klmtj_a2; ?>" />
                                <strong>Cantit.</strong>
                                <input type="text" size="10" maxlength="10" name="cant2" id="cant2" value="<? echo $cant2; ?>" />
                           <strong>Pret/litru</strong>
                         <input type="text" size="10" maxlength="10" name="pret2" id="pret2" value="<? echo $pret2; ?>" />        </tr></table></td></tr>


<tr><td><table><tr>
<td> <strong><span class="style9">3</span> Nr.doc.alim 3:</strong>&nbsp;
                <input type="text" size="10" maxlength="10" name="nrdoc_a3" id="nrdoc_a3" value="<? echo $nrdoc_a3; ?>" />
                &nbsp;
                <strong>Data alim.:</strong>
                <input type="hidden" size="4" maxlength="4" name="an_a3" id="an_a3" value="<? echo $an_e;?>" />
                 <input type="text" size="10" maxlength="10" name="data_a3" id="data_a3" disabled  value="<? echo $data_a3;?>" />
                 <a onclick="ShowCal('data_a3', 'zi_a3', 'luna_a3', 'an_a3', 'calend_a3'); return false;"><img style="border:none" src="images/calendar.gif" /></a>

                <input type="hidden" size="2" maxlength="2" name="luna_a3" id="luna_a3"  value="<? echo $luna_a3;?>" />
                                   &nbsp;
                                   <input type="hidden" size="2" maxlength="2" name="zi_a3" id="zi_a3" />
                &nbsp; <strong>Ora: </strong>
                    <select name='slct_oraa3' id='slct_oraa3' onchange='slct_ora_a3();'><option selected value=<? echo "'".$ora_a3."'>".$ora_a3; ?></option>
                                 <option value='1'>1</option>
                                 <option value='2'>2</option>
                                 <option value='3'>3</option>
                                 <option value='4'>4</option>
                                 <option value='5'>5</option>
                                 <option value='6'>6</option>
                                 <option value='7'>7</option>
                                 <option value='8'>8</option>
                                 <option value='9'>9</option>
                                 <option value='10'>10</option>
                                 <option value='11'>11</option>
                                 <option value='12'>12</option>
                                 <option value='13'>13</option>
                                 <option value='14'>14</option>
                                 <option value='15'>15</option>
                                 <option value='16'>16</option>
                                 <option value='17'>17</option>
                                 <option value='18'>18</option>
                                 <option value='19'>19</option>
                                 <option value='20'>20</option>
                                 <option value='21'>21</option>
                                 <option value='22'>22</option>
                                 <option value='23'>23</option>
                                 <option value='24'>24</option></select>

                         <input type="hidden" size="2" maxlength="2" name="ora_a3" id="ora_a3" value="<? echo $ora_a3;?>" />
                            <strong>Kilomtj. aliment.</strong>
                                <input type="text" size="8" maxlength="8" name="klmtj_a3" id="klmtj_a3" value="<? echo $klmtj_a3; ?>" / />
                                <strong>Cantit.</strong>
                                <input type="text" size="10" maxlength="10" name="cant3" id="cant3" value="<? echo $cant3; ?>" />
                           <strong>Pret/litru</strong>
                         <input type="text" size="10" maxlength="10" name="pret3" id="pret3" value="<? echo $pret3; ?>" />

</tr></table></td></tr>


<tr><td><table><tr>
<td> <strong><span class="style9">4</span> Nr.doc.alim 4:</strong>&nbsp;
                <input type="text" size="10" maxlength="10" name="nrdoc_a4" id="nrdoc_a4" value="<? echo $nrdoc_a4; ?>" />&nbsp;
                <strong>Data alim.:</strong>
                <input type="hidden" size="4" maxlength="4" name="an_a4" id="an_a4" value="<? echo $an_e;?>" />
                <input type="text" size="10" maxlength="10" name="data_a4" id="data_a4" disabled  value="<? echo $data_a4;?>" />
                 <a onclick="ShowCal('data_a4', 'zi_a4', 'luna_a4', 'an_a4', 'calend_a4'); return false;"><img style="border:none" src="images/calendar.gif" /></a>

                <input type="hidden" size="2" maxlength="2" name="luna_a4" id="luna_a4" value="<? echo $luna_a4;?>"  />
                                   &nbsp;
                                   <input type="hidden" size="2" maxlength="2" name="zi_a4" id="zi_a4" />
                &nbsp; <strong>Ora: </strong>
                    <select name='slct_oraa4' id='slct_oraa4' onchange='slct_ora_a4();'><option selected value=<? echo "'".$ora_a4."'>".$ora_a4; ?></option>
                                 <option value='1'>1</option>
                                 <option value='2'>2</option>
                                 <option value='3'>3</option>
                                 <option value='4'>4</option>
                                 <option value='5'>5</option>
                                 <option value='6'>6</option>
                                 <option value='7'>7</option>
                                 <option value='8'>8</option>
                                 <option value='9'>9</option>
                                 <option value='10'>10</option>
                                 <option value='11'>11</option>
                                 <option value='12'>12</option>
                                 <option value='13'>13</option>
                                 <option value='14'>14</option>
                                 <option value='15'>15</option>
                                 <option value='16'>16</option>
                                 <option value='17'>17</option>
                                 <option value='18'>18</option>
                                 <option value='19'>19</option>
                                 <option value='20'>20</option>
                                 <option value='21'>21</option>
                                 <option value='22'>22</option>
                                 <option value='23'>23</option>
                                 <option value='24'>24</option></select>

                <input type="hidden" size="2" maxlength="2" name="ora_a4" id="ora_a4" value="<? echo $ora_a4;?>" />
                <strong>Kilomtj. aliment.</strong>
                                <input type="text" size="8" maxlength="8" name="klmtj_a4" id="klmtj_a4" value="<? echo $klmtj_a4; ?>" //>
                                <strong>Cantit.</strong>
                                <input type="text" size="10" maxlength="10" name="cant4" id="cant4" value="<? echo $cant4; ?>" />
                           <strong>Pret/litru</strong>
                         <input type="text" size="10" maxlength="10" name="pret4" id="pret4" value="<? echo $pret4; ?>" /></tr></table></td></tr>


<tr><td><table><tr>
<td> <strong><span class="style9">5</span> Nr.doc.alim 5:</strong>&nbsp;
                <input type="text" size="10" maxlength="10" name="nrdoc_a5" id="nrdoc_a5" value="<? echo $nrdoc_a5; ?>" />&nbsp;
                <strong>Data alim.:</strong>
                <input type="hidden" size="4" maxlength="4" name="an_a5" id="an_a5" value="<? echo $an_e;?>" />
                <input type="text" size="10" maxlength="10" name="data_a5" id="data_a5" disabled  value="<? echo $data_a5;?>" />
                <a onclick="ShowCal('data_a5', 'zi_a5', 'luna_a5', 'an_a5', 'calend_a5'); return false;"><img style="border:none" src="images/calendar.gif" /></a>

                <input type="hidden" size="2" maxlength="2" name="luna_a5" id="luna_a5" value="<? echo $luna_a5;?>"  />
                                   &nbsp;
                                   <input type="hidden" size="2" maxlength="2" name="zi_a5" id="zi_a5" />
                                &nbsp; <strong>Ora: </strong>
                    <select name='slct_oraa5' id='slct_oraa5' onchange='slct_ora_a5();'><option selected value=<? echo "'".$ora_a5."'>".$ora_a5; ?></option>
                                 <option value='1'>1</option>
                                 <option value='2'>2</option>
                                 <option value='3'>3</option>
                                 <option value='4'>4</option>
                                 <option value='5'>5</option>
                                 <option value='6'>6</option>
                                 <option value='7'>7</option>
                                 <option value='8'>8</option>
                                 <option value='9'>9</option>
                                 <option value='10'>10</option>
                                 <option value='11'>11</option>
                                 <option value='12'>12</option>
                                 <option value='13'>13</option>
                                 <option value='14'>14</option>
                                 <option value='15'>15</option>
                                 <option value='16'>16</option>
                                 <option value='17'>17</option>
                                 <option value='18'>18</option>
                                 <option value='19'>19</option>
                                 <option value='20'>20</option>
                                 <option value='21'>21</option>
                                 <option value='22'>22</option>
                                 <option value='23'>23</option>
                                 <option value='24'>24</option></select>

                                <input type="hidden" size="2" maxlength="2" name="ora_a5" id="ora_a5" value="<? echo $ora_a5;?>" />
                                <strong>Kilomtj. aliment.</strong>
                                <input type="text" size="8" maxlength="8" name="klmtj_a5" id="klmtj_a5" value="<? echo $klmtj_a5; ?>" />
                                <strong>Cantit.</strong>
                                <input type="text" size="10" maxlength="10" name="cant5" id="cant5" value="<? echo $cant5; ?>" />
                           <strong>Pret/litru</strong>
                         <input type="text" size="10" maxlength="10" name="pret5" id="pret5" value="<? echo $pret5; ?>" /></tr></table></td></tr>

</table>

<table>
        <tr>
                <td>
                <input type="button" class="style1" onclick="adaugare();" value="Adaugare">                </td>
                <td>
                <input type="button" class="style1" onclick="stergere();" value="Stergere">                </td>
                <td>
                <input type="button" class="style1" onclick="modificare();" value="Modificare">                </td>
        </tr>
</table>


</center>
</form>
<center>

</form></center>
<center>
<?
if ($_SESSION['user']==1){

	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM foi_parcurs");
	$randuri=0;
	while ($row=mysql_fetch_row($sql)) { $randuri=$randuri+1; }
	mysql_close($conexiune);
	
	include "conexiune.php";
	$sql=mysql_query("SELECT * FROM foi_parcurs order by nrdoc desc ");
	echo "<table border=1 cellspacing='0'>";
	echo "<tr><td>Nr.doc</td><td>Masina</td><td>Data emiterii</td><td>Kilom.sos</td><td>Kilom.plec</td><td>Dist. parcursa</td><td>Numar alimentari</td><td>Cant. totala </td><td>Valoare totala</td><td>Completare/Vizualizare curse</td></tr>";
	
	$i=1;
	while ($row=mysql_fetch_array($sql)) {
							$nrdoc=$row["nrdoc"];
							$id_masina=$row["id_masina"];
							$zi_e=$row["zi_e"];
							$luna_e=$row["luna_e"];
							$an_e=$row["an_e"];
							$luna_s=$row["luna_s"];
							$ziua_s=$row["ziua_s"];
							$ora_s=$row["ora_s"];
							$klmtj_s=$row["klmtj_s"];
							$luna_p=$row["luna_p"];
							$ziua_p=$row["ziua_p"];
							$ora_p=$row["ora_p"];
							$klmtj_p=$row["klmtj_p"];
	
							$qmasina="select all * from masini where indice='$id_masina'";
							include "conexiune.php";
							  $rqt = mysql_query($qmasina);
							  if ($rqt) {
									  $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
									  $nr_inmatric=$rrqt["nr_inmatric"];
							  }
	
							  $qluna="select all * from luni where indice='$luna_e'";
							  include "conexiune.php";
							  $rqt = mysql_query($qluna);
							  if ($rqt) {
									  $rrqt = mysql_fetch_array($rqt,MYSQL_ASSOC );
									  $nume_luna=$rrqt["denumire"];
							  }
	
	
							include "conexiune.php";
							$alim=mysql_query("SELECT * FROM alimentari where nrfparc='$nrdoc'");
							$randuria=0;
							$cant_tot=0;
							$valoare_tot=0;
							while ($rowal=mysql_fetch_array($alim)) {
									$randuria=$randuria+1;
									$cant=0;
									$cant=$rowal["cant"];
									$cant_tot=$cant_tot+$cant;
									$pret_u=$rowal["pret"];
									$valoare_lin=$cant*$pret_u;
									$valoare_tot=$valoare_tot+$valoare_lin;
	
							}
							$nralim=$randuria;
	
							$data_e=$zi_e."-".$nume_luna."-".$an_e;
	
									$dist_parc=$klmtj_s-$klmtj_p;
	
											echo '<tr bgcolor="#cfe4e9" ';
	
											/* aleg una din urm 2 variante pt colorarea rindului*/
											echo " id='linie$i' >";
									/*        echo " id='linie$i' onmouseover='line_sel($i, $randuri)' ";
											echo " onmouseout='line_unsel($randuri)' >";*/
	
											echo '<td id="field_0_'.$i.'" align="center" ';
											echo ' value="'.$nrdoc.'" ><a href="foiparc.php?nr='.$nrdoc.'">'.$nrdoc.'</a></td>';
											echo '<td id="field_1_'.$i.'" align="left" ';
	
											echo ' value="'.$nr_inmatric.'" >'.$nr_inmatric.'</td>';
	
	
											echo '<td id="field_3_'.$i.'" align="left" ';
											echo ' value="'.$data_e.'" >'.$data_e.'</td>';
											echo '<td id="field_4_'.$i.'" align="left" ';
											echo ' value="'.$klmtj_s.'" >'.$klmtj_s.'</td>';
											echo '<td id="field_5_'.$i.'" align="left" ';
											echo ' value="'.$klmtj_p.'" >'.$klmtj_p.'</td>';
	
											echo '<td id="field_7_'.$i.'" align="center" ';
											echo ' value="'.$dist_parc.'" >'.$dist_parc.'</td>';
											echo '<td id="field_8_'.$i.'" align="center" ';
											echo ' value="'.$nralim.'" >'.$nralim.'</td>';
											echo '<td id="field_9_'.$i.'" align="right" ';
											echo ' value="'.$cant_tot.'" >'.$cant_tot.' L</td>';
											echo '<td id="field_10_'.$i.'" align="right" ';
											echo ' value="'.$valoare_tot.'" >'.round($valoare_tot,2).' RON</td>';
											echo '<td id="field_11_'.$i.'" align="center">';
	
											echo '<a href="statii.php?nrdoc='.$nrdoc.'">click aici</a>';
											echo '<input type="hidden" id="field_12_'.$i.'" value="'.$klmtj_s.'">';
	
					$i=$i+1;
	}
	echo "</table>";
	mysql_close($conexiune);
	
	echo '<a href ="statii.php"</a>';
}
?>



</form></center>

<iframe scrolling="no" frameborder="0" id="calend_em1"
  style="position:absolute;  top:12%; left:60%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_em" style="display:none; position:absolute; top:12%; left:60% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_s1"
  style="position:absolute;  top:25%; left:20%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_s" style="display:none; position:absolute; top:25%; left:20% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_p1"
  style="position:absolute;  top:25%; left:50%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_p" style="display:none; position:absolute; top:25%; left:50% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_a11"
  style="position:absolute;  top:31%; left:35%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_a1" style="display:none; position:absolute; top:31%; left:35% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_a21"
  style="position:absolute;  top:35%; left:35%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_a2" style="display:none; position:absolute; top:35%; left:35% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_a31"
  style="position:absolute;  top:39%; left:35%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_a3" style="display:none; position:absolute; top:39%; left:35% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_a41"
  style="position:absolute;  top:44%; left:35%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_a4" style="display:none; position:absolute; top:44%; left:35% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_a51"
  style="position:absolute;  top:48%; left:35%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_a5" style="display:none; position:absolute; top:48%; left:35% ;z-index:100"></div>


</body>
</html>