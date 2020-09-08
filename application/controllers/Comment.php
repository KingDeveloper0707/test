<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Comment extends CI_Controller { 
        function __construct() {
            parent::__construct(); 
            $this->load->model('CommentModel');
	}
	public function index(){

		$data = array();
		//form-add comment
		if(isset($_POST['add']))
		{	

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('mobile','Mobile Number',
                        'required|exact_length[10]|numeric');
			$this->form_validation->set_rules('email','Email Address',
                        'required|valid_email');
			$this->form_validation->set_rules('comment','Comment','required');

			if($this->form_validation->run() == TRUE)
			{
				$input = ["c_guest_name" => $_POST['name'],
				"c_guest_mobile" => $_POST['mobile'],
				"c_guest_email" => $_POST['email'],
				"c_comment" => $_POST['comment'],
				];

				$this->CommentModel->insert($input);
				redirect('comment/index');
			}
			
		}
		//form-add comment

		

		//all comments
		$data['comments'] = $this->all_comments();
		
		$this->load->view('v_comment',$data);
	}
	public function all_comments()
	{
		//fetch comment
		$comments = $this->CommentModel->fetch_comments();
		$html_comments = $this->CommentModel->html_comments($comments);
		return $html_comments;
		//fetch comment
	}
	public function reply()
	{

		
	     $this->form_validation->set_rules('name','Name','required');
	     $this->form_validation->set_rules('mobile','Mobile Number','required|exact_
             length[10]|numeric');
	     $this->form_validation->set_rules('email','Email Address','required|valid_
             email');
	     $this->form_validation->set_rules('comment','Comment','required');

			if($this->form_validation->run() == TRUE)
			{
				$input = ["c_guest_name" => $_POST['name'],
				"c_guest_mobile" => $_POST['mobile'],
				"c_guest_email" => $_POST['email'],
				"c_comment" => $_POST['comment'],
				'c_parent_id' => $_POST['parent'],
				];

				$this->CommentModel->insert($input);
				$data['comments'] = $this->all_comments();
				$data['result'] = true;
			}
			else{

				$data['errors'] = validation_errors();
				$data['result'] = false;
			}
			echo json_encode($data);
	}
}