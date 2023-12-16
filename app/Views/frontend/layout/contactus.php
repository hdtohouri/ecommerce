<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<!-- contact us Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Contact</h4>
                    <p>077244605</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Email</h4>
                    <p>beautyfashionsrpth@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Avez vous un message ?</h2>
                    <p class="mt-3 text-muted">Nous vous repondrons dans les plus brefs délais</p>
                </div>
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <form action="<?php echo base_url('common/landingpage/contactus') ?>" method="post" class=" rounded" style="width: 500px;">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom et Prenom</label>
                            <input type="text" class="form-control" name="username" placeholder="Veuillez saisir votre nom et prenom" value="<?= set_value('username') ?>">
                            <?php if (isset($validation) && $validation->hasError('username')) {
                                echo "<div style='color: #ff0000'>" . $validation->getError('username') . "</div>";
                            } ?>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="number" class="form-label">Numero</label>
                                <input type="tel" class="form-control" name="number" placeholder="Veuillez saisir votre numero" value="<?= set_value('number') ?>">
                                <?php if (isset($validation) && $validation->hasError('number')) {
                                    echo "<div style='color: #ff0000'>" . $validation->getError('number') . "</div>";
                                } ?>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Veuillez saisir votre email" value="<?= set_value('email') ?>">
                                <?php if (isset($validation) && $validation->hasError('email')) {
                                    echo "<div style='color: #ff0000'>" . $validation->getError('email') . "</div>";
                                } ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="object" class="form-label">Objet</label>
                            <input type="text" class="form-control" name="object" placeholder="Veuillez saisir l'objet de votre message" value="<?= set_value('object') ?>">
                            <?php if (isset($validation) && $validation->hasError('object')) {
                                echo "<div style='color: #ff0000'>" . $validation->getError('object') . "</div>";
                            } ?>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Veuillez saisir votre message"></textarea>
                            <?php if (isset($validation) && $validation->hasError('message')) {
                                echo "<div style='color: #ff0000'>" . $validation->getError('message') . "</div>";
                            } ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="icon-copy dw dw-cursor-12"></i> Soumettre</button>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- contact us Section End -->
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    <?php if (isset($special_message)) : ?>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Message envoyé avec succes'
        })
    <?php elseif (isset($error_message)) : ?>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: 'Une erreur est survenue. Merci de réessayer'
        })

    <?php endif; ?>
</script>

<?= $this->endSection() ?>