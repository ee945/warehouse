<?php
class Stats_m extends CI_model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getsizeall()
    {
        $this->db->order_by('style','asc');
        $this->db->order_by('color','asc');
        $this->db->order_by('size','asc');
        $query = $this->db->get('inf_v_size');
        return $query->result_array();
    }

    public function getcolorall()
    {
        $this->db->order_by('style','asc');
        $this->db->order_by('color','asc');
        $query = $this->db->get('inf_v_color');
        return $query->result_array();
    }

    public function getstyleall()
    {
        $this->db->order_by('style','asc');
        $query = $this->db->get('inf_v_style');
        return $query->result_array();
    }

    public function getsizelimit($num,$start)
    {
        $this->db->order_by('style','asc');
        $this->db->order_by('color','asc');
        $this->db->order_by('size','asc');
        $query = $this->db->get('inf_v_size',$num,$start);
        return $query->result_array();
    }

    public function getcolorlimit($num,$start)
    {
        $this->db->order_by('style','asc');
        $this->db->order_by('color','asc');
        $query = $this->db->get('inf_v_color',$num,$start);
        return $query->result_array();
    }

    public function getstylelimit($num,$start)
    {
        $this->db->order_by('style','asc');
        $query = $this->db->get('inf_v_style',$num,$start);
        return $query->result_array();
    }
}
?>
