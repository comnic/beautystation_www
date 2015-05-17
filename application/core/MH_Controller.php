<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MH_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function _header(){
		$chList = array(
				'1'=>'트루美쇼',
				'2'=>'홍\'s光뷰티',
				'3'=>'언니네HOT초이스',
				'4'=>'미인식당'
		);
		$data['channel'] = $chList;
		
		$this->load->view("head", $data);
	}
	
	function _footer(){
		$this->load->view("foot");
	}
	
	function _chkLogin($url=''){
		if($this->session->userdata('is_login')){
			return true;
		}else{
			return false;
// 			$this->load->helper('url');
// 			redirect('/auth/login?url='.urlencode($url));
		}
	}
	
	function _mainMenu(){
		
		
	}
}