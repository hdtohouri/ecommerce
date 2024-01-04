<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>

<section class="shoping-cart spad">
<?php if (!empty($items)) : ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Articles</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>  
                                    <?php foreach ($items as $item) : ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="<?= $item['image'] ?>" alt="" width="90" height="80">
                                                <h5><?= $item['name'] ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                <?= $item['price'] ?> XAF
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="number" name="quantity[]" id="badge" value="<?= $item['quantity'] ?>" min="1">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                <?= $item['price'] * $item['quantity'] ?> XAF
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="<?php echo site_url('common/favoris/remove/' . $item['id']) ?>"><span class="icon_close"></span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="<?php echo base_url('common/landingpage/products') ?>" class="primary-btn "><i class="icon-copy dw dw-left-arrow2"></i> CONTINUER SHOPPING</a>
                </div>
            </div>
        </div>
<?php else : ?>
        <h3 class="text-center text-danger">Aucun article en favoris</h3>   
<?php endif; ?>
    </div>
</section>


<?= $this->endSection() ?>