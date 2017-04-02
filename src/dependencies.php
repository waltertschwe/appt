<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

//database
$container['pdo'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
        $db['user'], $db['password']);
		
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container['view'] = new Slim\Views\PhpRenderer("templates/");

// User Service 
$container['App\Services\UserService'] = function ($c) {
	$userService = new App\Services\UserService();
	return $userService;
};

// Appointment Service 
$container['App\Services\AppointmentService'] = function ($c) {
	$apptService = new App\Services\AppointmentService();
	return $apptService;
};

// Appointment Controller
$container['App\Controllers\AppointmentController'] = function ($c) {
	$apptService = $c->get('App\Services\AppointmentService');
	return new App\Controllers\AppointmentController( $c['view'], $c['pdo'], $apptService );
};

// Users Controller
$container['App\Controllers\UserController'] = function ($c) {
	$userService = $c->get('App\Services\UserService');
	return new App\Controllers\UserController( $c['view'], $c['pdo'], $userService );
};

