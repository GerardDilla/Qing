<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class set_views 
{
	public function __construct()
	{
			$this->body = 'Body';
	}
	public function homepage()
	{
		return $this->body.'/homepage';
	}
	public function queuefeed()
	{
		return $this->body.'/queuefeed';
	}
	public function add_booth_form(){

		return $this->body.'/add_booth_form';
		
	}
<<<<<<< HEAD
	public function add_account_form(){

		return $this->body.'/add_account_form';
		
	}
	public function sessionhandler(){

		return $this->body.'/sessionhandler';
		
	}

	
=======
>>>>>>> 737b3fec89a2187ad5259897f1919b591651df82
	

}
