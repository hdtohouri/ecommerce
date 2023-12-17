<?= $this->extend('backend/layout/page-layout') ?>
<?= $this->section('content') ?>

<?php if (session('logged_in')) : ?>

    <!--Debut categories -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Utilisateurs</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url("common/dashboard") ?>">Accueil</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Liste des Utilisateurs
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

    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card card-box">
                <div class="card-header">
                    <div class="clearfix">
                        <div class="pull-left">
                            Utilisateurs
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-sm table-borderless table-hover table-striped">
                        <thead>
                            <tr>
                                <td scope="col">#</td>
                                <td scope="col">Nom Utilisateur</td>
                                <td scope="col">Adresse Utilisateur</td>
                                <td scope="col">Etat du compte</td>
                                <td scope="col">Date D'inscription</td>
                                <td scope="col">Actions disponibles</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($customers as $customer) : ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td scope="row"><span class="badge badge-success"><?= strtoupper($customer['customers_username']) ?></span></td>
                                    <td scope="row"><span class="badge badge-success"><?= strtoupper($customer['customers_location']) ?></span></td>
                                    <td scope="row"><span class="badge badge-success"><?= strtoupper($customer['customers_account_status']) ?></span></td>
                                    <td scope="row"><span class="badge badge-success"><?= strtoupper($customer['created_at']) ?></span></td>
                                    <td>
                                        <button type="button" class="btn user-action-button text-danger" data-bs-toggle="modal" id="desactiver_customer" data-customerid="<?= $customer['customers_id'] ?>">
                                            <i class="icon-copy dw dw-user3 me-2" data-toggle="tooltip" title="Désactiver cet utilisateur"></i>
                                        </button>
                                        <button type="button" class="btn user-action-button text-success" id="activer_customer" data-customerid="<?= $customer['customers_id'] ?>">
                                            <i class="icon-copy dw dw-add-user me-2" data-toggle="tooltip" title="Activer cet utilisateur"></i>
                                        </button>
                                        <button type="button" class="btn user-action-button text-danger" id="delete_customer" data-customerid="<?= $customer['customers_id'] ?>">
                                            <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Supprimer cet utilisateur "></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $pager->links('orders','dashboard_pager') ?>
                </div>

            </div>
        </div>
    </div>
    <!--Fin  categories-->


<?php endif; ?>
<?php include(APPPATH . 'Views/backend/modals/desactivate_customer_modal.php') ?>
<?php include(APPPATH . 'Views/backend/modals/activate_customer_modal.php') ?>
<?php include(APPPATH . 'Views/backend/modals/delete_customer_modal.php') ?>


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

<script>
    $(document).on('click', '#desactiver_customer', function(e) {
        e.preventDefault();
        var userId = $(this).data('customerid');
        var modal = $('body').find('div#desactivate-customer-modal');
        var modal_title = 'Désactiver cet utilisateur';
        var modal_btn_text = 'Désactiver';
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input.error-text').html('');
        modal.find('input[type="text"]').val('');
        modal.find('input[name="user_id"]').val(userId);
        modal.modal('show');
    });

    $(document).on('click', '#activer_customer', function(e) {
        e.preventDefault();
        var userId = $(this).data('customerid');
        var modal = $('body').find('div#activate-customer-modal');
        var modal_title = 'Activer cet utilisateur';
        var modal_btn_text = 'Activer';
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input.error-text').html('');
        modal.find('input[type="text"]').val('');
        modal.find('input[name="user_id"]').val(userId);
        modal.modal('show');
    });

    $(document).on('click', '#delete_customer', function(e) {
        e.preventDefault();
        var userId = $(this).data('customerid');
        var modal = $('body').find('div#delete-customer-modal');
        var modal_title = 'Supprimer ce compte';
        var modal_btn_text = 'Supprimer';
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input.error-text').html('');
        modal.find('input[type="text"]').val('');
        modal.find('input[name="user_id"]').val(userId);
        modal.modal('show');
    });

    
    
</script>
<?= $this->endSection() ?>