<?php
$servername = "localhost";
$username = "root";
$password = "marine";

mysqli_close($conn);

// Create connection
$conn = mysqli_connect($servername, $username, $password, "rush00");

// Check connection
	if (!$conn)
		die("Connection failed: " . mysqli_error($conn));

	if(!$result = mysqli_query($conn, "SELECT * FROM categorie"))
	{
		echo("ca marche pas");
		echo(mysqli_error($conn));
	}
	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['ID'] == 1)
		{
			echo "<li><a style=\"color:white\" href=\"./legumes.php";
			echo "\"categorie?id=\$row['id']";
			echo ">";
			echo $row['nom'];
			echo "</a></li>";
		}
		if ($row['ID'] == 2)
		{
			echo "<li><a style=\"color:white\" href=\"./fruits.php";
			echo "\"categorie?id=\$row['id']";
			echo $row['id'];
			echo ">";
			echo $row['nom'];
			echo "</a></li>";
		}
 	}
?>
