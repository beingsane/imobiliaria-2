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

$q1 = "select ResumeImages from re2_agents where AgentID = '$_SESSION[AgentID]' ";
$r1 = mysql_query($q1) or die(mysql_error());
$a1 = mysql_fetch_array($r1);

if(ereg($_GET[file], $a1[ResumeImages]))
{

	unlink("fotos_anuncios/$_GET[file]");

	$OldImages = explode("|", $a1[ResumeImages]);

	while(list(,$v) = each($OldImages))
	{
		if($v != $_GET[file])
		{
			$NewImages[] = $v;
		}
	}

	if(!empty($NewImages))
	{
		if(count($NewImages) > '1')
		{
			$ImageStr = implode("|", $NewImages);
		}
		else
		{
			$ImageStr = $NewImages[0];
		}
	}
	else
	{
		$ImageStr = "";
	}

	$q1 = "update re2_agents set ResumeImages = '$ImageStr' where AgentID = '$_SESSION[AgentID]' ";
	mysql_query($q1) or die(mysql_error());
}

header("location:sobre_mim.php?id=$_SESSION[AgentID]");

EXIT();

?>