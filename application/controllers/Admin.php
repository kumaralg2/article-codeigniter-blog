<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	//for session to work you have to use construct
	public function __construct(){
        parent::__construct();
    }
    
	public function login()
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
		  $id = $this->login_model->isvalidate($uname,$pass);	 

		  if($id){
		    //logic correct
		    //echo "data matched";
		    //saving the id session in a session
		    $this->load->library('session');
		    $this->session->set_userdata('id',$id);
		//     $this->load->view('Admin/dashboard');
		    return redirect('Admin/welcome');
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

	public function welcome(){
		$this->load->model('login_model');
		$articles = $this->login_model->articleList();
		$this->load->view('Admin/dashboard',['articles'=>$articles]);
	}
}
