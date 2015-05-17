<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Channel_model extends MH_Model{
	
	function __construct(){
		parent::__construct();	
		$this->tablename = 'content_channel';
	}

	function gets(){
		$query = $this->db->order_by("cc_ord", "asc")->get($this->tablename);
		return $query->result_array();
	}

	
}