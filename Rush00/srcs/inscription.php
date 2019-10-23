<div class="form">
	<form method="POST" action="">
		<fieldset>
			<legend>Inscription</legend>
			<input type="text" name="login" placeholder="Login" value="" />
			<input type="email" name="email" placeholder="E-mail" value="" />
			<input type="password" name="passwd" placeholder="Password" value="" />
			<input type="password" name="conf_passwd" placeholder="Confirm Password" value="" />
		</fieldset>
		<input type="submit" name="submit" value="Sign In" />
	</form>
</div>
<?php
if (isset($_POST['submit']) && ($_POST['submit'] === "Sign In"))
{
	if (!isset($_POST["login"]) || $_POST["login"] == NULL)
		echo("Veuillez entrez un login");
	else if (!isset($_POST["email"]) || $_POST["email"] == NULL)
		echo("Veuillez entrez un e-mail");
	else if (!isset($_POST["passwd"]) || $_POST["passwd"] == NULL)
		echo("Veuillez entrez un mot de passe");
	else if (!isset($_POST["conf_passwd"]) || $_POST["conf_passwd"] == NULL)
		echo("Veuillez confirmer votre mot de passe");
	else if ($_POST["passwd"] != $_POST["conf_passwd"])
		echo("Confirmation du mot de passe érronné");
	else
	{
		$login = ($_POST["login"]);
		$email = ($_POST["email"]);
		$passwd = ($_POST["passwd"]);
		mysqli_real_escape_string($login);
		mysqli_real_escape_string($email);
		mysqli_real_escape_string($passwd);
		$passwd = hash("whirlpool", $passwd);
		$conn = mysqli_connect("localhost", "root", "marine", "rush00");
// Check connection
	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());
	if (!$log = mysqli_query($conn, "SELECT * FROM `utilisateurs`"))
		echo("prob verif login: " . mysqli_error($conn));
	$flag = 1;
	while ($row = mysqli_fetch_array($log))
	{
		if ($row['login'] == $login || $row['email'] == $email)
		{
			echo "Login ou email déjà pris";
			$flag = 0;
			return ;
		}
	}
	if ($flag === 1)
	{
		if(!$query = mysqli_query($conn, "INSERT INTO `utilisateurs`(`login`, `password`, `email`) VALUES ('$login', '$passwd', '$email')"))
		{
			echo("Probléme de base de données lors de l'inscription" . mysqli_error($conn));
			return ;
		}
		// $_SESSION['loggued_on_user'] = $login;
	}
	echo 'Inscription OK, vous allez être redirigé';
	header("refresh:5;url=http://localhost:8080/rushabaud/rush00/LeShop/index.php");
	}
}
?>
