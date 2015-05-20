<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MH_Controller {

	function __construct(){
		parent::__construct();
	
		$this->load->database();
		$this->load->model('member_model');
		
		$this->_segment = $this->uri->segment_array();
	
	}
	
	/*
	 * mypage()
	 * 
	 * 회원의 정보를 한눈에 볼 수 있는 페이지 구성.
	 * 	- 간략한 개인정보 - 이름, SNS연동 현황 등
	 * 	- 보유상품 리스트
	 * 	- 위시 리스트
	 * 	- 담은 컨텐츠
	 * 	- 추천 컨텐츠
	 * 	- 추천 상품
	 * 	- 설문현황
	 * 	- 포인트 정보
	 * 
	 */
	function mypage(){
		$this->_header();
		
		$this->load->helper('url');
		
		if($this->_chkLogin() != true){
			//echo("<script>alert('로그인 후 이용하실 수 있습니다.');</script>");
			redirect("/auth/login");
		}

		$this->load->model('data_model');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('gender', '성별', 'required');
		if($this->form_validation->run() === false){
		
			$idx = $this->session->userdata('bs_mbidx');
			
			$data['member_info'] = $this->member_model->get(array('idx'=>$idx), TRUE);
			$data['job_list'] = $this->data_model->getJob();
			
			$this->load->view('member/mypage', $data);
		}else{
			
			//상세정보 저장 루틴
			$idx = $this->session->userdata('bs_mbidx');
			if($idx != ""){
				$gender = $this->input->post('gender');
				$birth_year = $this->input->post('birth_year');
				$birth_month = $this->input->post('birth_month');
				$birth_day = $this->input->post('birth_day');
				$skin_type = $this->input->post('skin_type');
				$skin_tone = $this->input->post('skin_tone');
				$skin_trouble = $this->input->post('skin_trouble');
				$params = array('md_gender'=>$gender, 'md_birth'=>$birth_year."-".$birth_month."-".$birth_day, 'md_skin_type'=>$skin_type, 'md_skin_tone'=>$skin_tone, 'md_skin_trouble'=>$skin_trouble);
				$this->member_model->update_myinfo($idx, $params);
			}
			
			
			
			redirect("/member/mypage");
		}
		$this->_footer();
	}
	
	/*
	 * myinfo1()
	 * 
	 * 회원의 상세정보를 보여주고 수정할 수 있는 UI 제공.
	 * 
	 * 	- 성별, 생년월일
	 * 
	 */
	function myinfo1(){
		$this->_chkLogin('/member/myinfo1');
		
		$this->_header();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('gender', '성별', 'required');
		if($this->form_validation->run() === false){
			$this->load->view("member/myinfo1");
		} else {
			$idx = $this->session->userdata('bs_mbidx');
			if($idx != ""){
				$gender = $this->input->post('gender');
				$birth_year = $this->input->post('birth_year');
				$birth_month = $this->input->post('birth_month');
				$birth_day = $this->input->post('birth_day');
				$params = array('md_gender'=>$gender, 'md_birth'=>$birth_year."-".$birth_month."-".$birth_day);
				$this->member_model->update_myinfo($idx, $params);
			}
			
			redirect("/member/myinfo2");
		}
		
		$this->_footer();
	}

	/*
	 * myinfo2()
	*
	* 회원의 상세정보를 보여주고 수정할 수 있는 UI 제공.
	*
	* 	- 피부타입 
	*
	*/
	function myinfo2(){
		$this->_chkLogin('/member/myinfo2');
		
		$this->_header();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('skin_type', '피부타입', 'required');
		if($this->form_validation->run() === false){
			$this->load->view("member/myinfo2");
		}else{
			
			$idx = $this->session->userdata('bs_mbidx');
			if($idx != ""){
				$skin_type = $this->input->post('skin_type');
				$skin_tone = $this->input->post('skin_tone');
				$params = array('md_skin_type'=>$skin_type, 'md_skin_tone'=>$skin_tone);
				$this->member_model->update_myinfo($idx, $params);
			}
				
			redirect("/");
			
		}
		$this->_footer();
	}
	
	/*
	 * 
	 * 
	 */
	function recommend_contents($kind = "onair"){
		$this->_chkLogin('/member/recommend_contents');
		
		$this->_header();

		$this->load->view("member/recommend_contents", array('cont_kind'=>$kind));

		$this->_footer();
	}

	/*
	 *
	 *
	 */
	function recommend_products($kind = "1"){
		$this->_chkLogin('/member/recommend_products');
	
		$this->_header();
	
		$this->load->view("member/recommend_products", array('cont_kind'=>$kind));
	
		$this->_footer();
	}
	
	/*
	 * 
	 * 
	 * 
	 */
	function wish_list($kind = "onair"){
		$this->_chkLogin('/member/wish_list');
		
		$this->_header();
		
		$this->load->view("member/wish_list", array('cont_kind'=>$kind));
		
		$this->_footer();
		
	}
	
	/*
	 * 
	 * 
	 */
	function mytrouble(){
		$this->_chkLogin('/member/mytrouble');
		
		$this->_header();
		
		$this->load->view("member/mytrouble");
		
		$this->_footer();
	}

	/*
	 *
	 *
	 */
	function mytrouble_reg(){
		$this->_chkLogin('/member/mytrouble_reg');
	
		$this->_header();
	
		$this->load->view("member/mytrouble_reg");
	
		$this->_footer();
	}
	
	/*
	 * 
	 * 
	 * 
	 */
	function powderroom(){
		$this->_chkLogin('/member/powderroom');
		
		$this->_header();
		
		$this->load->view("member/powderroom");
		
		$this->_footer();
	}
	
	/*
	 * 
	 * 
	 */
	function mysurvey(){
		$this->_chkLogin('/member/mysurvey');
		
		$this->_header();
		
		$this->load->view("member/mysurvey");
		
		$this->_footer();
	}
	
	/*
	 * modify()
	 * 
	 * myinfo()로 통합.
	 * 
	 */
	function modify(){
		
	
		
	}
	
	/*
	 * have_product()
	 * 
	 * 보유 상품 리스트를 보여주고 추가 삭제 할 수 있는 UI 제공.
	 * 
	 */
	function have_product(){
		
		
	}
	
	/*
	 * wish_product()
	 * 
	 * 위시 상품 리스트를 보여주고 추가 삭제 할 수 있는 UI 제공.
	 */
	function wish_product(){
		
		
	}
	
}