<?php
session_start();
$login = $_SESSION['loggued_on_user'];

$conn = mysqli_connect("localhost", "root", "marine", "rush00");
// Check connection
if (!$conn)
	die("Connection failed: " . mysqli_connect_error());
if (isset($_SESSION['loggued_on_user']))
{
	$del = "DELETE FROM `utilisateurs` WHERE login = '".$login."'";
	$result = mysqli_query($conn, $del);
	echo mysqli_error();
	unset($_SESSION['loggued_on_user'], $_SESSION['login']);
	echo "Votre compte a été supprimé, vous allez étre redirigé, a bientôt.";
	header("refresh:5;url=http://localhost:8080/rushabaud/rush00/LeShop/index.php");
}
?>
