<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 
 * 
 * 
 * 
 */
class Product extends MH_Controller {

	function __construct(){
		parent::__construct();
		
		$this->_segment = $this->uri->segment_array();
	}
	
	function lists(){
		$this->_header();

			echo("상품 리스트");
		$this->_footer();
		
	}
	
	function view(){
		$this->_header();
	
		$this->load->view('product/view');
		
		$this->_footer();
	
	}
	
}