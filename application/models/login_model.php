<?php
class login_model extends CI_Model
{
  public function isvalidate($username,$password){
      $q = $this->db->where(['username'=>$username,'password'=>$password])
                    ->get('users');
    // echo "<pre>";
    // print_r($q);
    //select * from users where username=$username and password=$password;
      if($q->num_rows()){
       return TRUE;
      }else{
       return FALSE;
      }
  }
}