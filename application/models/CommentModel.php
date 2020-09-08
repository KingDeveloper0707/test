<?php class CommentModel extends CI_Model { 
     public function fetch_comments($id = null){ 
                $this->db->select('*');
		if(isset($id) && $id != null)
			$this->db->where('c_parent_id',$id);
		else {
			$this->db->where('c_parent_id',0);
			$this->db->order_by('c_commented_on','desc');
		}

		$this->db->from('tbl_comments');
		return $this->db->get()->result_array();
	}
	public function insert($data){
		$this->db->insert('tbl_comments',$data);
		return true;
	}
	public function get_sub_comments($id)
	{

		$sub_comments = $this->fetch_comments($id); 
		if(!empty($sub_comments)){
			$text = '';
			foreach ($sub_comments as $key => $row_sub_comment) {
                             
                           $text   .= '<div class="pl-5 pr-5"> 
                                           <table class="table table-hover">
                                              <tr>
                                                    <td> 
                                                        <p><b>'.$row_sub_comment['c_guest_
                                                         name'].'</b></p> 
                                                        <p style="width: 500px;">'.$row_sub
                                                        _comment['c_comment'].'</p> 
                                                        <h6><a  data-parent= "'. $row_sub_
                                                        comment['c_id'] .'" class="comment_reply
                                                        ">Reply</a> <span class="float-right">
                                                       <small>commented on: '. date('d M, Y h:i
                                                       a', strtotime($row_sub_comment['c_commented
                                                       _on'])).'</small></span></h6> 

                                                        <div id="reply_form'. $row_sub_comm
                                                        ent['c_id'].'" class="reply_form"></div> 
                                                    </td> </tr>';

                           $text   .= '</table>'.$this->get_sub_comments($row_sub_comment
                                      ['c_id']).'
                                       </div>';
                      }
                      return $text;
                }
                else return false;
        } 
        public function html_comments($comments){ 
            if(!empty($comments)){ 
                   $html = ''; 
                   foreach ($comments as $key => $comment_row) {
                        $html  .= '<div class="pl-5 pr-5"> 
                                         <table class="table table-hover">
                                              <tr>
                                                 <td> 
                                                     <p><b>'.$row_sub_comment['c_guest_name
                                                     '].'</b></p> 
                                                     <p style="width: 500px;">'.$row_sub_
                                                     comment['c_comment'].'</p> 
                                                     <h6><a  data-parent= "'. $row_sub_comm
                                                     ent['c_id'] .'" class="comment_reply">
                                                     Reply</a> <span class="float-right">
                                                    <small>commented on: '. date('d M, Y 
                                                    h:i a', strtotime($row_sub_comment
                                                   ['c_commented_on'])).'</small></span></h6> 

                                                     <div id="reply_form'. $row_sub_comment['c_id'].'" 
                                                     class="reply_form"></div> 
                                               </td> </tr>';

                         $html   .= '</table>'.$this->get_sub_comments($row_sub_comment['c_id']).'
                                     </div>'; 
                   }
                   return $html;
            }else return false;
       }
 }   