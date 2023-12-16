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
                            <a href="<?php echo base_url("common/dashboard") ?>">Accueil</a>
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
                    <a class="btn btn-primary " href="<?php echo base_url('common/dashboard/list_product') ?>" role="button">
                        Voir liste des Articles
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-box mb-2">
        <h5 class="card-header weight-500"><b>Options</b></h5>
        <div class="card-body">

            <div class="form-group">
                <a href="" class="btn btn-default btn-sm p-0" role="button" id="add_articles_btn">
                    <i class="fa fa-plus-circle"></i> Ajouter des articles à la commande
                </a>
            </div>
            <div class="form-group"></div>
        </div>
    </div>
    <form action="<?php echo base_url("common/dashboard/add_product") ?>" method="post" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_ccsrf_data">
        <div class="row">
            <div class="col-md-9">
                <div class="card card-box mb-2">
                    <div class="card-body">
                        <div class="row">
                        
                                
                                    
                                    
                        <?php  if (isset($orders_data)):  ?> 
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Nom Article :</b></label>
                                    <input type="text" name="article_name" class="form-control"  value="<?= strtoupper($orders_data['product_name']) ?>" readonly>
                                    <?php if (isset($validation) && $validation->hasError('article_name')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('article_name') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Quantité Article :</b></label>
                                    <input type="text" name="article_quantity" class="form-control" value="<?= strtoupper($orders_data['product_quantity']) ?>" readonly>
                                    <?php if (isset($validation) && $validation->hasError('article_quantity')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('article_quantity') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            
                            
                            <?php  else :  ?> 


                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Nom Article :</b></label>
                                    <input type="text" name="article_name" class="form-control"  readonly >
                                    <?php if (isset($validation) && $validation->hasError('article_name')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('article_name') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Quantité Article :</b></label>
                                    <input type="text" name="article_quantity" class="form-control" readonly >
                                    <?php if (isset($validation) && $validation->hasError('article_quantity')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('article_quantity') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <?php  endif;   ?> 
                        </div>
                       
                    </div>
                </div>
            
            </div>
           
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Ajouter la commande</button>
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
<?php include(APPPATH . 'Views/backend/modals/add_orders_modal.php') ?>
<script src="<?php echo base_url('/backend/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') ?>"></script>
<script>
    $(document).on('click', '#add_articles_btn', function(e) {
        e.preventDefault();
        var modal = $('body').find('div#add-orders-modal');
        var modal_title = 'Ajouter Un Article';
        var modal_btn_text = 'Ajouter';
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input.error-text').html('');
        modal.find('input[type="text"]').val('');
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