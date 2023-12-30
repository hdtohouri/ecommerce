<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Nos Categories</span>
                    </div>
                    <ul>
                        <?php
                        foreach ($list_category as $category) : ?>
                            <li class="text-capitalize"><a href="<?php echo base_url('common/landingpage/display_by_cat/'.$category['id_categories']) ?>"><?= $category['nom_categories'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">

                            <input type="text" placeholder="Rechercher vous un article?">
                            <button type="submit" class="site-btn">CHERCHER</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <span>service client : 24/7 </span>
                            <h5>077244605</h5>
                        </div>
                    </div>
                </div>

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-interval="10000">
                            <div class="hero__item set-bg" data-setbg=<?php echo base_url('frontend/img/hero/hero1.png') ?>>
                                <div class="hero__text">
                                    <span>Avec Beauty Fashion </span>
                                    <h2>TROUVEZ LE <br />LOOK PARFAIT</h2>
                                    <p>Mode homme et femme pour affirmer votre élégance.</p>
                                    <a href="<?php echo base_url("common/landingpage/products") ?>" class="primary-btn"><i class="icon-copy dw dw-right-arrow1"></i> commander ici </a>
                                </div>
                            </div>

                        </div>
                        <div class="carousel-item" data-interval="10000">
                            <div class="hero__item set-bg" data-setbg=<?php echo base_url('frontend/img/hero/hero2.png') ?>>
                                <div class="hero__text">
                                    <span>Avec Beauty Fashion </span>
                                    <h2>L'ELEGANCE <br />SANS FRONTIERE</h2>
                                    <p> Vêtements homme et femme pour chaque occasion.</p>
                                    <a href="<?php echo base_url("common/landingpage/products") ?>" class="primary-btn"><i class="icon-copy dw dw-right-arrow1"></i> commander ici</a>
                                </div>
                            </div>

                        </div>
                        <div class="carousel-item" data-interval="10000">
                            <div class="hero__item set-bg" data-setbg=<?php echo base_url('frontend/img/hero/hero3.png') ?>>
                                <div class="hero__text">
                                    <span>Avec Beauty Fashion </span>
                                    <h2>VOTRE STYLE<br /> NOTRE PASSION</h2>
                                    <p> Collection homme et femme pour affirmer votre individualité.</p>
                                    <a href="<?php echo base_url("common/landingpage/products") ?>" class="primary-btn"><i class="icon-copy dw dw-right-arrow1"></i> commander ici</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>