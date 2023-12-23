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
                                    <p>Nom<span>*</span></p>
                                    <input type="text" name="name" placeholder="Veuillez saisir votre nom">
                                    <?php if (isset($validation) && $validation->hasError('name')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('name') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Prénom<span>*</span></p>
                                    <input type="text" name="lastname" placeholder="Veuillez saisir votre Prénom">
                                    <?php if (isset($validation) && $validation->hasError('lastname')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('lastname') . "</div>";
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Numero<span>*</span></p>
                                    <input type="tel" name="number" placeholder="Veuillez saisir votre Numero">
                                    <?php if (isset($validation) && $validation->hasError('number')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('number') . "</div>";
                                    } ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Adresse Email</p>
                                    <input type="email" name="email" placeholder="Veuillez saisir votre Adresse Email">
                                    <?php if (isset($validation) && $validation->hasError('email')) {
                                        echo "<div style='color: #ff0000'>" . $validation->getError('email') . "</div>";
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Addresse de livraison<span>*</span></p>
                            <input type="text" name="addresse" placeholder="Veuillez saisir votre addresse de livraison (la Ville et le quartier)">
                            <?php if (isset($validation) && $validation->hasError('addresse')) {
                                echo "<div style='color: #ff0000'>" . $validation->getError('addresse') . "</div>";
                            } ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Récapitulatif</h4>
                            <div class="checkout__order__products">Articles <span>Total</span></div>

                            <?php foreach ($items as $item) : ?>
                                <ul>
                                    <li><?= $item['name'] ?> <span><?=number_to_currency( $item['price'] * $item['quantity'], 'XAF') ?></span></li>
                                </ul>
                            <?php endforeach ?>
                            <div class="checkout__order__total">Total <span><?=number_to_currency( $total, 'XAF') ?></span></div>
                            <div class="checkout__input__checkbox">
                            <label for="">Methode de paiement</label>
                            <select class="form-select" aria-label="Default select example" name ="mode_paiement">
                                <option value="Paiement Par Airtel Money">Paiement Par Airtel Money</option>
                                <option value="Paiement à la livraison">Paiement à la livraison</option>
                            </select>
                                
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
<?= $this->endSection() ?>