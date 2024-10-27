<?php
 require 'include/_header.php';
 require 'include/header.php';
  ?>
<div class="d-flex justify-content-center">
<div class="col-lg-5 mb-5 mt-5">
                <div class="contact-form">
                    <div class="form-group d-flex justify-content-center">
                        <img src="img/R.png" width="100" alt="">
                    </div>
                    <div>
                        <h5 class="text-center">Récupérer votre mot de passe</h5>
                    </div>

                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <p class="text-info">Pour Récupérer votre mot de passe vous devez entrer votre email et recevrez un code de vérification. </p>
                        <div class="control-group">
                            <label for="">Your email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="votre email"
                                required="required"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label for="">Nouveau mot de passe <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="name" placeholder="Entrer votre nouveau mot de passe ici"
                                required="required"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label for="">Confirmer votre nouveau mot de passe <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="name" placeholder="Confirmer votre nouveau mot de passe"
                                required="required"/>
                            <p class="help-block text-danger"></p>
                        </div>
                       
                       
                        <div >
                            <button class="btn btn-primary btn-block py-2 px-4 text-white bg-info" type="submit" id="sendMessageButton">
                                Envoyer</button>
                        </div>
                       
                    </form>
                </div>
            </div>
</div>


<?php require 'include/footer.php'; ?>