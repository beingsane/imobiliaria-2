<?
require_once("../configuracao_mysql.php");
require_once("acesso.php");

if(isset($_POST[ss1]))
{
	while(list(,$v) = each($_POST[RegCategory]))
	{
		$NewCat = explode("|", $v);

		$NewCategory = $NewCat[0];
		$NewSubcategory = $NewCat[1];
		$MyID = $NewCat[2];

		$qup = "update re2_listings set CategoryID = '$NewCategory', SubcategoryID = '$NewSubcategory' where ListingID = '$MyID' ";
		mysql_query($qup) or die(mysql_error());
	}

	include_once("LeftStyles.php");

	echo "<br><center>As informa��es foram atualizadas com sucesso!<br>Clique <a class=RedLink href=\"CategoriesDelete.php?CategoryID=$_GET[CategoryID]&n=0\">AQUI</a> para deletar esta categoria.</center>";

	exit();
}


if(!empty($_GET[CategoryID]))
{
	if($_GET[n] == '0')
	{
		//delete subcategory's info
		$q1 = "delete from re2_categories where CategoryID = '$_GET[CategoryID]' ";
		mysql_query($q1) or die(mysql_error());

		$q1 = "delete from re2_subcategories where CategoryID = '$_GET[CategoryID]' ";
		mysql_query($q1) or die(mysql_error());

		header("location:categories.php");
	}
	else
	{
		include_once("LeftStyles.php");

		//show the listings at this category
		$q1 = "select * from re2_listings where CategoryID = '$_GET[CategoryID]' ";
		$r1 = mysql_query($q1) or die(mysql_error());
		?>
		<br>
		<form method=post >
		<table align=center width=600 cellspacing=0>
		<caption align=center><font color=red>These listings still appear at the category you want to delete. Move them to another category and than you will be able to delete the existing one.</font></caption>
		<tr style="background-color:#336699; font-family:verdana; font-size:11; font-weight:bold; color:white">
			<td>Title & Description</td>
			<td align=center>New category</td>
		</tr>

		<?
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

			if($a1[PriorityLevel] == '5')
			{
				$pri = "<sup><font color=\"#000099\" size=2 face=verdana>$a1[PriorityName]</font></sup>";
			}
			else
			{
				$pri = "";
			}

			$desc = substr($a1[Description], 0, 30);

			$MySelect = "<select name=\"RegCategory[]\">\n\t";
			$qcat = "select * from re2_categories order by CategoryName";
			$rcat = mysql_query($qcat) or die(mysql_error());
			while($acat = mysql_fetch_array($rcat))
			{
				if($acat[CategoryID] != $_GET[CategoryID])
				{
					$MySelect .= "<option value=\"$acat[CategoryID]|0|$a1[ListingID]\">$acat[CategoryName]</option>\n\t";

					//get the subcategories
					$qsub = "select * from re2_subcategories where CategoryID = '$acat[CategoryID]' order by SubcategoryName ";
					$rsub = mysql_query($qsub) or die(mysql_error());

					if(mysql_num_rows($rsub) > '0')
					{
						while($asub = mysql_fetch_array($rsub))
						{
							$MySelect .= "<option value=\"$acat[CategoryID]|$asub[SubcategoryID]|$a1[ListingID]\">$acat[CategoryName] - $asub[SubcategoryName]</option>\n\t";
						}
					}
				}
			}

				$MySelect .= "</select>\n";


			echo "<tr bgcolor=$col>\n\t<td><a class=BlackLink href=\"view.php?BusinessID=$a1[BusinessID]\">$a1[Title]</a> $pri - $desc</td>\n\t<td align=right>$MySelect</td>\n</tr>\n";
		}

		echo "<tr>\n\t<td colspan=2 align=center><input type=submit name=ss1 value=\"Update\"></td>\n</tr>\n";

		echo "</table>\n\n</form>\n\n";
	}
}



?>