<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends MH_Model{
	
	function __construct(){
		parent::__construct();	
		$this->tablename = 'product';
	}

	function getList($offset){
		$this->db->select('product.idx as p_idx, product.*, product_category.pc_display_name, product_brand.pb_name')->from('product')->join('product_category', 'product.pc_idx = product_category.idx')->join('product_brand', 'product.pb_idx = product_brand.idx')->order_by('product.idx', 'desc')->limit($this->cntPerPage, $offset);
		$query = $this->db->get();
	
		return $query->result_array();
	}
	
	function getListForCat($cidx = 0){
		if($cidx == 0){
			
		}else{
			$query = $this->db->get_where($this->tablename, array('pc_idx' => $cidx));
			
			return $query->result_array();
		}		
	}
	
	function getListIn($arrIdx){
		$this->db->from($this->tablename)->where_in('idx', $arrIdx);
		$query = $this->db->get();
			
		return $query->result_array();
	
	}
	
	
}