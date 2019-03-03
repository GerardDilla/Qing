<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct() {

        parent::__construct();

		$this->load->library('set_views');
		$this->data['Module_title'] = 'SDMC QUEUING SYSTEM';
		$this->load->model('Queueing_Model');

		if($this->session->userdata('token')){
			redirect('Admin','refresh');
		}
        
  }
	public function index()
	{
			$this->Login();

	}
	public function Login(){

		$this->load->view('Layout/LoginTemplate');
		$submit = $this->input->post('submit');
		if(isset($submit)){
			$this->Login_check();
		}

	}
	private function Login_check(){
		$array = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);
		$result = $this->Queueing_Model->validate_login($array);

		if($result['count'] != 0){
			$this->set_login_session($result['array']);
			redirect('Admin','refresh');
		}else{
			$this->message('Invalid Username/Password');
			redirect('Login','refresh');
		}

	}
	private function set_login_session($array){

		$token = array(
			'accountID' => $array[0]['accountID'],
			'fullname' => $array[0]['fullname'],
			'username' => $array[0]['username'],
			'token' => 1
		);
		$this->session->set_userdata($token);

	}
	


}
