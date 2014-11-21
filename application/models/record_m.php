<?php
class Record_m extends CI_model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getall()
    {
        $this->db->order_by('date','desc');
        $this->db->order_by('regtime','desc');
        $query = $this->db->get('inf_record');
        return $query->result_array();
    }

    public function getlimit($num,$start)
    {
        $this->db->order_by('date','desc');
        $this->db->order_by('regtime','desc');
        $query = $this->db->get('inf_record',$num,$start);
        return $query->result_array();
    }

    public function getone($id)
    {
        $query = $this->db->get_where('inf_record',array('id'=> $id));
        return $query->row_array();
    }

    public function postdata()
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
        return $data;
    }

    public function add_record()
    {
        $data = $this->postdata();
        return $this->db->insert('inf_record',$data);
    }

    public function edit_record()
    {
        $data = $this->postdata();
        $this->db->where('id',$_POST['id']);
        return $this->db->update('inf_record',$data);
    }

    public function del_record($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('inf_record');
    }
}
?>
