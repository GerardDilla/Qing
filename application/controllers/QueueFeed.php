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




}
