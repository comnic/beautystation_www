<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Evaluation_model
 * 
 * 평가에 대한 처리 모델
 * 
 * content와 product에 함께 사용한다.
 * 
 * 
 */
class Evaluation_model extends MH_Model{
	
	function __construct(){
		parent::__construct();

		$this->tablename = "content_eval";
		$this->tablename2 = "product_eval";
		$this->tablename3 = "product_brand_eval";
	}
	
	/*
	 * get()
	 */
	function get($kind = "content", $params){
		if($kind == "content")
			$tname = $this->tablename;
		else if($kind == "product")
			$tname = $this->tablename2;
		else if($kind == "brand")
			$tname = $this->tablename3;
		
		$res = $this->db->get_where($tname, $params)->result_array();
		
		return $res;
	}
	
	/*
	 * add()
	 * 
	 * 평가치를 저장한다.
	 * 
	 * $kind 값에 따라 content와 product를 구별한다.
	 * 
	 *
	 */
	function add($kind = "content", $params){
		if($kind == "content")
			$tname = $this->tablename;
		else if($kind == "product")
			$tname = $this->tablename2;
		else if($kind == "brand")
			$tname = $this->tablename3;
		
		$res = $this->db->get_where($tname, array('mb_idx' => $params['mb_idx'], 'obj_idx' => $params['obj_idx']))->result_array();
			
		if(count($res) > 0){
			$this->db->where(array('mb_idx' => $params['mb_idx'], 'obj_idx' => $params['obj_idx']));
			$this->db->update($tname, array('eval' => $params['eval'], 'reg_time'=>$params['reg_time']));
		}else
			$this->db->insert($tname, $params);
	
		return $this->db->insert_id();
	}
	
}