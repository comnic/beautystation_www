<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 
 * 
 */

use beautystation\content\Content;

class Products extends MH_Controller {

	protected $offset = 0;

	/*
	 * 
	 */
	function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->model('product_model', '', TRUE);
		$this->_segment = $this->uri->segment_array();
	}
	
	/*
	 * 
	 */
	public function index(){
		//$this->product_list();
		$this->_chkLogin();
		$this->lists();
		
		
	}
	
	/*
	 * 
	 */
	public function lists(){
		$this->_chkLogin();
		$this->_header();
		$this->_left();
		
		if(count($this->_segment) >= 3)
			$this->offset = $this->_segment[3];
		
		$data = array();
		$data['items'] = $this->product_model->getList($this->offset);
		$this->load->library('pagination');
		
		$total_rows = $this->product_model->getNumRows();
		$config['base_url'] = '/admin.php/products/lists';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $this->product_model->cntPerPage;
		
		$this->pagination->initialize($config);
		
		$data['pagination'] = $this->pagination->create_links();
		
		$data['start_idx'] = $total_rows - $this->offset;
		
		$this->load->view('product/list', $data);
		
		
		$this->_footer();
	}
	
	public function getsForCat($cidx = 0){
		$this->_chkLogin();
		if($cidx != "" && isset($cidx)){
			$data['data'] = $this->product_model->getListForCat($cidx);
			$this->load->view('json', $data);
		}
	}
	
	/*
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
		
		$this->form_validation->set_rules('pb_idx', '브랜드', 'trim|required');
		$this->form_validation->set_rules('p_name', '제품명', 'trim|required');
		$this->form_validation->set_rules('p_capacity', '용량', 'trim');
		$this->form_validation->set_rules('p_color', '컬러', 'trim');
		$this->form_validation->set_rules('p_price', '가격', 'trim|numeric');
		
		$this->form_validation->set_rules('p_desc', '설명', 'required');
		
		
		//카테고리 목록을 구해서 select로 출력하기 위해 배열화 한다.
		$this->load->model('category_model');
		$arrCat = $this->category_model->gets();
		$strCategories = array();
		foreach ($arrCat as $row){
			$strCategories[$row['idx']] = $row['pc_display_name'];
		}
		
		//브랜드 목록을 구해서 select로 출력하기 위해 배열화 한다.
		$this->load->model('brand_model');
		$arrBrand = $this->brand_model->gets();
		$strOptions = array();
		foreach ($arrBrand as $row){
			$strOptions[$row['idx']] = $row['pb_name'] . "(".$row['pb_eng_name'].")";
		}
		
		//폼 검증.
		if ($this->form_validation->run() == FALSE)	{
			$this->load->view('product/add', array('error'=>'', 'category_options' => $strCategories, 'brand_options' => $strOptions ));
		} else {
			$pc_idx 	= $this->input->post('pc_idx');
			$pb_idx 	= $this->input->post('pb_idx');
			$p_name 	= $this->input->post('p_name');
			$p_capacity	= $this->input->post('p_capacity');
			$p_color 	= $this->input->post('p_color');
			$p_price 	= $this->input->post('p_price');
			$p_desc 	= $this->input->post('p_desc');

			$p_img = "";
			if ( $_FILES AND $_FILES['userfile']['name'] ){
				$config['upload_path'] = ".".$this->config->item('product_image_path');//'./static/images/product/';
				$config['encrypt_name'] = true;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '2048';	//2MB
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				
				$this->load->library('upload', $config);
					
				if ( ! $this->upload->do_upload())
				{
					$error = $this->upload->display_errors();
					$this->upload->display_errors('<p class="text-danger">', '</p>');
					$this->load->view('product/add', array('error'=>'', 'category_options' => $strCategories, 'brand_options' => $strOptions ));
					return false;
				}
				else
				{
					$file_data = array('upload_data' => $this->upload->data());
					//print_r($file_data);
					//$this->load->view('upload_success', $data);
					$p_img = $this->config->item('product_image_path').$file_data['upload_data']['file_name'];
				}
			}
			$params = array(
					'pc_idx'=>$pc_idx,
					'pb_idx'=>$pb_idx,
					'p_name'=>$p_name,
					'p_capacity'=>$p_capacity,
					'p_color' => $p_color ,
					'p_price' => $p_price,
					'p_img' => $p_img,
					'p_desc' => $p_desc,
					'p_reg_date' => date('YmdHis')
			);
				
				
			$this->product_model->add($params);
		
			$this->load->helper('url');
			redirect('admin.php/products/lists');

		}
		
		$this->_footer();
		
	}
	
	/*
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
		
		$this->form_validation->set_rules('pb_idx', '브랜드', 'trim|required');
		$this->form_validation->set_rules('p_name', '제품명', 'trim|required');
		$this->form_validation->set_rules('p_capacity', '용량', 'trim');
		$this->form_validation->set_rules('p_color', '컬러', 'trim');
		$this->form_validation->set_rules('p_price', '가격', 'trim|numeric');
		
		$this->form_validation->set_rules('p_desc', '설명', 'required');

		
		//카테고리 목록을 구해서 select로 출력하기 위해 배열화 한다.
		$this->load->model('category_model');
		$arrCat = $this->category_model->gets();
		$strCategories = array();
		foreach ($arrCat as $row){
			$strCategories[$row['idx']] = $row['pc_display_name'];
		}
		
		
		$this->load->model('brand_model');
		$arrBrand = $this->brand_model->gets();
		$strOptions = array();
		foreach ($arrBrand as $row){
			$strOptions[$row['idx']] = $row['pb_name'] . "(".$row['pb_eng_name'].")";
		}
		
		$data = $this->product_model->get($idx);
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->load->view('product/modify', array('data'=>$data,'error'=>'', 'category_options' => $strCategories, 'brand_options' => $strOptions ));
		}
		else
		{
			$pc_idx 	= $this->input->post('pc_idx');
			$pb_idx 	= $this->input->post('pb_idx');
			$p_name 	= $this->input->post('p_name');
			$p_capacity	= $this->input->post('p_capacity');
			$p_color 	= $this->input->post('p_color');
			$p_price 	= $this->input->post('p_price');
			$p_desc 	= $this->input->post('p_desc');
			
			$p_img = "";
			if ( $_FILES AND $_FILES['userfile']['name'] ){
				$config['upload_path'] = './static/images/product/';
				$config['encrypt_name'] = true;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '2048';	//2MB
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
			
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload())
				{
					$error = $this->upload->display_errors();
					$this->upload->display_errors('<p class="text-danger">', '</p>');
					$this->load->view('product/modify', array('data'=>$data,'error'=>$error, 'brand_options' => $strOptions ));
					return false;
				}
				else
				{
					$file_data = array('upload_data' => $this->upload->data());
					//print_r($file_data);
					//$this->load->view('upload_success', $data);
					$p_img = $this->config->item('product_image_path').$file_data['upload_data']['file_name'];
				}
			}
				
			$params = array(
					'pc_idx'=>$pc_idx,
					'pb_idx'=>$pb_idx,
					'p_name'=>$p_name,
					'p_capacity'=>$p_capacity,
					'p_color' => $p_color ,
					'p_price' => $p_price,
					'p_desc' => $p_desc
			);
			
			if($p_img != "")
				$params['p_img'] = $p_img;
		
			$this->product_model->update(array("idx"=>$idx), $params);
		
			$this->load->helper('url');
			redirect('admin.php/products/lists');
		
		}
		
		$this->_footer();
	}
	
	/*
	 * 
	 */
	public function delete(){
		$this->_chkLogin();
		if(count($this->_segment) >= 3){
			$idx= $this->_segment[3];
			$this->product_model->delete(array("idx"=>$idx));
			
			$this->load->view('json', array('data'=>array('result'=>'OK')));
		}
	}
	
	/*
	 * 
	 */
	public function _left(){
		
		$this->load->view('left');
		
	}
	
}