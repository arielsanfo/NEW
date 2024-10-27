<?php 
require 'include/_header.php';
if(!isset($user)){
    header('location: /login');
    exit();
}
require 'include/header.php'; 
?>
<section>
      <div class="container">
        <div class="d-flex justify-content-center container">
       
          <div class="col-md-12 col-12">
            <div class="contact-information">
              <div class="section-header mt-5">
                <div class="d-flex justify-content-center">
                  <img src="img/OIP.jpeg" alt="" srcset="" width="60">
                </div>
                <h6 class=" text-center mt-3"><?= $user->email ?></h6>
              </div>
              <div>
              <div class="container d-flex justify-content-center flex-wrap mt-5">
                    <div class="my-3">
                    <a href="#" class="btn btn-warning mx-2"><i class="bx bx-edit"></i> modifier la profil</a>
                    </div>
                  <div class="my-3">
                  <a href="/mes_commandes" onclick="window.location.assign('pay')" class="btn btn-dark mx-2"><i class="bx bx-shopping-bag"></i> mes commandes</a>
                  </div>
                  <div class="my-3">
                  <a href="/logout" class="btn mx-2" style="background-color: red; color:#fff;"><i class="bx bx-log-out"></i> déconnexion</a>

                  </div>
              
              </div>

              </div>
             
             
          </div>
        </div>
      </div>
      </div>
    </section>

    <?php if(isset($_GET['success'])): ?>
                <div class="conatiner mt-5 alert alert-success">La commande numéro <?= $_GET['success'] ?> a été annulé avec succès !</div>
              <?php endif ?>
              <h4 class="text-center mt-5">mes commandes</h4>
              <div class="container row justify-content-start mt-4">
                    <?php $select=$DB->query("SELECT * FROM commande WHERE id_users=:id ORDER BY date_creation DESC",array('id'=>$user->id_users)); 
                           foreach($select as $selects):
                    ?>
  <div class="card col-md-6">
                <div class="card-body">
                    <h5 class="card-title">Commande #<?= $selects->id_commande ?></h5>
                    <?php if($selects->statut == 0): ?>
                        <p class="card-text text-warning bx-flashing">En cours...</p>
                    <?php endif ?>
                    <?php if($selects->statut == 1): ?>
                        <p class="card-text text-success bx-flashing">Livré</p>
                    <?php endif ?>
                    <p class="text-center text-info text-nowrap"><?= $selects->types ?></p>
                    <?php if($selects->statut == 0): ?>
                        <a href="/annuler_commande?id=<?= $selects->id_commande ?>" class="card-link text-danger">Annuler</a>
                    <?php endif ?>
                            <a href="/etat" class="btn btn-info text-white">Position</a>

                    
                   
                </div>
                </div>
<?php endforeach ?>


              </div>

<?php require 'include/footer.php'; ?>