<?= $this->extend('backend/layout/template/auth-layout') ?>
<?= $this->section('content') ?>
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php if (isset($error_message)) : ?>
                <h1 class="h4 text-gray-900 mb-4 text-center">Activation du compte </h1>
                <div class="alert alert-danger text-center"><?= "<h6>$error_message</h6>" ?></div>
            <?php else : ?>
                <div class="title">
                    <?php
                    if (isset($special_message))
                        echo " <div class='alert alert-success text-center'><h6>$special_message</h6>";
                    ?>
                <?php endif; ?>
                <?php
                if (isset($validation))
                    echo "<div style='color: #ff0000'>" . $validation->listErrors() . "</div>";
                ?>
                </div>
                <br>
                <div class="text-center">
                    <a class="btn btn-primary" href="<?php echo base_url('common/login'); ?>">Se Connecter</a>
                </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>