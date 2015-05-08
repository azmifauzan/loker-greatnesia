<?php
class Homemodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAllKategori()
    {
        $this->db->order_by('nama','asc');
        return $this->db->get('kategori');
    }
    
    public function getAllLoker()
    {
        $this->db->order_by('upload_time','desc');
        return $this->db->get('lowongan');
    }
}