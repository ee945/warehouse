<?php 
include_once ('./resources/function.php');

class Stats extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('stats_m');
        error_reporting(E_ALL & ~E_NOTICE);
    }

	public function size()
	{
        if($_POST['s_style']!="")$this->db->like('style',$_POST['s_style']);
        if($_POST['s_color']!="")$this->db->like('color',$_POST['s_color']);
        if($_POST['s_size']!="")$this->db->like('size',$_POST['s_size']);
        if(!$_POST['search']){
            $config['base_url'] = base_url().'/stats/size/';
            $config['total_rows'] = count($this->stats_m->getsizeall());
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
            $data['stats'] = $this->stats_m->getsizelimit($perpage,$start);
        }else{
            $data['stats'] = $this->stats_m->getsizelimit($perpage,$start);
        }
        $data['menu_stats'] = "current";
        $data['menu_stats_size'] = "class='current'";
        $data['title'] = "尺码统计";
		$this->load->view('simpla/stats_size',$data);
	}

	public function color()
	{
        if($_POST['s_style']!="")$this->db->like('style',$_POST['s_style']);
        if($_POST['s_color']!="")$this->db->like('color',$_POST['s_color']);
        if(!$_POST['search']){
            $config['base_url'] = base_url().'/stats/color/';
            $config['total_rows'] = count($this->stats_m->getcolorall());
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
            $data['stats'] = $this->stats_m->getcolorlimit($perpage,$start);
        }else{
            $data['stats'] = $this->stats_m->getcolorlimit($perpage,$start);
        }
        $data['menu_stats'] = "current";
        $data['menu_stats_color'] = "class='current'";
        $data['title'] = "颜色统计";
		$this->load->view('simpla/stats_color',$data);
	}

	public function style()
	{
        if($_POST['s_style']!="")$this->db->like('style',$_POST['s_style']);
        if(!$_POST['search']){
            $config['base_url'] = base_url().'/stats/style/';
            $config['total_rows'] = count($this->stats_m->getstyleall());
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
            $data['stats'] = $this->stats_m->getstylelimit($perpage,$start);
        }else{
            $data['stats'] = $this->stats_m->getstylelimit($perpage,$start);
        }
        $data['menu_stats'] = "current";
        $data['menu_stats_style'] = "class='current'";
        $data['title'] = "款式统计";
		$this->load->view('simpla/stats_style',$data);
	}
}
