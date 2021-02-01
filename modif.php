<?php
require 'partials/header.php';
require 'config/database.php';
if (isset($_POST['enregistrer'])) {
	if (!empty($_POST['name']) and !empty($_POST['city']) and !empty($_POST['date_naissance'])) {
		$req = $db->prepare("UPDATE users SET name = ?, city = ? , date_naissance = ? where id = ?");
		$exc = $req->execute(array($_POST['name'], $_POST['city'], $_POST['date_naissance'], $_GET['id']));
		header('Location: index.php');
	} else {
		echo "Renseignez tout les champ";
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
					<h1>Clean Blog</h1>
					<span class="subheading">A Blog Theme by Start Bootstrap</span>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="container">

	<form method="POST" action="">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputName">Nom</label>
				<input type="text" class="form-control" id="inputName" placeholder="Nom" name="name" value="<?php
																											$stmt = $db->prepare("SELECT name FROM users where id = ?");
																											if ($stmt->execute(array($_GET['id']))) {
																												while ($row = $stmt->fetch()) {
																													echo $row['name'];
																												}
																											}
																											?>">
			</div>
			<div class="form-group col-md-6">
				<label for="inputPassword4">Mot de passe</label>
				<input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
			</div>
		</div><div class="form-group">
			<label for="inputAddress">Adresse email</label>
			<input type="email" class="form-control" id="inputAddress" placeholder="kericson@diby.com" name="email" value="<?php
																												$stmt = $db->prepare("SELECT email FROM users where id = ?");
																												if ($stmt->execute(array($_GET['id']))) {
																													while ($row = $stmt->fetch()) {
																														echo $row['email'];
																													}
																												}
																												?>">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputCity">Ville</label>
				<input type="text" class="form-control" id="inputCity" placeholder="Abidjan" name="city" value="<?php
																												$stmt = $db->prepare("SELECT city FROM users where id = ?");
																												if ($stmt->execute(array($_GET['id']))) {
																													while ($row = $stmt->fetch()) {
																														echo $row['city'];
																													}
																												}
																												?>">
			</div>
			<div class="form-group col-md-6">
				<label for="inputCity">Date de naissance</label>
				<input type="date" class="form-control" id="inputCity" name="date_naissance" value="<?php
																									$stmt = $db->prepare("SELECT date_naissance FROM users where id = ?");
																									if ($stmt->execute(array($_GET['id']))) {
																										while ($row = $stmt->fetch()) {
																											echo $row['date_naissance'];
																										}
																									}
																									?>">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group ">
					<a href="index.php" class="btn btn-danger">Annuler</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group text-right">
					<button class="btn btn-success" name="enregistrer">Modifier</button>
				</div>
			</div>
		</div>


	</form>
</div>
</div>

<?php require 'partials/footer.php'; ?>