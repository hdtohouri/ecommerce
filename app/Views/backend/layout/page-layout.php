
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>BEAUTYFASHION | ESPACE ADMINISTRATEUR</title>

		<!-- Site favicon -->
		
		<link
			rel="icon"
			type="image/png"
			href=<?php echo base_url("/backend/vendors/images/favicon.ico") ?>
		/>
		
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
		<script src=<?php echo base_url("/frontend/js/jquery-3.3.1.min.js") ?>></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href=<?php echo base_url("/backend/vendors/styles/core.css") ?>/>
		<link
			rel="stylesheet"
			type="text/css"
			href=<?php echo base_url("/backend/vendors/styles/icon-font.min.css") ?>
		/>
		<link rel="stylesheet" type="text/css" href=<?php echo base_url("/backend/vendors/styles/style.css") ?> />
		
        <?= $this->renderSection('stylesheets') ?>
	</head>
	<body>
	

    <?php include('template/header.php') ?>

	<?php include('template/right-sidebar.php') ?>
    <?php include('template/left-sidebar.php') ?>
		
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div>
                        <?= $this->renderSection('content')?> 
                    </div>
				</div>
				<?php include('template/footer.php') ?>
			</div>
		</div>
		
		<!-- welcome modal end -->
		<!-- js -->
		<script src=<?php echo base_url("/backend/vendors/scripts/core.js") ?> ></script>
		<script src=<?php echo base_url("/backend/vendors/scripts/script.min.js") ?> ></script>
		<script src=<?php echo base_url("/backend/vendors/scripts/process.js") ?> ></script>
		
		<script src=<?php echo base_url("/backend/vendors/scripts/layout-settings.js") ?> ></script>
        <?= $this->renderSection('scripts')?> 
	</body>
</html>
