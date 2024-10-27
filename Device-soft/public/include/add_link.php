<?php 
if(isset($_POST['add'])){
    extract($_POST);
    $facebook=htmlspecialchars($facebook);
    $instagram=htmlspecialchars($instagram);
    $tiktok=htmlspecialchars($tiktok);
    $numero=htmlspecialchars($numero);
    $whatsapp=htmlspecialchars($whatsapp);
    $adress=htmlspecialchars($adress);
    $email=htmlspecialchars($email);
    
    $DB->insert("INSERT INTO liens (numero,numero_whatsapp,liens_facebook,liens_instagram,liens_tiktok,adresse,email) VALUES (?,?,?,?,?,?,?)",
    array($numero,$whatsapp,$facebook,$instagram,$tiktok,$adress,$email));
    header('location: /add_link?success=1');
    exit();
}