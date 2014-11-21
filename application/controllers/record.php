<?php 
include_once ('./resources/function.php');
class Record extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->model('record_m');
        error_reporting(E_ALL & ~E_NOTICE);
        if(!(ifpermit($this->session->userdata('grade'),5)))
        {
            echo "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script LANGUAGE='Javascript'>alert('禁止访问！没有权限')</script></head>";
            echo "<script LANGUAGE='Javascript'>location.href='".base_url()."'</script>";
        }
        
    }

	public function simpla()
	{
        $data['title'] = "网页模板";
		$this->load->view('simpla/temp',$data);
	}
	public function index()
	{
        $data['menu_record'] = "current";
        $data['menu_record_list'] = "class='current'";
        if($_POST['s_state']=="进库")$this->db->where('num >',0);
        if($_POST['s_state']=="出库")$this->db->where('num <',0);
        if($_POST['s_style']!="")$this->db->like('style',$_POST['s_style']);
        if($_POST['s_color']!="")$this->db->like('color',$_POST['s_color']);
        if($_POST['s_size']!="")$this->db->like('size',$_POST['s_size']);
        if($_POST['s_client']!="")$this->db->like('client',$_POST['s_client']);
        if($_POST['s_location']!="")$this->db->like('location',$_POST['s_location']);
        if($_POST['s_start_date'])$this->db->where('date >=',$_POST['s_start_date']);
        if($_POST['s_end_date'])$this->db->where('date <=',$_POST['s_end_date']);
        if(!$_POST['search']){
            $config['base_url'] = base_url().'/record/index/';
            $config['total_rows'] = count($this->record_m->getall());
            $config['per_page'] = $this->session->userdata('perpage');
            $config['num_links'] = 3;
            $config['use_page_numbers'] = TRUE;
            $config['first_link'] = '首页';
            $config['last_link'] = '尾页';
            $config['anchor_class'] = "class='number' ";
            $config['cur_tag_open'] = "<a class='number current' herf='#'>";
            $config['cur_tag_close'] = "</a>";
            $this->pagination->initialize($config);
            $perpage = $config['per_page'];
            $start = $this->uri->segment(3)?($this->uri->segment(3)-1)*$perpage:0;
            $data['record'] = $this->record_m->getlimit($perpage,$start);
        }else{
            $data['record'] = $this->record_m->getlimit($perpage,$start);
        }
        $data['title'] = "进出记录";
		$this->load->view('simpla/record_list',$data);
	}

    public function add()
    {
        if($_POST['postdata'])
        {
            if(ifpermit($this->session->userdata('grade'),2))
            {
                $this->form_validation->set_rules('date','date','required');
                $this->form_validation->set_rules('style','style','required');
                $this->form_validation->set_rules('num','num','required|integer|is_no_zero');
                $this->form_validation->set_message('required', '请输入完整信息');
                $this->form_validation->set_message('integer', '只能输入整数');
                $this->form_validation->set_message('is_no_zero', '数量不能为零');
                if($this->form_validation->run()==FALSE){
                    $do="a";
                }else{
                    $this->db->where('style',$_POST['style']);
                    $this->db->where('color',$_POST['color']);
                    $this->db->where('size',$_POST['size']);
                    $query = $this->db->get('inf_v_size',1);
                    $data['record_size']=$query->row_array();
                    if(($data['record_size']['num']+$_POST['num'])>=0){
                        $do="s";
                        $this->record_m->add_record();
                    }else{
                        $do="o";
                    }
                }
            }else{
                $do="e";
            }
        }
        $data = array(
                'id'=>"",
                'date'=>date("Y-n-j",time()),
                'style'=>"",
                'color'=>"",
                'size'=>"",
                'num'=>"",
                'client'=>"",
                'location'=>"",
                'remark'=>"");
        if($do=="s"){$data['noti'] = "success";}
        if($do=="e"){$data['noti'] = "error";}
        if($do=="a")
        {
            $data = array(
                    'date'=>$this->input->post('date'),
                    'style'=>$this->input->post('style'),
                    'color'=>$this->input->post('color'),
                    'size'=>$this->input->post('size'),
                    'num'=>$this->input->post('num'),
                    'client'=>$this->input->post('client'),
                    'location'=>$this->input->post('location'),
                    'remark'=>$this->input->post('remark'));
            $data['noti'] = "attention";
        }
        if($do=="o")
        {
            $data = array(
                    'date'=>$this->input->post('date'),
                    'style'=>$this->input->post('style'),
                    'color'=>$this->input->post('color'),
                    'size'=>$this->input->post('size'),
                    'num'=>$this->input->post('num'),
                    'client'=>$this->input->post('client'),
                    'location'=>$this->input->post('location'),
                    'remark'=>$this->input->post('remark'));
            $data['noti'] = "out";
        }
        $data['menu_record'] = "current";
        $data['menu_record_add'] = "class='current'";
        $data['title'] = "添加记录";
        $data['action'] = "add/".$id;
        $data['actname'] = "添加";
		$this->load->view('simpla/input',$data);

    }

    public function edit($id)
    {
        if($_POST['postdata'])
        {
            if(ifpermit($this->session->userdata('grade'),3))
            {
                $this->form_validation->set_rules('date','date','required|is_date');
                $this->form_validation->set_rules('style','style','required');
                $this->form_validation->set_rules('num','num','required|integer|is_no_zero');
                $this->form_validation->set_message('required', '请输入完整信息');
                $this->form_validation->set_message('is_date', '请输入正确的日期格式');
                $this->form_validation->set_message('integer', '只能输入整数');
                $this->form_validation->set_message('is_no_zero', '数量不能为零');
                if($this->form_validation->run()==FALSE){
                    $do="a";
                }else{
                    $do="s";
                    $this->record_m->edit_record();
                }
            }else{
                $do="e";
            }
        }
        $data = $this->record_m->getone($id);
        $data['menu_record'] = "current";
        if($do=="s"){$data['noti'] = "success";}
        if($do=="e"){$data['noti'] = "error";}
        if($do=="a")
        {
            $data['noti'] = "attention";
        }
        $data['title'] = "修改记录";
        $data['action'] = "edit/".$id;
        $data['actname'] = "修改";
		$this->load->view('simpla/input',$data);
    }

    public function del($id)
    {
        if(ifpermit($this->session->userdata('grade'),4))
        {
            $this->record_m->del_record($id);
            echo "<script LANGUAGE='Javascript'>location.href='".base_url('record')."'</script>";
        }else{
            echo "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script LANGUAGE='Javascript'>alert('操作失败！没有权限')</script></head>";
            echo "<script LANGUAGE='Javascript'>location.href='".base_url('record')."'</script>";
        }
    }        
}
