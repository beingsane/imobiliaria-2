<?
require_once("../configuracao_mysql.php");
require_once("acesso.php");

include_once("LeftStyles.php");

if(isset($_POST[s1]))
{
	$q1 = "insert into re2_priority set 
					PriorityName = '$_POST[nName]',
					PriorityLevel = '$_POST[nValue]' ";
	mysql_query($q1) or die("<br><center><font face=verdana color=red size=2><b>Nome ou n�vel de prioridade j� existentes!</b></font><br><a href=\"SettingsPriority.php\" class=RedLink>Voltar</a></center><br>");
}


?>

	<script>
		function CheckPriority() {

			if(document.f1.nName.value=="")
			{
				window.alert('Digite o nome da prioridade!');
				document.f1.nName.focus();
				return false;
			}

			if(document.f1.nValue.value=="")
			{
				window.alert('Selecione o valor da prioridade!');
				document.f1.nValue.focus();
				return false;
			}

		}

		function CheckDelete(pn) {

			if(confirm('Tem certeza que deseja deletar: ' + pn + ' n�vel de prioridade?'))
			{
				return true;
			}
			else
			{
				return false;
			}

		}
	</script>

	<form method=post name=f1 onsubmit="return CheckPriority();">

	<table align=center>
	<tr>
		<td colspan=2 class=TableHead align=center>Adicionar novo n�vel de prioridade</td>
	</tr>

	<tr>
		<td>Nome do n�vel:</td>
		<td><input type=text name=nName></td>
	</tr>

	<tr>
		<td>Valor do n�vel:</td>
		<td>
			<select name=nValue>
				<option value=""></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</td>
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type=submit name=s1 value=Salvar class=sub></td>
	</tr>

	</table>

	</form>

<?

//get the priority levels
$q1 = "select * from re2_priority order by PriorityLevel desc";
$r1 = mysql_query($q1) or die(mysql_error());

if(mysql_num_rows($r1) == '0')
{
	echo "<br><center><font face=verdana color=red size=2><b>Voc� esqueceu algo!</b></font></center><br>";
}
else
{
	?>
		<table align=center width=350 cellspacing=0 bordercolor=black frame=below>
		<tr class=TableHead>
			<td>Nome</td>
			<td align=center width=100>N�vel de prioridade</td>
			<td align=center width=100>Controle</td>
		</tr>
	<?

	while($a1 = mysql_fetch_array($r1))
	{
		echo "<tr>\n\t<td>$a1[PriorityName]</td>\n\t<td align=center>$a1[PriorityLevel]</td>\n\t<td align=center><a href=\"PriorityEdit.php?PriorityID=$a1[PriorityID]\" class=GreenLink>editar</a> | <a href=\"PriorityDelete.php?PriorityID=$a1[PriorityID]\" class=RedLink onclick=\"return CheckDelete('$a1[PriorityName]');\">deletar</a></td>\n</tr>\n\n";
	}

	echo "</table>\n\n<br><br>";
}
?>

