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
	public function add_account_form(){

		return $this->body.'/add_account_form';
		
	}
	public function account_settings(){

		return $this->body.'/account_settings';
		
	}
	public function sessionhandler(){

		return $this->body.'/sessionhandler';
		
	}
	public function countermanagement(){

		return $this->body.'/countermanagement';
		
	}


	
	

}
