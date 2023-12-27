<?= $this->extend('backend/layout/page-layout') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?php echo base_url('/backend/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') ?>">
<?php if (session('logged_in')) : ?>

    <!--Debut Indicateurs de performances -->

    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Articles</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url("common/adminspace/dashboard") ?>">Accueil</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Gestion des Commandes
                        </li>
                    </ol>
                </nav>
                
                <?php
                if (isset($special_message)){
                    echo "<div class='alert alert-danger text-center' role='alert'>"  .$special_message."</div>";
                }?>
                <?php if (isset($validation)){
                    echo "<div class='alert alert-danger text-center' role='alert'>"  .validation_list_errors()."</div>";
                }?>
            </div>
        </div>
    </div>
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4"> Imprimer un Reçu</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <form  action="<?php echo base_url("common/adminspace/dashboard/print") ?>" method="post" autocomplete="off">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_ccsrf_data">
                    <div class="form-group">
                        <label>Saisir le numero de commande</label>
                        <input type="search" class="form-control" name="order_number" placeholder="Numero de commande" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" target="_blank">Rechercher Commande</button>
                    </div>
                </form>
            </div>
        </div><br><br>
    </div>

    <?php endif; ?>

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