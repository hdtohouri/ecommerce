<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<!-- Hero Section Begin -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
  <form action="<?php echo base_url('common/users/login') ?>" method="post" class="border shadow p-3 rounded" style="width: 400px;">
    <?= csrf_field() ?>
    <div class="login-title">
      <h2 class="text-center text-primary">Bienvenue</h2><br>
      <?php
      if (isset($special_message))
        echo $special_message;
      ?>
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Nom D'utilisateur</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Veuillez saisir votre nom d'utilisateur" value="<?= set_value('username') ?>" autofocus>
      <?php if (isset($validation) && $validation->hasError('username')) {
        echo "<div style='color: #ff0000'>" . $validation->getError('username') . "</div>";
      } ?>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Mot de Passe</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="*****************" value="<?= set_value('password') ?>">
      <?php if (isset($validation) && $validation->hasError('password')) {
        echo "<div style='color: #ff0000'>" . $validation->getError('password') . "</div>";
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
    <div class="row pb-30">
      <div class="col-7">
        <div class="forgot-password ">
          <a class="text-decoration-none do-not-hover-white" href="<?php echo base_url('common/users/login/forgotuserpassword') ?>">Mot de passe oublié ?</a>
        </div>
      </div>
    </div>
    <p>Je n'ai pas de compte <a href="<?php echo base_url('common/users/login/register') ?>" class="text-decoration-none do-not-hover-white">S'inscrire</a></p>

  </form>
</div>
<!-- Hero Section End -->

<br><br>
<?= $this->endSection() ?>