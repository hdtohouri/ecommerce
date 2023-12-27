<?= $this->extend('backend/layout/template/auth-layout') ?>
<?= $this->section('content') ?>
<div class="login-box bg-white box-shadow border-radius-10">
    <div class="login-title">
        <h2 class="text-center text-primary">Bienvenue</h2>
        <?php
        if (isset($special_message))
            echo $special_message;
        ?>
    </div>
    <form action="<?php echo base_url('common/adminspace/login'); ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-4 form-group">
            <input type="text" class="form-control form-control-user" id="username" name="username"  value="<?= set_value('username') ?>" placeholder="Nom d'utilisateur" autofocus />
            <?php if (isset($validation) && $validation->hasError('username')) {
                echo "<div style='color: #ff0000'>" . $validation->getError('username') . "</div>";
            } ?>
        </div>
        <div class="mb-4 form-group">
            <input type="password" class="form-control form-control-user" id="password" value="<?= set_value('password') ?>"  name="password" placeholder="**********" autofocus />
            <?php if (isset($validation) && $validation->hasError('password')) {
                echo "<div style='color: #ff0000'>" . $validation->getError('password') . "</div>";
            } ?>
        </div>
        <div class="row pb-30">
            <div class="col-7">
                <div class="forgot-password">
                    <a class="text-decoration-none" href="<?php echo base_url('common/adminspace/login/forgotpassword') ?>">Mot de passe oublié ?</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group mb-0">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Se Connecter">
                </div>
            </div>
        </div>
        <br>
        <div class="row pb-30">
            <div class="col-7">
                <a class="text-decoration-none" href="<?php echo base_url() ?>"><i class="icon-copy dw dw-left-arrow-3"></i> Accueil</a>
            </div>
        </div>
        
    </form>
</div>
<?= $this->endSection() ?>