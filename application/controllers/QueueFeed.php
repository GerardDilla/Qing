<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QueueFeed extends MY_Controller {

	function __construct() {

        parent::__construct();

		$this->load->library('set_views');
		$this->data['Module_title'] = 'SDMC QUEUING SYSTEM';
		$this->load->model('Queueing_Model');

        
  }
	public function index()
	{
			$this->QueueFeed();

	}

	public function QueueFeed(){

		$this->load->view('Layout/QueueFeed');

	}
	public function FeedContents(){

		$result = $this->Queueing_Model->session_list();
		echo json_encode($result);

	}
	public function Kiosk(){

		$this->load->view('Layout/PrintKiosk');

	}
	public function OnlineKiosk(){

		$this->load->view('Layout/OnlineKiosk');

	}
	public function print_process($session_id = ''){

		$array['session_id'] = $session_id;
		if(($this->Queueing_Model->queue_plus_count($array)) === TRUE){
			$this->data['data'] = $this->Queueing_Model->session_info($array)['array'];
			$this->load->view('Layout/PrintProcessing');
		}else{
			echo 'Error: in print_process';
		}
		
	}
	public function session_info(){

		$array['session_id'] = $this->input->get('session_id');
		$result = $this->Queueing_Model->session_info($array)['array'];
		echo json_encode($result);

	}
	public function add_queue(){
		$array['session_id'] = $this->input->get('session_id');
		if(($this->Queueing_Model->queue_plus_count($array)) === TRUE){
			echo 1; 
		}else{
			echo 0; 
		}
	}





}
