fixMozillaZIndex=true; //Fixes Z-Index problem  with Mozilla browsers but causes odd scrolling problem, toggle to see if it helps
_menuCloseDelay=500;
_menuOpenDelay=150;
_subOffsetTop=2;
_subOffsetLeft=-2;




with(menuStyle=new mm_style()){
bordercolor="#ABABAB";
borderwidth=1;
fontfamily="Arial";
fontsize="80%";
fontstyle="normal";
fontweight="bold";
itemheight=22;
menubgimage="mac_back.gif";
offbgcolor="transparent";
offcolor="#000000";
onbgcolor="#3165B5";
oncolor="#ffffff";
outfilter="fade(duration=0.5)";
overfilter="Fade(duration=0.5);Shadow(color=#ADAEAD,Direction=180,Strength=6";
rawcss="padding-left:10px;padding-right:10px";
}

with(submenuStyle=new mm_style()){
styleid=1;
bordercolor="#838383";
borderwidth=1;
fontfamily="Arial";
fontsize="80%";
fontstyle="normal";
fontweight="bold";
headercolor="#000000";
image="mac_trans.gif";
menubgimage="mac_back.gif";
offbgcolor="transparent";
offcolor="#000000";
onbgcolor="#3165B5";
oncolor="#ffffff";
onsubimage="macarrow_on.gif";
outfilter="fade(duration=0.5)";
overfilter="Fade(duration=0.5);Shadow(color=#ADAEAD,Direction=180,Strength=6";
padding=2;
rawcss="padding-left:5px;padding-right:5px;";
separatorcolor="#D2D4D4";
separatorpadding=5;
subimage="macarrow_off.gif";
menubgcolor="#EBF0EC";
}

with(milonic=new menuname("Main Menu")){
alwaysvisible=1;
left=10;
orientation="horizontal";
style=menuStyle;
top=10;

aI("align=left;showmenu=FAZ;text=FAZ;");
}




with(milonic=new menuname("FAZ")){
style=submenuStyle;
top="offset=-7";
aI("image=transparent.gif;imageheight=4;rawcss=border:1px solid #c0c0c0;type=header;");
aI("showmenu=Configurari;text=Configurari baza de date;");
aI("text=Completare foi de parcurs;url=foiparc.php?nr=0;");
aI("showmenu=Liste;text=Liste-Rapoarte;");
aI("image=transparent.gif;imageheight=4;rawcss=border:1px solid #c0c0c0;type=header;");
}

with(milonic=new menuname("Configurari")){
left="offset=-3";
style=submenuStyle;
top="offset=-4";
aI("image=transparent.gif;imageheight=4;rawcss=border:1px solid #c0c0c0;type=header;");
aI("text=Soferi;url=soferi.php;");
aI("text=Curse;url=curse.php;");
aI("text=Tipuri auto;url=tipauto.php;");
aI("text=Masini;url=masini.php?indice=0;");
aI("text=Curse de persoane;url=curse_pers.php?indice=0;");
aI("text=Denumire statii;url=denstatii.php?indice=0;");
aI("text=Preturi curse;url=pret_cursa.php?indice=0;");
aI("image=transparent.gif;imageheight=4;rawcss=border:1px solid #c0c0c0;type=header;");
}

with(milonic=new menuname("Liste")){
left="offset=-3";
style=submenuStyle;
top="offset=-4";
aI("image=transparent.gif;imageheight=4;rawcss=border:1px solid #c0c0c0;type=header;");
aI("text=pe soferi;url=liste_soferi.php;");
aI("text=pe masini;url=liste_masini.php;");
aI("text=prestatii;url=prestatii.php;");
aI("text=revizii;url=liste_revizii.php;");
aI("text=revizii camioane;url=liste_revizii_c.php;");
aI("text=avize soferi;url=liste_avize.php;");
aI("image=transparent.gif;imageheight=4;rawcss=border:1px solid #c0c0c0;type=header;");
}
drawMenus();