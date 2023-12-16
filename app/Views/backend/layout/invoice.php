<?= $this->extend('backend/layout/page-layout') ?>
<?= $this->section('content') ?>
<div class="invoice-wrap">
    <div class="invoice-box">
        <div class="invoice-header">
            <div class="logo">
                <img src="<?php echo base_url("/frontend/img/logo.png") ?>" height="150" width="150" alt="">
            </div>
        </div>
        <h4 class="text-center mb-30 weight-600">RECU</h4>
        <div class="row pb-30">
            <div class="col-md-6">
                <h5 class="mb-15">Nom Client</h5>
                <p class="font-14 mb-5">
                    Date Achat: <strong class="weight-600">10 Jan 2018</strong>
                </p>
                <p class="font-14 mb-5">
                    Commande No: <strong class="weight-600">#4556</strong>
                </p>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <p class="font-14 mb-5">Your Name</p>
                    <p class="font-14 mb-5">Your Address</p>
                    <p class="font-14 mb-5">City</p>
                    <p class="font-14 mb-5">Postcode</p>
                </div>
            </div>
        </div>
        <div class="invoice-desc pb-30">
            <div class="invoice-desc-head clearfix">
                <div class="invoice-sub">Article</div>
                <div class="invoice-rate">Prix</div>
                <div class="invoice-hours">Quantité</div>
                <div class="invoice-subtotal">Total</div>
            </div>
            <div class="invoice-desc-body">
                <ul>
                    <li class="clearfix">
                        <div class="invoice-sub">Website Design</div>
                        <div class="invoice-rate">$20</div>
                        <div class="invoice-hours">100</div>
                        <div class="invoice-subtotal">
                            <span class="weight-600">$2000</span>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="invoice-sub">Logo Design</div>
                        <div class="invoice-rate">$20</div>
                        <div class="invoice-hours">100</div>
                        <div class="invoice-subtotal">
                            <span class="weight-600">$2000</span>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="invoice-sub">Website Design</div>
                        <div class="invoice-rate">$20</div>
                        <div class="invoice-hours">100</div>
                        <div class="invoice-subtotal">
                            <span class="weight-600">$2000</span>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="invoice-sub">Logo Design</div>
                        <div class="invoice-rate">$20</div>
                        <div class="invoice-hours">100</div>
                        <div class="invoice-subtotal">
                            <span class="weight-600">$2000</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="invoice-desc-footer">
                <div class="invoice-desc-head clearfix">
                    <div class="invoice-sub">Bank Info</div>
                    <div class="invoice-rate">Emis le</div>
                    <div class="invoice-subtotal">Total</div>
                </div>
                <div class="invoice-desc-body">
                    <ul>
                        <li class="clearfix">
                            <div class="invoice-sub">
                                <p class="font-14 mb-5">
                                    Account No:
                                    <strong class="weight-600">123 456 789</strong>
                                </p>
                                <p class="font-14 mb-5">
                                    Code: <strong class="weight-600">4556</strong>
                                </p>
                            </div>
                            <div class="invoice-rate font-20 weight-600">
                                10 Jan 2018
                            </div>
                            <div class="invoice-subtotal">
                                <span class="weight-600 font-24 text-danger">$8000</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <h4 class="text-center pb-20">Merci Pour Votre Achat !!</h4>
    </div>
</div>
<br><br>
<?= $this->endSection() ?>