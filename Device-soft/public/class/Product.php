<?php
class Product extends DB{
    public function get_categories(){
        // recuperation des categorie dans la base de données
            // initialisation de la variale $DB;
            global $DB;
            return $DB->query('SELECT * FROM categories');
    }

    public function get_product_categories($id){
        global $DB;
        return $DB->row('SELECT * FROM produits WHERE id_categorie=:id',array('id'=>$id));
    }
    public function get_product_category($id){
        global $DB;
        return $DB->query('SELECT * FROM produits WHERE id_categorie=:id',array('id'=>$id));
    }

    public function get_new_product(){
        global $DB;
        return $DB->query('SELECT * FROM produits ORDER BY date_creation DESC LIMIT 8');
    }
    public function get_loved_product(){
        global $DB;
        return $DB->query('SELECT * FROM produits ORDER BY liked DESC LIMIT 8');
    }
    public function get_picture($id_product){
        return $this->query('SELECT * FROM photo WHERE id_produits=:id ORDER BY date_creation DESC LIMIT 1',array('id'=>$id_product));
    }
    public function get_different_picture($id_product,$id_picture){
        return $this->query('SELECT * FROM photo WHERE id_produits=:id AND id_photos <>:photo ORDER BY date_creation',array('id'=>$id_product,'photo'=>$id_picture));
    }
    public function get_partenaire(){
        global $DB;
        return $DB->query('SELECT * FROM partenaire');
    }

    public function get_product($id){
        return $this->query('SELECT * FROM produits WHERE id_produits=:id',array('id'=>$id));
    }
    public function get_products(){
        return $this->query('SELECT * FROM produits ORDER BY date_creation DESC LIMIT 30');
    }
    public function get_random_product(){
        global $DB;
        $limit = 12;
        // Nombre d'articles par page
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $total=$DB->row('SELECT * FROM produits');
        $pages = ceil($total / $limit);

        return $DB->query('SELECT * FROM produits LIMIT '.$start.','.$limit);
    }
    public function get_product_search($q){
        global $DB;
        $q=htmlspecialchars($q);
        return $DB->query('SELECT * FROM produits WHERE titre LIKE "%'.$q.'%"');
    }
    public function get_page(){
        global $DB;
        $limit = 12;
        $total=$DB->row('SELECT * FROM produits');
        $pages = ceil($total / $limit);

        return $pages;
    }
    public function get_number_product(){
        global $DB;
        return $DB->row('SELECT * FROM produits');
    }
    public function get_number_categorie(){
        global $DB;
        return $DB->row('SELECT * FROM categories');
    }
    public function get_number_commande(){
        global $DB;
        return $this->row('SELECT * FROM commande');
    }
    public function get_description(){
        global $DB;
        $select=$this->query('SELECT * FROM descriptions ORDER BY date_creation DESC LIMIT 1');
        foreach($select as $selects){
            return $selects->descriptions;
        }
    }
    public function get_total(){
        global $DB;
        // initialisons le @total à 0
        $total=0;
        // parcourons le panier
        foreach($_SESSION['panier'] as $val=>$quantite){
            // selection des produit par id de la session
            $select=$this->get_product($val);
            // parcourons les produits
            foreach($select as $selects){
               if($selects->reduction == 0){
                 // calcul du total par ittération
                 $post=$selects->prix * $quantite;
                 // sauvegarde dy total dans la variable $total
                 $total=$total + $post;
               }else{
                 // calcul du total par ittération
                 $post=($selects->prix - ($selects->prix * $selects->reduction/100)) * $quantite;
                 // sauvegarde dy total dans la variable $total
                 $total=$total + $post;
               }
            }
        }
        // sauvegardons la session
        $_SESSION['total']=number_format($total,2,'.',',');
        // retournons le total
        return number_format($total,2,'.',',');
    }
    public function get_totals(){
        global $DB;
        // initialisons le @total à 0
        $total=0;
        // parcourons le panier
        foreach($_SESSION['panier'] as $val=>$quantite){
            // selection des produit par id de la session
            $select=$this->get_product($val);
            // parcourons les produits
            foreach($select as $selects){
               if($selects->reduction == 0){
                 // calcul du total par ittération
                 $post=$selects->prix * $quantite;
                 // sauvegarde dy total dans la variable $total
                 $total=$total + $post;
               }else{
                 // calcul du total par ittération
                 $post=($selects->prix - ($selects->prix * $selects->reduction/100)) * $quantite;
                 // sauvegarde dy total dans la variable $total
                 $total=$total + $post;
               }
            }
        }
        // sauvegardons la session
        $_SESSION['total']=$total;
        // retournons le total
        return $total;
    }

    public function get_price_product($min,$max){
        global $DB;
        $limit = 12;
        // Nombre d'articles par page
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $total=$DB->row('SELECT * FROM produits WHERE prix >=:min AND prix <=:max',array('min'=>$min,'max'=>$max));
        return $DB->query('SELECT * FROM produits WHERE prix >=:min AND prix <=:max LIMIT '.$start.','.$limit.'',array('min'=>$min,'max'=>$max));
    }

  
}





