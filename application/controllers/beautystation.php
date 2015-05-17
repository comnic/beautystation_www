<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 사이트 메인을 담당한다.
 * 
 * 
 * 
 */
class Beautystation extends MH_Controller {

	function __construct(){
		parent::__construct();
		
		$this->_segment = $this->uri->segment_array();
	}
	
	public function index()
	{
		
		$this->main();
/*		
		if($this->_chkLogin()){
			$this->main();
		}else{
			$this->intro();
		}
*/		
	}
	
	public function intro(){
		$this->load->library('facebook');
			
		$user = $this->facebook->get_user();
		
		$data['facebook_login_url'] = $this->facebook->login_url();
		$data['kakao_login_url'] = "https://kauth.kakao.com/oauth/authorize?client_id=".$this->config->item('rest_api_key', 'kakao')."&redirect_uri=".$this->config->item('redirect_url', 'kakao')."&response_type=code";
		$data['naver_login_url'] = "/auth/sns_login_naver";
		
		$this->_header();
		
		$this->load->helper(array('form', 'url'));
		$this->load->view('main/login', array("data"=>$data));
		
		$this->_footer();
	}
	
	public function main()
	{
		$this->_header();
		
		$this->load->model("banner_model");
		$bnrList = $this->banner_model->gets('M1');
		$data['main_banner'] = $bnrList;
		
		if($this->_chkLogin())
			$this->load->view('main/main_individual', $data);
		else{
			$this->load->view('main/main_normal', $data);
		}
		
		$this->_footer();
	}
	
}