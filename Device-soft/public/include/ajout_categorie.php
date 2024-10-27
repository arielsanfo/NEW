<?php
if(isset($_POST['ajout'])){
      extract($_POST);
       $titre=htmlspecialchars($titre);
        $DB->insert("INSERT INTO categories (titre) VALUES (?)",array($titre));
        header('location:'.$router->generate('list_category').'?product=1');
        exit();
}