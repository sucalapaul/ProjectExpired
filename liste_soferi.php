<?php
session_start();
?>
<html>
<head>
<title>Lista informatii soferi</title>
<style type="text/css">

.style1 {font-weight: bold}
.style2 {font-weight: bold}
.style3 {font-weight: bold}
.style7 {font-size: 18px}
</style>

<script language="javascript">

function slct_nume_sofer(){
  document.getElementById("id_sofer").value=document.getElementById("slct_sof").value;

}
function slct_luna_e(){
          document.getElementById("luna_e").value=document.getElementById("slct_lun_e").value;
}
function trimite(){
        var gol=0; msg="Nu ati selectat ";
        if (document.getElementById("id_sofer").value == ""){gol=1; msg=msg+"soferul"}
        if (document.getElementById("data_i").value==""){gol=1; msg=msg+", data initiala"}
        if (document.getElementById("data_f").value==""){gol=1; msg=msg+", data finala"}
		ziua_i=document.getElementById("ziua_i").value;
		ziua_f=document.getElementById("ziua_f").value;
		luna_i=document.getElementById("luna_i").value;
		luna_f=document.getElementById("luna_f").value;
		an_i=document.getElementById("an_i").value;
		an_f=document.getElementById("an_f").value;
		if (ziua_i<=9){ziua_i="0"+ziua_i}
		if (ziua_f<=9){ziua_f="0"+ziua_f}
		if (luna_i<=9){luna_i="0"+luna_i}
		if (luna_f<=9){luna_f="0"+luna_f}
        if (an_f<an_i){gol=gol+2}
        if (an_f==an_i){ 
			if (luna_f < luna_i){gol=gol+2}
		}
        if (an_f==an_i) {
			if (luna_f==luna_i) {
				if(ziua_f<ziua_i){gol=gol+2}
			}
		}
        if (gol==2){msg="Perioada este gresit selectata";}
        if(gol==0){document.getElementById("selectie_per").submit();}
        else {msg=msg+"!"; alert(msg);}
}
</script>
<link href="calendar.css" rel="stylesheet"></link>
<script language="javascript" src="calendar.js"></script>
</head>
<body bgcolor="#cfe4e9">

<center><a href="index.php" class="style2 style3 style1"><font size="+1" color="#000000">&lt;&nbsp;Inapoi</font></a>
</center>
<br>
<br>

&nbsp;<em><strong><span class="style7">Alegeti:  </span>:</strong></em>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em><strong><span class="style7"> - soferul</span>:</strong></em>&nbsp;&nbsp;&nbsp;

<?php
if ($_SESSION['user']==1){

	require "array_soferi.php";$nr_soferi=$i-1;
	echo "<select name='slct_sof' id='slct_sof'";
	echo " onchange='slct_nume_sofer();'>";
	echo "<option selected value=''></option>";
		for($i=1;$i<=$nr_soferi;$i++){
				$este=0;
				$query="select all * from foi_parc_sof where id_sofer=$sofer_i[$i]";
				
				$rq = mysql_query($query);
				if ($rq) {
				while ($rrq = mysql_fetch_array($rq,MYSQL_ASSOC )){
	
						$este++;
				}}
		if ($este!=0){
		echo "<option value='$sofer_i[$i]'>$sofer_den[$i]</option>";
		}
	}
	echo "</select>";
} else {echo '<br><br><br><center><font color="#ff0000" size="+2">Nu aveti acces la aceasta pagina!!!</font></center>';
}			
?>
<br>
<br>

<form id="selectie_per" name="selectie_per" method="post" action="lista_sofer.php" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style7"><em><strong>- perioada:</strong></em></span>
                <strong>de la </strong>
                <input type="text" size="10" maxlength="10" name="data_i" id="data_i" disabled />
                <a onClick="ShowCal('data_i', 'ziua_i', 'luna_i', 'an_i', 'calend_i'); return false;"><img style="border:none" src="images/calendar.gif" /></a>
                <input type="hidden" size="4" maxlength="4" name="an_i" id="an_i"/>
                <input type="hidden" size="2" maxlength="2" name="luna_i" id="luna_i" />
                <input type="hidden" size="2" maxlength="2" name="ziua_i" id="ziua_i" />
				
                <strong>pina la </strong>
                <input type="text" size="10" maxlength="10" name="data_f" id="data_f" disabled />
                <a onClick="ShowCal('data_f', 'ziua_f', 'luna_f', 'an_f', 'calend_f'); return false;"><img style="border:none" src="images/calendar.gif" /></a>
                <input type="hidden" size="4" maxlength="4" name="an_f" id="an_f" />
                <input type="hidden" size="2" maxlength="2" name="luna_f" id="luna_f" />
                <input type="hidden" size="2" maxlength="2" name="ziua_f" id="ziua_f" />
                <input type="hidden" name="id_sofer" size="22">
                <input type="button" value="Genereaza lista" onClick="trimite()">
</form>

<iframe scrolling="no" frameborder="0" id="calend_i1"
        style="position:absolute;  top:19%; left:15%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_i" style="display:none; position:absolute; top:19%; left:15% ;z-index:100"></div>

<iframe scrolling="no" frameborder="0" id="calend_f1"
        style="position:absolute;  top:19%; left:30%; width:184px; height:169px; border:none;display:none;z-index:0"  ></iframe>
<div ID="calend_f" style="display:none; position:absolute; top:19%; left:30% ;z-index:100"></div>

</body>
</html>