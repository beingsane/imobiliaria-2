<?
#########################################################
#Copyright � e-Mobili�ria. Todos os direitos reservados.#
#########################################################
#                                                       #
#  Programa        : e-Mobili�ria PHP                   #
#  Autor           : Mois�s Bach B.                     #
#  E-mail          : moisbach@gmail.com                 #
#  Vers�o          : 2.5                                #
#  Modificado em   : 09/12/2005                         #
#  Copyright �     : e-Mobili�ria                       #
#                 WWW.ANIMABUSCA.COM/IMOBILIARIA        #
#########################################################
#ESTE SCRIPT N�O PODE SER COPIADO SEM AUTORIZA��O PR�VIA#
#########################################################

require_once("configuracao_mysql.php");
require_once("acesso.php");

if(!empty($_GET[BannerID]))
{
	//get the banner info
	$q1 = "select * from re2_banners where BannerID = '$_GET[BannerID]' and ClientID = '$_SESSION[AgentID]' ";
	$r1 = mysql_query($q1) or die(mysql_error());

	if(mysql_num_rows($r1) > '0')
	{
		$a1 = mysql_fetch_array($r1);

		//delete the file
		unlink("banners/$a1[BannerFile]");

		//delete the stats
		$q1 = "delete from re2_stats where BannerID = '$_GET[BannerID]' ";
		mysql_query($q1) or die(mysql_error());

		$q1 = "delete from re2_banners where BannerID = '$_GET[BannerID]' ";
		mysql_query($q1) or die(mysql_error());
	}

}

header("location:banners.php");

?>