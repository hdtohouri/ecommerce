<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<?php if(isset($item) && $item != NULL ): ?>
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
                <div class="product__details__price"><?= number_to_currency($item['price'], 'XAF')  ?> </div>
                <p><?= $item['description'] ?></p>

                <a href="<?php echo base_url('common/shoppingcart/cart/' . $item['id']) ?>" class="primary-btn">Ajouter au panier</a>
                <a href="<?php echo base_url('common/favoris/add_favoris/' . $item['id']) ?>" class="heart-icon"><span class="icon_heart_alt"></span></a>
                <ul>
                    <li><b>Quantité en stock</b> <span><?= $item['stock_quantity'] ?></span></li>
                </ul>
                <div class="sidebar__item">
                    <h6 class="mb-2"><b>Tailles disponible</b></h6>
                    <div class="sidebar__item__size">
                        <label for="large">
                            Large
                            <input type="radio" id="large">
                        </label>
                    </div>
                    <div class="sidebar__item__size">
                        <label for="medium">
                            Medium
                            <input type="radio" id="medium">
                        </label>
                    </div>
                    <div class="sidebar__item__size">
                        <label for="small">
                            Small
                            <input type="radio" id="small">
                        </label>
                    </div>
                    <div class="sidebar__item__size">
                        <label for="tiny">
                            Tiny
                            <input type="radio" id="tiny">
                        </label>
                    </div>
                </div>
                <div class="sidebar__item sidebar__item__color--option">
                    <h6 class="mb-2"><b>Couleurs disponible</b></h6>
         
                    <div >
                        <div ><p></p></div>
                        <label for="green">
                        <label for="">
    <?php echo '<p style="color:' . $item['color'] . '">ton texte ici.</p>'; ?>
</label>

                            <input type="radio" id="html" name="fav_language" value="<?php echo $item['color']; ?>" style="background-color: <?php echo $item['color']; ?>">
                        </label>
                    </div>
                </div>
                
                <span class="colorSwatch" ></span>
                <span class="colorSwatch" style="background-color: <?php echo $item['secondary_color']; ?>"></span>
                
            </div>
        </div>
    </div>
</div>
<br><br><br>
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Produits Similaires</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $i = 0;
            foreach ($similaire as $product) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?= $product->product_image ?>" style="background-image: url(&quot;<?= $product->product_image ?>&quot;);">
                            <ul class="product__item__pic__hover">
                                <li><a href="<?php echo base_url('common/favoris/add_favoris/' . $product->id_product) ?>"><i class="fa fa-heart"></i></a></li>
                                <li><a href="<?php echo base_url('common/landingpage/get_details/' . $product->product_name)  ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?= $product->product_name ?></a></h6>
                            <h5><?= number_to_currency($product->product_price, 'XAF') ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php else : ?>
        <h6>Une erreur est survenue</h6>
<?php endif; ?>
<script>
    <?php if (session()->has('success_message')) : ?>
        Toastify({
            text: "<?= session('success_message') ?>",
            duration: 4000,
            position: "right",
            gravity: "top",
            close: true
        }).showToast();
    <?php endif; ?>
</script>
<?= $this->endSection() ?>