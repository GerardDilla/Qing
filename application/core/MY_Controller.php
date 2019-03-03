<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $template = array();
    public $data = array();
    public $body = '';
    public $layout = 'Layout/';

	function __construct() {

        parent::__construct();

        $this->load->helper(array('form', 'language', 'url'));

        //Layout Directory, Starting from view folder. add '/' at the end
        
        
    }
    public function AdminTemplate($body = '')
    {

        if ($body == '')
        {
            $body = $this->body;
        }

      //  $this->data['admin_data'] = $this->set_custom_session->navbar_session();

           $this->template['header'] = $this->load->view($this->layout.'Header.php', $this->data, true);
           $this->template['navbar'] = $this->load->view($this->layout.'Navbar.php', $this->data, true);
           $this->template['sidebar'] = $this->load->view($this->layout.'Sidebar.php', $this->data, true);
           $this->template['body'] = $this->load->view($body, $this->data, true);
           $this->template['footer'] = $this->load->view($this->layout.'Footer.php', $this->data, true);
           $this->load->view($this->layout.'Template', $this->template);
    }
    public function title($msg){ 
        $this->data['Module_title'] = $msg;
    }
    public function message($msg){
		$this->session->set_flashdata('message',$msg);
    }
    public function logout()
    {
        $this->session->unset_userdata('token');
        redirect('Login','refresh');
    }

		

	
	
	
	
	
}
?>