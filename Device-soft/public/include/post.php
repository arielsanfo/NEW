<?php
if(!empty($_POST)){
    extract($_POST);
        if(isset($_POST['ajouter'])){
            // est ce que la photo a été uploader
            $titre=htmlspecialchars($titre);
            $prix=htmlspecialchars($prix);
            $temps=htmlspecialchars($temps);
            $description=htmlspecialchars($description);

            // insertion dans la base de données
            $DB->insert('INSERT INTO post (id_client,titre,prix,temps,descriptions) VALUES (?,?,?,?,?)',array(
                $user->id_users,
                $titre,
                $prix,
                $temps,
                $description
            ));
            header('location: profil_client?post=1');
            exit();
        }
}