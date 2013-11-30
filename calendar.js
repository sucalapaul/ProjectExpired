function getMonthName(monthNo)
{
var months = new Array(13);
months[0] = "Ianuarie";
months[1] = "Februarie";
months[2] = "Martie";
months[3] = "Aprilie";
months[4] = "Mai";
months[5] = "Iunie";
months[6] = "Iulie";
months[7] = "August";
months[8] = "Septembrie";
months[9] = "Octombrie";
months[10] = "Noiembrie";
months[11] = "Decembrie";
return months[monthNo];
}

function DaysInMonth (year, month) {
     return 32 - new Date(year, month, 32).getDate();
}



function ShowCal(data, zi, luna, an, spnName)
{
        if (document.getElementById(spnName).style.display=="")
        {
                document.getElementById(spnName).style.display="none";
                document.getElementById(spnName+"1").style.display="none";
        }
        else
                {
                /*if (document.getElementById(data).value=="")
                {*/
                        var currDate=new Date();
                        WriteCalendarMonth(currDate.getMonth(), currDate.getFullYear(), data, zi, luna, an, spnName);
                /*}
                else
                {
                        var currDate= new Date(document.getElementById(data).value);
                        WriteCalendarMonth(currDate.getMonth(), currDate.getFullYear(), data, zi, luna, an, spnName);
                }*/
                document.getElementById(spnName).style.display="";
                document.getElementById(spnName+"1").style.display="";
        }
}

function WriteCalendarMonth(monthNo, year, data, zi, luna, an, spnName)
{

        var currMonth = new Date(year, monthNo, 1);
        if (currMonth.getFullYear()<1900)
                currYear = currMonth.getFullYear() + 1900;
        else
                currYear = currMonth.getFullYear();
/*   '*/

		ziuaazi= new Date().getDate();
        lunaazi=new Date().getMonth();
		anazi=new Date().getYear();
		if (anazi<1900)
			anazi=anazi+1900;
			
        output = "<!--ANAZII"+anazi+"-->";
        output += "<table cellspacing='1' cellpadding='0' class='calTable'>";
        output += "<tr><td class='calCell'><a href='#' onClick='WriteCalendarMonth(" + (currMonth.getMonth()-12) + ", " + currMonth.getFullYear() + ", \"" + data + "\",  \"" + zi + "\",  \"" + luna + "\",  \"" + an + "\", \"" + spnName + "\");return false;'>«</a></td>";
        output += "<td class='calCell'><a href='#' onClick='WriteCalendarMonth(" + (currMonth.getMonth()-1) + ", " + currMonth.getFullYear() + ", \"" + data + "\",  \"" + zi + "\",  \"" + luna + "\",  \"" + an + "\", \"" + spnName + "\");return false;'>‹</a></td>";
        output += "<td colspan='3' style='text-align:center'>";
        output += getMonthName(currMonth.getMonth()) + ' ' + currYear;
		output += "<br><a href='#' onclick='document.getElementById(\"" + data + "\").value=\"" + ziuaazi + "/" + (lunaazi+1) + "/" + anazi + "\";  document.getElementById(\"" + zi + "\").value=\"" + ziuaazi + "\"; document.getElementById(\"" + luna + "\").value=\""  + (lunaazi+1) + "\"; document.getElementById(\"" + an + "\").value=\"" + anazi + "\"; document.getElementById(\"" + spnName + "\").style.display=\"none\";  document.getElementById(\"" + spnName + "1\").style.display=\"none\"; return false; '><font color='#2222ee' size='+1'>AZI</font></a>"
        output += "</td>";
        output += "<td class='calCell'><a href='#' onClick='WriteCalendarMonth(" + (currMonth.getMonth()+1) + ", " + currMonth.getFullYear() + ", \"" + data + "\",  \"" + zi + "\",  \"" + luna + "\",  \"" + an + "\", \"" + spnName + "\");return false;'>›</a></td>";
        output += "<td class='calCell'><a href='#' onClick='WriteCalendarMonth(" + (currMonth.getMonth()+12) + ", " + currMonth.getFullYear() + ", \"" + data + "\",  \"" + zi + "\",  \"" + luna + "\",  \"" + an + "\", \"" + spnName + "\");return false;'>»</a>" + "</td></tr>";
/* output +=currDate.getDate()+''; */

        i=1;
        dayFinished=false;
        weekFinished=false;
        var CurrDow=1;
        ziuaazi= new Date().getDate();
        lunaazi=new Date().getMonth();
        lunaact=currMonth.getMonth();
        anazi=new Date().getYear();
        anact=currMonth.getYear();

        while (!dayFinished)
        {
                        if (i<=DaysInMonth(currMonth.getFullYear(), currMonth.getMonth()))
                        {
                                if (i==1 && currMonth.getDay()>CurrDow-1)
                                        output += '<td class="calCell"></td>';
                                else {
                                output += "<td class='calCell'><a href='#' onclick='document.getElementById(\"" + data + "\").value=\"" + i + "/" + (currMonth.getMonth()+1) + "/" + currYear + "\"; document.getElementById(\"" + zi + "\").value=\"" + i + "\"; document.getElementById(\"" + luna + "\").value=\""  + (currMonth.getMonth()+1) + "\"; document.getElementById(\"" + an + "\").value=\"" + currYear + "\"; document.getElementById(\"" + spnName + "\").style.display=\"none\";  document.getElementById(\"" + spnName + "1\").style.display=\"none\"; return false;"

                                if (i==ziuaazi && lunaazi==lunaact && anazi==anact){
                                                output +="'><font color=\"#2222ee\" size='+1'>" + i + "</font></a></td>";
                                } else
                                { if (CurrDow%7==1){output +="'><font color=\"#CC0000\">" + i + "</font></a></td>";}
                                        else{
                                        if (CurrDow%7==0){output +="'><font color=\"#CC0000\">" + i + "</font></a></td>";}else{

                                        output += "'>" + i + "</a></td>";
                                }}}


                                        i++;
                                }


                        }
                        else
                        {
                                output += '<td class="calCell"></td>';
                                if (CurrDow%7==0)
                                {

                                        dayFinished=true;
                                }
                                else
                                {
                                        i++;
                                }
                        }

                        if (CurrDow%7==0 && !dayFinished && i>1)
                                output += '</tr><tr>';

                        CurrDow++;

        }

        document.getElementById(spnName).innerHTML=output;
}
