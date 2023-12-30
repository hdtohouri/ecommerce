<?= $this->extend('backend/layout/template/auth-layout') ?>
<?= $this->section('content') ?>
<div class="login-box bg-white box-shadow border-radius-10">
    <div class="login-title">
        <h2 class="text-center text-primary">Authentification Double Facteur</h2>
    </div>
    <h6 class="mb-20">
        Veuillez entrer votre addresse email
    </h6>
    <?php
        if (isset($special_message))
            echo $special_message;
    ?>
    <form action="<?php echo base_url('common/twofactor');?>" method="post">
    <div class="mb-4 form-group">
            <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Veuillez saisir votre adresse email" autofocus />
            <?php if (isset($validation) && $validation->hasError('email')) {
                echo "<div style='color: #ff0000'>" . $validation->getError('email') . "</div>";
            } ?>
        </div>
        <div class="row align-items-center">
            <div class="col-5">
                <div class="input-group mb-0">
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="soumettre">
                </div>
            </div>
            
        </div>
        <br>
        <div class="row pb-30">
            <div class="col-7">
                <a class="text-decoration-none" href="<?php echo base_url('common/adminspace/connexion') ?>"><i class="icon-copy dw dw-left-arrow-3"></i> Retour</a>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>