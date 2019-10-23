<?php
session_start();
include_once("treat_panier.php");
$erreur = FALSE;
$action = (isset($_POST['action'])? $_POST['action']: (isset($_GET['action'])? $_GET['action']:NULL));
if($action !== NULL)
{
	if(!in_array($action,array('ajout', 'suppression', 'refresh')))
		$erreur = TRUE;
	$l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:NULL ));
	$p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:NULL ));
	$q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:NULL ));
	$l = preg_replace('#\v#', '',$l);
	$p = floatval($p);
	if (is_array($q))
	{
		$QteArticle = array();
		$i = 0;
		foreach ($q as $contenu)
		{
			$QteArticle[$i++] = intval($contenu);
		}
	}
	else
	$q = intval($q);
}
if (!$erreur)
{
	switch($action)
	{
		Case "ajout":
			ajout($l,$q,$p);
			break;
		Case "suppression":
			remove($l);
			break;
		Case "refresh" :
		for ($i = 0 ; $i < count($QteArticle) ; $i++)
		{
			modification($_SESSION['panier']['produit'][$i],round($QteArticle[$i]));
		}
		break;
		Default:
		break;
	}
}
echo '<?xml version="1.0" encoding="utf-8"?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<title>Votre panier</title>
	</head>
<body>
	<form method="post" action="panier.php">
		<table style="width: 400px">
		<tr>
			<td colspan="4" style="color:white;">Votre panier</td>
		</tr>
		<tr>
			<td style="color:white">Produit</td>
			<td style="color:white">Quantité</td>
			<td style="color:white">Prix</td>
		</tr>
	<?php
	if (creationpanier())
	{
		$nbArticles=count($_SESSION['panier']['produit']);
		if ($nbArticles <= 0)
		echo "<tr><td style=\"color:white\";>Votre panier est vide </ td></tr>";
		else
		{
			for ($i=0 ;$i < $nbArticles ; $i++)
			{
				echo "<tr>";
				echo "<td>".htmlspecialchars($_SESSION['panier']['produit'][$i])."</ td>";
				echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['quantite'][$i])."\"/></td>";
				echo "<td>".htmlspecialchars($_SESSION['panier']['prix'][$i])."</td>";
				echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['produit'][$i]))."\">XX</a></td>";
				echo "</tr>";
			}
				echo "<tr><td colspan=\"2\"> </td>";
				echo "<td colspan=\"2\">";
				echo "Total : ". amount();
				echo "</td></tr>";
				echo "<tr><td colspan=\"4\">";
				echo "<input type=\"submit\" value=\"Rafraichir\"/>";
				echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
				echo "</td></tr>";
		}
	}
	?>

		</table>
	</form>
</body>
</html>
