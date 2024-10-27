<?php
if(isset($_POST['checkout'])){
    extract($_POST);
    $name=htmlspecialchars($name);
    $email=htmlspecialchars($email);
    $phone=htmlspecialchars($phone);
    $address=htmlspecialchars($address);
    $city=htmlspecialchars($city);
    $state=htmlspecialchars($state);

    // enregistrement de la commande
    $DB->insert('INSERT INTO commande (email,nom,adresse,telephone,citys,total,states) VALUES (?,?,?,?,?,?,?)',array(
        $email,
        $name,
        $address,
        $phone,
        $city,
        $Product->get_totals(),
        $state
    ));

    // enregistrement des produits commandés
    $select=$DB->query('SELECT * FROM commande WHERE email=:id ORDER BY date_creation DESC LIMIT 1',array('id'=>$email));
    foreach($select as $selects){
        foreach($_SESSION['panier'] as $val=>$quantite){
                $DB->insert("INSERT INTO produit_commande (id_commande,id_produit,quantite) VALUES (?,?,?)",array(
                    $selects->id_commande,
                    $val,
                    $quantite
                ));
        }
    }
    header('location: /pay');
    exit();

}