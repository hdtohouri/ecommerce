<div class="header">
	<div class="header-left">
		<div class="menu-icon bi bi-list"></div>
		<div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
		<div class="header-search">
			<form action="<?php echo base_url('common/dashboard/search_result') ?>" method="post">
				<div class="form-group mb-0">
					<i class="dw dw-search2 search-icon"></i>
					<input type="text" class="form-control search-input" name="search" placeholder="saisir votre recherche" />

				</div>
			</form>
		</div>
	</div>
	<div class="header-right">
		<div class="user-info-dropdown">
			<div class="dropdown">
				<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					<span class="user-icon">
						<?php if (session('user_pic')) : ?>
							<img src="<?php echo session('user_pic'); ?>" alt="" class="avatar-photo"> 
						<?php else : ?>
							<img src="<?php echo base_url("backend/src/images/user.webp"); ?>" alt="" class="avatar-photo">
						<?php endif; ?>
					</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
					<a class="dropdown-item" href="<?php echo base_url("common/dashboard/profil") ?>"><i class="dw dw-settings2"></i> Mon Compte</a>
					<a class="dropdown-item" href="<?php echo base_url("common/logout") ?>"><i class="dw dw-logout"></i> Deconnexion</a>
				</div>
			</div>
		</div>
	</div>
</div>