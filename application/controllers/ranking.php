<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 
 * 
 * 
 * 
 */
class Ranking extends MH_Controller {

	function __construct(){
		parent::__construct();
		
		$this->_segment = $this->uri->segment_array();
	}
	
}