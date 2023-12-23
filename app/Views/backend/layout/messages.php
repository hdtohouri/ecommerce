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
<div class="card-box pb-10">
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
                            <th rowspan="1" colspan="1" >Expediteur</th>
                            <th rowspan="1" colspan="1" >Objet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach($message as $message): ?>
                        <tr>
                            <td><a href="<?php echo base_url("common/dashboard/read_message/".$message['id_contact_us']) ?>"> <?= $message['name']?></a></td>
                            <td><a href="<?php echo base_url("common/dashboard/read_message/".$message['id_contact_us']) ?>"><?= $message['object'] ?></a></td>
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
                      
                    <?= $pager->links('message','dashboard_pager') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>
<?= $this->endSection() ?>