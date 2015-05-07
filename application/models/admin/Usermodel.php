<?php
class Usermodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getUserDetail($u)
    {
        $this->db->where('username',$u);
        return $this->db->get('admin')->row();
    }
}