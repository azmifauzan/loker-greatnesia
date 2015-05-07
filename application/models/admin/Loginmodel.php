<?php
class Loginmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function cekLogin($u,$p)
    {
        $this->db->where('username',$u);
        $this->db->where('password',MD5($p));
        $this->db->from('admin');
        $cek = $this->db->count_all_results();
        if($cek == 1)
            return TRUE;
        else
            return FALSE;
    }
}