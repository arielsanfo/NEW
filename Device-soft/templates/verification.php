<?php 
require 'include/_header.php'; 
require 'include/header.php'; 
?>
<div class="d-flex justify-content-center">
<div class="col-lg-5 mb-5 mt-5">
                <div class="contact-form">
                    <div class="form-group d-flex justify-content-center">
                        <img src="img/R (1).png" width="100" alt="">
                    </div>
                    <div>
                        <h5 class="text-center">Verification code</h5>
                    </div>

                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <label for="">votre code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Entrer votre code de reception"
                                required="required"/>
                            <p class="help-block text-danger"></p>
                        </div>
                       
                       
                        <div >
                            <button class="btn btn-primary btn-block py-2 px-4 text-white" type="submit" id="sendMessageButton">
                                Confirmer</button>
                        </div>
                       
                    </form>
                </div>
            </div>
</div>


<?php require 'include/footer.php'; ?>