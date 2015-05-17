<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag_model extends MH_Model{
	
	/*
	 * 
	 */
	function __construct(){
		parent::__construct();	
		$this->tablename = 'content_tag_list';	//태그의 목록을 저장.
		$this->tablename2 = 'content_tag';		//태그와 컨텐츠의 관계 저장.
	}

	/*
	 * 
	 */
	function getList($offset){
		$this->db->from($this->tablename)->order_by('ctl_tag', 'asc')->limit($this->cntPerPage, $offset);
		$query = $this->db->get();
	
		return $query->result_array();
	}
	
	/*
	 * getId()
	 * 태그를 id를 반환한다.
	 * 태그의 id를 구해오는데 없으면 추가하고 해당 id를 가져온다.
	 * 
	 * $tag - 태그명
	 * 		- string
	 * 
	 * return value - 해당 태그의 id값
	 * 
	 */
	function getId($tag){
		$this->db->from($this->tablename)->where("ctl_tag", $tag)->limit(1);
		$query = $this->db->get();
		$id = 0;
		if($query->num_rows() == 0){
			$id = $this->add(array('ctl_tag' => $tag));
		}else{
			$row = $query->row();
			$id = $row->idx;
		}
		
		return $id;
	}
	
	/*
	 * 
	 */
	function getTags($cidx) {
		$this->db->select("ctl_tag")->from($this->tablename2)->join($this->tablename, $this->tablename2.".ctl_idx = ".$this->tablename.".idx")->where("c_idx", $cidx);
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	/*
	 * addWithContent()
	 * 
	 * 컨텐츠에 해당하는 태그를 추가한다.
	 * 
	 * $cidx - content idx
	 * $tags - 태그 목록
	 * 		 - string(분리 문자 [,])
	 * 
	 * return value - 성공시 true
	 */
	function addWithContent($cidx, $tags){
		$arrTags = explode(',',$tags);
		
		$params = array();
		foreach($arrTags as $tag){
			$_tmpTag = array(
					'c_idx' => $cidx,
					'ctl_idx' => $this->getId($tag)
				);
			$params[] = $_tmpTag;
		}
		
		$this->db->insert_batch($this->tablename2, $params);
		
		return true;
	}
	
	/*
	 * updateWithContent()
	*
	* 컨텐츠에 해당하는 태그를 업데이트 한다.
	* 기존 태그를 삭제하고 다시 추가하는 방식으로 업데이트 한다.
	*
	* $cidx - content idx
	* $tags - 태그 목록
	* 		 - string(분리 문자 [,])
	*
	* return value - 성공시 true
	*/
	function updateWithContent($cidx, $tags){
		
		$this->db->delete($this->tablename2, array('c_idx' => $cidx));
		
		$arrTags = array_unique(explode(',',$tags));
	
		$params = array();
		foreach($arrTags as $tag){
			$_tmpTag = array(
					'c_idx' => $cidx,
					'ctl_idx' => $this->getId($tag)	//태그의 id를 구해오는데 없으면 추가하고 해당 id를 가져온다.
			);
			$params[] = $_tmpTag;
		}
	
		$this->db->insert_batch($this->tablename2, $params);
	
		return true;
	}
	
	/*
	 * 
	 */
	function update($idx, $params){
		$this->db->where('idx', $idx);
		$this->db->update($this->tablename, $params);
	}
	
	/*
	 * 
	 */
	function delete($idx){
		$this->db->delete($this->tablename, array('idx' => $idx));
	}
	
}