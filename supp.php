<?php 
	require'config/database.php';
	$req =$db->prepare("DELETE from users where id = ?");
    $exc = $req->execute(array($_GET['id']));
    header('Location: index.php');
?>