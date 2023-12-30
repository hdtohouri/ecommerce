<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="BEAUTYFASHION">
    <meta name="keywords" content="pret a porter, accessoires, vetemements, mode">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BEAUTY FASHION</title>  

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    
    <link rel="icon" type="image/png" href=<?php echo base_url("/frontend/img/favicon.ico") ?>/>
    <link rel="stylesheet" href=<?php echo base_url("/frontend/css/bootstrap.min.css") ?> type="text/css">
    <link rel="stylesheet" href=<?php echo base_url("/frontend/css/font-awesome.min.css") ?> type="text/css">
    <link rel="stylesheet" href=<?php echo base_url("/frontend/css/elegant-icons.css") ?> type="text/css">
    <link rel="stylesheet" href=<?php echo base_url("/frontend/css/jquery-ui.min.css") ?> type="text/css">
    <link rel="stylesheet" href=<?php echo base_url("/frontend/css/owl.carousel.min.css") ?> type="text/css">
    <link rel="stylesheet" href=<?php echo base_url("/frontend/css/slicknav.min.css") ?> type="text/css">
    <link rel="stylesheet" href=<?php echo base_url("/frontend/css/style.css") ?> type="text/css">
    <link rel="stylesheet" href="<?php echo base_url("/frontend/css/whatsapp.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("frontend/css/nice-select") ?>">
    <link rel="stylesheet" href=<?php echo base_url("backend/src/plugins/sweetalert2/sweetalert2.css") ?> type="text/css">
    <link rel="stylesheet" type="text/css" href=<?php echo base_url("/backend/vendors/styles/icon-font.min.css") ?>/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <?= $this->renderSection('stylesheets') ?>
</head>

<body>
    
    <?php include('template/header.php') ?>   

    
    
    <section id="whatapps">
        <div id="whatsapp">
            <a href="https://wa.me/24177244605" aria-label="Whats App" target="_blank" id="toggle1" class="wtsapp"><i class="fa fa-whatsapp"></i></a>    
        </div>
    </section>


    <?= $this->renderSection('content')?> 

    <!-- Footer Section Begin -->
    <?php include('template/footer.php') ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src=<?php echo base_url("/frontend/js/jquery-3.3.1.min.js") ?>></script>
    <script src=<?php echo base_url("/backend/src/plugins/sweetalert2/sweetalert2.all.js") ?>></script>
    <script src=<?php echo base_url("frontend/js/jquery.nice-select.min.js") ?>></script>
    <script src=<?php echo base_url("/frontend/js/jquery-ui.min.js") ?>></script>
    <script src=<?php echo base_url("/frontend/js/jquery.slicknav.js") ?>></script>
    <script src=<?php echo base_url("/frontend/js/mixitup.min.js") ?>></script>
    <script src=<?php echo base_url("/frontend/js/owl.carousel.min.js") ?>></script>
    <script src=<?php echo base_url("/frontend/js/main.js") ?>></script>
    <script src=<?php echo base_url("/frontend/js/bootstrap.min.js") ?>></script>
    <script src=<?php echo base_url("/frontend/js/bootstrap.bundle.min.js") ?>></script>
    <?= $this->renderSection('scripts')?> 
</body>

</html>