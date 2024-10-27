<?php
if(!empty($_POST)){
    extract($_POST);
    $valid=true;
    $email=htmlspecialchars($email);
    $old=htmlspecialchars($old);
    $new=htmlspecialchars($new);

    if(!password_verify($old, $user->passwords)){
        $valid=false;
        $er_pass="Your old password is invalid !";
    }else{
        if($old == $new){
            $valid=false;
            $er_pass="You cannot set your same password";
        }else{
            $DB->insert('UPDATE users SET email=:email,passwords=:pass WHERE id_users=:id',array('email'=>$email,'pass'=>password_hash($new,PASSWORD_DEFAULT),'id'=>$user->id_users));
            $_SESSION['user']=$email;
            header('location: /profil?success=1');
            exit();
        }
    }

}