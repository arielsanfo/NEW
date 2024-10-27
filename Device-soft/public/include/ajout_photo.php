<?php
if(!empty($_POST)){
    extract($_POST);
    if(isset($_FILES['photo'])){
        // insert
        $DB->insert("INSERT INTO post (id_categorie,titre,prix,descriptions) VALUES (?,?,?,?)",array(
            $categorie,
            $titre,
            $prix,
            nl2br($description)
        ));
        $select=$DB->query('SELECT * FROM post ORDER  BY date_creation DESC LIMIT 1');
        foreach($select  as $selects){
            $count=count($_FILES['photo']['name']);
        for($i=0;$i<$count;$i++){
            $target='images/'.$_FILES['photo']['name'][$i];
            move_uploaded_file($_FILES['photo']['tmp_name'][$i], $target);
            // ajout dans la base de données
            $DB->insert('INSERT INTO photo (id_post,photo_url) VALUES (?,?)',array($selects->id_post,$target));
           
        }
        }
        
        header('location: /ajout_post?success=1');
        exit();
      
    }  
    if(isset($_FILES['truck'])){
        // insert
        $DB->insert("INSERT INTO post (titre,prix,descriptions,types) VALUES (?,?,?,?)",array(
            $titre,
            $prix,
            nl2br($description),
            "truck"
        ));
        $select=$DB->query('SELECT * FROM post ORDER  BY date_creation DESC LIMIT 1');
        foreach($select  as $selects){
            $count=count($_FILES['truck']['name']);
        for($i=0;$i<$count;$i++){
            $target='images/'.$_FILES['truck']['name'][$i];
            move_uploaded_file($_FILES['truck']['tmp_name'][$i], $target);
            // ajout dans la base de données
            $DB->insert('INSERT INTO photo (id_post,photo_url) VALUES (?,?)',array($selects->id_post,$target));
           
        }
        }
        
        header('location: /add_truckload?success=1');
        exit();
      
    }       
}