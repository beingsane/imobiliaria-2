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


//Digite o nome do host do seu servidor, geralmente � "localhost".
$db_host = "localhost";

//Digite o nome de usu�rio do banco de dados MYSQL
$db_username = "charles_imovel";

//Digite a senha do banco de dados
$db_password = "12345";

//Digite o nome do banco de dados
$db_name = "charles_imob";

//Digite a URL (endere�o) principal do site, onde est� o arquivo index.php
$site_url = "http://charles.infel.com.br/imobiliaria";



		  ////////////////////////////////////////////////////////////
		 //////         N�o edite as linhas abaixo            ///////
                            //////    Qualquer d�vida envie e-mail para:   ///////
                           //////                 moisbach@gmail.com          ///////
	            ///////////////////////////////////////////////////////////

$connection = mysql_connect($db_host, $db_username, $db_password) or die(mysql_error());

$db = mysql_select_db($db_name, $connection);

session_start();

$t = time();


?>
