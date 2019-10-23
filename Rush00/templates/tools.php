<?php
	session_start();
{
	if (isset($_GET['article']))
	{
		if ($_GET['article'] == 1)
		{
			$article = "abricot";
			echo("ca marche");
		}
		if ($_GET['article'] == 1)
			$article = "abricot";

		if ($_SESSION["loggued_on_user"] == "")
		{
			echo("ca rentre");
			$nbarticle = $_SESSION["panier"]["quantite"];
			var_dump($_SESSION);
			$_SESSION["panier"]["quantite"]+=1;
			var_dump($_SESSION["panier"]["quantite"]);
			var_dump($nbarticle);
			#header("location: ../index.php");
		}
		if ($_SESSION["loggued_on_user"] != "")
		{
			if (!$log = mysqli_query($conn, "SELECT * FROM `panier`"))
				echo("prob verif login: " . mysqli_error($conn));
			while ($row = mysqli_fetch_array($log))
			{
				if ($row['login'] == $_SESSION["loggued_on_user"] && $row['article'] == $article)
				{
					$nbarticle = $row['quantite'];
					$nbarticle += 1;
				}
			}
			$login = $_SESSION["loggued_on_user"];
			$sql = "INSERT INTO panier (login, produit, quantite) VALUES('$login', '$article', '$nbarticle');";
			if (!mysqli_query($conn, $sql))
				echo("Error creating table panier: " . mysqli_error($conn));
			header("location: ../index.php");
		}
	}
}
?>
