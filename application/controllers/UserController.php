<?php

class UserController extends CI_Controller {

    public function __construct(){

            parent::__construct();
            $this->load->helper('url');
            $this->load->model('UserModel');
            $this->load->library('session');

    }

    public function dologin(){
               
        $user_name = $this->UserModel->check($_POST);

        if( $user_name !=''){
            echo $user_name;
        }
    }

    public function doregister(){
    
        if($this->UserModel->register_user($_POST)){
            echo 1;
        }
        else{
            echo 0;
        }
    }

    public function do_email_check(){

        if($this->UserModel->email_check($_POST)){
            echo 1;
        }
        else{
            echo 0;
        } 
    }


}

?>