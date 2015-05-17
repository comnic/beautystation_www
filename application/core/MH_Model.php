<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MH_Model extends CI_Model {	
	var $tablename = "";
	var $cntPerPage = 10;
	
	/*
	 * 
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	/*
	 * 
	 */
	function setTableName($name){
		$this->tablename = $name;
	}
	
	/*
	 * 
	 */
	function setCntPerPage($cnt){
		$this->cntPerPage = $cnt;
	}
	
	/*
	 * 
	 */
	function gets($params = "") {
		$query = $this->db->get($this->tablename);
		return $query->result_array();
	}
	
	/*
	 * 
	 */
	function get($params) {
		if(is_array($params))
			$query = $this->db->get_where($this->tablename, $params);
		else
			$query = $this->db->get_where($this->tablename, array('idx' => $params));
		return $query->result_array();
	}
	
	/*
	 * 
	 */
	function getList($offset){
		
		$this->db->from($this->tablename)->order_by('idx', 'desc')->limit($this->cntPerPage, $offset);
		$query = $this->db->get();
		
		return $query;
	}

	/*
	 * 
	 */
	function getNumRows() {
		return $this->db->count_all($this->tablename);
	}

	/*
	 * 
	 */
	function getTotalPage() {
		return ceil($this->db->count_all($this->tablename) / $this->cntPerPage);
	}

	/*
	 * 
	 */
	function add($params){
		$this->db->insert($this->tablename, $params);
		return $this->db->insert_id();
	}
	
	/*
	 * 
	 * where - array('id' => $id)
	 */
	function update($where, $data){
		$this->db->update($this->tablename, $data, $where);	
		return $this->db->affected_rows();
	}
	
	/*
	 *
	 * $params - array('idx' => $idx)
	 */
	function delete($params){	
		$this->db->delete($this->tablename, $params);
		return $this->db->affected_rows();
	}	
}
