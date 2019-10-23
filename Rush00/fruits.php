<?php
	session_start();
	include "./install.php"
?>
<!DOCTYPE html>
<html>
<?php
	include "./install.php"
?>
	<head>
		<meta charset=" utf-8 " />
		<link rel="stylesheet" href="./srcs/shop.css">
		<title> Le Shop </title>
	</head>
	<body>
		<div class="wrapper">
			<div class="one">
				<div class="topblock">
					<img src="./img/shopimg.png" style="margin:auto">
				</div>
			</div>
			<div class="two">
				<div class="menu">
					<ul>
					<?php
					require "./templates/menu.php";
					?>
					</ul>
				</div>
			</div>
			<div class="three">
				<div class="categories">
					<p class="produits">Produits</p>


				</div>
				<div>
				</div>
			</div>
			<div class="four">
				<div>
					<img src="./img/panier2img.png" width=100%>
					<?php
						include "./templates/panier.php";
					?>
				</div>
				<HR />
				<div>
				<?php
					if ($_SESSION['loggued_on_user'] == NULL){?>
						<form method="POST" action="./srcs/login.php">
						<label>Login: <input class=champs type="text" name="login" required/></label>
						<br/>
						<label>Password: <input class=champs type="password" name="passwd" required/></label>
						<input class="boutonok" type="submit" name="submit" value="OK" /></label>
						<?php }else{ ?>
							<p><?php echo "Bienvenue " . $_SESSION['loggued_on_user'];?></p>
							<form method="POST" action="./srcs/logout.php">
							<input type="submit" name="submit" value="Deconnexion" />
						</form>
						<?php } ?>
					<HR />
				</div>
				<div style=text-align:center>
					<a class="inscription" href="./srcs/inscription.php"> Inscription</a>
				</div>
			</div>
			<div class="abricot">
				<a href="./templates/tools.php?article=1"><img src="./img/abricot.jpeg" class="images"></a>
			</div>
			<div class="ananas">
					<a href="./templates/tools.php?article=1"><img src="./img/ananas.jpeg" class="images"></a>
			</div>
			<div class="citron">
				<img src="./img/citron.jpeg" class="images">
			</div>
			<div class="fraise">
				<img src="./img/fraise.jpeg" class="images">
			</div>
			<div class="framboise">
				<img src="./img/framboise.jpeg" class="images">
			</div>
			<div class="tomate">
				<img src="./img/tomate.jpeg" class="images">
			</div>
</div>	</body>
</html>
