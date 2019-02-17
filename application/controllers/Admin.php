<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct(){
		parent::__construct();
    }
    
	public function index()
	{
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');		
		if ($this->form_validation->run())
                {
		  //fetching values from form
		  $uname = $this->input->post('username');
		  $pass = $this->input->post('password');
		  $this->load->model('login_model');		  
		  if($this->login_model->isvalidate($uname,$pass)){
		    //logic correct
		    echo "data matched";
		  }else{
		    //logic failed
		    echo "data not matched";
		    
		  }
		  
		}
                else
                {
                        $this->load->view('Admin/login');
                }
	}
}
