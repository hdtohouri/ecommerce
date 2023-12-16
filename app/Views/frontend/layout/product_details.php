<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="product__details__pic">
                <div class="product__details__pic__item">
                    <img class="product__details__pic__item--large" src="<?= $item['image'] ?>" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
                <h3><?= $item['name'] ?></h3>
                <div class="product__details__price"><?= $item['price'] ?> XAF</div>
                <p><?= $item['description'] ?></p>
                
                <a href="<?php echo base_url('common/shoppingcart/cart/'.$item['id']) ?>" class="primary-btn">Ajouter au panier</a>
                <a href="<?php echo base_url('common/favoris/add_favoris/'.$item['id']) ?>" class="heart-icon"><span class="icon_heart_alt"></span></a>
                <ul>
                    <li><b>Quantité en stock</b> <span><?= $item['quantity'] ?></span></li>
                    <li><b>Taille</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                    <li><b>Couleur</b> <span>0.5 kg</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<?= $this->endSection() ?>