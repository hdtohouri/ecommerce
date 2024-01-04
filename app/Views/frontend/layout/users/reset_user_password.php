<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<!-- Hero Section Begin -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
  <form action="<?php echo base_url('common/users/reset_password') ?>" method="post" class="border shadow p-3 rounded" style="width: 400px;">
    <?= csrf_field() ?>
    <div class="login-title">
      <h3 class="text-center text-primary">Recupération de Compte</h3><br>
      <?php
      if (isset($special_message))
        echo $special_message;
      ?>
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Nouveau Mot de Passe</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Veuillez saisir votre nouveau Mot de Passe" value="<?= set_value('password') ?>" autofocus>
      <?php if (isset($validation) && $validation->hasError('password')) {
        echo "<div style='color: #ff0000'>" . $validation->getError('password') . "</div>";
      } ?>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Nouveau Mot de Passe</label>
      <input type="password" class="form-control" id="password" name="password1" placeholder="Veuillez ressaisir votre nouveau Mot de Passe" value="<?= set_value('password1') ?>">
      <?php if (isset($validation) && $validation->hasError('password1')) {
        echo "<div style='color: #ff0000'>" . $validation->getError('password1') . "</div>";
      } ?>
    </div>
    
    <div class="row">
      <div class="col-sm-12">
        <div class="input-group mb-0">
          <input type="submit" class="btn btn-primary btn-lg" value="Se Connecter">
        </div>
      </div>
    </div>
    <hr>
    

  </form>
</div>
<!-- Hero Section End -->

<br><br>
<?= $this->endSection() ?>