<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Common\LandingPage::index');


//Connexion interface administrateur
$routes->get('/', 'Common\Login::index');
$routes->get('/', 'Common\Login::forgotpassword');
$routes->get('/', 'Common\Login::reset_password');
$routes->get('/', 'Common\Login::activation');

//Dashboard administrateur
$routes->get('/', 'Common\Dashboard::index');
$routes->get('/', 'Common\Dashboard::profil');
$routes->get('/', 'Common\Dashboard::password_update');
$routes->get('/', 'Common\Dashboard::update_informations');
$routes->get('/', 'Common\Dashboard::add_admin');
$routes->get('/', 'Common\Dashboard::list_admin');
$routes->get('/', 'Common\Dashboard::add_categories');
$routes->get('/', 'Common\Dashboard::add_orders');

$routes->post('/', 'Common\LandingPage::contactus');

//erreur 404 
$routes->set404Override(function() {
    echo view('backend/layout/error404');
     });

