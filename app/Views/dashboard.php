<?= $this->extend('backend/layout/page-layout') ?>
<?= $this->section('content') ?>
<div class="title pb-20">
    <h2 class="h3 mb-0">Vue Général de Performance</h2>
</div>

 <!--Debut Indicateurs de performances -->
<div class="row pb-10">
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark"><?php echo isset($commandes) ?  $commandes : 0;  ?></div>
                    <div class="font-14 text-secondary weight-500">
                        Commandes
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);">
                        <i class="icon-copy dw dw-calendar1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark"><?php echo isset($customers) ?  $customers : 0;  ?></div>
                    <div class="font-14 text-secondary weight-500">
                        Total Utilisateurs 
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#ff5b5b" style="color: rgb(255, 91, 91);">
                        <span class="icon-copy ti-heart"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">400+</div>
                    <div class="font-14 text-secondary weight-500">
                        Total Ventes
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon">
                        <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">50,000 XOF</div>
                    <div class="font-14 text-secondary weight-500">Révenu du Mois</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#09cc06" style="color: rgb(9, 204, 6);">
                        <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!--Fin Indicateurs de performances -->
 
 <!--Debut ApexChart -->
 <?php include('backend/layout/apexchart.php') ?>
<!--Fin side card -->

<!-- Debut Liste des commandes -->
<div class="card-box pb-10">
    <div class="h5 pd-20 mb-0">Liste des commandes</div>
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
</div><br><br>
<!-- Debut Liste des commandes -->
<?= $this->endSection() ?>