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

if ($_SESSION['TipodeConta']=="2"){ $qwhere=" and re2_prices.PriceType='Privado'"; }
elseif ($_SESSION['TipodeConta']=="1") { $qwhere=" and re2_prices.PriceType='Imob.'"; }
else { $qwhere=""; }

//get the prices
$q1 = "select * from re2_prices, re2_priority where re2_prices.PriorityLevel = re2_priority.PriorityLevel$qwhere order by PriceValue";
$r1 = mysql_query($q1) or die(mysql_error());

$col = "white";

while($a1 = mysql_fetch_array($r1))
{
	if($col == "white")
	{
		$col = "dddddd";
	}
	else
	{
		$col = "white";
	}

	$Prices .= "<tr bgcolor=$col>\n\t<td align=center>";
	
	if($_GET[SelectedPackage] == $a1[PriceID])
	{
		$Prices .= "<input type=radio name=\"SelectedPackage\" value=\"$a1[PriceID]\" checked>";
	}
	else
	{
		$Prices .= "<input type=radio name=\"SelectedPackage\" value=\"$a1[PriceID]\">";
	}

		
	$Prices .= "</td>\n\t<td>$a1[PackageName] ";

	$Prices .= "<sup><font color=#990000>$a1[PriorityName]</font></sup>";

	if($a1[Duration] == '1')
	{
		$Prices .= ", $a1[Duration] m�s,";
	}
	else
	{
		$Prices .= ", $a1[Duration] meses,";
	}
	
	if($a1[offers] == '1')
	{
		$Prices .= " $a1[offers] an�ncio</td>\n\t";
	}
	else
	{
		$Prices .= " $a1[offers] an�ncios</td>\n\t";
	}

	if($a1[PriceValue] > '0')
	{
		$Prices .= "<td align=right>R$ $a1[PriceValue]</td>\n</tr>\n";
	}
	else
	{
		$Prices .= "<td align=right>Gratuito!</td>\n</tr>\n";
	}
}

if($_GET[e] == '1')
{
	$error = "Selecione um pacote, por favor!";
}
elseif($_GET[e] == '2')
{
	$error = "Selecione uma forma de pagamento, por favor!";
}

if($_GET[PaymentGateway] == "paypal")
{
	$selected1 = "selected";
}
elseif($_GET[PaymentGateway] == "2checkout")
{
	$selected2 = "selected";
}
elseif($_GET[PaymentGateway] == "check")
{
	$selected3 = "selected";
}
elseif($_GET[PaymentGateway] == "stormpay")
{
	$selected4 = "selected";
}

if(ereg("cadastro.php", $_SERVER[HTTP_POST]))
{
	$NewAgentMessage = "<font face=verdana color=black size=2><b>Obrigado por se cadastrar!</b><br><font size=1>Entre no painel de controle para fazer an�ncios<br><br>";
}

//get the templates
require_once("templates/HeaderTemplate.php");
require_once("templates/PricesTemplate.php");
require_once("templates/FooterTemplate.php");

?>

