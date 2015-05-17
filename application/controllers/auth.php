<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 회원 승인에 관련되 Class
 * 
 * 로그인, 로그아웃, 회원가입, OAuth2 연동(facebook, Naver, kakao등), 회원 탈퇴
 * 
 */
class Auth extends MH_Controller {

	function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->model('member_model');
		
		$this->_segment = $this->uri->segment_array();
	}

	/*
	 * login()
	 * 
	 * 로그인 화면을 보여준다.
	 */
	function login(){
		$this->load->library('facebook');
			
		$user = $this->facebook->get_user();
		
		$data['facebook_login_url'] = $this->facebook->login_url();
		$data['kakao_login_url'] = "https://kauth.kakao.com/oauth/authorize?client_id=".$this->config->item('rest_api_key', 'kakao')."&redirect_uri=".$this->config->item('redirect_url', 'kakao')."&response_type=code";
		$data['naver_login_url'] = "/beautystation/sns_login_naver";
		$this->_header();
		$this->load->helper(array('form', 'url'));
		$this->load->view("main/login", array("data"=>$data));
		$this->_footer();
	}
	
	/*
	 * authentication()
	 * 
	 * 로그인 체크.
	 */
	function authentication(){

		if($member = $this->member_model->get(array('email'=>$this->input->post('login_email')))){
			
		
			if(!function_exists('password_hash')){
				$this->load->helper('password');
			}
			if(
					$this->input->post('login_email') == $member->mb_email &&
					password_verify($this->input->post('login_passwd'), $member->mb_passwd)
			) {
				//로그인 세션을 생성한다.
				$this->session->set_userdata('is_login', true);
				$this->session->set_userdata('bs_mbidx', $member->mb_idx);
				$this->session->set_userdata('bs_mbname', $member->mb_name);
				
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
					redirect("/");
			} else {
				//echo "불일치";
				$this->session->set_flashdata('message', '로그인에 실패 했습니다.');
				$this->load->helper('url');
				redirect('/');
			}
			
			
		}else{
			echo("일치하는 회원이 없습니다.");	
		}
	}

	public function sns_login_facebook(){
		// 		$sns = $this->input->get('sns');
		// 		$next_url = $this->input->get('next_url');
		// 		$code = $this->input->get('code');
			
		$this->load->library('facebook');
			
		$user = $this->facebook->get_user();
	
		if( $user === false ){
			echo("<a href='".$this->facebook->login_url()."'>login</a>");
		}else{
			$this->load->model('member_model');
			$result = $this->member_model->getBySnsFacebook($user['id']);
			if($result->num_rows == 0){
				//등록되어 있지 않은 사용자.
				//DB에 해당 값을 등록한다.
				$mbidx = $this->member_model->addSns(array("kind"=>"facebook", "fbid"=>$user['id'], "fbname"=>$user['name']));
				$fb_id = $user['id'];
	
	
			}else{
				$member = $result->row();
				$mbidx = $member->mb_idx;
				$fb_id = $member->mb_facebook_id;
	
			}
				
			//로그인 처리 한다.
				
	
			//로그인 세션을 생성한다.
			$this->session->set_userdata('is_login', true);
			$this->session->set_userdata('login_type', 'sns');
			$this->session->set_userdata('login_kind', 'facebook');
			$this->session->set_userdata('fbid', $fb_id);
			$this->session->set_userdata('bs_mbidx', $mbidx);
			$this->session->set_userdata('bs_mbname', $member->mb_name);
	
			//로그인 로그를 기록한다.
			$this->load->model('log_model');
	
			$this->log_model->addLogin(
					array('mb_idx'=>$mbidx, 'session'=>"none")
			);
				
				
			$this->load->helper('url');
			$ret_url = $this->input->post('ret_url');
			if($ret_url)
				redirect($ret_url);
			else
				redirect("/");
	
	
		}
	
	}
	
	public function sns_login_kakao(){
		$this->load->library('kakao');
	
		$user = $this->kakao->get_user();
		var_dump($user);
	
		if( $user === false ){
			echo("잠시후 다시 이용해 주세요!");
		}else{
			$this->load->model('member_model');
			$result = $this->member_model->getBySnsKakao($user->id);
			if($result->num_rows == 0){
				//등록되어 있지 않은 사용자.
				//DB에 해당 값을 등록한다.
				$this->member_model->addSns(array("kind"=>"kakao", "kkid"=>$user->id, "kkname"=>$user->properties->nickname, "kkprofileimage"=>$user->properties->profile_image));
			}
	
			//로그인 처리 한다.
			echo("반갑습니다.");//로그인 처리 한다.
	
	
	
		}
	
	
	
	}
	
	public function sns_login_naver(){
		$this->load->library('naver_oauth');
	
		$request = new Naver_oauth($this->config->item('consumer_key', 'naver'), $this->config->item('consumer_key_secret', 'naver'), $this->config->item('redirect_url', 'naver') );
		$request->set_state();
		$request->request_auth();
	
	}
	
	public function sns_login_naver_callback(){
		$this->load->library('naver_oauth');
	
		$request = new Naver_oauth($this->config->item('consumer_key', 'naver'), $this->config->item('consumer_key_secret', 'naver'), $this->config->item('redirect_url', 'naver') );
		$request->call_accesstoken();
		$request->get_uesr_profile();
	}
	 
	/*
	 * logout();
	 * 
	 * 로그아웃 처리.
	 */
	function logout(){
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('/');
	}
	
	/*
	 * register()
	 * 
	 * EMail회원 등록을 위한 화면을 보여주고 처리 한다.
	 * 
	 */
	function register(){
		$this->_header();
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_message('required', '*[%s]은(는) 필수 입력입니다.');
		
		$this->form_validation->set_rules('email', '이메일주소', 'required|valid_email|max_length[50]|is_unique[member_basic.mb_email]');
		$this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[30]|matches[re_password]');
		$this->form_validation->set_rules('re_password', '비밀번호 확인', 'required');
		$this->form_validation->set_rules('name', '이름', 'required|min_length[2]|max_length[20]');
		
		if($this->form_validation->run() === false){
        	$this->load->view('member/register');
    	} else {
        	if(!function_exists('password_hash')){
            	$this->load->helper('password');
        	}
        	$hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
 
        	$mb_idx = $this->member_model->add(
        		array(
            		'email'=>$this->input->post('email'),
            		'password'=>$hash,
        			'name'=>$this->input->post('name')
        		)
        	);
        	
        	//로그인 처리 합니다.
        	$this->session->set_userdata('is_login', true);
        	$this->session->set_userdata('bs_mbidx', $mb_idx);
        	 
        	//$this->session->set_flashdata('message', '회원가입에 성공했습니다.');
        	$this->load->helper('url');
        	redirect('/member/myinfo1');
    	}
 		
		
		
		$this->_footer();
	}
		
	/*
	 * OAuth_sns_facebook()
	 * 
	 * 페이스북 로그인 연동.
	 * 최초 연동시 회원 가입 루틴을 따라 해당 정보를 저장 후 로그인 처리 한다.
	 */
	function OAuth_sns_facebook(){
		
	}

	/*
	 * OAuth_sns_naver()
	 * 
	 * 최초 연동시 회원 가입 루틴을 따라 해당 정보를 저장 후 로그인 처리 한다.
	 */
	function OAuth_sns_naver(){
	
	}
	
	/*
	 * OAuth_sns_kakao()
	 * 
	 * 최초 연동시 회원 가입 루틴을 따라 해당 정보를 저장 후 로그인 처리 한다.
	 */
	function OAuth_sns_kakao(){
	
	}
	
}

?>