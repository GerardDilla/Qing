<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct() {

        parent::__construct();

		$this->load->library('set_views');
<<<<<<< HEAD
		$this->data['Module_title'] = 'SDMC QUEUING SYSTEM';
		$this->load->model('Queueing_Model');
=======
		$this->data['Module_title'] = 'WELCOME!';
>>>>>>> 737b3fec89a2187ad5259897f1919b591651df82
        
    }
	public function index()
	{
		$this->Home();
	}
	public function Home()
	{
		$this->AdminTemplate($this->set_views->homepage());
	}
<<<<<<< HEAD
	public function AddCounter(){
		$this->data['Module_title'] = 'ADD COUNTER';
		$this->AdminTemplate($this->set_views->add_booth_form());
	}
	public function add_counter(){

		$button = $this->input->post('button');
		if(isset($button)){
			$array = array(
				'Counter' => $this->input->post('counter'),
				'Department' => $this->input->post('counterdept'),
				'accountID' => $this->input->post('counterpersonnel'),
			);
			//Checks duplicates
			if(($this->Queueing_Model->validate_duplicate_counter($array)) != 0){
				$this->message('Counter Name Already Exists!');
				redirect($this->router->fetch_class().'/AddCounter','refresh');
			}
			//Insert to table
			if($this->Queueing_Model->insert_counter($array)){
				$this->message('Counter Added!');
				redirect($this->router->fetch_class().'/AddCounter','refresh');
			}else{
				$this->message('Encountered Error in Adding Counter');
				redirect($this->router->fetch_class().'/AddCounter','refresh');
			}
		}
	}
	public function AddAccount(){
		$this->data['Module_title'] = 'REGISTER ACCOUNT';
		$this->AdminTemplate($this->set_views->add_account_form());
	}
	public function add_account(){
		$button = $this->input->post('button');
		if(isset($button)){
			$array = array(
				'fullname' => $this->input->post('fullname'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			);
			//Checks duplicates
			if(($this->Queueing_Model->validate_duplicate_account($array)) != 0){
				$this->message('Username Already Exists!');
				redirect($this->router->fetch_class().'/AddAccount','refresh');
			}
			//Insert to table
			if($this->Queueing_Model->insert_account($array)){
				$this->message('Account Added!');
				redirect($this->router->fetch_class().'/AddAccount','refresh');
			}else{
				$this->message('Encountered Error in Adding Account');
				redirect($this->router->fetch_class().'/AddAccount','refresh');
			}
		}
	}
	public function Sessions(){
		$this->data['Module_title'] = 'QUEUE SESSIONS';
		$this->data['List'] = $this->Queueing_Model->counter_list();
		$this->AdminTemplate($this->set_views->sessionhandler());
	}
	public function message($msg){
		$this->session->set_flashdata('message',$msg);
		//echo $msg;
	}
=======
	public function AddBooth()
	{
		$this->data['Module_title'] = 'ADD BOOTH';
		$this->AdminTemplate($this->set_views->add_booth_form());
	}
>>>>>>> 737b3fec89a2187ad5259897f1919b591651df82

}
