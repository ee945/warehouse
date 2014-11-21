<?php
include_once ('./resources/function.php');
class User extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        error_reporting(E_ALL & ~E_NOTICE);
        if(!($this->session->userdata('name')==$this->uri->segment(3))){
            if(!(ifpermit($this->session->userdata('grade'),6)))
            {
                echo "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script LANGUAGE='Javascript'>alert('禁止访问！没有权限')</script></head>";
                echo "<script LANGUAGE='Javascript'>location.href='".base_url()."'</script>";
            }
        }
    }

	public function index()
	{
        if(!(ifpermit($this->session->userdata('grade'),6)))
        {
            echo "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script LANGUAGE='Javascript'>alert('禁止访问！没有权限')</script></head>";
            echo "<script LANGUAGE='Javascript'>location.href='".base_url()."'</script>";
        }
        if($_POST['s_name']!="")$this->db->like('name',$_POST['s_name']);
        if($_POST['s_nick']!="")$this->db->like('nick',$_POST['s_nick']);
        if($_POST['s_dept']!="")$this->db->like('dept',$_POST['s_dept']);
        $data['user'] = $this->user_m->getall();
        $data['menu_user'] = "current";
        $data['menu_user_list'] = "class='current'";
        $data['title'] = "用户列表";
		$this->load->view('simpla/user_list',$data);
	}

    public function add()
    {
        if($_POST['postdata'])
        {
            if(ifpermit($this->session->userdata('grade'),2))
            {
                $this->form_validation->set_rules('name','name','required|is_unique[inf_user.name]');
                $this->form_validation->set_rules('pass','pass','required|matches[pass2]');
                $this->form_validation->set_rules('nick','nick','required');
                $this->form_validation->set_rules('dept','dept','required');
                $this->form_validation->set_message('required', '请输入完整信息');
                $this->form_validation->set_message('is_unique', '该名字已存在');
                $this->form_validation->set_message('matches', '两次密码不一致');
                if($this->form_validation->run()==FALSE){
                    $do="a";
                }else{
                    $do="s";
                    $this->user_m->add_user();
                }
            }else{
                $do="e";
            }
        }
        $data = array(
                'id'=>"",
                'name'=>"",
                'pass'=>"",
                'nick'=>"",
                'dept'=>"",
                'remark'=>"");
        if($do=="s"){$data['noti'] = "success";}
        if($do=="e"){$data['noti'] = "error";}
        if($do=="a")
        {
            $data = array(
                    'name'=>$this->input->post('name'),
                    'nick'=>$this->input->post('nick'),
                    'pass'=>$this->input->post('pass'),
                    'dept'=>$this->input->post('dept'),
                    'remark'=>$this->input->post('remark'));
            $data['noti'] = "attention";
        }
        $data['menu_user'] = "current";
        $data['menu_user_add'] = "class='current'";
        $data['title'] = "添加用户";
        $data['action'] = "add/".$id;
        $data['actname'] = "添加";
		$this->load->view('simpla/user_input',$data);

    }

    public function edit($name="")
    {
        if($name=="")
        {
            echo "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script LANGUAGE='Javascript'>alert('禁止访问！地址不正确！')</script></head>";
            echo "<script LANGUAGE='Javascript'>location.href='".base_url()."'</script>";
        }
        if($_POST['postdata'])
        {
            if(ifpermit($this->session->userdata('grade'),3)||($this->session->userdata('name')==$this->uri->segment(3)))
            {
                $this->form_validation->set_rules('pass','pass','matches[pass2]');
                $this->form_validation->set_rules('nick','nick','required');
                $this->form_validation->set_rules('dept','dept','required');
                $this->form_validation->set_message('required', '请输入完整信息');
                $this->form_validation->set_message('is_unique', '该名字已存在');
                $this->form_validation->set_message('matches', '两次密码不一致');
                if($this->form_validation->run()==FALSE){
                    $do="a";
                }else{
                    if($this->session->userdata('name')==$this->uri->segment(3)){
                        $do="o";
                        $this->session->unset_userdata('name');
                        $this->session->unset_userdata('grade');
                        $this->session->unset_userdata('perpage');
                    }else{
                        $do="s";
                    }
                    $this->user_m->edit_user();
                }
            }else{
                $do="e";
            }
        }
        $data = $this->user_m->getone($name);
        $data['gchk1'] = getchecked($data['grade'],1);
        $data['gchk2'] = getchecked($data['grade'],2);
        $data['gchk3'] = getchecked($data['grade'],3);
        $data['gchk4'] = getchecked($data['grade'],4);
        $data['gchk5'] = getchecked($data['grade'],5);
        $data['gchk6'] = getchecked($data['grade'],6);
        $data['gchk7'] = getchecked($data['grade'],7);
        $data['gchk8'] = getchecked($data['grade'],8);
        $data['menu_user'] = "current";
        if($do=="s"){$data['noti'] = "success";}
        if($do=="o"){$data['noti'] = "success-out";}
        if($do=="e"){$data['noti'] = "error";}
        if($do=="a")
        {
            $data['noti'] = "attention";
        }
        $data['title'] = "编辑用户";
        $data['action'] = "edit/".$name;
        $data['actname'] = "修改";
		$this->load->view('simpla/user_input',$data);
    }

    public function del($name)
    {
        if(ifpermit($this->session->userdata('grade'),4))
        {
            $this->user_m->del_user($name);
            echo "<script LANGUAGE='Javascript'>location.href='".base_url('user')."'</script>";
        }else{
            echo "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script LANGUAGE='Javascript'>alert('操作失败！没有权限')</script></head>";
            echo "<script LANGUAGE='Javascript'>location.href='".base_url('user')."'</script>";
        }
    }        
}
