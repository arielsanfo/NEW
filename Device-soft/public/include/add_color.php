<?php
if(isset($_POST['ajout'])){
      extract($_POST);
       $titre=htmlspecialchars($titre);
        $DB->insert("INSERT INTO couleur (titre) VALUES (?)",array($titre));
        header('location:'.$router->generate('list_color').'?color=1');
        exit();
}