<?php
// CREATION DU PANIER
function creationpanier()
{
	if (!isset($_SESSION['panier']))
	{
		$_SESSION['panier'] = array();
		$_SESSION['panier']['produit'] = array();
		$_SESSION['panier']['quantite'] = array();
		$_SESSION['panier']['prix'] = array();
	}
	return TRUE;
}
// AJOUT D'ARTICLE AU PANIER
function ajout($produit, $quantite, $prix)
{
	if (creationpanier())
	{
		// Si deja produit, on ajoute juste qte
		$positionproduit = array_search($produit, $_SESSION['panier']['produit']);
		if ($positionproduit !== FALSE)
			$_SESSION['panier']['quantite'][$positionproduit] = $_SESSION['panier']['quantite'][$positionproduit] + $quantite;
		else
		{
			// Si pas de produit, on l'ajoute
			array_push($_SESSION['panier']['produit'], $produit);
			array_push($_SESSION['panier']['quantite'], $quantite);
			array_push($_SESSION['panier']['prix'], $prix);
		}
	}
	else
		echo "Un probléme est survenue.";
}
// SUPPRESSION D'UN ARTICLE
function remove($produit)
{
	if (creationpanier())
	{
		$tmp = array();
		$tmp['produit'] = array();
		$tmp['quantite'] = array();
		$tmp['prix'] = array();
		$i = 0;
		while ($i < count($_SESSION(['panier']['produit'])))
		{
			if ($_SESSION['panier']['produit'][$i] !== $produit)
			{
				array_push($tmp['produit'], $_SESSION['panier']['produit'][$i]);
				array_push($tmp['quantite'], $_SESSION['panier']['quantite'][$i]);
				array_push($tmp['prix'], $_SESSION['panier']['prix'][$i]);
			}
			$i++;
		}
		$_SESSION['panier'] = $tmp;
		unset($tmp);
	}
	else
		echo "Un probléme est survenue.";
}
// MODIFIER LA QUANTITE
function modification($produit, $quantite)
{
	if (creationpanier())
	{
		if ($quantite > 0)
		{
			$positionproduit = array_search($produit, $_SESSION['panier']['produit']);
			if ($positionproduit !== FALSE)
				$_SESSION['panier']['quantite'][$positionproduit] = $quantite;
			else
				remove($produit);
		}
	}
	else
		echo "Un probléme est survenu.";
}
// MONTANT PANIER
function amount()
{
	$total = 0;
	$j = 0;
	while ($j < count($_SESSION['panier']['produit']));
	{
		$total = $total + $_SESSION['panier']['quantite'][$j] * $_SESSION['panier']['prix'][$j];
		$j++;
	}
	return ($total);
}
// NOMBRE D'ARTICLES
function number()
{
	if (isset($_SESSION['panier']))
		return (count($_SESSION['panier']['produit']));
	else
		return (0);
}
// SUPPRIMER TOUT LE PANIER
function removeall()
{
	unset($_SESSION['panier']);
}
?>
