<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Member {

	var $mem_idx;
	var $mem_name;
	var $mem_session;
	
	function __construct()
	{		
		$CI =& get_instance();
		
		$CI->load->library('session');
		
		if($CI->session->userdata('is_login')){
			$this->mem_idx = $CI->session->userdata('bs_mbidx');
			$this->mem_name = $CI->session->userdata('bs_mbname');
		}
	}
	
	/*
	 * 
	 */
	function getIdx(){
		
		return $this->mem_idx;	
	}

	/*
	 *
	*/
	function getName(){
	
		return $this->mem_name;
	}
	
	/*
	 * 
	 * 
	 */
	function getInfo(){
		
	
	}
	
}

/* End of file Someclass.php */