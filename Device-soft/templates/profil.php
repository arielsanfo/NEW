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
                <?php if(isset($_GET['success'])): ?>
                  <div class="alert alert-success">
                  <i class="bx bx-check-circle"></i> Profile modefier avec succes !
                  </div>
                <?php endif ?>
                <h5 class=" text-center mt-3"><?= $user->email ?></h5>
              </div>
              <div>
              <div class="container d-flex justify-content-center flex-wrap mt-5">
                   <div class="my-3">
                   <a href="/edit_profil" class="btn btn-warning mx-2"><i class="bx bx-edit"></i> modofier le profile</a>
                   </div>
                
                  <div class="my-3">
                  <a href="/mes_commandes" class="btn btn-dark mx-2"><i class="bx bx-shopping-bag"></i> mes commandes</a>
                  </div>
                  <div class="my-3">
                  <a href="/logout" class="btn mx-2" style="background-color: red; color:#fff;"><i class="bx bx-log-out"></i> déconnexion</a>
                  <a href="/delete_account" class="btn mx-2" style="background-color: red; color:#fff;"><i class="bx bx-trash"></i> supprimer mon compte</a>

                  </div>
              
              </div>

              </div>
             
             
          </div>
        </div>
      </div>
      </div>
    </section>


<?php require 'include/footer.php'; ?>