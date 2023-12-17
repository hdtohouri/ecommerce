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
                if (isset($special_message))
                    echo $special_message;
                ?>
            </div>
        </div>
    </div>
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4"> Gestion des Commandes</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <form  action="<?php echo base_url("common/dashboard/manage_orders") ?>" method="post" autocomplete="off">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_ccsrf_data">
                    <div class="form-group">
                        <label>Saisir le numero de commande</label>
                        <input type="search" class="form-control" name="order_number" placeholder="Numero de commande" >
                        <?php if (isset($validation) && $validation->hasError('order_number')) {
                            echo "<div style='color: #ff0000'>" . $validation->getError('order_number') . "</div>";
                        } ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Rechercher Commande</button>
                    </div>
                </form>
            </div>
        </div><br><br><br><br><br>
    <?php elseif(isset($data)): ?>
        <div class="card-box pb-10">
        <div class="h5 pd-20 mb-0">Commande trouvée</div>
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
                            <?php $i=0; foreach($orders as $orders): ?>
                            <tr>
                                <td> <?= $orders['order_number'] ?></td>
                                <td><?= $orders['order_total'] ?> XAF </td> 
                                <td><?= date('d-m-Y H:i', strtotime($orders['order_date']))   ?> </td>
                                <?php if($orders['order_statut'] == 'En Attente'): ?>
                                <td><span class="badge badge-warning" ><?= $orders['order_statut'] ?></span></td>
                                <?php elseif ($orders['order_statut'] == 'Validé'): ?>
                                <td><span class="badge badge-success" ><?= $orders['order_statut'] ?></span></td>
                                <?php elseif ($orders['order_statut'] == 'Annulé'): ?>
                                <td><span class="badge badge-danger" ><?= $orders['order_statut'] ?></span></td>
                                <?php endif ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5"></div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination">
                            <?= $pager->links('orders','dashboard_pager') ?>
                            
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div><br><br>
    </div>



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