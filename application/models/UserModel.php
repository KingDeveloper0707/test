<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserModel extends CI_Model{

    public function __construct()
    {
            $this->load->database();
    }
 
    //user login section
	public function check($data){
        $sql = "SELECT `user_name` FROM user WHERE `user_email`='".$data['user_email']."' AND `user_password`='".$data['user_password']."' ";
        $query = $this->db->query($sql);

        foreach ($query->result() as $row)
        {
                echo $row->user_name;
        }

    }

    //check same email
    public function email_check($data){

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_email',$data['user_email']);
        $query=$this->db->get();

        if($query->num_rows()>0){
            return false;
        }else{
            return true;
        }

    }

    // user register section
    public function register_user($data){
     
        if($this->db->insert('user', $data))
        {
            // Code here after successful insert
            return true;   // to the controller
        }else{
            return false;
        }


    }
 
		
	
}  
?>