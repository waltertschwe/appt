<?php

namespace App\Services;

use App\Models\Appointments;
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
		$appointment = new Appointments();
		
		$appointment->setUserId(1);
		$appointment->setAppointmentDateTime( $data["date-range"] );
		$appointment->setAppointmentDetails( $data["appt-detail"] );
		
		$date = new \DateTime();
		$appointment->setCreatedAt($date->getTimestamp());
		$appointment->setUpdatedAt($date->getTimestamp());
		
		
		$appointment->save();
	}	
		
}
	