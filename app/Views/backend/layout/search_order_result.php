<?= $this->extend('backend/layout/page-layout') ?>
<?= $this->section('content') ?>

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
        <div class="h5 pd-20 mb-0 text-success">Commande trouvée : N° <b><?php echo $order['order_number'] ?></b></div>

        <div class="row">
            <div class="col-sm-4">
                <h6 class="h6 pd-20 mb-0">Client : <b><?php echo ucwords($order['customer_name']) ?></b></h6>
            </div>
            <div class="col-sm-4">
                <h6 class="h6 pd-20 mb-0">Numero : <b><?php echo $order['customer_number'] ?></b></h6>
            </div>
            <div class="col-sm-4">
                <h6 class="h6 pd-20 mb-0">Mode : <b><?php echo $order['paiement_mode'] ?></b></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <h6 class="h6 pd-20 mb-0">Addresse : <b><?php echo $order['customer_adresse'] ?></b></h6>
            </div>
            <div class="col-sm-4">
                <h6 class="h6 pd-20 mb-0">Email : <b><?php echo $order['customer_email'] ?></b></h6>
            </div>
        </div>



        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-sm table-borderless table-hover table-striped">
                    <thead>
                        <tr role="row">
                            <th rowspan="1" colspan="1">Article</th>
                            <th rowspan="1" colspan="1"> Quantité</th>
                            <th rowspan="1" colspan="1">Prix</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 0;
                        foreach ($order_article as $orders) : ?>
                            <tr>
                                <td><img src="<?= $order['product_image'] ?>" width="80" height="80" alt=""> </td>
                                <td><?= $orders['product_quantity'] ?> </td>
                                <td><?= number_to_currency($orders['product_price'] * $orders['product_quantity'], 'XAF') ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="h5 pd-20 mb-0 text-success">Total : <b><?= number_to_currency($order['order_total'], 'XAF') ?></b></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <form action="<?php echo base_url("common/twofactor/desactivate") ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <?php
                        if (isset($validation))
                            echo "<div style='color: #ff0000'>" . $validation->listErrors() . "</div>";
                        ?>
                    </div>

                    <div class="form-group text-center">
                        <input type="hidden" name="UserCode" value="<?php echo session('user_id') ?>" />
                        <button type="submit" class="btn btn-primary">Valider la commande</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <form action="<?php echo base_url("common/twofactor/desactivate") ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <?php
                        if (isset($validation))
                            echo "<div style='color: #ff0000'>" . $validation->listErrors() . "</div>";
                        ?>
                    </div>

                    <div class="form-group text-center">
                        <input type="hidden" name="UserCode" value="<?php echo session('user_id') ?>" />
                        <button type="submit" class="btn btn-danger">Annuler la commande</button>
                    </div>
                </form>
            </div>
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
<br><br>
<?= $this->endSection() ?>