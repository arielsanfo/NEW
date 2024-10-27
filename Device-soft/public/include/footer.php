   <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><img src="img/device.jpg" width="70" alt=""></h1>
                </a>
                <p><?= $Product->get_description(); ?></p>
                <?php 
                $link=$DB->query('SELECT * FROM liens ORDER BY date_creation DESC LIMIT 1');
                foreach($link as $links):
                 ?>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-info mr-3"></i><?= $links->adresse ?></p>
                <p class="mb-2"><i class="fa fa-envelope text-info mr-3"></i><?= $links->email ?></p>
                <p class="mb-0"><i class="fa fa-phone-alt text-info mr-3"></i><?= $links->numero ?></p>
                <?php endforeach ?>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-8 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">lien rapide </h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="/"><i class="fa fa-angle-right mr-2"></i>accueil</a>
                            <a class="text-dark mb-2" href="/shop"><i class="fa fa-angle-right mr-2"></i>boutique</a>
                            <a class="text-dark mb-2" href="cart"><i class="fa fa-angle-right mr-2"></i>a propos</a>
                            <a class="text-dark mb-2" href="/cart"><i class="fa fa-angle-right mr-2"></i>commande</a>
                            <a class="text-dark" href="/contact"><i class="fa fa-angle-right mr-2"></i>nous contactés</a>
                        </div>
                    </div>
                  
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Information</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="votre Nom" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="votre Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-info text-white btn-block border-0 py-3" type="submit">Abonnez-vous</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4" style="margin-bottom: 60px;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">DEVICE-SOFT</a>. All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">Dowhile</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">Dowhile</a>
                </p>
            </div>
           
        </div>
    </div>
    <!-- Footer End -->
    <footer class="fixed-bottom bg-white" style="border-radius: 20px 20px 0px 0px;">
            <div class="d-flex justify-content-between px-5 pb-3 pt-3">
            <a onclick="window.history.back();"> <i class="bx bx-left-arrow-alt bx-md" style="color: #997f19;"></i></a>
            <a href="/"><i class="bx bx-home bx-md" style="color: #787878;"></i></a>
            <a href="/shop">  <i class="bx bx-shopping-bag bx-md" style="color: #997f19;"></i></a>
              <a href="/profil"><box-icon type='solid' name='cart' style="color: #A667;"></box-icon></a>
            </div>
      </footer>

    <!-- Back to Top -->


    <!-- JavaScript Libraries -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-bundle.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
    <script>
        if ("serviceWorker" in navigator) {
  // Register a service worker hosted at the root of the
  // site using the default scope.
  navigator.serviceWorker.register("js/sw.js").then(
    (registration) => {
        navigator.serviceWorker.register("js/sw.js")
    },
    /*catch*/ (error) => {
      console.log("Service worker registration failed:", error);
    },
  );
} else {
  console.log("Service workers are not supported.");
}
    </script>
</body>

</html>