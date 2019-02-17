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
		$this->form_validation->set_rules('password', 'Password', 'required|max_length(12)');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');		
		if ($this->form_validation->run())
                {
                        echo "validation success";
                }
                else
                {
                        $this->load->view('Admin/login');
                }
	}
}
