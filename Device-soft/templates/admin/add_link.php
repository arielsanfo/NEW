
<?php  
require 'include/_header.php';
// require 'include/script_admin.php';
require 'include/add_link.php';
// titre du document
$title='Add links';
// chargement du header
require 'include/admin/header.php'; 
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="">
                        <h1 class="h3 mb-0 text-gray-800 text-center">Ajouter des liens</h1>
                    </div>
                    <?php if(isset($_GET['success'])): ?><div class="alert alert-success">Lien ajouter !</div><?php endif ?>
                <?php
                $number=$DB->row('SELECT * FROM liens ORDER BY date_creation DESC LIMIT 1');
                if($number > 0):
                 $select=$DB->query('SELECT * FROM liens ORDER BY date_creation DESC LIMIT 1');
                 foreach($select as $selects):
                ?>
                    <!-- Page Heading -->
                    
                    <div class="container">
                    <form method="POST">
                        <div class="form-group">
                            <label for="">Lien facebook</label>
                            <input type="text" class="form-control" name="facebook" value="<?= $selects->liens_facebook ?>" placeholder="Entrer facebook">
                        </div>
                        <div class="form-group">
                            <label for="">Lien instagram</label>
                            <input type="text" class="form-control" name="instagram" value="<?= $selects->liens_instagram ?>" placeholder="Entrer instagram">
                        </div>
                        <div class="form-group">
                            <label for="">Lien tiktok</label>
                            <input type="text" class="form-control" name="tiktok" value="<?= $selects->liens_tiktok ?>" placeholder="Entrer tiktok">
                        </div>
                        <div class="form-group">
                            <label for="">Numéro</label>
                            <input type="text" class="form-control" name="numero" value="<?= $selects->numero ?>" placeholder="Entrer un numéro de téléphone">
                        </div>
                        <div class="form-group">
                            <label for="">Numéro whatsapp</label>
                            <input type="text" class="form-control" name="whatsapp" value="<?= $selects->numero_whatsapp ?>" placeholder="entrer Likedin">
                        </div>
                        <div class="form-group">
                            <label for="">Adresse</label>
                            <input type="text" class="form-control" name="adress" value="<?= $selects->adresse ?>" placeholder="Entrer l'adresse">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="<?= $selects->email ?>" placeholder="Entrer email">
                        </div>
                      
                        <div class="form-group d-flex justify-content-center">
                            <button class="btn btn-info text-dark" name="add">Ajouter</button>
                        </div>
                    </form>

                    </div>
                    <?php endforeach ?>
                    <?php endif ?>
                    <?php if($number ==0): ?>
                        <div class="container">
                    <form method="POST">
                    <div class="form-group">
                            <label for="">Link facebook</label>
                            <input type="text" class="form-control" name="facebook" placeholder="Enter facebook">
                        </div>
                        <div class="form-group">
                            <label for="">Link instagram</label>
                            <input type="text" class="form-control" name="instagram" placeholder="Enter instagram">
                        </div>
                        <div class="form-group">
                            <label for="">Link tiktok</label>
                            <input type="text" class="form-control" name="tiktok" placeholder="Enter tiktok">
                        </div>
                        <div class="form-group">
                            <label for="">Numéro</label>
                            <input type="text" class="form-control" name="numero" placeholder="Enter youtube">
                        </div>
                        <div class="form-group">
                            <label for="">Numéro whatsapp</label>
                            <input type="text" class="form-control" name="whatsapp" placeholder="Enter Likedin">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button class="btn btn-warning text-dark" name="add">Ajouter</button>
                        </div>
                    </form>

                    </div>
                    <?php endif ?>
            </div>
            <!-- End of Main Content -->
<?php require 'include/admin/footer.php'; ?>