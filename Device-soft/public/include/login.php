<?php
if(!empty($_POST)){
    extract($_POST);
    $valid=true;
        if(isset($_POST['login'])){
           // sécurité des variable
           $email=htmlspecialchars($email);  
           $password=htmlspecialchars($password);
           // vérification de la connexion
           $user= $auth->login($email, $password);
            // identifiant ou mot de passe incorect
            if($user == null)
            {
              $valid=false;
              $er_login="email or passwords incorrect ! try again.";
            }
            if($user){
                  if($user->roles == 'client'){
                    header('location: '.$router->generate('profil'));
                    exit();
                  }
                  if($user->roles == 'admin'){
                    header('location: '.$router->generate('admin'));
                    exit();
                  }
                }
                
            }
        }