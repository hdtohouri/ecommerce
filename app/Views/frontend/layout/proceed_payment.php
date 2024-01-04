<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<div class="container">
    <?php
    if (isset($special_message))
        echo $special_message;
    ?>
    <?php if (isset($items)) : ?>
        <div class="checkout__form">
            <h4>FACTURATION</h4>
            <form action=" <?php echo base_url('common/shoppingcart/payment') ?>" method="post">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nom et Prénom<span>*</span></p>
                                    <?php if (session('customers_username')) :?>
                                    <input type="text" name="name" value="<?php echo session('customers_username') ?>">
                                    <?php else :?>
                                    <input type="text" name="name" placeholder="Veuillez saisir votre nom">
                                    <?php if (isset($validation) && $validation->hasError('name')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('name') . "</div>";
                                    } ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Numero<span>*</span></p>
                                    <?php if (session('customers_number')) :?>
                                    <input type="tel" name="number" value="<?php echo session('customers_number') ?>">
                                    <?php else :?>
                                    <input type="tel" name="number" placeholder="Veuillez saisir votre Numero">
                                    <?php if (isset($validation) && $validation->hasError('number')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('number') . "</div>";
                                    } ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Adresse Email</p>
                                    <?php if (session('customers_email')) :?>
                                    <input type="email" name="email" value="<?php echo session('customers_email') ?>">
                                    <?php else :?>
                                    <input type="email" name="email" placeholder="Veuillez saisir votre Adresse Email">
                                    <?php if (isset($validation) && $validation->hasError('email')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('email') . "</div>";
                                    } ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Addresse de livraison<span>*</span></p>
                                <?php if (session('customers_location')) :?>
                                <input type="text" name="addresse" value="<?php echo session('customers_location') ?>">
                                <?php else :?>
                                <input type="text" name="addresse" placeholder="Veuillez saisir votre addresse de livraison (la Ville et le quartier)">
                                <?php if (isset($validation) && $validation->hasError('addresse')) {
                                    echo "<div style='color: #ff0000'>" . $validation->getError('addresse') . "</div>";
                                } ?>
                                <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Récapitulatif</h4>
                            <div class="checkout__order__products">Articles <span>Total</span></div>

                            <?php foreach ($items as $item) : ?>
                                <ul>
                                    <li><?= $item['name'] ?> <span><?= number_to_currency($item['price'] * $item['quantity'], 'XAF') ?></span></li>
                                </ul>
                            <?php endforeach ?>
                            <div class="checkout__order__total">Total <span><?= number_to_currency($total, 'XAF') ?></span></div>
                            
                            <div class="checkout__input__checkbox">
                                <label for="">Methode de paiement</label>
                                <select class="form-select" aria-label="Default select example" name="mode_paiement">
                                    <option disabled selected>----- Choisir méthode -------</option>
                                    <option value="Paiement Par Airtel Money">Paiement Par Airtel Money</option>
                                    <option value="Paiement à la livraison">Paiement à la livraison</option>
                                </select>
                                <?php if (isset($validation) && $validation->hasError('mode_paiement')) {
                                    echo "<div style='color: #ff0000'>" . $validation->getError('mode_paiement') . "</div>";
                                } ?>
                            </div>

                            <button type="submit" class="site-btn">PASSER COMMANDE</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php else : ?>
        <h3 class="text-center text-danger">Une erreur est survenue</h3>
    <?php endif; ?>
</div>
<br><br><br>
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