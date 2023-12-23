<?= $this->extend('backend/layout/page-layout') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Messages</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url("common/dashboard") ?>">Accueil</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Mes Messages
                    </li>
                </ol>
            </nav>
            <?php
            if (isset($special_message))
                echo $special_message;
            ?>
        </div>
    </div>
</div>
<div class="invoice-wrap">
    <div class="invoice-box">
        <div class="invoice-header">
            <div class="logo">
                <img src="<?php echo base_url("/frontend/img/logo.png") ?>" height="150" width="150" alt="">
            </div>
        </div>
        <h4 class="text-center mb-30 weight-600">Message</h4>
        <div class="row pb-30">
            <div class="col-md-6">
                <h5 class=" mb-5">
                    Nom : <strong class="weight-600"><?php echo $name ?></strong>
                </h5>
                <p class="font-14 mb-5">
                    Numero: <strong class="weight-600"><?php echo $number ?></strong>
                </p>
                <p class="font-14 mb-5">
                    Adresse Email: <strong class="weight-600"><?php echo $email ?></strong>
                </p>
            </div>
        </div>
        <div class="invoice-desc pb-30">
            <div class="invoice-desc-head clearfix">
                <div class="invoice-sub">Objet :  <?php echo $object ?></div>
                
            </div>
            <div class="invoice-desc-body">
                <ul>
                    <li class="clearfix">
                        <div class="invoice-sub"><?php echo $message ?></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<br><br>
<?= $this->endSection() ?>