<?php
if(!empty($_POST)){
    extract($_POST);
        if(isset($_POST['add'])){
            $DB->insert('INSERT INTO categories (nom) VALUES (?)',array($categorie));
            header('location: /ajout_categorie?success=1');
            exit();
        }
}