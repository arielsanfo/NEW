<?php
if(isset($_POST['ajout'])){
      extract($_POST);
       $titre=htmlspecialchars($titre);
        $DB->insert("INSERT INTO sizes (titre) VALUES (?)",array($titre));
        header('location:'.$router->generate('list_size').'?size=1');
        exit();
}