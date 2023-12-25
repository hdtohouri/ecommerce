 <!-- Humberger Begin -->
 <div class="humberger__menu__overlay"></div>
 <div class="humberger__menu__wrapper">
     <div class="humberger__menu__logo">
         <a href="<?php echo base_url() ?>"><img src="<?php echo base_url("frontend/img/logo.png") ?>" height="80" width="110" alt=""></a>
     </div>
     <div class="humberger__menu__cart">
         <ul>
             <?php if (session()->has('favoris')) : ?>
                 <li><a href="<?php echo base_url("common/favoris") ?>"><i class="icon-copy dw dw-like1"></i> <span><?php echo count(session('favoris')) ?></span></a></li>
             <?php else : ?>
                 <li><a href="<?php echo base_url("common/favoris") ?>"><i class="icon-copy dw dw-like1"></i> <span>0</span></a></li>
             <?php endif; ?>
             <?php if (session()->has('cart')) : ?>
                 <li><a href="<?php echo base_url("common/shoppingcart") ?>"><i class="icon-copy dw dw-shopping-cart-1"></i> <span> <?php echo session('totalquantity') ?></span></a></li>
             <?php else : ?>
                 <li><a href="<?php echo base_url("common/shoppingcart") ?>"><i class="icon-copy dw dw-shopping-cart-1"></i> <span>0</span></a></li>
             <?php endif; ?>
         </ul>
     </div>
     <div class="humberger__menu__widget">
         <div class="header__top__right__auth">
             <?php if (session('is_logged_in')) : ?>
                 <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo strtoupper(session('customers_username')); ?>
                     </button>
                     <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="<?php echo base_url('common/users/home'); ?>">Mon Compte</a></li>
                         <li><a class="dropdown-item" href="<?php echo base_url('common/users/home/orders'); ?>">Mes Commandes</a></li>
                         <li>
                             <hr class="dropdown-divider">
                         </li>
                         <li><a class="dropdown-item" href="<?php echo base_url('common/users/customeurslogout'); ?>">Deconnexion</a></li>
                     </ul>
                 </div>

             <?php else : ?>
                 <a href="<?php echo base_url('common/users/login') ?>"><i class="icon-copy dw dw-user-13"></i> Se Connecter</a>
             <?php endif; ?>
         </div>
     </div>
     <nav class="humberger__menu__nav mobile-menu">
         <ul>
             <li><a href="<?php echo base_url() ?>">Accueil</a></li>
             <li><a href="<?php echo base_url("common/landingpage/products") ?>">Nos Articles</a></li>
             <li><a href="<?php echo base_url("common/landingpage/contactus") ?>">Nous Contacter</a></li>
         </ul>
     </nav>
     <div id="mobile-menu-wrap"></div>
     <div class="header__top__right__social">
         <a href="https://www.facebook.com/profile.php?id=100083066274028" target="_blank"><i class="fa fa-facebook"></i></a>
     </div>
     <div class="humberger__menu__contact">
         <ul>
             <li>Pour toutes informations :</li>
             <li><i class="fa fa-envelope"></i> beautyfashion@gmail.com</li>
         </ul>
     </div>
 </div>
 <!-- Humberger End -->

 <!-- Header Section Begin -->
 <header class="header">
     <div class="header__top">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6 col-md-6">
                     <div class="header__top__left">
                         <ul>
                             <li>Pour toutes informations :</li>
                             <li><i class="fa fa-envelope"></i> beautyfashionsrpth@gmail.com</li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-6 col-md-6">
                     <div class="header__top__right">
                         <div class="header__top__right__social">
                             <a href="https://www.facebook.com/profile.php?id=100083066274028" target="_blank"><i class="fa fa-facebook"></i></a>
                         </div>
                         <div class="header__top__right__auth">
                             <?php if (session('is_logged_in')) : ?>
                                 <div class="dropdown">
                                     <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                         <i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo strtoupper(session('customers_username')); ?>
                                     </button>
                                     <ul class="dropdown-menu">
                                         <li><a class="dropdown-item" href="<?php echo base_url('common/users/home'); ?>">Mon Compte</a></li>
                                         <li><a class="dropdown-item" href="<?php echo base_url('common/users/home/orders'); ?>">Mes Commandes</a></li>
                                         <li>
                                             <hr class="dropdown-divider">
                                         </li>
                                         <li><a class="dropdown-item" href="<?php echo base_url('common/users/customeurslogout'); ?>">Deconnexion</a></li>
                                     </ul>
                                 </div>

                             <?php else : ?>
                                 <a href="<?php echo base_url('common/users/login') ?>"><i class="icon-copy dw dw-user-13"></i> Se Connecter</a>
                             <?php endif; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="header__logo">
                     <a href="<?php echo base_url() ?>"><img src="<?php echo base_url("frontend/img/logo.png") ?>" height="100" width="150" alt=""></a>
                 </div>
             </div>
             <div class="col-lg-6">
                 <nav class="header__menu">
                     <ul>
                         <?php $currentUrl = current_url(); ?>
                         <li <?php if ($currentUrl === base_url()) : ?>class="active" <?php endif; ?>>
                             <a href="<?php echo base_url() ?>">Accueil</a>
                         </li>
                         <li <?php if ($currentUrl === base_url("common/landingpage/products")) : ?>class="active" <?php endif; ?>>
                             <a href="<?php echo base_url("common/landingpage/products") ?>">Nos Articles</a>
                         </li>
                         <li <?php if ($currentUrl === base_url("common/landingpage/contactus")) : ?>class="active" <?php endif; ?>>
                             <a href="<?php echo base_url("common/landingpage/contactus") ?>">Nous Contacter</a>
                         </li>
                     </ul>
                 </nav>
             </div>
             <div class="col-lg-3">
                 <div class="header__cart">
                     <ul>
                         <?php if (session()->has('favoris')) : ?>
                             <li><a href="<?php echo base_url("common/favoris") ?>"><i class="icon-copy dw dw-like1"></i> <span><?php echo count(session('favoris')) ?></span></a></li>
                         <?php else : ?>
                             <li><a href="<?php echo base_url("common/favoris") ?>"><i class="icon-copy dw dw-like1"></i> <span>0</span></a></li>
                         <?php endif; ?>
                         <?php if (session()->has('cart')) : ?>
                             <li><a href="<?php echo base_url("common/shoppingcart") ?>"><i class="icon-copy dw dw-shopping-cart-1"></i> <span> <?php echo session('totalquantity') ?></span></a></li>
                         <?php else : ?>
                             <li><a href="<?php echo base_url("common/shoppingcart") ?>"><i class="icon-copy dw dw-shopping-cart-1"></i> <span>0</span></a></li>
                         <?php endif; ?>
                     </ul>
                 </div>
             </div>
         </div>
         <div class="humberger__open">
             <i class="fa fa-bars"></i>
         </div>
     </div>


 </header>
 <!-- Header Section End -->