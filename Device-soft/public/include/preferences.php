<?php 
if(!empty($_POST)){
    extract($_POST);
    foreach($choix as $choixs){
        $choixs=htmlspecialchars($choixs);
        // insertion dans la table preferences 
        $DB->insert('INSERT INTO preferences (email,preferences) VALUES (?,?)',array(
            $_SESSION['success'],
            $choixs
        ));

        // selection l'utilisateur
        $select=$DB->query('SELECT * FROM users WHERE email=:email',array(
            'email'=>$_SESSION['success']
        ));
    }

    foreach($select as $selects){
        if($selects->types == 'freelance'){
            // sauvegarde de l'identifiant unique 
            $_SESSION['users']=$selects->id_users;
            // destruction de la session success
            unset($_SESSION['success']);
            // redirection vers le profil freelance
            header('location: profil_freelance');
            exit();
        }
        if($selects->types == 'client'){
             // sauvegarde de l'identifiant unique 
             $_SESSION['users']=$selects->id_users;
               // destruction de la session success
            unset($_SESSION['success']);
            // redirection vers le profil freelance
            header('location: profil_client');
            exit();
        }
}
}