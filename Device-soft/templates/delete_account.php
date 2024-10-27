<?php 
require 'include/_header.php';
if(isset($user)){
    $DB->insert("DELETE FROM users WHERE id_users=:id",array('id'=>$user->id_users));
    header('location: /login?delete=1');
    exit();
}else{
    header('location: /login?delete=1');
    exit();
}