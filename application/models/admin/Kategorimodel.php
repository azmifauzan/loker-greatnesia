<?php
class Kategorimodel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function countAllKategori()
    {
        return $this->db->count_all_results('kategori');
    }
    
    public function getAllKategori($pg,$off)
    {
        $this->db->order_by('nama','asc');
        return $this->db->get('kategori',$pg,$off);
    }
    
    public function tambahdata($nm,$ds)
    {
        $data = array(
            'nama' => $nm,
            'deskripsi' => $ds
        );
        return $this->db->insert('kategori',$data);
    }
    
    public function getKategoriDetil($kid)
    {
        $this->db->where('kid',$kid);
        return $this->db->get('kategori')->row();
    }
    
    public function editdata($nm,$ds,$id)
    {
        $data = array(
            'nama' => $nm,
            'deskripsi' => $ds
        );
        $this->db->where('kid',$id);
        return $this->db->update('kategori',$data);
    }
    
    public function hapusdata($kid)
    {
        $this->db->where('kid',$kid);
        return $this->db->delete('kategori');
    }
}
