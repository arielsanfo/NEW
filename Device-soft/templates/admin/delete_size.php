<?php 
require 'include/_header.php';
$id=htmlspecialchars($_GET['id']);
// suppression du produit
$DB->insert('DELETE FROM sizes WHERE id_sizes=:id',array('id'=>$id));
// redirection
header('location: /list_size?success=1');
exit();