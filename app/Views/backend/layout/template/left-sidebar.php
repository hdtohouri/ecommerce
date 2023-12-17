<div class="left-side-bar">
	<div class="brand-logo">
		<a href="<?php echo base_url('/common/dashboard') ?>">
			<img src=<?php echo base_url("/backend/vendors/images/logo.png") ?> alt="" class="dark-logo" width="95" />
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li>
					<a href="<?php echo base_url('/common/dashboard') ?> " class="dropdown-toggle no-arrow">
						<span class="micon dw dw-home"></span><span class="mtext">Accueil</span>
					</a>
				</li>
				<li>
					<a  href="<?php echo base_url('/common/dashboard/message') ?> " class="dropdown-toggle no-arrow">
						<span class="micon dw dw-message"></span><span class="mtext">Messages
						<?php if (isset($message)): ?>
							<span class="position-relative top-0 start-100 translate-middle badge rounded-pill bg-danger">
								<?php echo (int) $message; ?>
							</span></span>
						<?php endif; ?>
	
					</a>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon dw dw-group"></span><span class="mtext">Utilisateurs</span>
					</a>
					<ul class="submenu">
						<?php if (session('logged_in') && session('can_add_admin') == 'YES') : ?>
							<li><a href="<?php echo base_url('/common/dashboard/list_admin') ?>">Liste des Administrateurs</a></li>
							<li><a href="<?php echo base_url('/common/dashboard/add_admin') ?>">Ajouter Administrateur</a></li>
						<?php endif; ?>
						<li><a href="<?php echo base_url('/common/dashboard/list_customers') ?>">Liste des Utilisateurs</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon dw dw-tag"></span><span class="mtext">Categories</span>
					</a>
					<ul class="submenu">
						<li><a href="<?php echo base_url('/common/dashboard/add_categories') ?>">Ajouter Categorie</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon dw dw-shopping-cart1"></span><span class="mtext">Articles</span>
					</a>
					<ul class="submenu">
						<li><a href="<?php echo base_url('common/dashboard/list_product') ?>">Liste des Articles</a></li>
						<li><a href="<?php echo base_url('common/dashboard/add_product') ?>">Ajouter Article</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon dw dw-shopping-basket-1"></span><span class="mtext">Commandes</span>
					</a>
					<ul class="submenu">
						<li><a href="">Liste des Commandes</a></li>
						<li><a href="<?php echo base_url('common/dashboard/manage_orders') ?>">Gestion des Commandes</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon dw dw-analytics1"></span><span class="mtext">Etat des stocks</span>
					</a>
					<ul class="submenu">
						<li><a href="">Liste des Commandes</a></li>
						<li><a href="">Ajouter Commande</a></li>
					</ul>
				</li>
				<li>
					<div class="dropdown-divider"></div>
				</li>
				<li>
					<div class="sidebar-small-cap">Paramettre</div>
				</li>
				<li>
					<a href="<?php echo base_url('common/dashboard/profil') ?>" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-settings2"></span>
						<span class="mtext">Mon Compte
						</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('common/logout') ?>" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-logout"></span>
						<span class="mtext">Deconnexion
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>