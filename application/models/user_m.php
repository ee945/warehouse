<?php
class User_m extends CI_model
{
    function __construct()
    {
        parent::__construct();
    }
    public function getall()
    {
        $query = $this->db->get('inf_user');
        return $query->result_array();
    }
    public function getone($name)
    {
        $query = $this->db->get_where('inf_user',array('name'=> $name));
        return $query->row_array();
    }

    public function postdata()
    {
        $data = array(
                'name'=>$this->input->post('name'),
                'nick'=>$this->input->post('nick'),
                'dept'=>$this->input->post('dept'),
                'remark'=>$this->input->post('remark'));
        return $data;
    }
    public function add_user()
    {
        $data = $this->postdata();
        $data['grade'] = getpermit($_POST[grade]);
        $data['pass'] = md5($this->input->post('pass'));
        return $this->db->insert('inf_user',$data);
    }
    public function edit_user()
    {
        $data = $this->postdata();
        if(ifpermit($this->session->userdata('grade'),6))$data['grade'] = getpermit($_POST[grade]);
        if($this->input->post('pass')!="")$data['pass'] = md5($this->input->post('pass'));
        $this->db->where('name',$_POST['name']);
        return $this->db->update('inf_user',$data);
    }

    public function del_user($name)
    {
        $this->db->where('name',$name);
        return $this->db->delete('inf_user');
    }
}
?>
