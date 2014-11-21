<?php
include_once ('./resources/function.php');

class Client extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        echo "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script LANGUAGE='Javascript'>alert('禁止访问！')</script></head>";
        echo "<script LANGUAGE='Javascript'>history.go(-1)</script>";
	}
}
