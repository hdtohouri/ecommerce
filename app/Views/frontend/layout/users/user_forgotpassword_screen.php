<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<!-- Hero Section Begin -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
  <form action="<?php echo base_url('common/users/login/forgotuserpassword') ?>" method="post" class="border shadow p-3 rounded" style="width: 400px;">
    <?= csrf_field() ?>
    <div class="login-title">
      <h2 class="text-center text-primary">Mot de Passe oublié</h2> <br>
      <?php
      if (isset($special_message))
        echo $special_message;
      ?>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Adresse Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Veuillez saisir votre email" value="<?= set_value('email') ?>" autofocus>
      <?php if (isset($validation) && $validation->hasError('email')) {
        echo "<div style='color: #ff0000'>" . $validation->getError('email') . "</div>";
      } ?>
    </div>
    
    <div class="row">
      <div class="col-sm-12">
        <div class="input-group mb-0">
          <input type="submit" class="btn btn-primary btn-lg" value="Soumettre">
        </div>
      </div>
    </div>
    <hr>
    <a href="<?php echo base_url('common/users/login') ?>" class="text-decoration-none do-not-hover-white">Se Connecter</a>
  </form>
</div>
<!-- Hero Section End -->

<br><br>
<?= $this->endSection() ?>