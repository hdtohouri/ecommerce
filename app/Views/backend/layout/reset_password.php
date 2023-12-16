<?= $this->extend('backend/layout/template/auth-layout') ?>
<?= $this->section('content') ?>
<div class="login-box bg-white box-shadow border-radius-10">
    <div class="login-title">
        <h2 class="text-center text-primary">Récupérer le Mot de Passe</h2>
    </div>
    <h6 class="mb-20">
        <?php if (!isset($error_message)) : ?>
            Veuillez entrer le nouveau mot de passe
        <?php else : ?>
            Merci de soumettre une nouvelle demande.
        <?php endif; ?>
    </h6>
    <?php
    if (isset($special_message))
        echo $special_message;
    ?>
    <?php if (isset($error_message)) : ?>
        <div class="alert alert-danger"><?= $error_message ?></div>
    <?php else : ?>
        <form action="<?php echo base_url('common/login/reset_password/'.$token); ?>" method="post">
            <div class="mb-4 form-group">
                <input type="password" class="form-control form-control-user" id="password1" name="password1" value="<?= set_value('password1') ?>" placeholder="Saisir nouveau mot de passe" autofocus />
                <?php if (isset($validation) && $validation->hasError('password1')) {
                    echo "<div style='color: #ff0000'>" . $validation->getError('password1') . "</div>";
                } ?>
            </div>
            <div class="mb-4 form-group">
                <input type="password" class="form-control form-control-user" id="password2" name="password2" value="<?= set_value('password2') ?>" placeholder="Ressaisir le mot de passe" autofocus />
                <?php if (isset($validation) && $validation->hasError('password2')) {
                    echo "<div style='color: #ff0000'>" . $validation->getError('password2') . "</div>";
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
                        <a href="<?php echo base_url('common/login') ?>">Se Connecter</a>
                    </div>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>