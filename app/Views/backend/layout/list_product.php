<?= $this->extend('backend/layout/page-layout') ?>
<?= $this->section('content') ?>

<?php if (session('logged_in')) : ?>

    <!--Debut categories -->
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
                            Lister des Articles
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
                    <a class="btn btn-primary " href="<?php echo base_url('common/dashboard/add_product') ?>" role="button">
                        Ajouter un Article
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
                            Articles
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-sm table-borderless table-hover table-striped">
                        <thead>
                            <tr>
                                <td scope="col">#</td>
                                <td scope="col">Image Produit</td>
                                <td scope="col">Prix Produit</td>
                                <td scope="col">Quantité Produit</td>
                                <td scope="col">Taille Produit</td>
                                <td scope="col">Actions disponibles</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($orders as $product) : ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td scope="row"> <img src="<?= $product['product_image'] ?>" alt="" width="100" height="100"></td>
                                    <td scope="row"><span class="badge badge-success"><?= strtoupper($product['product_price']) ?></span></td>
                                    <td scope="row"><span class="badge badge-success"><?= strtoupper($product['product_quantity']) ?></span></td>
                                    <td scope="row"><span class="badge badge-success"><?= strtoupper($product['taille_product']) ?></span></td>
                                    
                                    <td>
                                        <button type="button" class="btn user-action-button text-primary" data-bs-toggle="modal" id="edit_article_btn" data-categoryid="<?= $product['id_product'] ?>">
                                            <i class="icon-copy dw dw-edit-file me-2" data-toggle="tooltip" title="Editer cet article"></i>
                                        </button>
                                        <button type="button" class="btn user-action-button text-danger" data-bs-toggle="modal" id="delete_article_btn" data-categoryid="<?= $product['id_product'] ?>">
                                            <i class="icon-copy dw dw-delete-3" data-toggle="tooltip" title="Supprimer cet article"></i>
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


<?= $this->endSection() ?>