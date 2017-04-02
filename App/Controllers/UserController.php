<?php

namespace App\Controllers;

use App\Models\User;

class UserController 
{
	private $view; 
	private $db;
	private $userService;
	
	public function __construct( $view, $db, $userService ) {
		$this->view = $view;
		$this->db = $db;
		$this->user_service = $userService;
	}
	
	public function getProfile( $request, $response, $args ) {
		// get User Data
		$userData = $this->user_service->getUser( $args );
		
		// response to return to view
		$response = $this->view->render( $response, "user-profile.phtml", ["user" => $userData] );
		return $response;
	}
	
	public function updateProfile( $request, $response, $args ) {
		// get data from POST request
		$data = $request->getParsedBody();
		
		// update user
		$userId = $this->user_service->updateUser( $data );
		
		// redirect to user profile
		$response = $response->withRedirect("/user/profile/" . $userId);
		return $response;
		
	}
	
	public function insertTestUser( $request, $response ) {
		// call service to insert test user
		$userId = $this->user_service->createTestUser();
		
		$response = $response->withRedirect("/user/profile/" . $userId);
		return $response;
	}
}
