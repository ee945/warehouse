<?php
include_once ('./resources/function.php');

class Test extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

	public function a()
	{
        $data['title'] = "模板测试:A";
		$this->load->view('simpla/temp1',$data);
	}
	public function b()
	{
        $data['title'] = "模板测试:B";
		$this->load->view('simpla/temp2',$data);
	}

	public function c()
	{
        $data['title'] = "模板测试:C";
		$this->load->view('simpla/temp3',$data);
	}
}
