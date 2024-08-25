<?php
require(APPPATH . '/libraries/REST_Controller.php');

class Ang extends  REST_Controller {
	public function __construct() {
		parent::__construct();
		//$this->load->model('api/guide_model');
		$this->load->helper('URL');

	}
	
	public function index_get()
	{
		$this->response([
			'status' => FALSE,
			'message' => "unknown method"
		], 200);
	}
	
	public function showApi_post(){
		echo "dsfdssf";die;
		$this->response([
					'status' => TRUE,
					'name' => 'test'
				], 200);
	}
}