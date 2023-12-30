<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

//Interface utilisateur
$routes->get('/', 'Common\LandingPage::index');
$routes->get('/contactus', 'Common\LandingPage::contactus');
$routes->get('/products', 'Common\LandingPage::products');
$routes->get('/favoris', 'Common\favoris::favoris');
$routes->get('/shoppingcart', 'Common\favoris::shoppingcart');

//Connexion interface administrateur
$routes->get('/', 'Common\Adminspace\Connexion::index');
$routes->get('/forgotpassword', 'Common\Adminspace\Connexion::forgotpassword');
$routes->get('/reset_password', 'Common\Adminspace\Connexion::reset_password');
$routes->get('/activation', 'Common\Adminspace\Connexion::activation');

//Dashboard administrateur
$routes->get('/', 'Common\Adminspace\Dashboard::index');
$routes->get('/profil', 'Common\Adminspace\Dashboard::profil');
$routes->post('/password_update', 'Common\Adminspace\Dashboard::password_update');
$routes->post('/update_informations', 'Common\Adminspace\Dashboard::update_informations');
$routes->post('/add_admin', 'Common\Adminspace\Dashboard::add_admin');
$routes->get('/list_admin', 'Common\Adminspace\Dashboard::list_admin');
$routes->get('/list_customers', 'Common\Adminspace\Dashboard::list_customers');
$routes->get('/list_product', 'Common\Adminspace\Dashboard::list_product');
$routes->post('/add_categories', 'Common\Adminspace\Dashboard::add_categories');
$routes->post('/add_product', 'Common\Adminspace\Dashboard::add_product');
$routes->get('/add_orders', 'Common\Adminspace\Dashboard::add_orders');
$routes->get('/message', 'Common\Adminspace\Dashboard::message');
$routes->get('/manage_orders', 'Common\Adminspace\Dashboard::manage_orders');
$routes->get('/read_message', 'Common\Adminspace\Dashboard::read_message');
$routes->post('/add_profil_pic', 'Common\Adminspace\Dashboard::add_profil_pic');
$routes->get('/print', 'Common\Adminspace\Dashboard::print');
$routes->get('/update_categories', 'Common\Adminspace\Dashboard::update_categories');



//erreur 404 
$routes->set404Override(function() {
    echo view('backend/layout/error404');
     });

