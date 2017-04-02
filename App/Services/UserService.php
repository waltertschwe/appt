<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserQuery;

class UserService
{
	public function getUser( $args ) {
		$userId = $args['id'];
		
		$user = UserQuery::create()->findOneByUserId( $userId );
		
		// php7 null coalesce operator
		return $user ?? false;
		
	}
	
	/*
	 * update User - process POST request and update user profile
	 * 
	 */
	public function updateUser( $data ) {
		$userId = $data['user-id'];
		
		// update user
		$user = UserQuery::create()->findOneByUserId( $userId );
		
		$user->setFirstName( $data['first-name'] );
		$user->setLastName( $data['last-name'] );
		$user->save();
		
		return $userId;
	}
	/*
	 * createTestUser - inserts test user into db
	 *
	*/
	public function createTestUser() {
		$user = new User();
		$user->setFirstName("Walter");
		$user->setLastName("Schweitzer");
		
		$date = new \DateTime();
		$user->setCreatedAt($date->getTimestamp());
		$user->setUpdatedAt($date->getTimestamp());
		
		$user->save();
		
		// get new User Id
		$userId = $user->getUserId();
		
		return $userId;
	}
	
}
