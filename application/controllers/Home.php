<?php
class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('homemodel','hmm');
    }
    
    public function index()
    {
        $this->load->helper('text');
        $data["loker"] = $this->hmm->getAllLoker();
        $data["kategori"] = $this->hmm->getAllKategori();
        $this->load->view('home_view',$data);
    }
}
