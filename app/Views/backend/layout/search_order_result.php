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
                            <a href="<?php echo base_url("common/dashboard") ?>">Accueil</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Gestion des Commandes
                        </li>
                    </ol>
                </nav>

                <?php
                if (isset($special_message)) {
                    echo "<div class='alert alert-danger text-center' role='alert'>"  . $special_message . "</div>";
                } ?>
            </div>
        </div>
    </div>
    </div><br><br>

    <div class="card-box pb-10">
        <div class="h5 pd-20 mb-0 text-success">Commande trouvée</div>

        <h6 class="h6 pd-20 mb-0">Client : <b><?php echo $customer_name ?></b></h6>
        <h6 class="h6 pd-20 mb-0">Numero : <b><?php echo $customer_number ?></b></h6>
        <p class="h6 pd-20 mb-0">Mode : <b><?php echo $paiement_mode ?></b></p>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
            <div class="card-body table-responsive">
                <table class="table table-sm table-borderless table-hover table-striped" >
                    <thead>
                        <tr role="row">
                            <th rowspan="1" colspan="1" > Commande</th>
                            <th rowspan="1" colspan="1" >Total</th>
                            <th rowspan="1" colspan="1" > Date</th>
                            <th rowspan="1" colspan="1" >Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td> <?php echo $product_name ?></td>
                            <td><?php  ?>  </td> 
                            <td><?php ?> </td>
                            <td><?php ?></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
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