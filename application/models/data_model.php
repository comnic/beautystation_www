<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
	}
	
	function getChannelList($kind){

		$query = $this->db->query("SELECT *, (select count(*) FROM contents where cc_idx = CC.idx and c_publish_date >= DATE_ADD(NOW(), interval -7 day) ) as new_cnt FROM content_channel AS CC where cc_kind = '$kind' ORDER BY cc_ord ASC");
		
		return array("items"=>$query->result_array());
	}
	
	function getJob(){
		$query = $this->db->query("SELECT * FROM job ORDER BY j_parent_idx ASC, j_name ASC");
		
		$items = $query->result_object();
		
		$jobs = array();
		foreach($items as $item){
			$jobs[$item->j_parent_idx][] = array('idx' => $item->j_idx, 'name' => $item->j_name);
		}
		
		return $jobs;
	}
	
	function getHobby(){
		
	}
	
	function getBrand(){
		
		
	}
	
	function getCosmeBuying(){
		
	}
	
	function getCosmeInfo(){
		
		
	}
	
	function getSkinType(){
		
		
	}
	
	function getFavority(){
		
		
	}
}