<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<!-- contact us Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Categories</h4>
                        <ul>
                            <?php if (isset($list_category)) : ?>
                                <?php foreach ($list_category as $category) : ?>
                                    <li class="text-capitalize"><a href="<?php echo base_url('common/landingpage/display_by_cat/'.$category['id_categories'])?>"><?= $category['nom_categories'] ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?> 
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Nouvautés</h4>
                            <div class="latest-product__slider owl-carousel owl-loaded owl-drag">


                                <div class="owl-stage-outer">
                                    <div class="owl-stage" style="transform: translate3d(-1153px, 0px, 0px); transition: all 1.2s ease 0s; width: 2307px;">
                                        <div class="owl-item cloned" style="width: 384.4px;">
                                            <div class="latest-prdouct__slider__item">
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="<?php echo base_url("/frontend/img/featured/ct3.png") ?>" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>Montre Homme</h6>
                                                        <span><?= number_to_currency( 35000 , 'XAF') ?></span>
                                                    </div>
                                                </a>
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="<?php echo base_url("/frontend/img/featured/ct2.png") ?>" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>Sac à main</h6>
                                                        <span><?= number_to_currency( 12500 , 'XAF') ?></span>
                                                    </div>
                                                </a>
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="<?php echo base_url("/frontend/img/featured/ct1.png") ?>" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>Sac à main</h6>
                                                        <span><?= number_to_currency( 12500 , 'XAF') ?></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="owl-item cloned" style="width: 384.4px;">
                                            <div class="latest-prdouct__slider__item">
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="<?php echo base_url("/frontend/img/featured/ct10.png") ?>" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>Sac à main</h6>
                                                        <span><?= number_to_currency( 12500 , 'XAF') ?></span>
                                                    </div>
                                                </a>
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="<?php echo base_url("/frontend/img/featured/ct7.png") ?>" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>Montre Homme</h6>
                                                        <span><?= number_to_currency( 35000 , 'XAF') ?></span>
                                                    </div>
                                                </a>
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="<?php echo base_url("/frontend/img/featured/ct9.png") ?>" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>Sac à dos</h6>
                                                        <span><?= number_to_currency( 10000 , 'XAF') ?></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span class="fa fa-angle-left"><span></span></span></button><button type="button" role="presentation" class="owl-next"><span class="fa fa-angle-right"><span></span></span></button></div>
                                <div class="owl-dots disabled"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
            <?php if (isset($promotion)): ?>
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Promotions</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel owl-loaded owl-drag">

                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(-3315px, 0px, 0px); transition: all 1.2s ease 0s; width: 4973px;">
                                    <div class="owl-item cloned" style="width: 414.4px;">
                                        <div class="col-lg-4">
                                        <?php $i = 0;
                                        foreach ($list_product as $product) : ?>
                                            <div class="product__discount__item">
                                                <div class="product__discount__item__pic set-bg" data-setbg="<?= $product['product_image'] ?>" style="background-image: url(&quot;<?= $product['product_image'] ?>&quot;);">
                                                    <div class="product__discount__percent">-20%</div>
                                                    <ul class="product__item__pic__hover">
                                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__discount__item__text">
                                                    <h5><a href="#"><?= $product['product_name'] ?></a></h5>
                                                    <div class="product__item__price"><?= number_to_currency( $product['product_price'], 'XAF') ?> <span><?= number_to_currency( $product['product_price'], 'XAF') ?> </span></div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                            <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
                        </div>
                    </div>
                </div>
                <div class="filter__item"></div>
            <?php endif ?>
                <div class="row">
            <?php if (isset($products)): ?>
                    <?php $i = 0;
                    foreach ($products as $product) : ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="<?= $product->product_image ?>" style="background-image: url(&quot;<?= $product->product_image ?>&quot;);">
                                <ul class="product__item__pic__hover">
                                    <li><a href="<?php echo base_url('common/favoris/add_favoris/'.$product->id_product) ?>"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="<?php echo base_url('common/landingpage/get_details/'.$product->product_name)?>"  ><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="<?php echo base_url('common/landingpage/get_details/'.$product->product_name)?>"><?= $product->product_name ?></a></h6>
                                <h5><?= number_to_currency( $product->product_price, 'XAF')?> </h5>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?= $pager->links('orders','dashboard_pager') ?>
            <?php endif ?>
            </div>
        </div>
    </div>
</section>
<!-- contact us Section End -->
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