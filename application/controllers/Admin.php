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
	public function long_polling(){
		$this->load->view('Layout/long_polling_test');
	}
	public function msgsrv(){

		$current_count = $this->input->get('result_count');
		$result = $this->Queueing_Model->session_list();
		if($current_count == '' || $current_count == 0){
			$array = array(
				'count' => count($result),
				'result' => $result,
			);
			echo json_encode($array);
			return;
		}

		while(count($result) == $current_count){

			$result = $this->Queueing_Model->session_list();
			sleep(3);
		}
		$array = array(
			'count' => count($result),
			'result' => $result,
		);
		echo json_encode($array);
		return;
		
	}



}
