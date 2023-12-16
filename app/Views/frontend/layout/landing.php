<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<!-- Hero Section Begin -->
<?php include('template/hero.php') ?>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg=<?php echo base_url("/frontend/img/featured/ct1.png") ?>>
                        <h5><a href="#">Vêtements Hommes</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg=<?php echo base_url("/frontend/img/featured/ct2.png") ?>>
                        <h5><a href="#">Vêtements FemmeS</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg=<?php echo base_url("/frontend/img/featured/ct3.png") ?>>
                        <h5><a href="#">Montres</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg=<?php echo base_url("/frontend/img/featured/ct4.png") ?>>
                        <h5><a href="#">Accessoires</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg=<?php echo base_url("//frontend/img/featured/ct10.png") ?>>
                        <h5><a href="#">Chaussures</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Nos Articles</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg=<?php echo base_url("/frontend/img/featured/ct1.png") ?>>
                        <ul class="featured__item__pic__hover">
                            <li><a href="<?php echo base_url("common/landingpage/products") ?>"><i class="fa fa-retweet"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="<?php echo base_url("common/landingpage/products") ?>">Nos Articles <i class="icon-copy dw dw-right-arrow1"></i></a></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg=<?php echo base_url("/frontend/img/featured/ct2.png") ?>>
                        <ul class="featured__item__pic__hover">
                            <li><a href="<?php echo base_url("common/landingpage/products") ?>"><i class="fa fa-retweet"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="<?php echo base_url("common/landingpage/products") ?>">Nos Articles <i class="icon-copy dw dw-right-arrow1"></i></a></h6>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg=<?php echo base_url("/frontend/img/featured/ct8.png") ?>>
                        <ul class="featured__item__pic__hover">
                            <li><a href="<?php echo base_url("common/landingpage/products") ?>"><i class="fa fa-retweet"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="<?php echo base_url("common/landingpage/products") ?>">Nos Articles <i class="icon-copy dw dw-right-arrow1"></i></a></h6>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg=<?php echo base_url("/frontend/img/featured/ct6.png") ?>>
                        <ul class="featured__item__pic__hover">
                            <li><a href="<?php echo base_url("common/landingpage/products") ?>"><i class="fa fa-retweet"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="<?php echo base_url("common/landingpage/products") ?>">Nos Articles <i class="icon-copy dw dw-right-arrow1"></i></a></h6>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg=<?php echo base_url("/frontend/img/featured/ct3.png") ?>>
                        <ul class="featured__item__pic__hover">
                            <li><a href="<?php echo base_url("common/landingpage/products") ?>"><i class="fa fa-retweet"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="<?php echo base_url("common/landingpage/products") ?>">Nos Articles <i class="icon-copy dw dw-right-arrow1"></i></a></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg=<?php echo base_url("/frontend/img/featured/ct4.png") ?>>
                        <ul class="featured__item__pic__hover">
                            <li><a href="<?php echo base_url("common/landingpage/products") ?>"><i class="fa fa-retweet"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="<?php echo base_url("common/landingpage/products") ?>">Nos Articles <i class="icon-copy dw dw-right-arrow1"></i></a></h6>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg=<?php echo base_url("/frontend/img/featured/ct9.png") ?>>
                        <ul class="featured__item__pic__hover">
                            <li><a href="<?php echo base_url("common/landingpage/products") ?>"><i class="fa fa-retweet"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="<?php echo base_url("common/landingpage/products") ?>">Nos Articles <i class="icon-copy dw dw-right-arrow1"></i></a></h6>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg=<?php echo base_url("/frontend/img/featured/ct10.png") ?>>
                        <ul class="featured__item__pic__hover">
                            <li><a href="<?php echo base_url("common/landingpage/products") ?>"><i class="fa fa-retweet"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="<?php echo base_url("common/landingpage/products") ?>">Nos Articles <i class="icon-copy dw dw-right-arrow1"></i></a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?php echo base_url("/frontend/img/banner/banner1.png") ?>" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?php echo base_url("/frontend/img/banner/banner2.png") ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<br><br>
<!-- Latest Product Section End -->

<?= $this->endSection() ?>