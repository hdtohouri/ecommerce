<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<div class="error-page d-flex align-items-center flex-wrap justify-content-center pd-20">
    <div class="pd-10">
        <div class="error-page-wrap text-center">
            <h1>404</h1>
            <h3>Error: 404 Page Not Found</h3>
            <p>
                Désolé, la page que vous recherchez n'existe pas.<br>
            </p>
            <br><br>
        </div>
    </div>
</div>
<?= $this->endSection() ?>