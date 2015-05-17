<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 관리자 승인에 관련된 Class
 * 
 * 로그인, 로그아웃
 * 
 */
class Auth extends MH_Controller {

	function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->model('admin_member_model');
		
		$this->_segment = $this->uri->segment_array();
	}

	/*
	 * login()
	 * 
	 * 로그인 화면을 보여준다.
	 */
	function login(){
		$this->_header();
		$this->load->helper(array('form', 'url'));		
		$this->load->view("login");
		$this->_footer();
	}
	
	/*
	 * authentication()
	 * 
	 * 로그인 체크.
	 */
	function authentication(){
		if($member = $this->admin_member_model->get(array('email'=>$this->input->post('email')))){
			
		
			if(!function_exists('password_hash')){
				$this->load->helper('password');
			}
			if(
					$this->input->post('email') == $member->mb_email &&
					password_verify($this->input->post('password'), $member->mb_passwd)
			) {
				//로그인 세션을 생성한다.
				$this->session->set_userdata('is_admin_login', true);
				$this->session->set_userdata('bs_admin_mbidx', $member->mb_idx);
				
				//로그인 로그를 기록한다.				
				$this->load->model('log_model');
				
				$this->log_model->addLogin(
						array('mb_idx'=>$member->mb_idx, 'session'=>"none")
				);
				
				
				$this->load->helper('url');
				$ret_url = $this->input->post('ret_url');
				if($ret_url)
					redirect($ret_url);
				else
					redirect("/admin.php");
			} else {
				//echo "불일치";
				$this->session->set_flashdata('message', '로그인에 실패 했습니다.');
				$this->load->helper('url');
				redirect('/admin.php/auth/login');
			}
			
			
		}else{
			echo("일치하는 회원이 없습니다.");	
		}
	}

	/*
	 * logout();
	 * 
	 * 로그아웃 처리.
	 */
	function logout(){
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('/admin.php');
	}
	
}

?>