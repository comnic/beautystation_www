<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MH_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function _chkLogin(){
		if($this->session->userdata('is_admin_login')){
			return true;
		}else{
			$this->load->helper('url');
			redirect('/admin.php/auth/login');
		}
	}
	
	function _header(){		
		$this->load->view("head");
	}
	
	function _footer(){
		$this->load->view("foot");
	}
	
	function _mainMenu(){
		
		
	}
}