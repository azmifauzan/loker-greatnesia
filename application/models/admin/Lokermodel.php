<?php
class Lokermodel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function countAllLowongan()
    {
        return $this->db->count_all_results('lowongan');
    }
    
    public function getAllLowongan($pg,$off)
    {
        $this->db->order_by('upload_time','asc');
        return $this->db->get('lowongan',$pg,$off);
    }
    
    public function getAllKategori()
    {
        $this->db->order_by('nama','asc');
        return $this->db->get('kategori');
    }
    
    public function tambahdata($jd,$kt,$ds,$tg,$us)
    {
        $data = array(
            'judul' => $jd,
            'kid' => $kt,
            'deskripsi' => $ds,
            'tag' => $tg,
            'uploader' => $us,
            'upload_time' => date('Y-m-d H:i:s'),
            'status' => 1
        );
        return $this->db->insert('lowongan',$data);
    }
    
    public function getLokerDetil($lid)
    {
        $this->db->where('lid',$lid);
        return $this->db->get('lowongan')->row();
    }
    
    public function editdata($jd,$kt,$ds,$tg,$id)
    {
        $data = array(
            'judul' => $jd,
            'kid' => $kt,
            'deskripsi' => $ds,
            'tag' => $tg
        );
        $this->db->where('lid',$id);
        return $this->db->update('lowongan',$data);
    }
    
    public function hapusdata($lid)
    {
        $this->db->where('lid',$lid);
        return $this->db->delete('lowongan');
    }
}
