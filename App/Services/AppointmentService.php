<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\AppointmentQuery;

class AppointmentService
{
	/*
	 * setDateTimeRange - sets the initial Date Time Range
	 * 					  for appointments
	*/
	public function setDateTimeRange() {
		$currentDateTime = new \DateTime();
		
		$range = $currentDateTime->format("m/d/Y H:00 A") . " - " . $currentDateTime->format("m/d/Y H:00 A");
		
		return $range;
	}

	/*
	 * handleCreate - process POST request of Appointment
	 * 				  create Request* 
	*/
	public function handleCreate( $data ) {
		$appointment = new Appointment();
		
		$appointment->set
	}	
		
}
	