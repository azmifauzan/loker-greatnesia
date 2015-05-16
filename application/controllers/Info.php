<?php
class Info extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('infomodel','inm');
    }
    
    public function view($lid)
    {
        //$this->load->helper('text');
        $data["judul"] = "Detail";
        $data["subjudul"] = "Lihat Lowongan";
        $data["kategori"] = $this->inm->getAllKategori();
        $data["loker"] = $this->inm->getLokerDetil($lid);
        $data["title"] = $data["loker"]->judul;
        $data["lokerbaru"] = $this->inm->getLokerTerbaru(5,$lid);
        $this->load->view('info_view',$data);
    }
}
