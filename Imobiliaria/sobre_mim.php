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
require_once("includes.php");

//get the agent details
$q1 = "select * from re2_agents where AgentID = '$_GET[id]' ";
$r1 = mysql_query($q1) or die(mysql_error());
$a1 = mysql_fetch_array($r1);

//get the logo
if(!empty($a1[logo]))
{
	$AgentLogo = "<img src=\"fotos_anuncios/$a1[logo]\" border=0 width=125 height=65>";
}

$AgentName = $a1[FirstName]." ".$a1[LastName];

if(!empty($a1[phone]))
{
	$contacts = "Telefone: <b>$a1[phone]</b><BR>";
}

if(!empty($a1[cellular]))
{
	$contacts .= "Celular: <b>$a1[cellular]</b><BR>";
}

if(!empty($a1[pager]))
{
	$contacts .= "Pager: <b>$a1[pager]</b><BR>";
}

$email = "Clique <a class=RedLink target=_blank href=\"contato.php?AgentID=$a1[AgentID]\">AQUI</a> para enviar-lhe um e-mail.";

//get the number of offers
$q2 = "select count(ListingID) from re2_listings where AgentID = '$a1[AgentID]' ";
$r2 = mysql_query($q2) or die(mysql_error());
$a2 = mysql_fetch_array($r2);

$offers = $a2[0];

if($offers > '0')
{
	$offers = $offers." <a class=BlueLink href=\"buscador.php?AgentID=$_GET[id]\">Ver An�ncios</a>";
}


if(!empty($a1[ResumeImages]))
{
	$MyImages = explode("|", $a1[ResumeImages]);

	while(list($k,$v) = each($MyImages))
	{
		$images .= "<a href=\"sobre_mim.php?id=$_GET[id]&si=$k\"><img src=\"fotos_anuncios/$v\" border=0 width=100 height=100></a> &nbsp;&nbsp;";
	}

	if($_GET[si] >= '0' && $_GET[si] < count($MyImages))
	{
		$ind = $_GET[si];
		$SingleImage = "<img src=\"fotos_anuncios/$MyImages[$ind]\">";
	}
}

if(!empty($a1[resume]))
{
	$resume = strip_tags($a1[resume]);

	$resume = nl2br($resume);

	$resume = "<div style=\"background-color:dddddd; padding:5\">$resume</div>";
}

if($_GET[id] == $_SESSION[AgentID])
{
	$EditResume = "Clique <a class=RedLink href=\"perfil.php\">AQUI</a> para editar suas informa��es.";
}

require_once("templates/HeaderTemplate.php");
require_once("templates/ResumeTemplate.php");	
require_once("templates/FooterTemplate.php");

?>