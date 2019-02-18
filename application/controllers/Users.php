<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct(){
        parent::__construct();
    }
    
	public function index()
	{
		$this->load->view('Users/article_list');
	}
	public function register()
	{
	$this->load->view('Admin/register');
	}
}
