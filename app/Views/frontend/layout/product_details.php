<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href=<?php echo base_url("frontend/css/jquery.floating-social-share.min") ?> type="text/css">
<link rel="stylesheet" href=<?php echo base_url("/frontend/css/test.css") ?> type="text/css">
<?php if (isset($item) && $item != NULL) : ?>
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

                    <ul></ul>
                    <?php if ($item['secondary_color'] || $item['taille']) : ?>
                        <form action="<?php echo base_url('common/shoppingcart/cart/') . $item['id'] ?>" method="post">

                            <?php if ($item['secondary_color']) : ?>
                                <div class="sidebar__item sidebar__item__color--option">
                                    <h6 class="mb-2"><b>Couleur</b></h6>
                                    <table>
                                        <tbody>
                                            <div>
                                                <tr>
                                                    <?php foreach ($item['secondary_color'] as $color) : ?>
                                                        <td>
                                                            <div class="cercle" id="maDiv" style="background-color: <?php echo $color; ?>" data-color="<?= $color; ?>">
                                                                <input type="text" name="color_name[]" value="<?= $color; ?>" hidden>
                                                            </div>
                                                        </td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            </div>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>

                            <?php if ($item['taille']) : ?>
                                <div class="sidebar__item">
                                    <h6 class="mb-2"><b>Taille</b></h6>
                                    <table>
                                        <tbody>
                                            <div class="sidebar__item__size">                                                
                                                    <tr>
                                                        <?php foreach ($item['taille'] as $taille) : ?>
                                                            <td>                                                                
                                                                <?php echo $taille; ?>
                                                                
                                                            </td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                            </div>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>

                            <button type="submit" class="primary-btn border-0">Ajouter au panier</button>
                            <a href="<?php echo base_url('common/favoris/add_favoris/' . $item['id']) ?>" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        </form>
                    <?php else : ?>
                        <a href="<?php echo base_url('common/shoppingcart/cart/' . $item['id']) ?>" class="primary-btn">Ajouter au panier</a>
                        <a href="<?php echo base_url('common/favoris/add_favoris/' . $item['id']) ?>" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <?php endif; ?>
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

    // Sélection de tous les éléments avec la classe 'cercle'
var cercles = document.querySelectorAll('.cercle');

// Parcours des éléments et ajout d'un gestionnaire d'événements 'click' à chacun
cercles.forEach(function(cercle) {
    cercle.addEventListener('click', function() {
        var couleurSelectionnee = this.getAttribute('data-color');
        Toastify({
            text: "Couleur sélectionnée : " + couleurSelectionnee,
            duration: 4000,
            position: "right",
            gravity: "top",
            close: true
        }).showToast();
        console.log('Couleur sélectionnée : ' + couleurSelectionnee);
        // Ajoutez ici le code pour gérer la couleur sélectionnée
    });
});

</script>
<script src=<?php echo base_url("/frontend/js/jquery-3.3.1.min.js") ?>></script>
<script src=<?php echo base_url("frontend/js/jquery.floating-social-share.min") ?>></script>
<script>
    var currentURL = "<?= base_url('common/landingpage/get_details/' . $item['name']); ?>";
    $("body").floatingSocialShare({
        text: "Partager",
        url: currentURL,
        counter: true,
        buttons: ["facebook", "twitter", "whatsapp", "telegram", "linkedin"],

    });
</script>
<?= $this->endSection() ?>