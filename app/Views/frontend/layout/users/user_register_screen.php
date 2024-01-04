<?= $this->extend('frontend/layout/frontend_template') ?>
<?= $this->section('content') ?>
<!-- Hero Section Begin -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
<form action="<?php echo base_url('common/users/login/register') ?>" method="post" class="border shadow p-3 rounded" style="width: 400px;">
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
    <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username') ?>"  placeholder="Veuillez saisir votre nom d'utilisateur">
    <?php if (isset($validation) && $validation->hasError('username')) {
        echo "<div style='color: #ff0000'>" . $validation->getError('username') . "</div>";
      } ?>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de Passe</label>
    <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password') ?>"  placeholder="Veuillez saisir votre mot de passe">
    <?php if (isset($validation) && $validation->hasError('password')) {
        echo "<div style='color: #ff0000'>" . $validation->getError('password') . "</div>";
      } ?>
  </div>
  <div class="mb-3">
    <label for="number" class="form-label">Numero de téléphone</label>
    <input type="text" class="form-control" id="number" name="number" value="<?= set_value('number') ?>"  placeholder="Veuillez saisir votre numero de téléphone">
    <?php if (isset($validation) && $validation->hasError('number')) {
        echo "<div style='color: #ff0000'>" . $validation->getError('number') . "</div>";
      } ?>
  </div>
  <div class="mb-3">
    <label for="location" class="form-label">Adresse Email</label>
    <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>"  placeholder="Veuillez saisir votre adresse email">
    <?php if (isset($validation) && $validation->hasError('email')) {
        echo "<div style='color: #ff0000'>" . $validation->getError('email') . "</div>";
      } ?>
  </div>
  <div class="mb-3">
    <label for="location" class="form-label">Adresse de livraison</label>
    <input type="text" class="form-control" id="location" name="location" value="<?= set_value('location') ?>"  placeholder="Veuillez saisir votre adresse de livraison">
    <?php if (isset($validation) && $validation->hasError('location')) {
        echo "<div style='color: #ff0000'>" . $validation->getError('location') . "</div>";
      } ?>
  </div>
  <div class="row">
      <div class="col-sm-12">
        <div class="input-group mb-0">
          <input type="submit" class="btn btn-primary btn-lg" value="S'inscrire">
        </div>
      </div>
    </div>
  <hr>
  <p>J'ai déjà un compte <a href="<?php echo base_url('common/users/login') ?>" class="text-decoration-none do-not-hover-white">Se Connecter</a></p>
</form>
</div>
<!-- Hero Section End -->

<br><br>
<?= $this->endSection() ?>
