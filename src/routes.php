<?php
// Routes

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

// Get environment Info
$app->get('/info/', 'App\Controllers\AppointmentController:info');

// Basic User Profile
$app->get('/user/profile/[{id}]', 'App\Controllers\UserController:getProfile');

// Update Profile
$app->post('/user/profile','App\Controllers\UserController:updateProfile');

// Create Random Test User
$app->get('/user/insert-test-user', 'App\Controllers\UserController:insertTestUser');

// Appointments Get All
$app->get('/appointments/', 'App\Controllers\AppointmentController:getAppointments');

// Appointment Create
$app->get('/appointment/create', 'App\Controllers\AppointmentController:create');

// Handle Appointment Create
$app->post('/appointment/create', 'App\Controllers\AppointmentController:postAppointment');

// Handle Appointment Create
$app->get('/appointment/[{id}]', 'App\Controllers\AppointmentController:getAppointment');

// Update Appointment
$app->post('/appointment/', 'App\Controllers\AppointmentController:updateAppointment');

// Delete Appointment
$app->post('/appointment/delete', 'App\Controllers\AppointmentController:deleteAppointment');







