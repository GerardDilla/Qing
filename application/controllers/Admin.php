<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct() {

        parent::__construct();

		$this->load->library('set_views');
		$this->data['Module_title'] = 'WELCOME!';
        
    }
	public function index()
	{
		$this->Home();
	}
	public function Home()
	{
		$this->AdminTemplate($this->set_views->homepage());
	}
	public function AddBooth()
	{
		$this->data['Module_title'] = 'ADD BOOTH';
		$this->AdminTemplate($this->set_views->add_booth_form());
	}

}
