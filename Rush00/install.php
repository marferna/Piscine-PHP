<html>
	<head>
		<title>Connecting MySQLi Server</title>
	</head>
	<body>
<?php
$servername = "localhost";
$username = "root";
$password = "marine";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
	if (!$conn)
		die("Connection failed: " . mysqli_error($conn));

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS rush00";
if (!mysqli_query($conn, $sql))
	die("Connection failed: " . mysqli_error($conn));
mysqli_close($conn);

// Create connection
$conn = mysqli_connect($servername, $username, $password, "rush00");

// Check connection
if (!$conn)
	die("Connection failed: " . mysqli_error($conn));
$sql1 = "CREATE TABLE IF NOT EXISTS `utilisateurs`
	(
		`ID` INT AUTO_INCREMENT NOT NULL,
		`login` VARCHAR(100) NOT NULL,
		`password` LONGTEXT NOT NULL,
		`email` VARCHAR(255) NOT NULL,
		PRIMARY KEY(ID)
	)";
if (!mysqli_query($conn, $sql1))
	die("Error creating table utilisateurs: " . mysqli_error($conn));

	$sql1 = "CREATE TABLE IF NOT EXISTS `utilisateurs`
			(
			`ID` INT AUTO_INCREMENT NOT NULL,
			`login` VARCHAR(100) NOT NULL,
			`password` LONGTEXT NOT NULL,
			`email` VARCHAR(255) NOT NULL,
			PRIMARY KEY(ID))";
	if (!mysqli_query($conn, $sql1)) {
		die("Error creating table utilisateurs: " . mysqli_error($conn));
	}

	$passadmin = hash("whirlpool", "admin");
	$sqladmin = "INSERT INTO utilisateurs (login, password, email)
				SELECT * FROM (SELECT 'admin', '$passadmin', 'admin@admin.com') AS TMP
				WHERE NOT EXISTS (
					SELECT login FROM utilisateurs WHERE login = 'admin'
				) LIMIT 1";
	if (!mysqli_query($conn, $sqladmin))
		die("Error insert admin config in db: " . mysqli_error($conn));

	$sqltable = "CREATE TABLE IF NOT EXISTS `categorie`
			(`ID` INT AUTO_INCREMENT NOT NULL,
			`nom` VARCHAR(100) NOT NULL,
			PRIMARY KEY(ID))";
	if (!mysqli_query($conn, $sqltable))
		die("Error creating table categorie: " . mysqli_error($conn));

	$sql2 = "CREATE TABLE IF NOT EXISTS `fruits`
			(`ID` INT AUTO_INCREMENT NOT NULL,
			`nom` VARCHAR(100) NOT NULL,
			`prix` INT NOT NULL,
			PRIMARY KEY(ID))";
	if (!mysqli_query($conn, $sql2))
		die("Error creating table fruits : " . mysqli_error($conn));


	$sql3 = "CREATE TABLE IF NOT EXISTS `legumes`
			(`ID` INT AUTO_INCREMENT NOT NULL,
			`nom` VARCHAR(100) NOT NULL,
			`prix` INT NOT NULL,
			PRIMARY KEY(ID))";
	if (!mysqli_query($conn, $sql3)) {
		die("Error creating table legumes: " . mysqli_error($conn));
	}

	$sqltable = "INSERT INTO categorie (ID, nom) VALUES(1, 'Legumes');";
	$sqltable .= "INSERT INTO categorie (ID, nom) VALUES(2, 'Fruits');";
	mysqli_multi_query($conn, $sqltable);

	$sql4 = "INSERT INTO fruits (ID, nom, prix) VALUES(1, 'Citron', 1);";
	$sql4 .= "INSERT INTO fruits (ID, nom, prix) VALUES(2, 'Abricot', 3);";
	$sql4 .= "INSERT INTO fruits (ID, nom, prix) VALUES(3, 'Ananas', 5);";
	$sql4 .= "INSERT INTO fruits (ID, nom, prix) VALUES(4, 'Tomate', 8);";
	$sql4 .= "INSERT INTO fruits (ID, nom, prix) VALUES(5, 'Fraise', 9);";
	$sql4 .= "INSERT INTO fruits (ID, nom, prix) VALUES(6, 'Framboise', 10);";
	mysqli_multi_query($conn, $sql4);
	mysqli_close($conn);

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, "rush00");

	// Check connection
	if (!$conn)
		die("Connection failed: " . mysqli_error($conn));

	$sql5 = "INSERT INTO legumes (ID, nom, prix) VALUES(1, 'Concombre', 2);";
	$sql5 .= "INSERT INTO legumes (ID, nom, prix) VALUES(2, 'Courgette', 3);";
	$sql5 .= "INSERT INTO legumes (ID, nom, prix) VALUES(3, 'Haricot', 5);";
	$sql5 .= "INSERT INTO legumes (ID, nom, prix) VALUES(4, 'Tomate', 1);";
	$sql5 .= "INSERT INTO legumes (ID, nom, prix) VALUES(5, 'Salade', 8);";
	$sql5 .= "INSERT INTO legumes (ID, nom, prix) VALUES(6, 'Carotte', 13);";
	$sql5 .= "INSERT INTO legumes (ID, nom, prix) VALUES(7, 'Brocoli', 14);";
	mysqli_multi_query($conn, $sql5);

	mysqli_close($conn);

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, "rush00");

	// Check connection
	if (!$conn)
		die("Connection failed: " . mysqli_error($conn));
	$panier = "CREATE TABLE IF NOT EXISTS `panier` (
		`ID` INT AUTO_INCREMENT NOT NULL,
		`login` VARCHAR(100) NOT NULL,
		`produit` VARCHAR(100) NOT NULL,
		`quantite` INT NOT NULL,
		PRIMARY KEY(ID))";
	if (!mysqli_query($conn, $panier))
		die("Error creating table panier: " . mysqli_error($conn));
?>
	</body>
</html>
