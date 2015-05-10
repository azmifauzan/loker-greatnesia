<?php
class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('homemodel','hmm');
    }
    
    public function index($off = 0)
    {
        $total = $this->hmm->countAllLoker();
        $this->load->library('pagination');
        $config["base_url"] = site_url('home/index');
        $config["total_rows"] = $total;
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["full_tag_open"] = '<div class="paging">';        
        $config["full_tag_close"] = '</div>';
        $config['cur_tag_open'] = '<span class="current">';
        $config['cur_tag_close'] = '</span>';
        $this->pagination->initialize($config);
        
        $this->load->helper('text');
        $data["judul"] = "Home";
        $data["subjudul"] = "Lowongan Terbaru";
        $data["loker"] = $this->hmm->getAllLoker($config['per_page'],$off);
        $data["kategori"] = $this->hmm->getAllKategori();
        $this->load->view('home_view',$data);
    }
    
    public function kategori($kid, $off = 0)
    {
        $total = $this->hmm->countAllLokerKategori($kid);
        $this->load->library('pagination');
        $config["base_url"] = site_url('home/kategori/'.$kid);
        $config["total_rows"] = $total;
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $config["full_tag_open"] = '<div class="paging">';        
        $config["full_tag_close"] = '</div>';
        $config['cur_tag_open'] = '<span class="current">';
        $config['cur_tag_close'] = '</span>';
        $this->pagination->initialize($config);
        
        $this->load->helper('text');
        $kat = $this->hmm->getKategoriDetil($kid);
        $data["judul"] = $kat->nama;
        $data["subjudul"] = "Lowongan Terbaru";
        $data["loker"] = $this->hmm->getAllLokerByKategori($kid,$config['per_page'],$off);
        $data["kategori"] = $this->hmm->getAllKategori();
        $this->load->view('home_view',$data);
    }
}
