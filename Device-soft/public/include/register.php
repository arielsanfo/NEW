<?php
if(!empty($_POST)){
    extract($_POST);
    $valid=true;
                // vérification du nom du formualire posté
                if(isset($_POST['register'])){
                    // sécurité des variables
                    $email=htmlspecialchars($email);
                    $password=htmlspecialchars($password);
                    $cpassword=htmlspecialchars($cpassword);
                    
                            // vérification de l'existence de l'email
                            $number_email=$DB->row('SELECT * FROM users WHERE email=:email',array('email'=>$email));
                            if($number_email > 0){
                                // valide false
                                $valid=false;
                                $er_email="Cet email existe déjà !";
                            }
                            // verification diu mot de passe
                            $longueur=strlen($password);
                            if($longueur <= 5){
                                $valid=false;
                                $er_password="Mot de passe trop faible, saisir au moins 6 caractères !";
                            }

                            // vérification des deux mot de passe saisi
                            if($password != $cpassword){
                                    $valid=false;
                                    $er_password="Les mot de passe ne coïncident pas !";
                            }

                            if($valid){
                                // hashage du mot de passe
                                $hash=password_hash($password, PASSWORD_DEFAULT);
                                // insertion de l'utilisateur dans la base de donées
                                $DB->insert('INSERT INTO users (email,passwords,roles) VALUES (?,?,?)',array(
                                    $email,
                                    $hash,
                                    'client'
                                ));
                                // sauvegarde de l'inscription
                                $_SESSION['success']=$email;
                                // redirection de l'utilisateur
                                header('location: profil');
                                exit();

                            }
                }
}