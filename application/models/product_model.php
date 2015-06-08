<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends MH_Model{
	
	function __construct(){
		parent::__construct();
		$this->tablename = 'product';
		$this->brand_tablename = 'product_brand';
	}
	
	
	function get($idx){

		$result = $this->db
			->select('product.*, product_brand.pb_name')
			->from($this->tablename)
			->join($this->brand_tablename, 'product.pb_idx = product_brand.idx')
			->where("product.idx = '$idx'");
		$res = $this->db->get()->result_array();
		
		return $res[0];
	}

	function gets($params, $limit = 5){
		if(is_array($params))
			$result = $this->db->get_where($this->tablename, $params, $limit);
		else 
			$result = $this->db->get($this->tablename, $limit);
		
		return $result->result_array();
	}

	function getsRelativeOnair($pidx, $limit = 5){
		$result = $this->db
			->from('relative_product')
			->join('contents', 'relative_product.c_idx = contents.c_idx')
			->where('p_idx', $pidx)
			->limit($limit);
	
		return $this->db->get()->result_array();
	}
	
}