<?php
if(isset($_POST['add'])){
    extract($_POST);
    $descriptions=htmlspecialchars($descriptions);

    $DB->insert('INSERT INTO descriptions (descriptions) VALUES (?)',array($descriptions));
    header('location: /add_description?success=1');
    exit();
}