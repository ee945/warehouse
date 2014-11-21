<?php
include_once ('./resources/function.php');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        error_reporting(E_ALL & ~E_NOTICE);
    }

	public function index()
	{
        $data['title'] = "用户登录";
		$this->load->view('simpla/login',$data);
	}

	public function checklogin()
	{
        $getuser = $this->user_m->getone(trim($_POST['name']));
        if($getuser)
        {
            if($getuser['pass'] == md5($_POST['pass']))
            {
                $getuser['perpage'] = 15;
                $this->session->set_userdata($getuser);
                $url= base_url('login/quickstart');
                echo "<script LANGUAGE='Javascript'>location.href='$url'</script>";
            }else{
                $url= base_url('login');
                echo "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script LANGUAGE='Javascript'>alert('用户名或密码不正确！');location.href='$url'</script></head>";
            }
        }else{
            $url= base_url('login');
            echo "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script LANGUAGE='Javascript'>alert('用户名或密码不正确！');location.href='$url'</script></head>";
        }
	}

    public function out()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('grade');
        $this->session->unset_userdata('access');
        $this->session->unset_userdata('perpage');
        $url= base_url('login');
        echo "<script LANGUAGE='Javascript'>location.href='$url'</script>";
    }

    public function quickstart()
    {
        $data['menu_quickstart'] = "current";
        $data['title'] = "快速导航";
        $this->load->view('simpla/quickstart',$data);
    }
}
