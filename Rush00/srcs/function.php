<?php
function auth($login, $passwd)
{
	$passwd = hash('whirlpool', $passwd);
	$servername = "localhost";
	$username = "root";
	$password = "marine";
// Create connection
	$conn = mysqli_connect($servername, $username, $password);
	mysqli_select_db($conn, "rush00");
	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());
	$query = mysqli_query($conn, "SELECT * FROM `utilisateurs` WHERE login='".$login."'");
	$row = mysqli_fetch_assoc($query);
	if ($passwd === $row['password'])
		return TRUE;
	else
		return FALSE;
}
// function delete($login)
// {
// 	$passwd = hash('whirlpool', $passwd);
// 	$servername = "localhost";
// 	$username = "root";
// 	$password = "marine";
// // Create connection
// 	$conn = mysqli_connect($servername, $username, $password);
// 	mysqli_select_db($conn, "rush00");
// 	if (mysqli_query($conn, "DELETE FROM `utilisateurs` WHERE login='".$login."'"))
// 		return (TRUE);
// 	else
// 		return (FALSE);
// }
?>
