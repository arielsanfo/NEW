<?php 
require 'include/_header.php';
require 'include/register.php';
require 'include/header.php';
?>
<div class="d-flex justify-content-center">
<div class="col-lg-5 mb-5 mt-5">
                <div class="contact-form">
                    <div class="form-group d-flex justify-content-center">
                        <img src="img/OIP.jpeg" width="100" alt="">
                    </div>
                    <div>
                        <h5 class="text-center">S'inscrire</h5>
                    </div>
                    <?php if(isset($er_email)): ?>
                        <div class="alert alert-danger"><?= $er_email ?></div>
                    <?php endif ?>
                    <?php if(isset($er_password)): ?>
                        <div class="alert alert-danger"><?= $er_password ?></div>
                    <?php endif ?>
                    <form name="sentMessage" method="POST">
                        <div class="control-group">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="email" value="<?= $email ?? '' ?>" class="form-control" name="email" id="name" placeholder="Entrez votre email"
                                required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label for="">mot de passe <span class="text-danger">*</span></label>
                            <input type="password" value="<?= $password ?? '' ?>" name="password" class="form-control" id="email" placeholder="votre mot de passe"
                                required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label for="">Confirmer votre mots de passe <span class="text-danger">*</span></label>
                            <input type="password" value="<?= $cpassword ?? '' ?>" class="form-control" name="cpassword" id="email" placeholder="confirmer votre mot de passe"
                                required/>
                            <p class="help-block text-danger"></p>
                        </div>
                       <div class="form-group">
                        <input type="checkbox" name="" id="" required> <span>J'accepte <a href="#">la politique & condition</a></span>
                       </div>
                       
                        <div >
                            <button class="btn btn-primary btn-block py-2 px-4 text-white bg-info" type="submit" name="register">
                                S'inscrire</button>
                        </div>
                        <div class="mt-3">
                        <p class="text-capitalize">Si vous avez deja un compte <a href="<?= $router->generate('login') ?>">connecter vous ici</a></p>
                       </div>
                    </form>
                </div>
            </div>
</div>


<?php require 'include/footer.php'; ?>