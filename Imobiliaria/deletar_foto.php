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

//get the details
$q1 = "select * from re2_listings where ListingID = '$_GET[id]' and AgentID = '$_SESSION[AgentID]' ";
$r1 = mysql_query($q1) or die(mysql_error());
$a1 = mysql_fetch_array($r1);

if(ereg($_GET[file], $a1[image]))
{
	//delete the file
	unlink("fotos_anuncios/$_GET[file]");

	//update the database
	$OldImages = explode("|", $a1[image]);

	while(list(,$v) = each($OldImages))
	{
		if($v != $_GET[file])
		{
			$NewImages[] = $v;
		}
	}

	if(!empty($NewImages))
	{
		$NewStr = implode("|", $NewImages);
	}

	$q2 = "update re2_listings set image = '$NewStr' where ListingID = '$_GET[id]' and AgentID = '$_SESSION[AgentID]' ";
	mysql_query($q2) or die(mysql_error());
}

header("location:editar.php?id=$_GET[id]");
exit();

?>