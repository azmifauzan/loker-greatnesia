<?php
class Loker extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		if($this->session->userdata('isLoginAdmin') != TRUE)
            redirect('secret/login','refresh');
			
        $this->load->model('admin/usermodel','usm');
        $this->load->model('admin/lokermodel','lkm');
    }
    
    public function index($off = 0)
    {
		$this->load->library("pagination");
		$this->load->helper('text');
        $data['menu'] = 'Loker';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
                
        $total = $this->lkm->countAllLowongan();
        $config["base_url"] = site_url('secret/loker/index');
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        
        $data['loker'] = $this->lkm->getAllLowongan($config['per_page'],$off);
        if($this->session->flashdata('info'))
            $data['info'] = $this->session->flashdata('info');
        if($this->session->flashdata('error'))
            $data['error'] = $this->session->flashdata('error');
        $this->load->view('secret/loker_view',$data);
    }
    
    public function tambah()
    {
        $data['menu'] = 'Loker';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
		$data['kategori'] = $this->lkm->getAllKategori();
        $this->load->view('secret/lokertambah_view',$data);
    }
    
    public function tambahp()
    {
        if($this->input->post("simpan"))
        {
            $jd = $this->input->post('judul');
            $ds = $this->input->post('deskripsi');
            $tg = $this->input->post('tag');
			$us = $this->session->userdata('username');
			$kt = $this->input->post('kategori');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
			$this->form_validation->set_rules('tag', 'Tag', 'trim|required');
            if ($this->form_validation->run()){
                if($this->lkm->tambahdata($jd,$kt,$ds,$tg,$us)){
                    $this->session->set_flashdata('info','Data Berhasil ditambahkan');
                }
                else{
                    $this->session->set_flashdata('error','Data Gagal ditambahkan');
                }
                redirect('secret/loker','refresh');
            }
            else{
                $data['menu'] = 'Loker';
                $username = $this->session->userdata('username');
                $data['user'] = $this->usm->getUserDetail($username);
                $data['error'] = 'Terdapat beberapa kesalahan dalam pengisian data';
                $this->load->view('secret/lokertambah_view',$data);
            }
        }
        else{
            redirect('secret/loker','refresh');
        }
    }
    
    public function edit($lid)
    {
        $data['menu'] = 'Loker';
        $username = $this->session->userdata('username');
        $data['user'] = $this->usm->getUserDetail($username);
        $data['loker'] = $this->lkm->getLokerDetil($lid);
		$data['kategori'] = $this->lkm->getAllKategori();
        $this->load->view('secret/lokeredit_view',$data);
    }
    
    public function editp()
    {
        if($this->input->post("simpan"))
        {
            $jd = $this->input->post('judul');
            $ds = $this->input->post('deskripsi');
            $tg = $this->input->post('tag');
            $id = $this->input->post('lid');
			$kt = $this->input->post('kategori');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
			$this->form_validation->set_rules('tag', 'Tag', 'trim|required');
            if ($this->form_validation->run()){
                if($this->lkm->editdata($jd,$kt,$ds,$tg,$id)){
                    $this->session->set_flashdata('info','Data Berhasil diubah');
                }
                else{
                    $this->session->set_flashdata('error','Data Gagal diubah');
                }
                redirect('secret/loker','refresh');
            }
            else{
                $data['menu'] = 'Loker';
                $username = $this->session->userdata('username');
                $data['user'] = $this->usm->getUserDetail($username);
                $data['loker'] = $this->lkm->getLokerDetil($id);
				$data['kategori'] = $this->lkm->getAllKategori();
                $data['error'] = 'Terdapat beberapa kesalahan dalam pengisian data';
                $this->load->view('secret/lokeredit_view',$data);
            }
        }
        else{
            redirect('secret/loker','refresh');
        }
    }
    
    public function delete($lid)
    {
        if($this->lkm->hapusdata($lid))
        {
            $this->session->set_flashdata('info','Data Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('error','Data Gagal dihapus');
        }
        redirect('secret/loker','refresh');
    }
}
