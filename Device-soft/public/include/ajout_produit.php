<?php
if(isset($_POST['ajout'])){
      extract($_POST);
if(isset($_FILES['photo'])){
    $titre=htmlspecialchars($titre);
    $categorie=htmlspecialchars($categorie);
    $prix=htmlspecialchars($prix);
    $color=htmlspecialchars($color);
    $reduction=htmlspecialchars($reduction);
    $description=htmlspecialchars($description);
        $count=count($_FILES['photo']['name']);
        $DB->insert("INSERT INTO produits (id_categorie,titre,prix,reduction,descriptions,couleur) VALUES (?,?,?,?,?,?)",
        array($categorie,$titre,$prix,$reduction,$description,$color));
        
        
        $select=$DB->query('SELECT * FROM produits ORDER BY date_creation DESC LIMIT 1');
        foreach($select as $selects){
               // vérification dans la bd
        $number=$DB->row("SELECT * FROM produits WHERE id_produits=:id",array('id'=>$selects->id_produits));
        if($number > 0){
            for($i=0;$i<$count;$i++){
                $target='img/'.md5(mt_rand(1111111111111,9999999999999)).''.$_FILES['photo']['name'][$i];
                $temp=$_FILES['photo']['tmp_name'][$i];
               // compression du cover pour enregistrer
            $manager->make($temp)
            ->fit(500,500)
            ->encode('webp', 75)
            ->save($target);
                // ajout dans la base de données
                $DB->insert("INSERT INTO photo  (id_produits,photo_url) VALUES (?,?)",array($selects->id_produits,$target));
            }
        header('location:'.$router->generate('list_product').'?product=1');
        exit();
        }
     
        }
    }
}