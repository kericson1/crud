<?php 
	require'header.php';
	require'config/database.php';
	if(isset($_POST['enregistrer'])){
		if (!empty($_POST['nom']) and !empty($_POST['prenom'])) {
			$req =$db->prepare("INSERT INTO users (name, email) values (?, ?)");
			$exc = $req->execute(array($_POST['nom'], $_POST['prenom']));
			
			header('Location: index.php');
		}
		else{
			echo "Renseignez tout les champ";
		}
	}
?>

        <form action="" method="post">
			<h2>Insertion de nouveau participant</h2>
			<div class="form-group">
				<label for="nom">Nom</label>
				<input type="text" name="nom" id="nom" class="form-control">
			</div>
			<div class="form-group">
				<label for="prenom">Prénom(s)</label>
				<input type="text" name="prenom" id="prenom" class="form-control">
			</div>
			<div class="form-group ">
				<a href="index.php" class="btn btn-danger">Annuler</a>
			</div>
			<div class="form-group text-right">
				<button class="btn btn-success" name="enregistrer">Enregistrer</button>
			</div>
			
			
		</form>
    </div>
</body>
</html>