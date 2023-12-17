<?= $this->extend('backend/layout/template/auth-layout') ?>
<?= $this->section('content') ?>
<div class="login-box bg-white box-shadow border-radius-10">
    <div class="login-title">
        <h2 class="text-center text-primary">Double Facteur</h2>
    </div>

    <?php
    if (isset($special_message))
        echo $special_message;
    ?>
    <?php if (isset($error_message)) : ?>
        <div class="alert alert-danger"><?= $error_message ?></div>
    <?php else : ?>
    <form action="<?php echo base_url('common/twofactor/login/'.$token); ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-4 form-group">
            <input type="number" class="form-control form-control-user" id="code" name="code" min="1" value="<?= set_value('code') ?>" placeholder="Veuillez saisir le code reçu par mail" autofocus />
            <?php if (isset($validation) && $validation->hasError('code')) {
                echo "<div style='color: #ff0000'>" . $validation->getError('code') . "</div>";
            } ?>
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
    <?php endif; ?>
</div>
<?= $this->endSection() ?>