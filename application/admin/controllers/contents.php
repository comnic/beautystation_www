<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 
 * 
 */

use beautystation\content\Content;

class Contents extends MH_Controller {

	protected $offset = 0;

	/*
	 * 생성자
	 */
	function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->model('content_model', '', TRUE);
		$this->_segment = $this->uri->segment_array();
	}
	
	/*
	 * 
	 */
	public function index(){
		$this->_chkLogin();
		$this->lists();
	}
	
	/*
	 * lists()
	 * 
	 */
	public function lists(){
		$this->_chkLogin();
		$this->_header();
		$this->_left();
		
 		if(count($this->_segment) >= 3)
 			$this->offset = $this->_segment[3];
		
 		$data = array();
 		$data['items'] = $this->content_model->getList("MV", 0, $this->offset);
 
 		$this->load->library('pagination');
		
 		$total_rows = $this->content_model->getNumRows("MV", 0);
 		$config['base_url'] = '/admin.php/contents/lists';
 		$config['total_rows'] = $total_rows;
 		$config['per_page'] = $this->content_model->cntPerPage;
		
 		$this->pagination->initialize($config);
		
 		$data['pagination'] = $this->pagination->create_links();
		
 		$data['start_idx'] = $total_rows - $this->offset;
		
 		$this->load->view('content/list', $data);
		
		
		$this->_footer();
	}
	
	/*
	 * add()
	 * 
	 * 
	 * 
	 */
	public function add(){
		$this->_chkLogin();
		
		//파라미터가 있으면 수정, 없으면 추가??
		$this->_header();
		$this->_left();
		

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

		//컨텐츠 종류 목록을 만든다.
		$data['kind_options'] = array(''=>'컨텐츠 종류를 선택하세요!', 'MV'=>'Movie', 'MZ'=>'Magzine');
		
		//채널 목록을 만든다.
		$this->load->model('channel_model');
		$arrChannel = $this->channel_model->gets();
		$chOptions = array(''=>'채널을 선택하세요!');
		foreach ($arrChannel as $row){
			$chOptions[$row['idx']] = $row['cc_title'];
		}
		$data['channel_options'] = $chOptions;
		
		//suggestion 태그 목록을 만든다.
		$this->load->model('tag_model');
		$suggestion_tags = $this->tag_model->getList(1);
		$arrSuggestionTags = array();
		foreach($suggestion_tags as $tag)
			$arrSuggestionTags[] = $tag['ctl_tag'];
		$strSuggestionTags = "'" . implode("','", $arrSuggestionTags) . "'";
		
		$data['suggestion_tags'] = $strSuggestionTags;
		
		
		
		
/*		
		//카테고리 목록을 구해서 select로 출력하기 위해 배열화 한다.
		$this->load->model('category_model');
		$arrCat = $this->category_model->gets();
		$strCategories = array();
		$strCategories[''] = "카테고리를 선택하세요!";
		foreach ($arrCat as $row){
			$strCategories[$row['idx']] = $row['pc_display_name'];
		}
		$data['category_options'] = $strCategories;
*/
		$data['product_list'] = array();
		if($this->input->post('relativeProductList') != ""){
			$arrIdx = explode(",", $this->input->post('relativeProductList'));

			$this->load->model('product_model');
			$arrList =  $this->product_model->getListIn($arrIdx);
			foreach ($arrList as $row){
				$data['product_list'][] = array($row['idx'], $row['p_img']);
			}
				
		}
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('content/add', array('error' => '', 'data'=>$data ));
		}
		else
		{
			//폼 전송값을 저장한다.
			$c_kind = $this->input->post('c_kind');
			$c_channel = $this->input->post('c_channel');
			$c_seq = $this->input->post('c_seq');
			$c_summary = $this->input->post('c_summary');
			$c_movie = $this->input->post('c_movie');
			$c_title = $this->input->post('c_title');
			$c_tags = $this->input->post('c_tags');
			$c_content = $this->input->post('c_content');
			$c_publish = $this->input->post('c_publish');
			
			$c_relative_product_list = $this->input->post('relativeProductList');
			
			//파일 업록드를 위한 초기값 설정
			$config['upload_path'] = '.'.$this->config->item('content_image_path');
			$config['encrypt_name'] = true;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2048'; //2MB
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			
			$this->load->library('upload', $config);
			
			//업로드 처리 루틴
			if ( ! $this->upload->do_upload() )
			{
				$error = $this->upload->display_errors();
				$this->upload->display_errors('<p class="text-danger">', '</p>');
				$this->load->view('content/add', array('error'=>$error ));
				return false;
			}
			else
			{
				$upload_data = $this->upload->data();

				//DB에 저장하기 위한 루틴.
				$params = array(
						"c_kind"=>$c_kind,
						"cc_idx"=>$c_channel,
						"c_seq"=>$c_seq,
						"c_title"=>$c_title,
						'c_summary' => $c_summary ,
						'c_movie_link' => $c_movie,
						'c_img' => $this->config->item('content_image_path').$upload_data['file_name'],
						'c_content' => $c_content ,
						'c_publish_date' => $c_publish ,
						'c_reg_date' => date('YmdHis')
				);
				
				$insert_id = $this->content_model->add($params);
				
				//태그 저장
				$this->load->model('tag_model');
				$tag_id = $this->tag_model->addWithContent($insert_id, $c_tags);
				
				//관련 상품 저장
				$arrList = implode(",", $c_relative_product_list);
				if(count($arrList) > 0)
					$this->content_model->addRelativeProduct($insert_id, $arrList);
				
				
				//리스트 페이지로 리다이렉션한다.
				$this->load->helper('url');
				redirect('admin.php/contents/lists');				
			}

		}
		
		$this->_footer();

	}
	
	/*
	 * modify()
	 * 
	 * 
	 */
	public function modify(){
		$this->_chkLogin();
		$this->_header();
		$this->_left();
		
		if(count($this->_segment) < 3){
			log_message('error', '인자값없이 접근.');
			show_error('잘못된 접근입니다.');
			return false;
		}
			
			
		$idx = $this->_segment[3];
		
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
		

		$data = $this->content_model->get(array("c_idx"=>$idx));
		$data = $data[0];

		
		//컨텐츠 종류 목록을 만든다.
		$data['kind_options'] = array(''=>'컨텐츠 종류를 선택하세요!', 'MV'=>'Movie', 'MZ'=>'Magzine');
		
		//채널 목록을 만든다.
		$this->load->model('channel_model');
		$arrChannel = $this->channel_model->gets();
		$chOptions = array(''=>'채널을 선택하세요!');
		foreach ($arrChannel as $row){
			$chOptions[$row['idx']] = $row['cc_title'];
		}
		$data['channel_options'] = $chOptions;
		
		//
		$this->load->model('tag_model');
		$suggestion_tags = $this->tag_model->getList(1);
		$arrSuggestionTags = array();
		foreach($suggestion_tags as $tag)
			$arrSuggestionTags[] = $tag['ctl_tag'];
		$strSuggestionTags = "'" . implode("','", $arrSuggestionTags) . "'";
		
		$data['suggestion_tags'] = $strSuggestionTags;		

		//카테고리 목록을 구해서 select로 출력하기 위해 배열화 한다.
		$this->load->model('category_model');
		$arrCat = $this->category_model->gets();
		$strCategories = array();
		$strCategories[''] = "카테고리를 선택하세요!";
		foreach ($arrCat as $row){
			$strCategories[$row['idx']] = $row['pc_display_name'];
		}
		$data['category_options'] = $strCategories;
		
		//태그 목록을 구한다.
		$tags = $this->tag_model->getTags($idx);
		$arrTags = array();
		foreach($tags as $tag)
			$arrTags[] = $tag['ctl_tag'];
		
		$data['tags'] = implode(",", $arrTags);
		
		//관련 상품 목록을 구한다.
		$data['product_list'] = array();
		
		$productList = $this->content_model->getRelativeProductList($idx);
		foreach($productList as $pitem){
			$tmp = ($pitem['p_img'] == "") ? '/static/images/product/none.png' : $pitem['p_img'];
			$data['product_list'][] = array($pitem['p_idx'], $tmp);
		}

		if ($this->form_validation->run() == FALSE)
		{
			
			$this->load->view('content/modify', array('data'=>$data, 'error'=>''));
		}
		else
		{
			//폼전송값을 저장한다.
			$c_kind = $this->input->post('c_kind');
			$c_channel = $this->input->post('c_channel');
			$c_seq = $this->input->post('c_seq');
			$c_summary = $this->input->post('c_summary');
			$c_movie = $this->input->post('c_movie');
			$c_title = $this->input->post('c_title');
			$c_tags = $this->input->post('c_tags');
			$c_content = $this->input->post('c_content');
			$c_publish = $this->input->post('c_publish');
			$c_active = $this->input->post('c_active');
			
			$c_relative_product_list = $this->input->post('relativeProductList');
			
			if($c_active == "")
				$c_active = 'N';
			
			$c_img = "";
			if ( $_FILES AND $_FILES['userfile']['name'] ){

				$config['upload_path'] = './static/images/content/';
				$config['encrypt_name'] = true;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '2048';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload() )
				{
					$error = $this->upload->display_errors();
					$this->upload->display_errors('<p class="text-danger">', '</p>');
					$this->load->view('content/modify', array('data'=>$data, 'error'=>$error ));
					return false;
				}
				else
				{
					$file_data = array('upload_data' => $this->upload->data());
					$c_img = $this->config->item('content_image_path').$file_data['upload_data']['file_name'];
				}
			}
			$params = array(
					"c_kind"=>$c_kind,
					"cc_idx"=>$c_channel,
					"c_seq"=>$c_seq,
					"c_title"=>$c_title,
					'c_summary' => $c_summary ,
					'c_movie_link' => $c_movie,
					'c_content' => $c_content ,
					'c_publish_date' => $c_publish,
					'c_active' => $c_active,
					'c_mod_date' => date('YmdHis')
			);
			
			if($c_img != "")
				$params['c_img'] = $c_img;
	
				
			$this->content_model->update(array('c_idx' => $idx), $params);
			
			//태그 저장
			$this->load->model('tag_model');
			$tag_id = $this->tag_model->updateWithContent($idx, $c_tags);
			
			//관련 상품 저장
			if($c_relative_product_list != ""){
				$arrList = implode(",", $c_relative_product_list);
				if(count($arrList) > 0)
					$this->content_model->updateRelativeProduct($idx, $arrList);
			}
						
			
			
			
			$this->load->helper('url');
			redirect('admin.php/contents/lists');			
		
		}
		
		$this->_footer();
	}
	
	/*
	 * 
	 * 
	 */
	public function delete(){
		$this->_chkLogin();
		if(count($this->_segment) >= 3){
			$idx= $this->_segment[3];
			
			$this->content_model->delete(array("c_idx"=>$idx));
			
			$this->load->view('json', array('data'=>array('result'=>'OK')));
		}
	}
	
	/*
	 * _left()
	 * 
	 * 좌측 메뉴를 출력해준다.
	 * 각 대메뉴별로 다르게 출력해야 함.
	 */
	public function _left(){
		
		$this->load->view('left');
		
	}
	
}