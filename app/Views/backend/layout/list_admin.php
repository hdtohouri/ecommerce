<?= $this->extend('backend/layout/page-layout') ?>
<?= $this->section('content') ?>
<?php if (session('logged_in') && session('can_add_admin') == 'YES') : ?>

    <!--Debut Indicateurs de performances -->
    <!--Debut categories -->

    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Utilisateurs</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url("common/adminspace/dashboard") ?>">Accueil</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Liste des Administrateurs
                        </li>
                    </ol>
                </nav>
                <?php
                if (isset($special_message))
                    echo $special_message;
                ?>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div class="dropdown">
                    <a class="btn btn-primary " href="<?php echo base_url("common/adminspace/dashboard/add_admin") ?>" role="button" >
                        Ajouter Administrateurs
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card card-box">
                <div class="card-header">
                    <div class="clearfix">
                        <div class="pull-left">
                            Administrateurs
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-sm table-borderless table-hover table-striped">
                        <thead>
                            <tr>
                                <td scope="col">#</td>
                                <td scope="col">Nom </td>
                                <td scope="col">Etat du compte</td>
                                <td scope="col">Actions disponibles</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($list_admin as $admin) : ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= strtoupper($admin['full_name']) ?></td>
                                    <td><?= strtoupper($admin['account_status']) ?></td>
                                    <td>
                                        <button type="button" class="btn user-action-button text-danger" id="desactiver_admin" data-userid="<?= $admin['user_id'] ?>">
                                            <i class="icon-copy dw dw-user3 me-2" data-toggle="tooltip" title="Desactiver ce compte"></i>
                                        </button>
                                        <button type="button" class="btn user-action-button text-success" id="activer_admin" data-userid="<?= $admin['user_id'] ?>">
                                            <i class="icon-copy dw dw-add-user me-2" data-toggle="tooltip" title="Activer ce compte"></i>
                                        </button>
                                        <button type="button" class="btn user-action-button text-danger" id="delete_admin" data-userid="<?= $admin['user_id'] ?>">
                                            <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Supprimer ce compte "></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!--Fin  categories-->
<?php endif; ?>
<?php include(APPPATH . 'Views/backend/modals/desactivate_admin_modal.php') ?>
<?php include(APPPATH . 'Views/backend/modals/activer_admin_modal.php') ?>
<?php include(APPPATH . 'Views/backend/modals/delete_admin_modal.php') ?>


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
    $(document).on('click', '#desactiver_admin', function(e) {
        e.preventDefault();
        var userId = $(this).data('userid');
        var modal = $('body').find('div#desactivate-admin-modal');
        var modal_title = 'Désactiver ce compte';
        var modal_btn_text = 'Désactiver';
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input.error-text').html('');
        modal.find('input[type="text"]').val('');
        modal.find('input[name="user_id"]').val(userId);
        modal.modal('show');
    });

    $(document).on('click', '#activer_admin', function(e) {
        e.preventDefault();
        var userId = $(this).data('userid');
        var modal = $('body').find('div#activate-admin-modal');
        var modal_title = 'Activer ce compte';
        var modal_btn_text = 'Activer';
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input.error-text').html('');
        modal.find('input[type="text"]').val('');
        modal.find('input[name="user_id"]').val(userId);
        modal.modal('show');
    });

    $(document).on('click', '#delete_admin', function(e) {
        e.preventDefault();
        var userId = $(this).data('userid');
        var modal = $('body').find('div#delete-admin-modal');
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


