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

$ListingID = $_GET[id];

if(isset($_POST[s1]))
{
	$link = $_POST[MyRef];

	$to = $_POST[FriendsEmail];
	$subject = "Oferta de im�veis enviada por $_POST[YourName]";
	$message = $_POST[comments];
	$message .= "\n\nVEJA O AN�NCIO:\n$site_url/anuncio.php?id=$link\n\n$site_url";

	$headers = "MIME-Version: 1.0\n"; 
	$headers .= "Content-type: text/plain; charset=iso-8859-1\n";
	$headers .= "Content-Transfer-Encoding: 8bit\n"; 
	$headers .= "From: $_POST[YourEmail]\n"; 
	$headers .= "X-Priority: 1\n"; 
	$headers .= "X-MSMail-Priority: High\n"; 
	$headers .= "X-Mailer: PHP/" . phpversion()."\n"; 

	mail($to, $subject, $message, $headers);

	require_once("templates/FriendOKTemplate.php");	

	exit();
}

require_once("templates/FriendTemplate.php");	

?>



