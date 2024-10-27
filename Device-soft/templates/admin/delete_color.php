<?php 
require 'include/_header.php';
$id=htmlspecialchars($_GET['id']);
// suppression du produit
$DB->insert('DELETE FROM couleur WHERE id_couleur=:id',array('id'=>$id));
// redirection
header('location: /list_color?success=1');
exit();