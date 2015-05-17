<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules extends MH_Controller {

	public function index()
	{
		
	}
	
	public function service(){
		$this->_header();
		$this->load->view("rules/rules_service");
		$this->_footer();
	}
	
	public function privacy(){
		$this->_header();
		$this->load->view("rules/rules_privacy");
		$this->_footer();
	}
}
