<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct() {

        parent::__construct();

		$this->load->library('set_views');
		$this->data['Module_title'] = 'SDMC QUEUING SYSTEM';
		$this->load->model('Queueing_Model');

		if(!$this->session->userdata('token')){
			$this->message('Login First');
			redirect('Login','refresh');
		}
        
  }
	public function index()
	{
			$this->Home();

	}
	public function Home()
	{
		$this->AdminTemplate($this->set_views->homepage());
	}
	public function AddCounter(){

		$this->title('ADD COUNTER');
		$this->data['List'] = $this->Queueing_Model->account_list();
		$this->AdminTemplate($this->set_views->add_booth_form());
	}
	public function add_counter(){

		$button = $this->input->post('button');
		if(isset($button)){
			$array = array(
				'Counter' => $this->input->post('counter'),
				'Department' => $this->input->post('counterdept')
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

		$this->title('REGISTER ACCOUNT');
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
	public function MyAccount(){

		$this->title('ACCOUNTS');
		$array['accountID'] = $this->session->userdata('accountID');
		$this->data['Data'] = $this->Queueing_Model->account_info($array)['array'];
		$this->AdminTemplate($this->set_views->account_settings());

	}
	public function UpdateAccount(){

		$submit = $this->input->post('submit');
		$msg = '';
		if(isset($submit)){
				$config = array(
						array(
										'field' => 'fullname',
										'label' => 'Fullname',
										'rules' => 'required'
						),
						array(
										'field' => 'username',
										'label' => 'Username',
										'rules' => 'required',
										'errors' => array(
														'required' => 'You must provide a %s.',
										),
						),
						array(
										'field' => 'password',
										'label' => 'Password',
										'rules' => 'required'
						),
						array(
										'field' => 're_password',
										'label' => 'Password',
										'rules' => 'matches[password]',
										'errors' => array(
											'matches' => 'Passwords Did not Match',
										),
						)
				);

			$this->form_validation->set_rules($config);

			if($this->form_validation->run() == FALSE)
			{
					$msg = validation_errors();
					
			}
			else
			{
					$array = array(
						'accountID' => $this->session->userdata('accountID'),
						'fullname' => $this->input->post('fullname'),
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password')
					);
					if($this->Queueing_Model->update_account($array) == TRUE){
						$msg = 'Account Updated!';
					}else{
						$msg = 'Error in Updating Account';
					}

			}


			$this->session->set_flashdata('message',$msg);
			redirect($this->router->fetch_class().'/MyAccount','refresh');
		}

	}
	public function Sessions(){

		$this->title('QUEUE SESSIONS');
		$this->data['List'] = $this->Queueing_Model->counter_list();
		$this->data['Sessions'] = $this->Queueing_Model->session_list();
		$this->AdminTemplate($this->set_views->sessionhandler());

	}
	public function ManageSession($session_id = ''){

		$this->title('MANAGE SESSION: '.$session_id);

		$array = array(

			'session_id' => $session_id,

		);
		$this->data['Data'] = $this->Queueing_Model->session_info($array);
		if($this->data['Data']['count'] != 0){
			//echo $this->data['Data']['array'][0]['Counter'];
			$this->load->view('Layout/SessionManageTemplate');
		}else{
			echo '<h1>Please Select a Session in the Manage Session page</h2>';
		}
		
		//$this->AdminTemplate($this->set_views->sessionhandler());
	}
	public function custom_queue(){
		$value = $this->input->get('custom_queue');
		$id = $this->input->get('session_id');
		$array = array(
			'Count' => $value,
			'session_id' => $id
		);
		if(($this->Queueing_Model->custom_session($array)) === TRUE){
			echo 1;
		}
		
	}
	public function plus_queue(){

		$id = $this->input->get('session_id');
		$array = array(
			'session_id' => $id
		);
		if(($this->Queueing_Model->session_plus_count($array)) === TRUE){
			echo 1;
		}
		
	}
	public function minus_queue(){

		$id = $this->input->get('session_id');
		$array = array(
			'session_id' => $id
		);
		if(($this->Queueing_Model->session_minus_count($array)) === TRUE){
			echo 1;
		}
		
	}
	public function refresh_queue(){

		$id = $this->input->get('session_id');
		$array = array(
			'session_id' => $id
		);
		$result = $this->Queueing_Model->session_info($array);
		if($result['count'] != 0){
			echo json_encode($result['array']);
		}else{
			echo 0;
		}
		
	}
	public function add_session(){

		$array = array(

			'countID' => $this->input->post('countID'),
			'accountID' => $this->session->userdata('accountID')

		);
		if(($this->Queueing_Model->validate_duplicate_session($array)) != 0){
			$this->message('Counter Already has an Active Session');
			redirect($this->router->fetch_class().'/Sessions','refresh');
		}
		if($this->Queueing_Model->insert_session($array)){
			$this->message('Session Activated!');
		}else{
			$this->message('Encountered Error in Activating Session');
		}
		redirect($this->router->fetch_class().'/Sessions','refresh');

	}
	public function remove_session(){

		$array = array(

			'session_id' => $this->input->post('session_id')

		);
		if(($this->Queueing_Model->deactivate_session($array)) === TRUE){
			$this->message('Session Ended');
		
		}
		redirect($this->router->fetch_class().'/Sessions','refresh');

	}




}
