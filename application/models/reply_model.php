<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Reply_model
 * 
 * 댓글과 관련된 Model
 * 
 */
class Reply_model extends MH_Model{
	
	function __construct(){
		parent::__construct();
		$this->tablename = "reply";
	}
	
	/*
	 * 
	 */
	function getList($cidx, $offset = 0){
	
		$this->db->select('reply.*, member_basic.mb_name')->from($this->tablename)->join('member_basic', 'reply.mb_idx = member_basic.mb_idx')->where('c_idx', $cidx)->order_by('idx', 'desc')->limit($this->cntPerPage, $offset);
		$query = $this->db->get();
	
		return $query->result_array();
	}
	
}