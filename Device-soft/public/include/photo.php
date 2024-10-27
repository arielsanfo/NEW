<?php
if(!empty($_POST)){
    extract($_POST);
        if(isset($_POST['pp'])){
            // est ce que la photo a été uploader
            if(isset($_FILES['photo'])){
                $target='images/img_profil/'.$_FILES['photo']['name'];
                $temp=$_FILES['photo']['tmp_name'];
                // modification de la photo de profil
                $DB->insert('UPDATE users SET photo_url=:photo WHERE id_users=:id',array('photo'=>$target,'id'=>$user->id_users));
                // copie de l'image
                move_uploaded_file($temp, $target);
if($user->types == 'freelance'){
    header('location: profil_freelance');
    exit();
}else{
    header('location: profil_client');
    exit();
}
            }
        }
}