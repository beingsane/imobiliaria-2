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


if(isset($_POST[s1]))
{
	$q1 = "select * from re2_agents where username = '$_POST[us]' and password = '$_POST[ps]' ";
	$r1 = mysql_query($q1) or die(mysql_error());

	if(mysql_num_rows($r1) == '1')
	{
		//ok
		$a1 = mysql_fetch_array($r1);

		$_SESSION[AgentID] = $a1[AgentID];
		$_SESSION[username] = $a1[username];
		$_SESSION[MaxOffers] = $a1[offers];
		$_SESSION[AccountStatus] = $a1[AccountStatus];
		$_SESSION[TipodeConta] = $a1[TipodeConta];
		$_SESSION[AccountExpireDate] = $a1[ExpDate];

		header("location:index.php");
		exit();
	}
	else
	{
		$error = "<font face=verdana color=red size=2><b>Nome de usu�rio ou senha inv�lidos.</b></font>";
	}

}


//get the templates
require_once("includes.php");
require_once("templates/HeaderTemplate2.php");
require_once("templates/LoginTemplate.php");
require_once("templates/FooterTemplate.php");

?>

