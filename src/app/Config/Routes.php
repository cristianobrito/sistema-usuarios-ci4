<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/health', function(){
    return 'API ok! - codeigniter esta vivo! ola mundo!';
});

$routes->get('/home', 'HomeController::index');

$routes->get('/login', 'UsersController::login');

$routes->get('/register', 'RegisterController::register');

$routes->get('/dashboard/(:any)', 'DashboardController::dashboard/$1');

$routes->get('/user/(:any)', 'UsersController::profile/$1');

$routes->get('/teste/(:any)', 'TesteController::teste/$1');

$routes->get('/teste2/(:any)', 'Teste2Controller::teste2/$1');

$routes->get('/laboratorio', 'Teste2Controller::laboratorio');

$routes->get('/seguranca/relatorio', 'Teste2Controller::relatorio');

$routes->post('/seguranca/disparar', 'Teste2Controller::dispararScan');