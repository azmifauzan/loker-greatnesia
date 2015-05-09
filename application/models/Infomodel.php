<?php
class Infomodel extends CI_Model
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
    
    public function getLokerDetil($lid)
    {
        $this->db->select('lowongan.*');
        $this->db->select('kategori.nama as kategori');
        $this->db->join('kategori','lowongan.kid = kategori.kid');
        $this->db->where('lid',$lid);
        return $this->db->get('lowongan')->row();
    }
    
    public function getLokerTerbaru($jum,$ex)
    {
        $this->db->where('status',1);
        $this->db->limit($jum);
        $this->db->where('lid !=',$ex);
        return $this->db->get('lowongan');
    }
}