<?= $this->extend('backend/layout/page-layout') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Compte Utilisateur</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url("common/dashboard") ?>">Accueil</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Mon Compte
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
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
        <div class="pd-20 card-box height-100-p">
            <div class="profile-photo">

                <?php if (session('user_pic')) : ?>
                    <a href="javascript:;" id="profil-pic-modal"> <img src="<?php echo session('user_pic'); ?>" alt="" class="avatar-photo"></a>
                <?php else : ?>
                    <a href="javascript:;" id="profil-pic-modal"> <img src="<?php echo base_url("backend/src/images/user.webp"); ?>" alt="" class="avatar-photo"></a>
                <?php endif; ?>
            </div>
            <h5 class="text-center h5 mb-0"><?php echo session('user_fullname'); ?></h5>
            <p class="text-center text-muted font-14">
                <?php echo session('user_function'); ?>
            </p>
            <div class="profile-info">
                <h5 class="mb-20 h5 text-blue">Informations</h5>
                <ul>
                    <li>
                        <span>Nom Complet :</span>
                        <?php if (session('full_name')) : ?>
                            <?php echo session('full_name'); ?>
                        <?php else : ?>
                            <h6 class="text-muted">Veuillez ajouter vos informations</h6>
                        <?php endif; ?>
                    </li>
                    <li>
                        <span>Addresse Email :</span>
                        <?php if (session('user_email')) : ?>
                            <?php echo session('user_email'); ?>
                        <?php else : ?>
                            <h6 class="text-muted">Veuillez ajouter une Addresse Email</h6>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
        <div class="card-box height-100-p overflow-hidden">
            <div class="profile-tab height-100-p">
                <div class="tab height-100-p">
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#information" role="tab">Modifier mes informations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#password" role="tab">Modifier mot de passe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#double_factor" role="tab"> Double Facteur</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- User information Tab start -->
                        <div class="tab-pane fade show active" id="information" role="tabpanel">
                            <div class="pd-20">
                                <form action="<?php echo base_url("common/dashboard/update_informations") ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nom Complet</label>
                                                <input type="text" name="name" class="form-control" value="<?= set_value('name') ?>" placeholder="Veuillez saisir votre nom complet">
                                                <?php if (isset($validation) && $validation->hasError('name')) {
                                                    echo "<div style='color: #ff0000'>" . $validation->getError('name') . "</div>";
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nom d'utilisateur</label>
                                                <input type="text" name="username" class="form-control" value="<?= set_value('username') ?>" placeholder="Veuillez saisir votre nom d'utilisateur">
                                                <?php if (isset($validation) && $validation->hasError('username')) {
                                                    echo "<div style='color: #ff0000'>" . $validation->getError('username') . "</div>";
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Addresse Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" placeholder="Veuillez saisir votre Addresse Email">
                                        <?php if (isset($validation) && $validation->hasError('email')) {
                                            echo "<div style='color: #ff0000'>" . $validation->getError('email') . "</div>";
                                        } ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Soumettre</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- User information Tab End -->
                        <!-- User Reset password Tab start -->
                        <div class="tab-pane fade" id="password" role="tabpanel">
                            <div class="pd-20 profile-task-wrap">
                                <form action="<?php echo base_url("common/dashboard/password_update") ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="">Mot de passe Actuel</label>
                                        <input type="password" name="actuelpassword" class="form-control" value="<?= set_value('actuelpassword') ?>" placeholder="Veuillez saisir votre Mot de passe Actuel">
                                        <?php if (isset($validation) && $validation->hasError('actuelpassword')) {
                                            echo "<div style='color: #ff0000'>" . $validation->getError('actuelpassword') . "</div>";
                                        } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nouveau Mot de passe</label>
                                                <input type="password" name="password1" class="form-control" value="<?= set_value('password1') ?>" placeholder="Veuillez saisir votre nouveau Mot de passe">
                                                <?php if (isset($validation) && $validation->hasError('password1')) {
                                                    echo "<div style='color: #ff0000'>" . $validation->getError('password1') . "</div>";
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Ressaisir nouveau Mot de passe</label>
                                                <input type="password" name="password2" class="form-control" value="<?= set_value('password2') ?>" placeholder="Veuillez ressaisir votre nouveau Mot de passe">
                                                <?php if (isset($validation) && $validation->hasError('password2')) {
                                                    echo "<div style='color: #ff0000'>" . $validation->getError('password2') . "</div>";
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Soumettre</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- User Reset password Tab End -->
                        <!-- User Double Factor Tab start -->
                        <div class="tab-pane fade" id="double_factor" role="tabpanel">
                            <div class="pd-20 profile-task-wrap">

                                <h6>AUTHENTIFICATION DOUBLE FACTEUR</h6><br>
                                <p>Si activé, un code de sécurité vous sera envoyé par email lors de chaque tentative de connexion. </p>

                                <?php if (session('double_factor') == 'YES') :?>

                                <p>Etat Actuel : ACTIVE</p><br>

                                <form action="<?php echo base_url("common/twofactor/desactivate") ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                    <?php
                                        if (isset($validation))
                                        echo "<div style='color: #ff0000'>" . $validation->listErrors() . "</div>";
                                    ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="UserCode" value="<?php echo session('user_id') ?>" />
                                        <button type="submit" class="btn btn-primary">Desactiver</button>
                                    </div>
                                </form>
                               
                            </div>
                            <?php else : ?>
                                <p>Etat Actuel : INACTIVE</p><br>

                                <form action="<?php echo base_url("common/twofactor/activate") ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                    <?php
                                        if (isset($validation))
                                        echo "<div style='color: #ff0000'>" . $validation->listErrors() . "</div>";
                                    ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="UserCode" value="<?php echo session('user_id') ?>" />
                                        <button type="submit" class="btn btn-primary">Activer</button>
                                    </div>
                                </form>
                                <?php endif; ?>
                        </div>
                    </div>
                    <!-- User Double Factor Tab End -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include(APPPATH . 'Views/backend/modals/add_profil_pic.php') ?>
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
    $(document).on('click', '#profil-pic-modal', function(e) {
        e.preventDefault();
        var userId = $(this).data('customerid');
        var modal = $('body').find('div#add-profil-pic');
        var modal_title = 'Ajouter Photo de profil';
        var modal_btn_text = 'Ajouter';
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input.error-text').html('');
        modal.find('input[type="text"]').val('');
        modal.find('input[name="user_id"]').val(userId);
        modal.modal('show');
    });
</script>
<?= $this->endSection() ?>