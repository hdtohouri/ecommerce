<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>

<section class="shoping-cart spad">
<?php if (!empty($items)) : ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <form action="<?php echo site_url('common/shoppingcart/update') ?>" method="post">
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
                                                FCFA <?= $item['price'] ?> 
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="button" value="-" id="moins" onclick="moins()" class="dec qtybtn">
                                                        <input type="number" name="quantity[]" id="badge" value="<?= $item['quantity'] ?>" min="1">
                                                        <input type="button" value="+" id="plus" onclick="plus()" class="inc qtybtn">
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                               FCFA <?= $item['price'] * $item['quantity'] ?>
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="<?php echo site_url('common/shoppingcart/remove/' . $item['id']) ?>"><span class="icon_close"></span></a>
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
                    <button type="submit" class="primary-btn cart-btn cart-btn-right">Mettre à jour</button>
                </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Total</h5>
                    <ul>
                        <li>Total à payer <span><?= number_to_currency( $total, 'XAF') ?> </span></li>
                    </ul>
                    <a href="<?php echo base_url('common/shoppingcart/payment') ?>" class="primary-btn">PROCÉDER AU PAIEMENT</a>
                </div>
            </div>
        </div>
        <?php else : ?>
        <h3 class="text-center text-danger">Aucun article au panier</h3>
    <?php endif; ?>
    </div>
</section>


<script>
function moins() {
    var inputField = document.getElementById('badge');
    var currentValue = parseInt(inputField.value);

    if (currentValue > 1) {
        inputField.value = currentValue - 1;
        updateBadgeValue(inputField.value);
    }
}

function plus() {
    var inputField = document.getElementById('badge');
    var currentValue = parseInt(inputField.value);

    inputField.value = currentValue + 1;
    updateBadgeValue(inputField.value);
}
</script>
<?= $this->endSection() ?>