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
		$this->tablename = "content_reply";
		$this->tablename2 = "product_reply";
	}
	
	/*
	 * 
	 */
	function add($params, $kind){
		if($kind == "content")
			$this->db->insert($this->tablename, $params);
		else if($kind == "product")
			$this->db->insert($this->tablename2, $params);
		
		return $this->db->insert_id();
	}
	
	
	/*
	 * 
	 */
	function getList($kind, $idx, $page = 1){
	
		$offset = ($page - 1) * $this->cntPerPage;
		
		if($kind == "content")
			$this->db->select('content_reply.*, member_basic.mb_name')->from($this->tablename)->join('member_basic', 'content_reply.mb_idx = member_basic.mb_idx')->where('c_idx', $idx)->order_by('idx', 'desc')->limit($this->cntPerPage, $offset);
		else if($kind == "product")
			$this->db->select('product_reply.*, member_basic.mb_name')->from($this->tablename2)->join('member_basic', 'product_reply.mb_idx = member_basic.mb_idx')->where('p_idx', $idx)->order_by('idx', 'desc')->limit($this->cntPerPage, $offset);
		$query = $this->db->get();
	
		return $query->result_array();
	}
	
	/*
	 * 
	 */
	function getNumRows($kind = "content", $params = "") {
		if($kind == "content")
			$tname = $this->tablename;
		else if($kind == "product")
			$tname = $this->tablename2;
			
		if(is_array($params)){
			$this->db->select('count(*) as total')->from($tname)->where($params);
				
			$query = $this->db->get()->result_array();
			return $query[0]['total'];
		}else
			return $this->db->count_all($tname);
		
	}
}