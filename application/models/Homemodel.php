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
    
    public function getAllLoker($page,$off)
    {
        $this->db->where('status',1);
        $this->db->order_by('upload_time','desc');
        return $this->db->get('lowongan',$page,$off);
    }
    
    public function countAllLoker()
    {
        $this->db->where('status',1);
        return $this->db->count_all_results('lowongan');
    }
    
    public function getKategoriDetil($kid)
    {
        $this->db->where('kid',$kid);
        return $this->db->get('kategori')->row();
    }
    
    public function getAllLokerByKategori($kid,$page,$off)
    {
        $this->db->where('status',1);
        $this->db->where('kid',$kid);
        $this->db->order_by('upload_time','desc');
        return $this->db->get('lowongan',$page,$off);
    }
    
    public function countAllLokerKategori($kid)
    {
        $this->db->where('status',1);
        $this->db->where('kid',$kid);
        return $this->db->count_all_results('lowongan');
    }
}