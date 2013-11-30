<?php

require "replun.php";

$azidata = getdate();
$lunaazin=$azidata['mon'];
$lunaazi = $azidata['mon'];if ($lunaazi<=9){$lunaazi="0".$lunaazi;}
$ziuaazi = $azidata['mday'];if ($ziuaazi<=9){$ziuaazi="0".$ziuaazi;}
$anulazi = $azidata['year'];
$oraazi=$azidata['hours'];if ($oraazi<=9){$oraazi="0".$oraazi;}
$minuteazi=$azidata['minutes'];if ($minuteazi<=9){$minuteazi="0".$minuteazi;}

$DataAzi=$anulazi."-".$lunaazi."-".$ziuaazi;
$DataAziCHR=$ziuaazi." ".$LuniAn[$lunaazi-1]." ".$anulazi;
$TimpAzi=$oraazi.":".$minuteazi;
$DataAziDB=$ziuaazi."/".$lunaazi."/".$anulazi;
$dataazi_sec=strtotime($DataAzi);

?>