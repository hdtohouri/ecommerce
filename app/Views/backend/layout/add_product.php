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
                            Ajouter Article
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
                    <a class="btn btn-primary " href="<?php echo base_url('common/adminspace/dashboard/list_product') ?>" role="button">
                        Voir liste des Articles
                    </a>
                </div>
            </div>
        </div>
    </div>
    <form action="<?php echo base_url("common/adminspace/dashboard/add_product") ?>" method="post" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_ccsrf_data">
        <div class="row">
            <div class="col-md-9">
                <div class="card card-box mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Nom Article :</b></label>
                                    <input type="text" name="article_name" class="form-control" value="<?= set_value('article_name') ?>" placeholder="Veuillez saisir le nom de l'article">
                                    <?php if (isset($validation) && $validation->hasError('article_name')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('article_name') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Prix Article :</b></label>
                                    <input type="number" name="article_price" class="form-control" value="<?= set_value('article_price') ?>" placeholder="Veuillez saisir le prix de vente de l'article" min="1">
                                    <?php if (isset($validation) && $validation->hasError('article_price')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('article_price') . "</div>";
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Description Article :</b></label>
                                    <textarea name="article_description" cols="30" rows="10" class="form-control" value="<?= set_value('article_description') ?>" placeholder="Veuillez saisir la description de l'article"></textarea>
                                    <?php if (isset($validation) && $validation->hasError('article_description')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('article_description') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Prix D'Achat :</b></label>
                                    <input type="number" name="article_price_achat" class="form-control" value="<?= set_value('article_price_achat') ?>" placeholder="Veuillez saisir le prix d'achat de l'article" min="1">
                                    <?php if (isset($validation) && $validation->hasError('article_price_achat')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('article_price_achat') . "</div>";
                                    } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card card-box mb-2">
                    <h5 class="card-header weight-500"><b>Options</b></h5>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for=""><b>Quantité</b></label>
                            <input type="number" name="quantité" class="form-control" min="1" value="<?= set_value('quantité') ?>" placeholder="Veuillez saisir la quantité de l'article">
                            <?php if (isset($validation) && $validation->hasError('quantité')) {
                                echo "<div style='color: #ff0000'>" . $validation->getError('quantité') . "</div>";
                            } ?>
                        </div>
                        <div class="form-group"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-box mb-2">
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><b>Catégorie</b></label>
                            <select name="category" class="custom-select form-control" id="">
                                <option value="">Choisir ...</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['id_categories'] ?>"><?= strtoupper($category['nom_categories'])  ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($validation) && $validation->hasError('category')) {
                                echo "<div style='color: #ff0000'>" . $validation->getError('category') . "</div>";
                            } ?>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Image Article</b></label>
                            <input type="file" name="article_image" class="form-control-file form-control" value="<?= set_value('article_image') ?>" height="auto">
                            <?php if (isset($validation) && $validation->hasError('article_image')) {
                                echo "<div style='color: #ff0000'>" . $validation->getError('article_image') . "</div>";
                            } ?>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Choisir Couleur Principale</b></label>
                            <input type="color" name="article_color" value="<?= set_value('article_color') ?>" class="form-control-file form-control">
                            <?php if (isset($validation) && $validation->hasError('article_color')) {
                                echo "<div style='color: #ff0000'>" . $validation->getError('article_color') . "</div>";
                            } ?>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Choisir Couleur sécondaire</b></label>
                            <input type="text" name="article_secondary_color" class="form-control" value="<?= set_value('article_secondary_color') ?>" data-role="tagsinput" placeholder="Entrez des couleurs séparées par des virgules ou des espaces" multiple>
                            <?php if (isset($validation) && $validation->hasError('article_secondary_color')) {
                                echo "<div style='color: #ff0000'>" . $validation->getError('article_secondary_color') . "</div>";
                            } ?>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Taille disponible</b><small> (Veuillez séparer les tailles par une virgule)</small></label>
                            <input type="text" name="article_taille" class="form-control" value="<?= set_value('article_taille') ?>" data-role="tagsinput"   placeholder="Veuillez saisir les differentes tailles disponible pour l'article">
                            <?php if (isset($validation) && $validation->hasError('article_taille')) {
                                echo "<div style='color: #ff0000'>" . $validation->getError('article_taille') . "</div>";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Creer l'Article</button>
        </div>
        </div>
    </form>

<?php else : ?>
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4 class="text-danger text-center">Vous ne disposez pas de droits requis pour acceder à cette page</h4>
                </div>
            </div>
        </div>
    </div>
    <!--Fin Indicateurs de performances -->

<?php endif; ?>
<script src="<?php echo base_url('/backend/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') ?>"></script>

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

