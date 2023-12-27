<?= $this->extend('backend/layout/page-layout') ?>
<?= $this->section('content') ?>

<?php if (session('logged_in')) : ?>

    <!--Debut categories -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Categories</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url("common/adminspace/dashboard") ?>">Accueil</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Ajouter Categories
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
                            Categories
                        </div>
                        <div class="pull-right">
                            <a href="" class="btn btn-default btn-sm p-0" role="button" id="add_categories_btn">
                                <i class="fa fa-plus-circle"></i> Ajouter Categorie
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-sm table-borderless table-hover table-striped">
                        <thead>
                            <tr>
                                <td scope="col">#</td>
                                <td scope="col">Nom Categorie</td>
                                <td scope="col">Actions disponibles</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($list_category as $category) : ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td scope="row"><span class="badge badge-success"><?= strtoupper($category['nom_categories']) ?></span></td>
                                    <td>
                                        <button type="button" class="btn user-action-button text-primary" data-bs-toggle="modal" id="edit_categories_btn" data-categoryid="<?= $category['id_categories'] ?>">
                                            <i class="icon-copy dw dw-edit-file me-2" data-toggle="tooltip" title="Editer cette categorie"></i>
                                        </button>
                                        <button type="button" class="btn user-action-button text-danger" data-bs-toggle="modal" id="delete_categories_btn" data-categoryid="<?= $category['id_categories'] ?>">
                                            <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Supprimer cette categorie"></i>
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
    <?php include(APPPATH . 'Views/backend/modals/add_categories_modal.php') ?>
    <?php include(APPPATH . 'Views/backend/modals/edit_category_modal.php') ?>
    <?php include(APPPATH . 'Views/backend/modals/delete_category_modal.php') ?>
<?php endif; ?>

<script>
    $(document).on('click', '#add_categories_btn', function(e) {
        e.preventDefault();
        var modal = $('body').find('div#category-modal');
        var modal_title = 'Ajouter Categorie';
        var modal_btn_text = 'Ajouter';
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input.error-text').html('');
        modal.find('input[type="text"]').val('');
        modal.modal('show');
    });

    $(document).on('click', '#edit_categories_btn', function(e) {
        e.preventDefault();
        var categoryId = $(this).data('categoryid');
        var modal = $('body').find('div#edit-category-modal');
        var modal_title = 'Editer Categorie';
        var modal_btn_text = 'Ajouter';
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input.error-text').html('');
        modal.find('input[type="text"]').val('');
        modal.find('input[name="id_categories"]').val(categoryId);
        modal.modal('show');
    });
    $(document).on('click', '#delete_categories_btn', function(e) {
        e.preventDefault();
        var categoryId = $(this).data('categoryid');
        var modal = $('body').find('div#delete-category-modal');
        var modal_title = 'Supprimer Categorie';
        var modal_btn_text = 'Ajouter';
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input.error-text').html('');
        modal.find('input[type="text"]').val('');
        modal.find('input[name="id_categories"]').val(categoryId);
        modal.modal('show');
    });
</script>
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