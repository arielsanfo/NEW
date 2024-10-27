<?php 
require 'include/_header.php';
require 'include/edit.php';
require 'include/header.php';
?>
<div class="d-flex justify-content-center">
<div class="col-lg-5 mb-5 mt-5">
                <div class="contact-form">
                    <div class="form-group d-flex justify-content-center">
                        <img src="img/OIP.jpeg" width="100" alt="">
                    </div>
                    <div>
                        <h5 class="text-center">modifier votre profil</h5>
                    </div>
                    <?php if(isset($er_pass)): ?>
                        <div class="alert alert-danger"><?= $er_pass ?></div>
                    <?php endif ?>
                    <?php if(isset($er_password)): ?>
                        <div class="alert alert-danger"><?= $er_password ?></div>
                    <?php endif ?>
                    <form name="sentMessage" method="POST">
                        <div class="control-group">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="email" value="<?= $user->email ?? '' ?>" class="form-control" name="email" id="name" placeholder="Entrer votre email"
                                required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label for="">ancien mot de passe <span class="text-danger">*</span></label>
                            <input type="password" value="<?= $old ?? '' ?>" name="old" class="form-control" id="email" placeholder="Entrer votre ancien mot de passe"
                                required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label for="">nouveau mot de passe <span class="text-danger">*</span></label>
                            <input type="password" value="<?= $new ?? '' ?>" class="form-control" name="new" id="email" placeholder="Enter the new password"
                                required/>
                            <p class="help-block text-danger"></p>
                        </div>
                       
                       
                        <div >
                            <button class="btn btn-primary btn-block py-2 px-4 text-white bg-info" type="submit" name="register">
                                Confirmer</button>
                        </div>
                    
                    </form>
                </div>
            </div>
</div>


<?php require 'include/footer.php'; ?>