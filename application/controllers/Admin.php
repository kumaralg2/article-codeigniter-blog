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

	public function sendemail()
	{
	 $this->form_validation->set_rules('username','User Name','required|alpha');
	 $this->form_validation->set_rules('password','Password','required|max_length[12]');
	 $this->form_validation->set_rules('firstname','First Name','required|alpha');
	 $this->form_validation->set_rules('lastname','last Name','required|alpha');
	 $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
	 $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	 if($this->form_validation->run())
	 {
	//        $post=$this->input->post(); 
	//      $this->load->model('loginmodel','user');
	//      if($this->user->add_user($post))
	//      {
	// 	$this->session->set_flashdata('user','User added successfully');
	// 	$this->session->set_flashdata('user_class','alert-success');
	//      }
	//      else
	//      {
	//        $this->session->set_flashdata('user','User not added Please try again!!');
	//        $this->session->set_flashdata('user_class','alert-danger');
	//      }
	//      return redirect('users/register');
	   $this->load->library('email'); 
	   $this->email->from(set_value('email'),set_value('fname'));
	   $this->email->to("kumar.alg2@gmail.com");
	   $this->email->subject("Registratiion Greeting..");
       
	   $this->email->message("Thank  You for Registratiion");
	   $this->email->set_newline("\r\n");
	  // $this->email->send();
       
	    if (!$this->email->send()) {
	   show_error($this->email->print_debugger()); }
	 else {
	   echo "Your e-mail has been sent!";
	 
	 }
	   }
	 else
	 {
	  $this->load->view('Admin/register');
	 }
	}


}
