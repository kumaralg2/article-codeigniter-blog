<?php
class login_model extends CI_Model
{
  public function isvalidate($username,$password){
      $q = $this->db->where(['username'=>$username,'password'=>$password])
                    ->get('users');
    // echo "<pre>";
    // print_r($q);
    //to fetch id in a row
    // print_r($q->row()->id);
    // exit();
    //print_r($q->row()->username);    
    //select * from users where username=$username and password=$password;
      if($q->num_rows())
      {
       return $q->row()->id;
      }else
      {
       return FALSE;
      } 
  }
  
  public function articleList(){
      $this->load->library('session');
      $id = $this->session->userdata('id');
      $this->db->select('article_title');
      $this->db->from('articles');
      $this->db->where(['id', $id]);
      $q=$this->db->get();
    //   print_r($q);
    return $q->result();
      exit;
  }

}