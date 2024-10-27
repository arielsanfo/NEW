<?php 
require 'include/_header.php';
require 'include/login.php';
if(isset($user)){
    if($user->roles == 'client'){
        header('location: '.$router->generate('profil'));
        exit();
      }
      if($user->roles == 'admin'){
        header('location: '.$router->generate('admin'));
        exit();
      }
}
require 'include/header.php'; 
?>
<div class="d-flex justify-content-center">
<div class="col-lg-5 mb-5 mt-5">
    <fieldset>
                <div class="contact-form">
                    <div class="form-group d-flex justify-content-center">
                        <img src="img/user.png" width="100" alt="">
                    </div>
                    <div>
                        <h5 class="text-center fond-weight-bold mx-8">Se connecter</h5>
                    </div>
                    <?php if(isset($er_login)): ?>
                        <div class="alert alert-danger"><?= $er_login ?></div>
                    <?php endif ?>
                    <?php if(isset($_GET['delete'])): ?>
                        <div class="alert alert-info">votre compte a été supprimer avec succes !</div>
                    <?php endif ?>

                    <form name="sentMessage"  method="POST" novalidate="novalidate">
                        <div class="control-group">
                            <label for="" class="font-weight-bold">Email<h6 class="text-danger font-weight-bold"></h6></label><i class="fa-solid fa-user"></i>
                            <input type="email" name="email" value="<?= $email ?? '' ?>" class="form-control" id="name" placeholder="votre email" style="border-radius:20px;"
                                required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label for="" class="font-weight-bold" >mot de passe <span class="text-danger"></span></label>
                            <input type="password" name="password" value="<?= $password ?? '' ?>" class="form-control" id="email" placeholder="votre mot de passe" style="border-radius:20px;"
                                required />
                                
                            <p class="help-block text-danger"></p>
                        </div>
                       <div class="form-group">
                        <input type="checkbox" name="remember" id="" checked> <span>Se souvenir de moi</span>
                       </div>
                       <p class="text-capitalize text-danger"><a href="<?= $router->generate('recover_password') ?>">vous avez oublié votre mot de passe ?</a></p>

                        <div>
                            <button class="btn btn-white btn-block py-2 px-1 text-white bg-info" style="border-radius:20px" type="submit" name="login">
                                Se connecter</button>
                        </div>
                        <div class="mt-3">
                        <p class="text-capitalize">If you don't have an account <a href="<?= $router->generate('register') ?>">sign up here</a></p>
                       </div>
                    </form>
                </div>
            </div>
</div>


<?php require 'include/footer.php'; ?>