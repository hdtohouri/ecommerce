<?= $this->extend('backend/layout/page-layout') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php if ($orders) : ?>
                <div class="card-body bg-white">
                    <table class="table table-sm table-borderless table-hover table-striped">
                        <thead>
                            <tr>
                                <td scope="col">#</td>
                                <td scope="col">order_number</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($orders as $orders) : ?>
                                <tr>
                                <td><?= ++$i ?></td>
                                <td><?= isset($orders['order_number']) ? $orders['order_number'] : '' ?></td>
                                    
                                    
                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <p>
                <h2>aucune commande a été retrouvé</h2>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>