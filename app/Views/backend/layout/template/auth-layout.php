
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>BEAUTY FASHION | ESPACE ADMINISTRATEUR</title>

		<!-- Site favicon -->
		<link
			rel="icon"
			type="image/png"
			href=<?php echo base_url("/backend/vendors/images/favicon.ico") ?>
		/>
		

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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("/backend/vendors/styles/core.css") ?>" />
		<link
			rel="stylesheet"
			type="text/css"
			href="<?php echo base_url("/backend/vendors/styles/icon-font.min.css") ?>"
		/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("/backend/vendors/styles/style.css") ?>" />
		<link href="<?php echo base_url("/bootstrap/bootstrap.min.css") ?>" rel="stylesheet">
  		<script src="<?php echo base_url("/bootstrap/bootstrap.min.js") ?>"></script>
        <?= $this->renderSection('stylesheets') ?>
	</head>
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo"> <a href="<?php echo base_url("/common/login/") ?>"><h4 class="text-primary mt-3">Espace Administrateur</h4></a></div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-md-6 col-lg-7">
                        <?= $this->renderSection('content')?> 
					</div>
				</div>
			</div>
		</div>
		
		<!-- js -->
		<script src="<?php echo base_url("/backend/vendors/scripts/core.js") ?> "></script>
		<script src="<?php echo base_url("/backend/vendors/scripts/script.min.js") ?> "></script>
		<script src="<?php echo base_url("/backend/vendors/scripts/process.js") ?> "></script>
		<script src="<?php echo base_url("/backend/vendors/scripts/layout-settings.js") ?> "></script>
        <?= $this->renderSection('scripts')?>
	</body>
</html>
