<?= $this->extend('backend/layout/template/auth-layout') ?>
<?= $this->section('content') ?>
<div class="login-box bg-white box-shadow border-radius-10">
    <div class="login-title">
        <h2 class="text-center text-primary">Mot de Passe oublié</h2>
    </div>
    <h6 class="mb-20">
        Veuillez entrer votre addresse email
    </h6>
    <?php
        if (isset($special_message))
            echo $special_message;
    ?>
    <form action="<?php echo base_url('common/adminspace/connexion/forgotpassword');?>" method="post">
    <div class="mb-4 form-group">
            <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Email" autofocus />
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
            <div class="col-2">
                <div class="font-16 weight-600 text-center" data-color="#707373" style="color: rgb(112, 115, 115);">
                    OU
                </div>
            </div>
            <div class="col-5">
                <div class="input-group mb-0">
                    <a class="text-decoration-none" href="<?php echo base_url('common/adminspace/connexion')?>">Se Connecter</a> 
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>