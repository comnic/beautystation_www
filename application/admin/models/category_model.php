<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends MH_Model{
	
	function __construct(){
		parent::__construct();	
		$this->tablename = 'product_category';
	}

	function getList($offset){
// 		$this->db->from('product')->join('product_brand', 'product.pb_idx = product_brand.idx')->order_by('product.idx', 'desc')->limit($this->cntPerPage, $offset);
// 		$query = $this->db->get();
	
		return $this->gets(); //$query;
	}
	function gets(){
		
		$this->db->from($this->tablename)->select("idx, pc_display_name")->order_by("pc_display_name", "asc");
		$query = $this->db->get();
		return $query->result_array();
		
	}
	
	function add($params){
		/*
		 * $params(
		 * 	'pc_idx' => '',
		 * 	'pb_idx' => '',
		 * 	'p_name' => '',
		 * 	'p_capacity' => '',
		 * 	'p_color' => '',
		 * 	'p_price' => '',
		 * 	'p_desc' => '',
		 * 	'p_img' => '',
		 * 	'p_thumb' => '',
		 * 	'p_active' => '',
		 * 	'p_reg_date' => ''
		 * );
		 * 
		 * 
		 */
		$this->db->insert($this->tablename, $params);
	}
	
	function update($idx, $params){
		/*
		 * $data = array(
               'title' => $title,
               'name' => $name,
               'date' => $date
            );

			$this->db->where('id', $id);
			$this->db->update('mytable', $data);
		 */
		$this->db->where('idx', $idx);
		$this->db->update($this->_tablename, $params);
		
	}
	
	function delete($idx){
		
		$this->db->delete($this->_tablename, array('idx' => $idx));
	}
	
	
}