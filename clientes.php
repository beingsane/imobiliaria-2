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
require_once("templates/HeaderTemplate.php");


?> 
<table width="400" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td>
<?=$aset[Clientes]?>
    </td>
  </tr>
</table>
<?

require_once("templates/FooterTemplate.php");

?>

