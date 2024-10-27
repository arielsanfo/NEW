<?php
if(!empty($_POST)){
    extract($_POST);
    if(isset($_POST['add'])){
        // insert
        $DB->insert("UPDATE post SET titre=:titre,prix=:prix,descriptions=:descriptions WHERE id_post=:id",array(
            'id'=>$_GET['id'],
            'titre'=>$titre,
            'prix'=>$prix,
            'descriptions'=>nl2br($description)
        ));
        header('location: /list_post');
        exit();
      
    }       
}