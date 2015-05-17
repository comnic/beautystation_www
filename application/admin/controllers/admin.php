<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 
 * 
 */
class Admin extends MH_Controller {


	function __construct(){
		parent::__construct();

		$this->load->database();
		//$this->load->model('content_model');
	}
	
	public function index(){
		$this->_header();
		$this->load->library('beautystation');
		//$this->load->view('admin/main');
		//$this->_footer();
	}
	
	public function content($module){
		$this->_header();
		$this->load->view('admin/content/'.$module);
		$this->_footer();
	}
	
	public function movie_list(){
		$this->_header();
		$data = $this->content_model->getList("MV");
		//print_r($data);
		$this->load->view('admin/content/movie_list', $data);
		echo("<a href='/admin/movie_add'>movie add</a>");
		$this->_footer();
	}
	
	public function movie_add(){
		$this->_header();

		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_message('required', '*[%s]은(는) 필수 입력입니다.');
		
		$this->form_validation->set_rules('c_kind', '컨텐츠 종류', 'trim|required');
		$this->form_validation->set_rules('c_channel', '채널', 'trim|required');
		$this->form_validation->set_rules('c_seq', '회차', 'trim|required|numeric|min_length[1]|max_length[5]|xss_clean');
		$this->form_validation->set_rules('c_title', '제목', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('c_movie', '동영상 링크', 'required');
		
		$this->form_validation->set_rules('c_content', '내용', 'required');
		$this->form_validation->set_rules('c_publish', '발행일', 'required');
				
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/movie_add', array('error' => ' ' ));
		}
		else
		{
			$c_kind = $this->input->post('c_kind');
			$c_channel = $this->input->post('c_channel');
			$c_seq = $this->input->post('c_seq');
			$c_summary = $this->input->post('c_summary');
			$c_movie = $this->input->post('c_movie');
			$c_title = $this->input->post('c_title');
			$c_content = $this->input->post('c_content');
			$c_publish = $this->input->post('c_publish');
				

			$config['upload_path'] = './static/images/content/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$file_data = array('upload_data' => $this->upload->data());
				//print_r($file_data);
				//$this->load->view('upload_success', $data);
			}
			
			$params = array(
					"c_kind"=>$c_kind,
					"cc_idx"=>$c_channel,
					"c_seq"=>$c_seq,
					"c_title"=>$c_title,
					'c_summary' => $c_summary ,
					'c_movie_link' => $c_movie,
					'c_img' => $this->config->item('content_image_path').$file_data['upload_data']['file_name'],
					'c_content' => $c_content ,
					'c_publish_date' => $c_publish ,
					'c_reg_date' => date('YmdHis')
			);
			
			
			$this->content_model->add($params);

			$this->load->helper('url');
			redirect('admin/movie_list');
			
			//$this->load->view('formsuccess');
		}	
		
		
		
		$this->_footer();
	}
	
	public function dashboard(){
		$this->load->view('dashboard');
	}
}