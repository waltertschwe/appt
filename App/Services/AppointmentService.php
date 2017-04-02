<?php

namespace App\Services;

use App\Models\Appointments;
use App\Models\AppointmentsQuery;
use App\Models\UserQuery;

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
		
		// TODO: foreign key for user hardcoded to first user generated
		// this would switch to the session user when authentication is added
		$appointment->setUserId(1);
		$appointment->setAppointmentDateTime( $data["date-range"] );
		$appointment->setAppointmentDetails( $data["appt-detail"] );
		
		$date = new \DateTime();
		$appointment->setCreatedAt($date->getTimestamp());
		$appointment->setUpdatedAt($date->getTimestamp());
		
		$appointment->save();
	}
	
	/* getAllAppointments - gets all appointments for an individual user
	 * 
	 * 
	 */
	public function getAllAppointments() {
		// TODO: hardcoding to the first generated user
		//would make this dynamic by adding authentication and using session object
		//$query = new UserQuery();
		$user = UserQuery::create()->findOneByUserId( 1 );
		
		// get all appoinments by users foreign key
		$appointments = AppointmentsQuery::create()
			->filterByUser( $user )
			->find();
		
		return $appointments;
	}	
	
	public function getAppointment( $args ) {
		$appointmentId = $args['id'];
		
		$appointment = AppointmentsQuery::create()->findOneByAppointmentId( $appointmentId );
		
		// php7 null coalesce operator
		return $appointment ?? false;
		
	}
	
	public function updateAppointment( $data ) {
		$appointmentId = $data['appointment-id'];
	
		$appointment = AppointmentsQuery::create()->findOneByAppointmentId( $appointmentId );
		
		$appointment->setAppointmentDateTime( $data['date-range'] );
		$appointment->setAppointmentDetails( $data['appt-details'] );
		
		$appointment->save();
		
		return $appointmentId;
	
	}
}
	