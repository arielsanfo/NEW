<?php
require 'include/_header.php';
if(isset($_GET['id'])){
    // protection de l'id
    $id=htmlspecialchars($_GET['id']);
    // suppression du produit
    $DB->insert('DELETE FROM produits WHERE id_produits=:id',array('id'=>$id));
    // redirection
    header('location: list_product?success=1');
    exit();
}