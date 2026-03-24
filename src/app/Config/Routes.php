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

$routes->put('/api/users/(:num)', 'UserController::update/$1');

$routes->delete('/api/users/(:num)', 'UserController::delete/$1');

$routes->get('/teste2/(:any)', 'Teste2Controller::teste2/$1');

$routes->get('/laboratorio', 'Teste2Controller::laboratorio');

$routes->get('/seguranca/relatorio', 'Teste2Controller::relatorio');

$routes->post('/seguranca/disparar', 'Teste2Controller::dispararScan');

$routes->get('/users', 'Users::index');

$routes->get('/users/(:num)', 'Users::show/$1');

$routes->get('/api/users', 'UserController::index');

$routes->get('/api/users/(:num)', 'UserController::show/$1');

$routes->post('/api/users', 'UserController::store');

$routes->put('/api/users/(:num)', 'UserController::update/$1');