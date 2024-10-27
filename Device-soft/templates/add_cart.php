<?php
require 'include/_header.php';
if(isset($_POST['count'])){
    if(isset($_SESSION['panier'])){
        echo array_sum($_SESSION['panier']);
    }else{
        echo 0;
    }
}   
if(isset($_POST['add_cart'])){
    extract($_POST);
    $id_produit=htmlspecialchars($add_cart);
    if(isset($_SESSION['panier'][$id_produit])){
        $_SESSION['panier'][$id_produit]=$_SESSION['panier'][$id_produit]+1;
    }else{
        $_SESSION['panier'][$id_produit]=1;
    }
}   
?>

<?php 
if(isset($_POST['data_panier'])): 
    if(isset($_SESSION['panier'])):
        foreach($_SESSION['panier'] as $val=>$quantite):
            $select=$DB->query('SELECT * FROM produits WHERE id_produits=:id',array('id'=>$val));
            foreach($select as $selects):              
?>

<a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
        <?php 
        $photo=$DB->query('SELECT * FROM photo WHERE id_produits=:id ORDER BY date_creation DESC LIMIT 1',array('id'=>$selects->id_produits));
        foreach($photo as $photos):
        ?>
      <h5  class="mb-1 text-wrap"><img src="<?= $photos->photo_url ?>" width="50" alt=""><?= $selects->titre ?> <span class="text-danger">x <?= $quantite ?></span></h5>
      <?php endforeach ?>
      <i class="bx bx-trash text-danger" onclick="delete_cart(<?= $selects->id_produits  ?>)" style="cursor: pointer;" ></i>
    </div>
    <small class="text-dark">Total: <?= number_format($selects->prix * $quantite,2,',','.') ?> FCFA</small>
  </a>
  <?php endforeach ?>
<?php endforeach ?>
<?php endif ?>
<?php if(!isset($_SESSION['panier'])): ?>
    <p class="text-center text-info">Votre panier est vide !</p>
<?php endif ?>
<?php endif ?>
<?php
if(isset($_POST['total'])){
    if(isset($_SESSION['panier'])){
        $montant=0;
        foreach($_SESSION['panier'] as $val=>$quantite){
            $select=$DB->query('SELECT * FROM produits WHERE id_produits=:id',array('id'=>$val));
            foreach($select as $selects){
                    $montant=$montant + ($selects->prix * $quantite);
            }    
        }
        echo  'Total: '.number_format($montant,2,',','.').' FCFA';
           
    }   
            
}   
?>
<?php
if(isset($_POST['delete'])){
    extract($_POST);
    unset($_SESSION['panier'][$delete]);
}   
?>