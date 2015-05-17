<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 
 * 
 */
class Dashboard extends MH_Controller {


	function __construct(){
		parent::__construct();

		//$this->load->database();
		//$this->load->model('content_model');
	}
	
	public function index(){
		$this->_chkLogin();
		
		$this->_header();
		echo("Dashboard");
		$this->_footer();
	}
	
}