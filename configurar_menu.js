<!--
//#########################################################
//#Copyright � e-Mobili�ria. Todos os direitos reservados.#
//#########################################################
//#                                                       #
//#  Programa        : e-Mobili�ria PHP                   #
//#  Autor           : Mois�s Bach B.                     #
//#  E-mail          : moisbach@gmail.com                 #
//#  Vers�o          : 1.0                                #
//#  Modificado em   : 26/05/2005                         #
//#  Copyright �     : e-Mobili�ria                       #
//#                 WWW.ANIMABUSCA.COM                    #
//#########################################################
//#ESTE SCRIPT N�O PODE SER COPIADO SEM AUTORIZA��O PR�VIA#
//#########################################################
YOffset=150; 
XOffset=0;
staticYOffset=30; 
slideSpeed=30 
waitTime=100; 
menuBGColor="black";
menuIsStatic="yes";
menuWidth=150; 
menuCols=2;
hdrFontFamily="verdana";
hdrFontSize="1";
hdrFontColor="white"; //Cor da fonte
hdrBGColor="#FEBF00"; //Cor do fundo do t�tulo
hdrAlign="left";
hdrVAlign="center";
hdrHeight="11";
linkFontFamily="Verdana";
linkFontSize="1";
linkBGColor="white";
linkOverBGColor="#FEBF00"; //Cor do fundo do link
linkTarget="_top";
linkAlign="Left";
barBGColor="#FEBF00"; //Cor do fundo da barra
barFontFamily="Verdana";
barFontSize="1";
barFontColor="white";
barVAlign="center";
barWidth=20; 
barText="PARCEIROS"; //Nome que aparece quando o menu est� escondido

//Altere os links abaixo

ssmItems[0]=["Nossos Parceiros"]  //T�tulo
ssmItems[1]=["SEU SITE AQUI", "http://www.animabusca.com", "_blank"] 
ssmItems[2]=["SEU SITE AQUI", "http://www.animabusca.com","_blank"]
ssmItems[3]=["SEU SITE AQUI", "http://www.animabusca.com", "_blank"]
ssmItems[4]=["SEU SITE AQUI", "http://www.animabusca.com", "_blank"]
ssmItems[5]=["SEU SITE AQUI", "http://www.animabusca.com", "_blank"]
ssmItems[6]=["SEU SITE AQUI", "http://www.animabusca.com", "_top"]
ssmItems[7]=["Condi��es", "condicoes.php", "", 1, "no"] 
ssmItems[8]=["Contato", "contato.php", "",1]
ssmItems[9]=["Outros links", "", ""] 
ssmItems[10]=["AnimaBusca.com", "http://www.animabusca.com", ""]
ssmItems[11]=["MercadoLivre", "http://www.mercadolivre.com.br", ""]
ssmItems[12]=["SEU SITE AQUI", "http://www.animabusca.com", ""]

buildMenu();

//-->