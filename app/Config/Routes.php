<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('', ['filter' => 'guest'], function ($routes) {
    $routes->get('login', 'LoginAlumnoController::index', ['as' => 'login']);
    $routes->post('login', 'LoginAlumnoController::login', ['as' => 'login']);
    $routes->get('registro', 'Alumno\RegistroAlumnoController::index');
    $routes->post('registrar', 'Alumno\RegistroAlumnoController::create');
});

$routes->get('logout', 'LoginAlumnoController::logout', ['as' => 'logout']);
//modulos

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('modulo_1', 'Modulos\Modulo1Controller::index', ['as' => 'modulo_1']);
    $routes->get('modulo_2', 'Modulos\Modulo2Controller::index', ['as' => 'modulo_2']);
    $routes->get('modulo_3', 'Modulos\Modulo3Controller::index', ['as' => 'modulo_3']);
    $routes->get('modulo_4', 'Modulos\Modulo4Controller::index', ['as' => 'modulo_4']);
    $routes->get('modulo_5', 'Modulos\Modulo5Controller::index', ['as' => 'modulo_5']);
});
