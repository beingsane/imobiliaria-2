<?
require_once("../configuracao_mysql.php");
require_once("acesso.php");
require_once("LeftStyles.php");
require_once("../includes.php");

$q1 = "select * from re2_agents, re2_listings where re2_listings.ListingID = '$_GET[id]' and re2_listings.AgentID = re2_agents.AgentID ";

$r1 = mysql_query($q1) or die(mysql_error());
$a1 = mysql_fetch_array($r1);

if(empty($i) || $i == '1')
{
	$Image1 = "ver_anuncio2.gif";

	$desc = nl2br($a1[DetailedDesc]);

	$MyPrice = number_format($a1[Price], 2, ",", ".");

	$ShowInfo = "<table border=0 align=center width=\"100%\">\n\t<tr>\n\t<td width=\"60%\" valign=top><font size=3 face=verdana color=black><b>$a1[city], $a1[state], $a1[country]</b></font><br><font size=2 face=verdana color=black>$a1[address]</font></td>\n\t<td width=\"40%\" valign=top align=center><font size=2 face=verdana><B>Pre�o: R$ $MyPrice</td>\n</tr>\n\n<tr>\n\t<td valign=top><br><b>Im�vel ID: $a1[ListingID]</b><br><br>$desc<br><br><font size=2 face=verdana color=black><b>$a1[rooms] quarto(s), $a1[bathrooms] banheiro(s), $a1[garage] garagem(ns)</font><br><br>Vizinhan�a:</b> $a1[neighbourhood]<br><br><b>Tamanho da resid�ncia: $a1[SquareMeters] m2<br>Tamanho do lote: $a1[LotSize] m2<br>Idade: $a1[HomeAge] anos<br>";

	if($a1[fireplace] == 'y')
	{
		$ShowInfo .= ">>Tem lareira ou churrasqueira<br>\n";
	}

	if($a1[NearSchool] == 'y')
	{
		$ShowInfo .= ">>Pr&oacute;ximo a escola<br>\n";
	}

	if($a1[NearTransit] == 'y')
	{
		$ShowInfo .= ">>Pr&oacute;ximo do tr&acirc;nsito<br>\n";
	}

	if($a1[NearPark] == 'y')
	{
		$ShowInfo .= ">>Pr&oacute;ximo a parque ou pra&ccedil;a<br>\n";
	}

	if($a1[OceanView] == 'y')
	{
		$ShowInfo .= ">>Vista para o mar<br>\n";
	}

	if($a1[LakeView] == 'y')
	{
		$ShowInfo .= ">>Vista para um lago<br>\n";
	}

	if($a1[MountainView] == 'y')
	{
		$ShowInfo .= ">>Vista para uma montanha<br>\n";
	}

	if($a1[OceanWaterfront] == 'y')
	{
		$ShowInfo .= ">>De frente para o mar<br>\n";
	}

	if($a1[LakeWaterfront] == 'y')
	{
		$ShowInfo .= ">>De frente para um lago<br>\n";
	}

	if($a1[RiverWaterfront] == 'y')
	{
		$ShowInfo .= ">>De frente para um rio<br>\n";
	}

	if(!empty($a1[image]))
	{
		$im_array = explode("|", $a1[image]);

		$FirstImage = "<img src=\"../fotos_anuncios/$im_array[0]\" width=100 height=100>";
	}

	$ShowInfo .= "</td>\n\t<td align=center valign=top>$FirstImage<br><br>Para Maiores informa��es ligue <br><b> $a1[FirstName] $a1[LastName]<br>$a1[phone]</b><br>ou clique <a class=RedLink href=\"contato.php?AgentID=$a1[AgentID]&ListingID=$a1[ListingID]\">AQUI</a> para enviar um e-mail.<br><br><a class=BlueLink href=\"buscador.php?AgentID=$a1[AgentID]\" title=\"Mais propriedades deste agente\">Mais propriedades deste agente</a><br><br><center>";
	
	if(!empty($a1[logo]))
	{
		$ShowInfo .= "<a href=\"sobre_mim.php?id=$a1[AgentID]\" title=\"Ver informa��es deste agente!\"><img src=\"../fotos_anuncios/$a1[logo]\" border=0></a>";
	}
	else
	{
		$ShowInfo .= "<a class=BlackLink href=\"sobre_mim.php?id=$a1[AgentID]\" title=\"Ver informa��es deste agente!\">$a1[FirstName] $a1[LastName] Informa��es</a>";
	}

	$ShowInfo .= "</center></td>\n</tr>";
	
	$ShowInfo .= "<tr>\n\t<td colspan=3 align=center><a class=RedLink href=\"edit.php?id=$a1[ListingID]\">Editar</a> | <a class=RedLink href=\"delete.php?id=$a1[ListingID]\">Deletar</a></td>\n</tr>\n\n";
	
	$ShowInfo .= "\n</table>";

}
else
{
	$Image1 = "ver_anuncio.gif";
}

if($i == '2')
{
	$Image2 = "ver_fotos2.gif";

	if(!empty($a1[image]))
	{
		$MyImages = explode("|", $a1[image]);

		$ShowInfo .= "<table valign=top align=center width=\"500\" height=50>\n<tr>\n\t<td align=center valign=top width=\"500\" height=50>";
		
		while(list(,$v) = each($MyImages))
		{
			$ShowInfo .= "<a href=\"anuncio.php?id=$_GET[id]&i=$_GET[i]&f=$v\"><img src=\"../fotos_anuncios/$v\" width=50 height=50 border=0></a>&nbsp;&nbsp;&nbsp;\n\n\t";
		}

		$ShowInfo .= "</table><hr size=1 width=\"95%\" color=#336699><br>";


		if(!empty($f))
		{
			$ShowInfo .= "<center><img src=\"../fotos_anuncios/$f\"></center><br>";
		}
		else
		{
			$ShowInfo .= "<center><img src=\"../fotos_anuncios/$MyImages[0]\"></center><br>";
		}

	}
	else
	{
		$ShowInfo .= "<br><center><img src=\"../sem_foto.gif\"></center>";
	}

}
else
{
	$Image2 = "ver_fotos.gif";
}

$MyAddress = str_replace(" ", "+", $a1[address]);
$MyAddress = str_replace(",", "", $MyAddress);

$Image3 = "<a target=_blank  href=\"http://www.mapquest.com/maps/map.adp?city=$a1[city]&state=$a1[state]&address=$MyAddress&country=$a1[country]&zoom=5\"><img src=\"../minhas_imagens/mapa.gif\" border=0></a>";

$ListingID = $a1[ListingID];

?>

<table align=center width=500 cellspacing=0 cellpadding=0>
<tr>
	<td width="170" onmouseover="this.style.cursor='hand'" onClick="window.open('anuncio.php?id=<?=$ListingID?>&i=1', '_self')"><img src="../minhas_imagens/<?=$Image1?>"></td>
	<td width="170" onmouseover="this.style.cursor='hand'" onClick="window.open('anuncio.php?id=<?=$ListingID?>&i=2', '_self')"><img src="../minhas_imagens/<?=$Image2?>"></td>
	<td width="170" onmouseover="this.style.cursor='hand'"><?=$Image3?></td>
</tr>

<tr>
	<td valign=top align=center colspan=3>

	<table align=center width=500 cellspacing=0 cellpadding=0 border=1 rules=none bordercolor=dddddd height=150>
	<tr>
		<td valign=top>
			<?=$ShowInfo?>
		</td>
	</tr>

	</table>

	</td>
</tr>

</table>

