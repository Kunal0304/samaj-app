<?php
require(APPPATH . '/libraries/REST_Controller.php');

class Test extends  REST_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('api/guide_model');
		$this->load->helper('URL');

	}
	
	public function index_get()
	{
		$this->response([
			'status' => FALSE,
			'message' => "unknown method"
		], 200);
	}
	
	public function testApi_post(){
		echo "terst";
	}
	
	public function getApi_post(){
		$arr_value = array(
						'name' =>'rahul',
						'city' =>'indore',
						'number' =>'87452144',
						'email' => 'ab@gmail.com'
						);
		
		$this->response([
					'status' => TRUE,
					'name' => $arr_value
				], 200);
	}
	
	public function getData_post(){
		echo "ffsf";die;
		$arr_value = array(
						'class' =>'A',
						'is_active' =>'1'
						);
		$result = $this->guide_model->insert('classes',$arr_value );
		$this->response([
					'status' => TRUE,
					'name' => "Save"
				], 200);
	}
	
}