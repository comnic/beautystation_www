<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends MH_Model{
	
	function __construct(){
		parent::__construct();
		$this->tablename = 'banner';
	}
	
	function gets($kind = ''){
		if($kind != '')
			$result = $this->db->get_where($this->tablename, array('bnr_kind'=>$kind));
		else 
			$result = $this->db->get($this->tablename);
		
		return $result->result_array();
		
	}

}