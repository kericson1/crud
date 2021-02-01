<?php
require('partials/header.php');
require 'config/database.php';

if (isset($_POST['register'])) {
	#declaration des variables----------------------------------------------------------
	$name = htmlspecialchars($_POST['name']) ;
	$city = htmlspecialchars($_POST['city']);
	$email = htmlspecialchars($_POST['email']) ;
	$password = htmlspecialchars($_POST['password']) ;
	$date_naissance = htmlspecialchars($_POST['date_naissance']) ;
	#Fin de declaration-------------------------------------------------------------------

	# Hashage du mot de passe-----------------------------------------------------------------
	$hash_password = password_hash($password, PASSWORD_DEFAULT);
	# Hashage du mot de passe-----------------------------------------------------------------

	#teste des champs du formulaire
	if (!empty($_POST[('name')]) and !empty($_POST['password']) and !empty($_POST['email'])and !empty($_POST['city']) and !empty($_POST['date_naissance'])) {
		$req = $db->prepare("INSERT INTO users (name, password, email, city, date_naissance) values (?, ?, ?, ?, ?)");
		$exc = $req->execute(array($name, $hash_password, $email, $city, $date_naissance));

		header('Location: members.php');
	} else {
		$notification = "Veuillez remplir tous les champs svp !";
	}
}
?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('public/img/home-bg.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Inscription</h1>
					<span class="subheading">Veuillez renseignez la fiche</span>
				</div>
			</div>
		</div>
	</div>
</header>
<hr>

<div class="container">
	<div>

	</div>
	<form method="POST" action="">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputName">Nom</label>
				<input type="text" class="form-control" id="inputName" placeholder="Nom" name="name">
			</div>
			<div class="form-group col-md-6">
				<label for="inputPassword4">Mot de passe</label>
				<input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
			</div>
		</div>
		<div class="form-group">
			<label for="inputAddress">Adresse email</label>
			<input type="email" class="form-control" id="inputAddress" placeholder="kericson@diby.com" name="email" >
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputCity">Ville</label>
				<input type="text" class="form-control" id="inputCity" placeholder="Abidjan" name="city">
			</div>
			<div class="form-group col-md-6">
				<label for="inputCity">Date de naissance</label>
				<input type="date" class="form-control" id="inputCity" name="date_naissance">
			</div>
		</div>
		<button class="btn btn-primary" name="register">S'inscrire</button>
	</form>
	<br>
	<p>
		<?php if (isset($notification)) {
			echo "<p class='text-center alert alert-danger'>" . $notification . "</p>";
		}
		?>
	</p>

</div>


<?php require('partials/footer.php'); ?>