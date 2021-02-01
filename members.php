<?php
require 'partials/header.php';
require 'config/database.php';

?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('public/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Liste membres</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
 <br><br><br>
    <h4>Nouveau Participant <a href="register.php" class="btn btn-info">Ajouter</a></h4>
    <h1>Bienvenue sur kericson.com</h1>
    <?php
    $req = $db->query("SELECT * from users");
    $exec = $req->fetchAll(PDO::FETCH_OBJ);
    foreach ($exec as $par) {
        echo
        "<div class='row' style='border-top: 1px solid black;'>
                        <div class='col-md-2'>" . $par->name . "</div>
                        <div class='col-md-2'>" . $par->date_naissance . "</div>
                        <div class='col-md-2'>" . $par->city . "</div>
                        <div class='col-md-3'>" . $par->email . "</div>
                        <div class='col-md-3'>
                        <div class='row'>
                            <div class='col-md-6'>
                                <a href='modif.php?id=$par->id' class='btn btn-info' name='modif'>Modifier</a>
                            </div>
                            <div class='col-md-6'>
                            <a href='supp.php?id=$par->id' type='submit' class='btn btn-danger' name='supp'>Supprimer</a>
                            </div>
                            </div>
                                 </div>
                        
                    </div>";
    }
    ?>
</div>

<hr>



<?php
require 'partials/footer.php';
?>