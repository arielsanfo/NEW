<?php 
require 'include/_header.php';
$id=htmlspecialchars($_GET['id']);
// suppression du produit
$DB->insert('DELETE FROM categories WHERE id_categories=:id',array('id'=>$id));
// redirection
header('location: /list_category?success=1');
exit();