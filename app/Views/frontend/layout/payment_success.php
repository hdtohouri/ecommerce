<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<?php
if (isset($special_message))
    echo $special_message;
?>
<div class="container">
    <article class="card">
        <header class="card-header"> VOTRE COMMANDE A ETE RECUE <h5><strong>N° Commande : </strong></h5>
        </header>
        <div class="card-body">
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Nom et Prénom :</strong> <br><?php ?></div>
                    <div class="col"> <strong>Numero :</strong> <br> <i class="fa fa-phone"></i> <?php  ?> </div>
                    <div class="col"> <strong>Addresse de livraison :</strong> <br> <?php  ?> </div>
                    <div class="col"> <strong>Mode :</strong> <br> <?php  ?> </div>
                    <div class="col"> <strong>Email :</strong> <br> <?php  ?> </div>
                </div>
            </article>
            <hr>
            <div class="card-body row">
                <table>
                        <tr>



                            <div class="col"> <strong><?php   ?></strong> <br></div>
                            <div class="col"> <strong>Shipping BY:</strong> <br> <?php   ?> </div>
                            <div class="col"> <strong>Status:</strong> <br> <?php  ?> </div>
                            <div class="col"> <strong>Tracking #:</strong> <br> <?php  ?> </div>
                        </tr>
                   
                </table>
            </div>
            <hr>
            <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Page d'accueil</a>
        </div>
    </article>
</div>
<br><br><br>
<script>
    <?php if (session()->has('success_message')) : ?>
        Toastify({
            text: "<?= session('success_message') ?>",
            duration: 5000,
            position: "right",
            gravity: "top",
            close: true
        }).showToast();
    <?php elseif (session()->has('error_message')) : ?>
        Toastify({
            text: "<?= session('error_message') ?>",
            duration: 5000,
            position: "right",
            gravity: "top",
            close: true,
            backgroundColor: "red"
        }).showToast();
    <?php endif; ?>
</script>
<?= $this->endSection() ?>