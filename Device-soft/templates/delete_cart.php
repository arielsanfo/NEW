<?php 
session_start();
$id=htmlspecialchars($_GET['id']);
// supression de l'élément dans le panier
unset($_SESSION['panier'][$id]);
header('location: '.$router->generate('cart').'?success=1');
exit();