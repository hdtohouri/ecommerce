<?= $this->extend('backend/layout/page-layout') ?>
<?= $this->section('content') ?>

<?php if (session('logged_in') && session('can_add_admin') == 'YES') : ?>

    <!--Debut Indicateurs de performances -->
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
                            Ajouter Administrateur
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
                    <a class="btn btn-primary " href="<?php echo base_url("common/adminspace/dashboard/list_admin") ?>" role="button" >
                        Voir liste des Administrateurs
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <h4 class="text-blue h4">Informations</h4>
            <p class="mb-30">Veuillez saisir les informations de l'administrateur</p>
        </div>
        <div class="wizard-content">
            <form action="<?php echo base_url("common/adminspace/dashboard/add_admin") ?>" method="post">
                <?= csrf_field(); ?>
                <div class="content clearfix">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Nom Utilisateur :</label>
                                    <input type="text" class="form-control" name="Username" placeholder="Veuillez saisir le username">
                                    <?php if (isset($validation) && $validation->hasError('Username')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('Username') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mot de Passe :</label>
                                    <input type="password" class="form-control" name="password" placeholder="Veuillez saisir le mot de passe">
                                    <?php if (isset($validation) && $validation->hasError('password')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('password') . "</div>";
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Addresse Email :</label>
                                    <input type="email" class="form-control" name="email"  placeholder="Veuillez saisir l'adresse email">
                                    <?php if (isset($validation) && $validation->hasError('email')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('email') . "</div>";
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Soumettre</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
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

<script>
    <?php if (session()->has('success_message')): ?>
        Toastify({
            text: "<?= session('success_message') ?>",
            duration: 5000, 
            position: "right",
            gravity: "top",
            close: true
        }).showToast();
    <?php elseif (session()->has('error_message')): ?>
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