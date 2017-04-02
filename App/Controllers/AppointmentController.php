<?php

namespace App\Controllers;

class AppointmentController 
{
	private $view; 
	private $db;
	private $apptService;
	
	public function __construct( $view, $db, $apptService ) {
		$this->view = $view;
		$this->db = $db;
		$this->appt_service = $apptService;
	}
	
	/*
	 * create - Create Appointment
	 * 
	*/
	public function create( $request, $response ) {
		// set initial date/time range for appointments
		$dateRange = $this->appt_service->setDateTimeRange();
		
		$response = $this->view->render( $response, "appointment-create.phtml", 
										["dateRange" => $dateRange] );
		return $response;
	}
	
	public function postAppointment( $request, $response, $args) {
		// get data from POST request
		$data = $request->getParsedBody();
		
		$this->appt_service->handleCreate( $data );
		
		$response = $response->withRedirect("/appointment/create");
		return $response;
	}
	
	/*
	 * getAppointments - Get All Apointments By User
	 * 
	*/
	public function getAppointments($request, $response) {
		$response = $this->view->render( $response, "appointment-index.phtml" );	
		return $response;
	}
	
	/*
	 * info - Get Environment INFO
	 * 
	*/
	public function info($request, $response) {
		phpinfo();
	}
}
